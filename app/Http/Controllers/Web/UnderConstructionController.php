<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class UnderConstructionController extends Controller
{
    public function index()
    {
        return view('web.pages.errors.under-construction');
    }

    public function socialMediaUnavailable()
    {
        return view('web.pages.errors.social-media-unavailable');
    }
}
