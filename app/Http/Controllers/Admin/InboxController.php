<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InboxMessage;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    public function index(Request $request)
    {
        $query = InboxMessage::query();

        // Filter by search term
        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('message', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'read') {
                $query->where('is_read', true);
            } elseif ($request->status === 'unread') {
                $query->where('is_read', false);
            }
        }

        // Sort
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'oldest':
                    $query->oldest('created_at');
                    break;
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'latest':
                default:
                    $query->latest('created_at');
                    break;
            }
        } else {
            $query->latest('created_at');
        }

        $messages = $query->paginate(30)->withQueryString();

        return view('admin.pages.inbox.index', compact('messages'));
    }

    public function show(InboxMessage $message)
    {
        // Mark as read when viewing
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('admin.pages.inbox.show', compact('message'));
    }

    public function destroy(InboxMessage $message)
    {
        $message->delete();
        if (request()->ajax() || request()->header('X-Requested-With') === 'XMLHttpRequest') {
            return response()->json(['success' => true]);
        }

        return redirect()->route('cpanel.inbox.index')->with('success', 'Pesan berhasil dihapus');
    }

    public function markAsRead(InboxMessage $message)
    {
        $message->update(['is_read' => true]);
        if (request()->ajax() || request()->header('X-Requested-With') === 'XMLHttpRequest') {
            return response()->json(['success' => true, 'is_read' => true]);
        }

        return back()->with('success', 'Pesan ditandai sebagai sudah dibaca');
    }

    public function markAsUnread(InboxMessage $message)
    {
        $message->update(['is_read' => false]);
        if (request()->ajax() || request()->header('X-Requested-With') === 'XMLHttpRequest') {
            return response()->json(['success' => true, 'is_read' => false]);
        }

        return back()->with('success', 'Pesan ditandai sebagai belum dibaca');
    }
}
