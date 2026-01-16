<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityVideo;
use App\Core\Services\NotificationService;
use App\Domain\Content\Services\HomeDataService;
use App\Domain\Media\Services\YouTubeService;
use Illuminate\Http\Request;

class ActivityVideoController extends Controller
{
    public function __construct(
        protected HomeDataService $homeDataService,
        protected YouTubeService $youTubeService
    ) {}

    public function index()
    {
        $videos = ActivityVideo::latest()->paginate(15);
        return view('admin.pages.media.video.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.pages.media.video.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'youtube_url' => 'required|url',
            'deskripsi' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $video = new ActivityVideo($validated);
        // Check if youtube URL is valid
        if (!$video->youtube_id) {
            return back()->withErrors(['youtube_url' => 'Link Youtube tidak valid. Harap masukkan link yang benar.'])->withInput();
        }

        $video->save();

        $this->homeDataService->clearCacheOnContentUpdate();

        return redirect()->route('cpanel.activity-videos.index')
            ->with('success', NotificationService::success('created', 'video kegiatan'));
    }

    public function edit(ActivityVideo $activityVideo)
    {
        return view('admin.pages.media.video.edit', compact('activityVideo'));
    }

    public function update(Request $request, ActivityVideo $activityVideo)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'youtube_url' => 'required|url',
            'deskripsi' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $activityVideo->fill($validated);

        if (!$activityVideo->youtube_id) {
            return back()->withErrors(['youtube_url' => 'Link Youtube tidak valid. Harap masukkan link yang benar.'])->withInput();
        }

        $activityVideo->save();

        $this->homeDataService->clearCacheOnContentUpdate();

        return redirect()->route('cpanel.activity-videos.index')
            ->with('success', NotificationService::success('updated', 'video kegiatan'));
    }

    public function destroy(ActivityVideo $activityVideo)
    {
        $activityVideo->delete();
        $this->homeDataService->clearCacheOnContentUpdate();
        return redirect()->route('cpanel.activity-videos.index')
            ->with('success', NotificationService::success('deleted', 'video kegiatan'));
    }
}
