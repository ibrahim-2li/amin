<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AboutController extends Controller
{
    public function edit()
    {
        return Inertia::render('admin/About/Edit', [
            'about' => About::first() ?? new About(),
        ]);
    }

    public function update(Request $request)
    {
        $about = About::first() ?? new About();

        $validated = $request->validate([
            'hero_title' => 'nullable|string|max:255',
            'hero_title_ar' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string',
            'hero_subtitle_ar' => 'nullable|string',
            'hero_image' => 'nullable|string|max:2048',
            'home_title' => 'nullable|string|max:255',
            'home_title_ar' => 'nullable|string|max:255',
            'home_text' => 'nullable|string',
            'home_text_ar' => 'nullable|string',
            'home_image' => 'nullable|string|max:2048',
            'home_delivery_label' => 'nullable|string|max:255',
            'home_delivery_label_ar' => 'nullable|string|max:255',
            'home_delivery_text' => 'nullable|string',
            'home_delivery_text_ar' => 'nullable|string',
            'home_features' => 'nullable|array',
            'home_features_ar' => 'nullable|array',
            'home_features.*.title' => 'nullable|string|max:255',
            'home_features.*.description' => 'nullable|string',
            'home_features.*.icon' => 'nullable|string|max:2048',
            'home_features_ar.*.title' => 'nullable|string|max:255',
            'home_features_ar.*.description' => 'nullable|string',
            'home_features_ar.*.icon' => 'nullable|string|max:2048',
            'purpose_title' => 'nullable|string|max:255',
            'purpose_title_ar' => 'nullable|string|max:255',
            'purpose_description' => 'nullable|string',
            'purpose_description_ar' => 'nullable|string',
            'mission' => 'nullable|string',
            'mission_ar' => 'nullable|string',
            'vision' => 'nullable|string',
            'vision_ar' => 'nullable|string',
            'backing' => 'nullable|string',
            'backing_ar' => 'nullable|string',
            'values' => 'nullable|array',
            'values_ar' => 'nullable|array',
        ]);


        $about->fill($validated);
        $about->save();

        return redirect()->back()->with('success', 'About page updated successfully.');
    }
}
