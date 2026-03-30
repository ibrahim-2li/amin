<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Inertia\Inertia;
use Inertia\Response;

class AboutController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('About', [
            'stats' => [
                'founded' => Setting::get('founded_year', '1985'),
                'countries' => Setting::get('countries_served', '30+'),
                'employees' => Setting::get('employees_count', '2,500+'),
                'projects' => Setting::get('projects_completed', '500+'),
            ],
        ]);
    }
}
