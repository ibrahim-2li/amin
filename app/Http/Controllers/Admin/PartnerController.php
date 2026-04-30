<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class PartnerController extends Controller
{
    public function index(): Response
    {
        $partners = Partner::ordered()->get();

        return Inertia::render('admin/Partners/Index', [
            'partners' => $partners,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('admin/Partners/Edit', [
            'partner' => null,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'logo' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'website' => ['nullable', 'url', 'max:500'],
            'category' => ['required', 'string', 'in:technology,government,finance,general'],
            'order' => ['required', 'integer', 'min:0'],
            'is_active' => ['boolean'],
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('partners', 'public');
        } else {
            unset($validated['logo']);
        }

        Partner::create($validated);

        return redirect()->route('admin.partners.index')->with('success', 'Partner created successfully.');
    }

    public function edit(Partner $partner): Response
    {
        return Inertia::render('admin/Partners/Edit', [
            'partner' => $partner,
        ]);
    }

    public function update(Request $request, Partner $partner): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'logo' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'website' => ['nullable', 'url', 'max:500'],
            'category' => ['required', 'string', 'in:technology,government,finance,general'],
            'order' => ['required', 'integer', 'min:0'],
            'is_active' => ['boolean'],
        ]);

        if ($request->hasFile('logo')) {
            $oldLogo = $partner->getRawOriginal('logo');

            $validated['logo'] = $request->file('logo')->store('partners', 'public');

            if ($oldLogo && ! str_starts_with($oldLogo, 'http://') && ! str_starts_with($oldLogo, 'https://') && ! str_starts_with($oldLogo, '/')) {
                Storage::disk('public')->delete($oldLogo);
            }
        } else {
            unset($validated['logo']);
        }

        $partner->update($validated);

        return redirect()->route('admin.partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy(Partner $partner): RedirectResponse
    {
        $logo = $partner->getRawOriginal('logo');

        $partner->delete();

        if ($logo && ! str_starts_with($logo, 'http://') && ! str_starts_with($logo, 'https://') && ! str_starts_with($logo, '/')) {
            Storage::disk('public')->delete($logo);
        }

        return redirect()->route('admin.partners.index')->with('success', 'Partner deleted.');
    }
}
