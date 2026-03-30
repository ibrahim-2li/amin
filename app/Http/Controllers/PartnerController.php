<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Inertia\Inertia;
use Inertia\Response;

class PartnerController extends Controller
{
    public function __invoke(): Response
    {
        $partners = Partner::active()->ordered()->get()->groupBy('category');

        return Inertia::render('Partners', [
            'partnersByCategory' => $partners,
        ]);
    }
}
