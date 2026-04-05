<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Partner;
use App\Models\Setting;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function __invoke(): Response
    {
        $divisions = Division::active()->ordered()->with('services')->get();
        $partners = Partner::active()->ordered()->get();

        return Inertia::render('Home', [
            'about' => \App\Models\About::first(),
            'divisions' => $divisions,
            'partners' => $partners,
            'stats' => [
                'founded' => Setting::get('founded_year', 'null'),
                'countries' => Setting::get('countries_served', 'null'),
                'employees' => Setting::get('employees_count', 'null'),
                'projects' => Setting::get('projects_completed', 'null'),
            ],
        ]);
    }
}
