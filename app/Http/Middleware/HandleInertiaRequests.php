<?php

namespace App\Http\Middleware;

use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'name' => \App\Models\Setting::get('company_name', config('app.name')),
            'settings' => [
                'address' => \App\Models\Setting::get('contact_address', 'Plot 220, Old Shahama, Abu Dhabi UAE'),
                'email' => \App\Models\Setting::get('contact_email', 'info@e7group.ae'),
                'phone' => \App\Models\Setting::get('contact_phone', '+971 600500877'),
                'linkedin' => \App\Models\Setting::get('linkedin', ''),
                'instagram' => \App\Models\Setting::get('instagram', ''),
                'twitter' => \App\Models\Setting::get('twitter', ''),
            ],
            'navDivisions' => \App\Models\Division::active()->ordered()->select(['id', 'name', 'slug'])->get(),
            'auth' => [
                'user' => $request->user(),
            ],
            'sidebarOpen' => !$request->hasCookie('sidebar_state') || $request->cookie('sidebar_state') === 'true',
            'flash' => [
                'success' => $request->session()->get('success'),
                'error' => $request->session()->get('error'),
            ],
            'unreadContactCount' => $request->user()
                ? fn() => Contact::unread()->count()
                : 0,
            'locale' => app()->getLocale(),
            'translations' => function () {
                $locale = app()->getLocale();
                $path = base_path("lang/{$locale}.json");
                if (file_exists($path)) {
                    return json_decode(file_get_contents($path), true);
                }
                return [];
            },
        ];
    }
}
