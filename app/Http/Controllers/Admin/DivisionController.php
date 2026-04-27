<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DivisionController extends Controller
{
    public function index(): Response
    {
        $divisions = Division::ordered()->with('services')->withCount('services')->get();

        return Inertia::render('admin/Divisions/Index', [
            'divisions' => $divisions,
        ]);
    }

    public function edit(Division $division): Response
    {
        $division->load('services');

        return Inertia::render('admin/Divisions/Edit', [
            'division' => $division,
        ]);
    }

    public function update(Request $request, Division $division): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'name_ar' => ['nullable', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:divisions,slug,'.$division->id],
            'tagline' => ['nullable', 'string', 'max:255'],
            'tagline_ar' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'description_ar' => ['nullable', 'string'],
            'long_description' => ['nullable', 'string'],
            'long_description_ar' => ['nullable', 'string'],
            'hero_image' => ['nullable', 'string', 'max:500'],
            'color' => ['required', 'string', 'max:20'],
            'order' => ['required', 'integer', 'min:0'],
            'is_active' => ['boolean'],
        ]);


        $division->update($validated);

        return back()->with('success', "Division \"{$division->name}\" updated successfully.");
    }
}
