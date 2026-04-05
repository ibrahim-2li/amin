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
            'hero_subtitle' => 'nullable|string',
            'hero_image' => 'nullable|string|max:2048',
            'home_title' => 'nullable|string|max:255',
            'home_text' => 'nullable|string',
            'home_image' => 'nullable|string|max:2048',
            'purpose_title' => 'nullable|string|max:255',
            'purpose_description' => 'nullable|string',
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
            'backing' => 'nullable|string',
            'values' => 'nullable|array',
        ]);

        $about->fill($validated);
        $about->save();

        return redirect()->back()->with('success', 'About page updated successfully.');
    }
}
