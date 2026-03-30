<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Inertia\Inertia;
use Inertia\Response;

class DivisionController extends Controller
{
    public function index(): Response
    {
        $divisions = Division::active()->ordered()->with('services')->get();

        return Inertia::render('Divisions/Index', [
            'divisions' => $divisions,
        ]);
    }

    public function show(Division $division): Response
    {
        $division->load('services');
        $otherDivisions = Division::active()->ordered()->where('id', '!=', $division->id)->get();

        return Inertia::render('Divisions/Show', [
            'division' => $division,
            'otherDivisions' => $otherDivisions,
        ]);
    }
}
