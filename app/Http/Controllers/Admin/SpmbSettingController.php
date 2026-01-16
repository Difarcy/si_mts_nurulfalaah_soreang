<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SpmbSetting;
use App\Models\SpmbTimeline;
use App\Models\SpmbRequirement;
use App\Models\SpmbFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class SpmbSettingController extends Controller
{
    public function index()
    {
        // Ensure settings record exists
        $setting = SpmbSetting::first();

        if (!$setting) {
            $setting = SpmbSetting::create([
                'registration_status' => 'closed',
                'academic_year' => '', // Default kosong sesuai permintaan user
                'contact_wa' => '',
                'description' => 'Informasi SPMB belum diatur.'
            ]);
        }

        $timelines = SpmbTimeline::orderBy('urutan')->get();
        $requirements = SpmbRequirement::orderBy('urutan')->get();
        $faqs = SpmbFaq::orderBy('urutan')->get();

        return view('admin.pages.settings.spmb.index', compact('setting', 'timelines', 'requirements', 'faqs'));
    }

    public function update(Request $request)
    {
        $setting = SpmbSetting::first();
        if (!$setting) {
            $setting = new SpmbSetting();
        }

        \Illuminate\Support\Facades\Log::info('SPMB Update Request:', $request->all());

        $validated = $request->validate([
            'registration_status' => 'required|in:open,soon,closed',
            'academic_year' => 'required|string|max:255',
            'hero_slogan' => 'nullable|string|max:500',
            'registration_start_date' => 'nullable|date',
            'registration_end_date' => 'nullable|date',
            'contact_wa' => 'required|string|max:20',
            'quota' => 'nullable|string|max:100',
            'registration_fee' => 'nullable|numeric|min:0',

            'brochure' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:5120', // Max 5MB
            'banner' => 'nullable|image|mimes:jpg,jpeg,png|max:5120', // Max 5MB
            'flow_image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120', // Max 5MB
            'show_brochure' => 'nullable|boolean',

            // Alur Pendaftaran Dates
            'step_1_start_date' => 'nullable|date',
            'step_1_end_date' => 'nullable|date',
            'step_2_start_date' => 'nullable|date',
            'step_2_end_date' => 'nullable|date',
            'step_3_start_date' => 'nullable|date',
            'step_3_end_date' => 'nullable|date',
            'step_4_start_date' => 'nullable|date',
            'step_4_end_date' => 'nullable|date',
            'step_5_start_date' => 'nullable|date',
            'step_5_end_date' => 'nullable|date',
        ]);

        DB::beginTransaction();
        try {
            // 1. Handle Settings
            // Handle Brochure
            if ($request->hasFile('brochure')) {
                if ($setting->brochure_path && Storage::disk('public')->exists($setting->brochure_path)) {
                    Storage::disk('public')->delete($setting->brochure_path);
                }
                $setting->brochure_path = $request->file('brochure')->store('spmb/brochures', 'public');
            } elseif ($request->input('remove_brochure') == '1') {
                if ($setting->brochure_path && Storage::disk('public')->exists($setting->brochure_path)) {
                    Storage::disk('public')->delete($setting->brochure_path);
                }
                $setting->brochure_path = null;
            }

            // Handle Banner
            if ($request->hasFile('banner')) {
                if ($setting->banner_path && Storage::disk('public')->exists($setting->banner_path)) {
                    Storage::disk('public')->delete($setting->banner_path);
                }
                $setting->banner_path = $request->file('banner')->store('spmb/banners', 'public');
            } elseif ($request->input('remove_banner') == '1') {
                if ($setting->banner_path && Storage::disk('public')->exists($setting->banner_path)) {
                    Storage::disk('public')->delete($setting->banner_path);
                }
                $setting->banner_path = null;
            }

            // Handle Flow Image
            if ($request->hasFile('flow_image')) {
                if ($setting->flow_image_path && Storage::disk('public')->exists($setting->flow_image_path)) {
                    Storage::disk('public')->delete($setting->flow_image_path);
                }
                $setting->flow_image_path = $request->file('flow_image')->store('spmb/flow', 'public');
            } elseif ($request->input('remove_flow_image') == '1') {
                if ($setting->flow_image_path && Storage::disk('public')->exists($setting->flow_image_path)) {
                    Storage::disk('public')->delete($setting->flow_image_path);
                }
                $setting->flow_image_path = null;
            }

            $setting->registration_status = $validated['registration_status'];
            $setting->academic_year = $validated['academic_year'];
            $setting->hero_slogan = $validated['hero_slogan'];
            $setting->registration_start_date = $validated['registration_start_date'];
            $setting->registration_end_date = $validated['registration_end_date'];
            $setting->contact_wa = $validated['contact_wa'];
            $setting->quota = $validated['quota'];
            $setting->registration_fee = $validated['registration_fee'];

            $setting->step_1_start_date = $validated['step_1_start_date'];
            $setting->step_1_end_date = $validated['step_1_end_date'];
            $setting->step_2_start_date = $validated['step_2_start_date'];
            $setting->step_2_end_date = $validated['step_2_end_date'];
            $setting->step_3_start_date = $validated['step_3_start_date'];
            $setting->step_3_end_date = $validated['step_3_end_date'];
            $setting->step_4_start_date = $validated['step_4_start_date'];
            $setting->step_4_end_date = $validated['step_4_end_date'];
            $setting->step_5_start_date = $validated['step_5_start_date'];
            $setting->step_5_end_date = $validated['step_5_end_date'];

            $setting->show_brochure = $request->has('show_brochure');
            $setting->save();

            DB::commit();
            return redirect()->route('cpanel.settings.spmb.index')->with('success', 'Pengaturan SPMB berhasil disimpan');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menyimpan pengaturan: ' . $e->getMessage())->withInput();
        }
    }
}
