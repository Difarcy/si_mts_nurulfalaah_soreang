<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\InfoText;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteInformationController extends Controller
{
    public function index(): View
    {
        $kontaks = Contact::ordered()->get();

        // Fetch legacy values for defaults
        $legacyWhatsapp = InfoText::where('key', 'footer_whatsapp')->value('value');
        $legacyPhone = InfoText::where('key', 'top_bar_phone')->value('value');
        $legacyEmail = InfoText::where('key', 'footer_email')->value('value');
        $legacyAddress = InfoText::where('key', 'footer_alamat')->value('value');
        $legacyFacebook = InfoText::where('key', 'footer_facebook_url')->value('value');
        $legacyInstagram = InfoText::where('key', 'footer_instagram_url')->value('value');
        $legacyYoutube = InfoText::where('key', 'footer_youtube_url')->value('value');
        $legacyTiktok = InfoText::where('key', 'footer_tiktok_url')->value('value');

        // General Site Contact Information (Empty Defaults)
        $siteWhatsapp = InfoText::where('key', 'site_whatsapp')->firstOrCreate(['key' => 'site_whatsapp'], ['value' => '', 'deskripsi' => 'WhatsApp Situs']);
        $sitePhone = InfoText::where('key', 'site_phone')->firstOrCreate(['key' => 'site_phone'], ['value' => '', 'deskripsi' => 'Nomor Telepon Situs']);
        $siteEmail = InfoText::where('key', 'site_email')->firstOrCreate(['key' => 'site_email'], ['value' => '', 'deskripsi' => 'Email Situs']);
        $siteAddress = InfoText::where('key', 'site_address')->firstOrCreate(['key' => 'site_address'], ['value' => '', 'deskripsi' => 'Alamat Situs']);
        $siteFooterDescription = InfoText::where('key', 'site_footer_description')->firstOrCreate(['key' => 'site_footer_description'], ['value' => '', 'deskripsi' => 'Deskripsi Footer Situs']);
        $siteCoordinates = InfoText::where('key', 'site_map_coordinates')->firstOrCreate(['key' => 'site_map_coordinates'], ['value' => '', 'deskripsi' => 'Koordinat Peta (Latitude, Longitude)']);

        // Social Media Links (Default to empty string)
        $unavailableRoute = route('social-media-unavailable');
        
        $socialFacebook = InfoText::where('key', 'social_facebook')->firstOrCreate(['key' => 'social_facebook'], ['value' => '', 'deskripsi' => 'Facebook URL']);
        $socialInstagram = InfoText::where('key', 'social_instagram')->firstOrCreate(['key' => 'social_instagram'], ['value' => '', 'deskripsi' => 'Instagram URL']);
        $socialTwitter = InfoText::where('key', 'social_twitter')->firstOrCreate(['key' => 'social_twitter'], ['value' => '', 'deskripsi' => 'Twitter URL']);
        $socialYoutube = InfoText::where('key', 'social_youtube')->firstOrCreate(['key' => 'social_youtube'], ['value' => '', 'deskripsi' => 'YouTube URL']);
        $socialTiktok = InfoText::where('key', 'social_tiktok')->firstOrCreate(['key' => 'social_tiktok'], ['value' => '', 'deskripsi' => 'TikTok URL']);

        // Sanitize values for View (hide unavailable route if present in DB)
        $sanitizeValue = function($model) use ($unavailableRoute) {
            if ($model && $model->value === $unavailableRoute) {
                $model->value = '';
            }
            return $model;
        };

        $socialFacebook = $sanitizeValue($socialFacebook);
        $socialInstagram = $sanitizeValue($socialInstagram);
        $socialTwitter = $sanitizeValue($socialTwitter);
        $socialYoutube = $sanitizeValue($socialYoutube);
        $socialTiktok = $sanitizeValue($socialTiktok);

        return view('admin.pages.settings.site-information.index', compact(
            'kontaks',
            'siteWhatsapp',
            'sitePhone',
            'siteEmail',
            'siteAddress',
            'siteFooterDescription',
            'siteCoordinates',
            'socialFacebook',
            'socialInstagram',
            'socialTwitter',
            'socialYoutube',
            'socialTiktok'
        ));
    }

    public function update(Request $request)
    {
        // Update Kontak (Legacy support if needed, but primarily focusing on new inputs)
        if ($request->has('kontak')) {
            foreach ($request->input('kontak', []) as $kontakData) {
                if (isset($kontakData['id']) && $kontakData['id']) {
                    $kontak = Contact::find($kontakData['id']);
                    if ($kontak) {
                        $kontak->update([
                            'jenis' => $kontakData['jenis'] ?? $kontak->jenis,
                            'label' => $kontakData['label'] ?? $kontak->label,
                            'nilai' => $kontakData['nilai'] ?? $kontak->nilai,
                            'icon' => $kontakData['icon'] ?? $kontak->icon,
                            'urutan' => $kontakData['urutan'] ?? $kontak->urutan,
                            'is_active' => isset($kontakData['is_active']),
                        ]);
                    }
                }
            }
        }

        // Validate New Fields
        $validated = $request->validate([
            'site_whatsapp' => 'nullable|string|max:50',
            'site_phone' => 'nullable|string|max:50',
            'site_email' => 'nullable|email|max:255',
            'site_address' => 'nullable|string|max:500',
            'site_footer_description' => 'nullable|string|max:1000',
            'site_map_coordinates' => 'nullable|string|max:100',

            'social_facebook' => 'nullable|string|max:255', // Changed to string to allow '#' or empty
            'social_instagram' => 'nullable|string|max:255',
            'social_twitter' => 'nullable|string|max:255',
            'social_youtube' => 'nullable|string|max:255',
            'social_tiktok' => 'nullable|string|max:255',
        ]);

        // List of keys to update
        $keysToUpdate = [
            'site_whatsapp',
            'site_phone',
            'site_email',
            'site_address',
            'site_footer_description',
            'site_map_coordinates',
            'social_facebook',
            'social_instagram',
            'social_twitter',
            'social_youtube',
            'social_tiktok',
        ];

        foreach ($keysToUpdate as $key) {
            if ($request->has($key)) {
                InfoText::updateOrCreate(
                    ['key' => $key],
                    ['value' => $request->input($key) ?? '', 'deskripsi' => ucfirst(str_replace('_', ' ', $key))]
                );
            }
        }

        // Sync legacy keys for backward compatibility (Optional, but good for safety)
        if ($request->has('site_whatsapp')) {
            InfoText::updateOrCreate(['key' => 'footer_whatsapp'], ['value' => $request->input('site_whatsapp')]);
        }
        if ($request->has('site_email')) {
            InfoText::updateOrCreate(['key' => 'footer_email'], ['value' => $request->input('site_email')]);
            InfoText::updateOrCreate(['key' => 'top_bar_email'], ['value' => $request->input('site_email')]);
        }
        if ($request->has('site_address')) {
            InfoText::updateOrCreate(['key' => 'footer_alamat'], ['value' => $request->input('site_address')]);
        }
        if ($request->has('site_phone')) {
            InfoText::updateOrCreate(['key' => 'top_bar_phone'], ['value' => $request->input('site_phone')]);
        }

        if ($request->has('social_facebook')) {
            InfoText::updateOrCreate(['key' => 'footer_facebook_url'], ['value' => $request->input('social_facebook')]);
            InfoText::updateOrCreate(['key' => 'top_bar_facebook_url'], ['value' => $request->input('social_facebook')]);
        }
        if ($request->has('social_instagram')) {
            InfoText::updateOrCreate(['key' => 'footer_instagram_url'], ['value' => $request->input('social_instagram')]);
            InfoText::updateOrCreate(['key' => 'top_bar_instagram_url'], ['value' => $request->input('social_instagram')]);
        }
        if ($request->has('social_twitter')) {
            InfoText::updateOrCreate(['key' => 'footer_twitter_url'], ['value' => $request->input('social_twitter')]);
            InfoText::updateOrCreate(['key' => 'top_bar_twitter_url'], ['value' => $request->input('social_twitter')]);
        }
        if ($request->has('social_youtube')) {
            InfoText::updateOrCreate(['key' => 'footer_youtube_url'], ['value' => $request->input('social_youtube')]);
            InfoText::updateOrCreate(['key' => 'top_bar_youtube_url'], ['value' => $request->input('social_youtube')]);
        }
        if ($request->has('social_tiktok')) {
            InfoText::updateOrCreate(['key' => 'footer_tiktok_url'], ['value' => $request->input('social_tiktok')]);
            InfoText::updateOrCreate(['key' => 'top_bar_tiktok_url'], ['value' => $request->input('social_tiktok')]);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Informasi situs berhasil diperbarui.',
            ]);
        }

        return redirect()->route('cpanel.site-information.index')
            ->with('success', 'Informasi situs berhasil diperbarui.');
    }

    public function storeKontak(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'jenis' => 'required|string|max:50',
            'label' => 'required|string|max:255',
            'nilai' => 'required|string|max:255',
            'icon' => 'nullable|string|max:100',
            'urutan' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['urutan'] = $validated['urutan'] ?? 0;

        Contact::create($validated);

        return redirect()->route('cpanel.site-information.index')
            ->with('success', 'Kontak berhasil ditambahkan.');
    }

    public function destroyKontak(Contact $kontak): RedirectResponse
    {
        $kontak->delete();

        return redirect()->route('cpanel.site-information.index')
            ->with('success', 'Kontak berhasil dihapus.');
    }
}
