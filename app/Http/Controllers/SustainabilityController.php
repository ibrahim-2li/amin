<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class SustainabilityController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('Sustainability');
    }
}
