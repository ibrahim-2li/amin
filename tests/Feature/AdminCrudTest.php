<?php

use App\Models\Division;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Setting;
use App\Models\User;
use Database\Seeders\CorporateSeeder;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

beforeEach(function () {
    $this->seed(CorporateSeeder::class);
    $this->user = User::factory()->create();
});

// ── Auth guard ────────────────────────────────────────────────────────────────

test('admin routes require authentication', function () {
    $this->get('/admin/divisions')->assertRedirect('/login');
    $this->get('/admin/partners')->assertRedirect('/login');
    $this->get('/admin/settings')->assertRedirect('/login');
});

// ── Division admin ────────────────────────────────────────────────────────────

test('admin divisions index loads for authenticated user', function () {
    $this->actingAs($this->user)
        ->get('/admin/divisions')
        ->assertOk()
        ->assertInertia(fn ($page) => $page
            ->component('admin/Divisions/Index')
            ->has('divisions', 5)
        );
});

test('admin division edit page loads', function () {
    $division = Division::first();

    $this->actingAs($this->user)
        ->get("/admin/divisions/{$division->id}/edit")
        ->assertOk()
        ->assertInertia(fn ($page) => $page
            ->component('admin/Divisions/Edit')
            ->where('division.id', $division->id)
            ->has('division.services')
        );
});

test('admin can update a division', function () {
    $division = Division::first();

    $this->actingAs($this->user)
        ->put("/admin/divisions/{$division->id}", [
            'name' => 'Updated Division Name',
            'slug' => $division->slug,
            'tagline' => 'New tagline here',
            'description' => 'Updated description text.',
            'long_description' => 'Extended description.',
            'hero_image' => 'https://images.unsplash.com/photo-123',
            'color' => '#ff0000',
            'order' => 1,
            'is_active' => true,
        ])
        ->assertRedirect();

    expect(Division::find($division->id)->name)->toBe('Updated Division Name');
    expect(Division::find($division->id)->color)->toBe('#ff0000');
});

test('admin division update validates required fields', function () {
    $division = Division::first();

    $this->actingAs($this->user)
        ->put("/admin/divisions/{$division->id}", [])
        ->assertSessionHasErrors(['name', 'slug', 'description', 'color', 'order']);
});

// ── Service admin ─────────────────────────────────────────────────────────────

test('admin can add a service to a division', function () {
    $division = Division::first();
    $countBefore = $division->services()->count();

    $this->actingAs($this->user)
        ->post("/admin/divisions/{$division->id}/services", [
            'title' => 'New Service Title',
            'description' => 'New service description text.',
            'order' => $countBefore + 1,
        ])
        ->assertRedirect();

    expect($division->services()->count())->toBe($countBefore + 1);
});

test('admin can update a service', function () {
    $service = Service::first();

    $this->actingAs($this->user)
        ->put("/admin/services/{$service->id}", [
            'title' => 'Updated Service',
            'description' => 'Updated description.',
            'order' => 1,
            'is_active' => true,
        ])
        ->assertRedirect();

    expect(Service::find($service->id)->title)->toBe('Updated Service');
});

test('admin can delete a service', function () {
    $service = Service::first();
    $id = $service->id;

    $this->actingAs($this->user)
        ->delete("/admin/services/{$id}")
        ->assertRedirect();

    expect(Service::find($id))->toBeNull();
});

// ── Partner admin ─────────────────────────────────────────────────────────────

test('admin partners index loads', function () {
    $this->actingAs($this->user)
        ->get('/admin/partners')
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('admin/Partners/Index')->has('partners'));
});

test('admin can create a partner', function () {
    $this->actingAs($this->user)
        ->post('/admin/partners', [
            'name' => 'New Partner Co.',
            'logo' => null,
            'website' => 'https://newpartner.com',
            'category' => 'technology',
            'order' => 99,
            'is_active' => true,
        ])
        ->assertRedirect('/admin/partners');

    expect(Partner::where('name', 'New Partner Co.')->exists())->toBeTrue();
});

test('admin can update a partner', function () {
    $partner = Partner::first();

    $this->actingAs($this->user)
        ->put("/admin/partners/{$partner->id}", [
            'name' => 'Renamed Partner',
            'logo' => null,
            'website' => 'https://renamed.com',
            'category' => 'government',
            'order' => 1,
            'is_active' => false,
        ])
        ->assertRedirect('/admin/partners');

    expect(Partner::find($partner->id)->name)->toBe('Renamed Partner');
    expect(Partner::find($partner->id)->is_active)->toBeFalse();
});

test('admin can delete a partner', function () {
    $partner = Partner::first();
    $id = $partner->id;

    $this->actingAs($this->user)
        ->delete("/admin/partners/{$id}")
        ->assertRedirect('/admin/partners');

    expect(Partner::find($id))->toBeNull();
});

// ── Settings admin ────────────────────────────────────────────────────────────

test('admin settings index loads', function () {
    $this->actingAs($this->user)
        ->get('/admin/settings')
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('admin/Settings/Index')->has('settings'));
});

test('admin can update settings', function () {
    $settings = Setting::all()->map(fn ($s) => ['key' => $s->key, 'value' => $s->value])->toArray();
    $settings[0]['value'] = 'Updated Company Name';

    $this->actingAs($this->user)
        ->put('/admin/settings', ['settings' => $settings])
        ->assertRedirect();

    expect(Setting::where('key', $settings[0]['key'])->value('value'))->toBe('Updated Company Name');
});
