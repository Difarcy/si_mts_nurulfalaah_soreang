<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\InboxMessage;
use App\Models\InfoText;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $kontaks = Contact::active()->ordered()->get();

        // Fetch Site Information
        $siteWhatsapp = InfoText::where('key', 'site_whatsapp')->value('value');
        $sitePhone = InfoText::where('key', 'site_phone')->value('value');
        $siteEmail = InfoText::where('key', 'site_email')->value('value');
        $siteAddress = InfoText::where('key', 'site_address')->value('value');
        $siteCoordinates = InfoText::where('key', 'site_map_coordinates')->value('value');

        // Social Media
        $unavailableRoute = route('social-media-unavailable');

        $socialFacebook = InfoText::where('key', 'social_facebook')->value('value');
        $socialFacebook = ($socialFacebook && $socialFacebook !== '#') ? $socialFacebook : $unavailableRoute;

        $socialInstagram = InfoText::where('key', 'social_instagram')->value('value');
        $socialInstagram = ($socialInstagram && $socialInstagram !== '#') ? $socialInstagram : $unavailableRoute;

        $socialTwitter = InfoText::where('key', 'social_twitter')->value('value');
        $socialTwitter = ($socialTwitter && $socialTwitter !== '#') ? $socialTwitter : $unavailableRoute;

        $socialYoutube = InfoText::where('key', 'social_youtube')->value('value');
        $socialYoutube = ($socialYoutube && $socialYoutube !== '#') ? $socialYoutube : $unavailableRoute;

        $socialTiktok = InfoText::where('key', 'social_tiktok')->value('value');
        $socialTiktok = ($socialTiktok && $socialTiktok !== '#') ? $socialTiktok : $unavailableRoute;

        return view('web.pages.contact.index', compact(
            'kontaks',
            'siteWhatsapp',
            'sitePhone',
            'siteEmail',
            'siteAddress',
            'siteCoordinates',
            'socialFacebook',
            'socialInstagram',
            'socialTwitter',
            'socialYoutube',
            'socialTiktok'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        InboxMessage::create($validated);

        return redirect()->route('contact')->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}
