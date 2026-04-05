<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ServiceController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('admin/Services/Index', [
            'services' => Service::with('division:id,name')->orderBy('division_id')->orderBy('order')->get()->map(function ($service) {
                return [
                    'id' => $service->id,
                    'division_id' => $service->division_id,
                    'division_name' => $service->division->name ?? '',
                    'title' => $service->title,
                    'description' => $service->description,
                    'order' => $service->order,
                    'is_active' => $service->is_active,
                ];
            }),
            'divisions' => Division::select('id', 'name')->orderBy('order')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'division_id' => ['required', 'exists:divisions,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'order' => ['required', 'integer', 'min:0'],
        ]);

        Service::create($validated + ['is_active' => true]);

        return back()->with('success', 'Service added successfully.');
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
        $validated = $request->validate([
            'division_id' => ['required', 'exists:divisions,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'order' => ['required', 'integer', 'min:0'],
            'is_active' => ['boolean'],
        ]);

        $service->update($validated);

        return back()->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return back()->with('success', 'Service deleted.');
    }
}
