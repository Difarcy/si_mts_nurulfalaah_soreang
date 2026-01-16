<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAnnouncementRequest;
use App\Http\Requests\Admin\UpdateAnnouncementRequest;
use App\Models\Announcement;
use App\Core\Services\NotificationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AnnouncementController extends Controller
{
    public function index(): View
    {
        $query = Announcement::query();

        // Search
        if ($q = request('q')) {
            $query->where(function($query) use ($q) {
                $query->where('judul', 'like', "%{$q}%")
                      ->orWhere('isi', 'like', "%{$q}%");
            });
        }

        // Filter Status
        if ($status = request('status')) {
            $query->where('status', $status);
        }

        // Sort
        $sort = request('sort', 'latest');
        switch ($sort) {
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'title_asc':
                $query->orderBy('judul', 'asc');
                break;
            case 'title_desc':
                $query->orderBy('judul', 'desc');
                break;
            case 'latest':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        $pengumuman = $query->paginate(25)->withQueryString();

        return view('admin.pages.announcement.index', compact('pengumuman'));
    }

    public function create(): View
    {
        return view('admin.pages.announcement.create');
    }

    public function store(StoreAnnouncementRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['status'] = $request->input('status', 'draft');
        $validated['urutan'] = $validated['urutan'] ?? 0;
        $validated['tanggal'] = now();

        Announcement::create($validated);

        return redirect()->route('cpanel.pengumuman.index')
            ->with('success', NotificationService::success('created', 'pengumuman'))
            ->with('reload', true);
    }

    public function edit(Announcement $pengumuman): View
    {
        return view('admin.pages.announcement.edit', compact('pengumuman'));
    }

    public function update(UpdateAnnouncementRequest $request, Announcement $pengumuman): RedirectResponse
    {
        $validated = $request->validated();
        $validated['status'] = $request->input('status', 'draft');
        $validated['urutan'] = $validated['urutan'] ?? $pengumuman->urutan;

        $pengumuman->update($validated);

        return redirect()->route('cpanel.pengumuman.index')
            ->with('success', NotificationService::success('updated', 'pengumuman'))
            ->with('reload', true);
    }

    public function destroy(Announcement $pengumuman): RedirectResponse
    {
        $pengumuman->delete();

        return redirect()->route('cpanel.pengumuman.index')
            ->with('success', NotificationService::success('deleted', 'pengumuman'))
            ->with('reload', true);
    }
}
