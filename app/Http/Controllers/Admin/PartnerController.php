<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
            'logo' => ['nullable', 'string', 'max:500'],
            'website' => ['nullable', 'url', 'max:500'],
            'category' => ['required', 'string', 'in:technology,government,finance,general'],
            'order' => ['required', 'integer', 'min:0'],
            'is_active' => ['boolean'],
        ]);

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
            'logo' => ['nullable', 'string', 'max:500'],
            'website' => ['nullable', 'url', 'max:500'],
            'category' => ['required', 'string', 'in:technology,government,finance,general'],
            'order' => ['required', 'integer', 'min:0'],
            'is_active' => ['boolean'],
        ]);

        $partner->update($validated);

        return redirect()->route('admin.partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy(Partner $partner): RedirectResponse
    {
        $partner->delete();

        return redirect()->route('admin.partners.index')->with('success', 'Partner deleted.');
    }
}
