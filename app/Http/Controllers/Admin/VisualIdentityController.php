<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\VisualIdentity;
use App\Domain\Content\Services\HomeDataService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class VisualIdentityController extends Controller
{
    public function index(): View
    {
        $banners = Banner::ordered()->get();
        $currentBannerCount = Banner::count();
        $maxBanners = 6;

        $visualIdentity = VisualIdentity::first();

        // Initialize default values if not exists
        if (!$visualIdentity) {
            $visualIdentity = new VisualIdentity([
                'show_logo' => true,
                'show_tagline' => true,
                'show_title' => true,
                'show_description' => true,
                'show_button' => true,
            ]);
        }

        // Pass $visualIdentity as both visualIdentity and bannerSettings (for backward compatibility in view)
        $bannerSettings = $visualIdentity;

        return view('admin.pages.settings.visual-identity.index', compact('banners', 'currentBannerCount', 'maxBanners', 'bannerSettings', 'visualIdentity'));
    }

    public function update(Request $request): RedirectResponse
    {
        // Update Logo
        if ($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'required|image|mimes:png,jpg,jpeg,webp,svg|max:5120',
            ]);

            $visualIdentity = VisualIdentity::firstOrNew();

            if ($visualIdentity->logo_path) {
                Storage::disk('public')->delete($visualIdentity->logo_path);
            }

            $path = $request->file('logo')->store('site', 'public');
            $visualIdentity->logo_path = $path;
            $visualIdentity->save();

            // Clear homepage caches
            try {
                (new HomeDataService)->clearCacheOnContentUpdate();
            } catch (\Throwable $_) {
            }
        }

        return redirect()->route('cpanel.visual-identity.index')
            ->with('success', 'Logo berhasil diperbarui.');
    }

    /**
     * Update global banner information (used by all slides).
     */
    public function updateSettings(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'tagline' => 'nullable|string|max:150',
            'judul' => 'nullable|string|max:150',
            'deskripsi' => 'nullable|string|max:200',
            'link' => 'nullable|url|max:150',
            'button_text' => 'nullable|string|max:150',
            'show_logo' => 'boolean',
            'show_tagline' => 'boolean',
            'show_title' => 'boolean',
            'show_description' => 'boolean',
            'show_button' => 'boolean',
        ]);

        $validated['show_logo'] = $request->has('show_logo');
        $validated['show_tagline'] = $request->has('show_tagline');
        $validated['show_title'] = $request->has('show_title');
        $validated['show_description'] = $request->has('show_description');
        $validated['show_button'] = $request->has('show_button');

        $visualIdentity = VisualIdentity::firstOrNew();
        $visualIdentity->fill($validated);
        $visualIdentity->save();

        // Clear homepage caches
        try {
            (new HomeDataService)->clearCacheOnContentUpdate();
        } catch (\Throwable $_) {
        }

        return redirect()->route('cpanel.visual-identity.index')
            ->with('success', 'Informasi banner berhasil disimpan.');
    }

    /**
     * Upload banner image (multiple files)
     */
    public function uploadBanner(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'gambar' => 'required',
                'gambar.*' => 'image|mimes:jpeg,jpg,png,webp|max:5120',
            ]);

            $files = $request->file('gambar');
            if (!is_array($files)) {
                $files = [$files];
            }

            $currentBannerCount = Banner::count();
            if ($currentBannerCount + count($files) > 6) {
                return redirect()->route('cpanel.visual-identity.index')
                    ->with('error', 'Gagal upload! Total banner akan melebihi 6 slide.');
            }

            $savedCount = 0;
            foreach ($files as $file) {
                if (!$file || !$file->isValid()) {
                    continue;
                }

                $gambarPath = $file->store('banners', 'public');
                if ($gambarPath) {
                    $maxUrutan = Banner::max('urutan') ?? 0;
                    Banner::create([
                        'gambar' => $gambarPath,
                        'urutan' => $maxUrutan + 1,
                        'is_active' => true,
                    ]);
                    $savedCount++;
                }
            }

            if ($savedCount > 0) {
                try {
                    (new HomeDataService)->clearCacheOnContentUpdate();
                } catch (\Throwable $_) {
                }
            }

            return redirect()->route('cpanel.visual-identity.index')
                ->with('success', $savedCount . ' banner berhasil ditambahkan.');

        } catch (\Exception $e) {
            return redirect()->route('cpanel.visual-identity.index')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroyBanner(Banner $banner): RedirectResponse
    {
        if ($banner->gambar) {
            Storage::disk('public')->delete($banner->gambar);
        }

        $deletedUrutan = $banner->urutan;
        $banner->delete();

        Banner::where('urutan', '>', $deletedUrutan)->decrement('urutan');

        try {
            (new HomeDataService)->clearCacheOnContentUpdate();
        } catch (\Throwable $_) {
        }

        return redirect()->route('cpanel.visual-identity.index')
            ->with('success', 'Banner berhasil dihapus.');
    }

    /**
     * Upload banner promosi
     */
    public function uploadPromosi(Request $request): RedirectResponse
    {
        $request->validate([
            'promosi_banner' => 'required|image|mimes:jpeg,jpg,png,webp|max:5120',
        ]);

        $visualIdentity = VisualIdentity::firstOrNew();

        if ($visualIdentity->promosi_banner_path) {
            Storage::disk('public')->delete($visualIdentity->promosi_banner_path);
        }

        $path = $request->file('promosi_banner')->store('banners/promosi', 'public');
        $visualIdentity->promosi_banner_path = $path;
        $visualIdentity->save();

        try {
            (new HomeDataService)->clearCacheOnContentUpdate();
        } catch (\Throwable $_) {
        }

        return redirect()->route('cpanel.visual-identity.index')
            ->with('success', 'Banner promosi berhasil diupload.')
            ->with('reload', true);
    }

    public function destroyPromosi(): RedirectResponse
    {
        $visualIdentity = VisualIdentity::first();
        if ($visualIdentity && $visualIdentity->promosi_banner_path) {
            Storage::disk('public')->delete($visualIdentity->promosi_banner_path);
            $visualIdentity->promosi_banner_path = null;
            $visualIdentity->save();
        }

        try {
            (new HomeDataService)->clearCacheOnContentUpdate();
        } catch (\Throwable $_) {
        }

        return redirect()->route('cpanel.visual-identity.index')
            ->with('success', 'Banner promosi berhasil dihapus.')
            ->with('reload', true);
    }

    /**
     * Update banner order
     */
    public function updateBannerOrder(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*.id' => 'required|exists:banners,id',
            'order.*.urutan' => 'required|integer|min:1',
        ]);

        foreach ($request->order as $item) {
            Banner::where('id', $item['id'])->update(['urutan' => $item['urutan']]);
        }

        try {
            (new HomeDataService)->clearCacheOnContentUpdate();
        } catch (\Throwable $_) {
        }

        return response()->json(['success' => true]);
    }

    /**
     * Toggle banner active status
     */
    public function toggleBanner(Banner $banner): RedirectResponse
    {
        $banner->update([
            'is_active' => !$banner->is_active,
        ]);

        $status = $banner->is_active ? 'diaktifkan' : 'dinonaktifkan';

        try {
            (new HomeDataService)->clearCacheOnContentUpdate();
        } catch (\Throwable $_) {
        }

        return redirect()->route('cpanel.visual-identity.index')
            ->with('success', "Banner berhasil {$status}.");
    }
}
