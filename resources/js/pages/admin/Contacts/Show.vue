<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3'

defineOptions({
    layout: {
        breadcrumbs: [
            { title: 'Dashboard', href: '/dashboard' },
            { title: 'Contacts', href: '/admin/contacts' },
            { title: 'Message', href: '#' },
        ],
    },
})

const props = defineProps<{
    contact: {
        id: number
        name: string
        email: string
        company: string | null
        subject: string
        message: string
        status: string
        read_at: string | null
        created_at: string
    }
}>()

function deleteContact() {
    if (!confirm('Delete this message permanently?')) { return }
    router.delete(`/admin/contacts/${props.contact.id}`)
}

function formatDate(date: string) {
    return new Intl.DateTimeFormat('en-GB', {
        weekday: 'long', day: 'numeric', month: 'long', year: 'numeric',
        hour: '2-digit', minute: '2-digit',
    }).format(new Date(date))
}
</script>

<template>
    <Head :title="`Message — ${contact.name}`" />

    <div class="p-6 max-w-2xl space-y-6">
        <!-- Back -->
        <div class="flex items-center justify-between">
            <Link href="/admin/contacts" class="inline-flex items-center gap-2 text-sm text-muted-foreground hover:text-foreground transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                All messages
            </Link>
            <button @click="deleteContact" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-destructive/30 text-destructive text-xs font-semibold hover:bg-destructive/10 transition-colors">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                Delete
            </button>
        </div>

        <!-- Message card -->
        <div class="rounded-xl border border-border bg-card overflow-hidden">
            <!-- Header -->
            <div class="px-6 py-5 border-b border-border">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h1 class="text-xl font-bold text-foreground">{{ contact.subject }}</h1>
                        <p class="text-sm text-muted-foreground mt-1">{{ formatDate(contact.created_at) }}</p>
                    </div>
                    <span
                        class="shrink-0 inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold"
                        :class="contact.read_at
                            ? 'bg-muted text-muted-foreground'
                            : 'bg-primary/10 text-primary'"
                    >
                        <span class="w-1.5 h-1.5 rounded-full" :class="contact.read_at ? 'bg-muted-foreground' : 'bg-primary'" />
                        {{ contact.read_at ? 'Read' : 'New' }}
                    </span>
                </div>
            </div>

            <!-- Sender info -->
            <div class="px-6 py-4 border-b border-border bg-muted/20 grid sm:grid-cols-3 gap-4 text-sm">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-muted-foreground mb-1">From</p>
                    <p class="font-semibold text-foreground">{{ contact.name }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-muted-foreground mb-1">Email</p>
                    <a :href="`mailto:${contact.email}`" class="text-primary hover:underline">{{ contact.email }}</a>
                </div>
                <div v-if="contact.company">
                    <p class="text-xs font-semibold uppercase tracking-wide text-muted-foreground mb-1">Company</p>
                    <p class="text-foreground">{{ contact.company }}</p>
                </div>
            </div>

            <!-- Message body -->
            <div class="px-6 py-6">
                <p class="text-xs font-semibold uppercase tracking-wide text-muted-foreground mb-4">Message</p>
                <div class="text-sm text-foreground leading-relaxed whitespace-pre-wrap">{{ contact.message }}</div>
            </div>

            <!-- Reply action -->
            <div class="px-6 py-4 border-t border-border bg-muted/10 flex items-center gap-3">
                <a
                    :href="`mailto:${contact.email}?subject=Re: ${encodeURIComponent(contact.subject)}`"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-primary-foreground text-sm font-semibold hover:bg-primary/90 transition-colors"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                    </svg>
                    Reply via Email
                </a>
                <Link href="/admin/contacts" class="px-4 py-2 rounded-lg border border-border text-sm font-semibold hover:bg-accent transition-colors">
                    Back to Inbox
                </Link>
            </div>
        </div>
    </div>
</template>
