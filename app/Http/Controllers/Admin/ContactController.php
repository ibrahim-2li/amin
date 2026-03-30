<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ContactController extends Controller
{
    public function index(): Response
    {
        $contacts = Contact::latest()->paginate(20);
        $unreadCount = Contact::unread()->count();

        return Inertia::render('admin/Contacts/Index', [
            'contacts' => $contacts,
            'unreadCount' => $unreadCount,
        ]);
    }

    public function show(Contact $contact): Response
    {
        $contact->markAsRead();

        return Inertia::render('admin/Contacts/Show', [
            'contact' => $contact,
        ]);
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Message deleted.');
    }
}
