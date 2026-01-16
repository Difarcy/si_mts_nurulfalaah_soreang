<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpmbSetting;
use App\Models\StudentAchievement;
use App\Models\SpmbTimeline;
use App\Models\SpmbRequirement;
use App\Models\SpmbFaq;

class SpmbController extends Controller
{
    public function index()
    {
        $setting = SpmbSetting::first();
        $achievements = StudentAchievement::where('is_active', true)
            ->orderBy('urutan', 'asc')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $timelines = SpmbTimeline::orderBy('urutan', 'asc')->get();
        $requirements = SpmbRequirement::orderBy('urutan', 'asc')->get();
        $faqs = SpmbFaq::orderBy('urutan', 'asc')->get();

        return view('web.pages.spmb.index', compact('setting', 'achievements', 'timelines', 'requirements', 'faqs'));
    }
}
