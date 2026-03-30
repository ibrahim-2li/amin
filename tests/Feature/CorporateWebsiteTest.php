<?php

use App\Models\Division;
use App\Models\Partner;
use App\Models\Service;
use Database\Seeders\CorporateSeeder;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

beforeEach(function () {
    $this->seed(CorporateSeeder::class);
});

test('home page loads successfully', function () {
    $this->get('/')
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Home')
            ->has('divisions')
            ->has('partners')
            ->has('stats')
        );
});

test('about page loads successfully', function () {
    $this->get('/about')
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('About')
            ->has('stats')
        );
});

test('divisions index page loads successfully', function () {
    $this->get('/capabilities')
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Divisions/Index')
            ->has('divisions')
        );
});

test('division show page loads for valid slug', function () {
    $division = Division::first();

    $this->get("/capabilities/{$division->slug}")
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Divisions/Show')
            ->has('division')
            ->has('otherDivisions')
            ->where('division.slug', $division->slug)
        );
});

test('division show page returns 404 for invalid slug', function () {
    $this->get('/capabilities/nonexistent-division')->assertNotFound();
});

test('sustainability page loads successfully', function () {
    $this->get('/sustainability')
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Sustainability'));
});

test('quality page loads successfully', function () {
    $this->get('/quality')
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Quality'));
});

test('partners page loads successfully', function () {
    $this->get('/partners')
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Partners')
            ->has('partnersByCategory')
        );
});

test('contact page loads successfully', function () {
    $this->get('/contact')
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Contact'));
});

test('contact form submits with valid data', function () {
    $this->post('/contact', [
        'name' => 'John Smith',
        'email' => 'john@example.com',
        'company' => 'Acme Corp',
        'subject' => 'Business enquiry',
        'message' => 'I would like to learn more about your services and capabilities.',
    ])->assertRedirect();
});

test('contact form fails with missing required fields', function () {
    $this->post('/contact', [])->assertSessionHasErrors(['name', 'email', 'subject', 'message']);
});

test('contact form fails with short message', function () {
    $this->post('/contact', [
        'name' => 'John',
        'email' => 'john@example.com',
        'subject' => 'Test',
        'message' => 'Too short',
    ])->assertSessionHasErrors(['message']);
});

test('home page includes all five divisions', function () {
    $response = $this->get('/');
    $response->assertOk()
        ->assertInertia(fn ($page) => $page->has('divisions', 5));
});

test('division show page includes services', function () {
    $division = Division::with('services')->first();

    $this->get("/capabilities/{$division->slug}")
        ->assertOk()
        ->assertInertia(fn ($page) => $page
            ->has('division.services')
        );
});
