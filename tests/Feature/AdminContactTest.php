<?php

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->admin = User::factory()->create();
    $this->actingAs($this->admin);
});

it('lists contacts with pagination and unread count', function () {
    Contact::factory()->count(3)->unread()->create();
    Contact::factory()->count(2)->create(['status' => 'read', 'read_at' => now()]);

    $response = $this->get('/admin/contacts');

    $response->assertOk()
        ->assertInertia(fn ($page) => $page
            ->component('admin/Contacts/Index')
            ->has('contacts.data', 5)
            ->where('unreadCount', 3)
        );
});

it('shows a contact and marks it as read', function () {
    $contact = Contact::factory()->unread()->create();

    $response = $this->get("/admin/contacts/{$contact->id}");

    $response->assertOk()
        ->assertInertia(fn ($page) => $page
            ->component('admin/Contacts/Show')
            ->where('contact.id', $contact->id)
        );

    expect($contact->fresh()->read_at)->not->toBeNull();
    expect($contact->fresh()->status)->toBe('read');
});

it('does not double-mark an already-read contact', function () {
    $readAt = now()->subHour();
    $contact = Contact::factory()->create(['status' => 'read', 'read_at' => $readAt]);

    $this->get("/admin/contacts/{$contact->id}");

    expect($contact->fresh()->read_at->toDateTimeString())
        ->toBe($readAt->toDateTimeString());
});

it('deletes a contact and redirects with flash', function () {
    $contact = Contact::factory()->create();

    $response = $this->delete("/admin/contacts/{$contact->id}");

    $response->assertRedirect('/admin/contacts');
    $this->assertModelMissing($contact);
    expect(session('success'))->toBe('Message deleted.');
});

it('redirects guests away from contacts index', function () {
    auth()->logout();

    $this->get('/admin/contacts')->assertRedirect('/login');
});

it('redirects guests away from contact show', function () {
    auth()->logout();
    $contact = Contact::factory()->create();

    $this->get("/admin/contacts/{$contact->id}")->assertRedirect('/login');
});

it('returns 404 for a missing contact', function () {
    $this->get('/admin/contacts/99999')->assertNotFound();
});

it('paginates contacts correctly', function () {
    Contact::factory()->count(25)->create();

    $response = $this->get('/admin/contacts?page=2');

    $response->assertOk()
        ->assertInertia(fn ($page) => $page
            ->where('contacts.current_page', 2)
            ->where('contacts.per_page', 20)
        );
});

it('passes unread count as shared prop to all admin pages', function () {
    Contact::factory()->count(4)->unread()->create();

    $this->get('/admin/contacts')
        ->assertInertia(fn ($page) => $page
            ->where('unreadCount', 4)
        );
});
