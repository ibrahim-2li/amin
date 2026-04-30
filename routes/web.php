<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\QualityController;
use App\Http\Controllers\SustainabilityController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/locale/{language}', function ($language) {
    if (in_array($language, ['en', 'ar'])) {
        Session::put('locale', $language);
    }

    return back();
})->name('locale.switch');

// Route::get('/', fn () => 'HELLO');

// Corporate public routes
Route::get('/', HomeController::class)->name('home');
Route::get('/about', AboutController::class)->name('about');
Route::get('/capabilities', [DivisionController::class, 'index'])->name('divisions.index');
Route::get('/capabilities/{division:slug}', [DivisionController::class, 'show'])->name('divisions.show');
Route::get('/sustainability', SustainabilityController::class)->name('sustainability');
Route::get('/quality', QualityController::class)->name('quality');
Route::get('/partners', PartnerController::class)->name('partners');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');

    // Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::redirect('/', '/admin/divisions')->name('index');

        // Divisions
        Route::get('/divisions', [Admin\DivisionController::class, 'index'])->name('divisions.index');
        Route::get('/divisions/{division}/edit', [Admin\DivisionController::class, 'edit'])->name('divisions.edit');
        Route::put('/divisions/{division}', [Admin\DivisionController::class, 'update'])->name('divisions.update');

        // Services
        Route::get('/services', [Admin\ServiceController::class, 'index'])->name('services.index');
        Route::post('/services', [Admin\ServiceController::class, 'store'])->name('services.store');
        Route::put('/services/{service}', [Admin\ServiceController::class, 'update'])->name('services.update');
        Route::delete('/services/{service}', [Admin\ServiceController::class, 'destroy'])->name('services.destroy');

        // Partners
        Route::get('/partners', [Admin\PartnerController::class, 'index'])->name('partners.index');
        Route::get('/partners/create', [Admin\PartnerController::class, 'create'])->name('partners.create');
        Route::post('/partners', [Admin\PartnerController::class, 'store'])->name('partners.store');
        Route::get('/partners/{partner}/edit', [Admin\PartnerController::class, 'edit'])->name('partners.edit');
        Route::put('/partners/{partner}', [Admin\PartnerController::class, 'update'])->name('partners.update');
        Route::delete('/partners/{partner}', [Admin\PartnerController::class, 'destroy'])->name('partners.destroy');

        // Settings
        Route::get('/settings', [Admin\SettingController::class, 'index'])->name('settings.index');
        Route::put('/settings', [Admin\SettingController::class, 'update'])->name('settings.update');

        // About Page
        Route::get('/about', [Admin\AboutController::class, 'edit'])->name('about.edit');
        Route::put('/about', [Admin\AboutController::class, 'update'])->name('about.update');

        // Contacts
        Route::get('/contacts', [Admin\ContactController::class, 'index'])->name('contacts.index');
        Route::get('/contacts/{contact}', [Admin\ContactController::class, 'show'])->name('contacts.show');
        Route::delete('/contacts/{contact}', [Admin\ContactController::class, 'destroy'])->name('contacts.destroy');
    });
});

require __DIR__.'/settings.php';
