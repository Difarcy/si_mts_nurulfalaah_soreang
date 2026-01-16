<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreScheduleRequest;
use App\Http\Requests\Admin\UpdateScheduleRequest;
use App\Models\Schedule;
use App\Core\Services\NotificationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    public function index(): View
    {
        $query = Schedule::query();

        // Search
        if ($q = request('q')) {
            $query->where(function($query) use ($q) {
                $query->where('judul', 'like', '%' . $q . '%')
                    ->orWhere('deskripsi', 'like', '%' . $q . '%')
                    ->orWhere('lokasi', 'like', '%' . $q . '%');
            });
        }

        // Status
        if (request('status')) {
            $query->where('status', request('status'));
        }

        // Sort
        $sort = request('sort', 'latest');
        switch ($sort) {
            case 'oldest':
                $query->oldest('created_at');
                break;
            case 'title_asc':
                $query->orderBy('judul', 'asc');
                break;
            case 'title_desc':
                $query->orderBy('judul', 'desc');
                break;
            case 'date_asc':
                $query->orderBy('tanggal_mulai', 'asc');
                break;
            case 'date_desc':
                $query->orderBy('tanggal_mulai', 'desc');
                break;
            case 'latest':
            default:
                $query->latest('created_at');
                break;
        }

        $agenda = $query->paginate(25)->withQueryString();

        return view('admin.pages.agenda.index', compact('agenda'));
    }

    public function create(): View
    {
        return view('admin.pages.agenda.create');
    }

    public function store(StoreScheduleRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['status'] = $request->input('status', 'draft');
        $validated['urutan'] = $validated['urutan'] ?? 0;

        // Auto-set published_at
        $validated['published_at'] = now();

        Schedule::create($validated);

        $message = NotificationService::success('created', 'agenda');

        return redirect()->route('cpanel.agenda.index')
            ->with('success', $message);
    }

    public function edit(Schedule $agenda): View
    {
        return view('admin.pages.agenda.edit', compact('agenda'));
    }

    public function update(UpdateScheduleRequest $request, Schedule $agenda): RedirectResponse
    {
        $validated = $request->validated();
        $validated['status'] = $request->input('status', 'draft');
        $validated['urutan'] = $validated['urutan'] ?? $agenda->urutan;

        $agenda->update($validated);

        $message = NotificationService::success('updated', 'agenda');

        return redirect()->route('cpanel.agenda.index')
            ->with('status', $message)
            ->with('success', $message);
    }

    public function destroy(Schedule $agenda): RedirectResponse
    {
        $agenda->delete();
        $message = NotificationService::success('deleted', 'agenda');

        return redirect()->route('cpanel.agenda.index')
            ->with('status', $message)
            ->with('success', $message);
    }
}
