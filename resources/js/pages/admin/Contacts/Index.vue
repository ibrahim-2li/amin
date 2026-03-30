<script setup lang="ts">
import { Head, Link, router, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

defineOptions({
    layout: {
        breadcrumbs: [
            { title: 'Dashboard', href: '/dashboard' },
            { title: 'Contacts', href: '/admin/contacts' },
        ],
    },
})

defineProps<{
    contacts: {
        data: Array<{
            id: number
            name: string
            email: string
            company: string | null
            subject: string
            message: string
            status: string
            read_at: string | null
            created_at: string
        }>
        current_page: number
        last_page: number
        total: number
        per_page: number
        from: number
        to: number
        links: Array<{ url: string | null; label: string; active: boolean }>
    }
    unreadCount: number
}>()

function deleteContact(id: number) {
    if (!confirm('Delete this message?')) { return }
    router.delete(`/admin/contacts/${id}`, { preserveScroll: true })
}

const page = usePage()
const flash = computed(() => (page.props.flash as { success?: string }) ?? {})

function formatDate(date: string) {
    return new Intl.DateTimeFormat('en-GB', {
        day: 'numeric', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit',
    }).format(new Date(date))
}
</script>

<template>
    <Head title="Contact Messages" />

    <div class="p-6 space-y-6">
        <!-- Flash -->
        <Transition enter-active-class="transition duration-300" enter-from-class="opacity-0 -translate-y-1" enter-to-class="opacity-100 translate-y-0">
            <div v-if="flash.success" class="p-4 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm dark:bg-emerald-900/20 dark:border-emerald-800 dark:text-emerald-400">
                {{ flash.success }}
            </div>
        </Transition>

        <!-- Header -->
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div>
                    <h1 class="text-2xl font-bold text-foreground">Contact Messages</h1>
                    <p class="text-sm text-muted-foreground mt-1">{{ contacts.total }} total · {{ unreadCount }} unread</p>
                </div>
                <span
                    v-if="unreadCount > 0"
                    class="inline-flex items-center justify-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-destructive text-destructive-foreground"
                >
                    {{ unreadCount }} new
                </span>
            </div>
        </div>

        <!-- Table -->
        <div class="rounded-xl border border-border bg-card overflow-hidden">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-border bg-muted/40">
                        <th class="px-4 py-3 text-left font-semibold text-muted-foreground w-4" />
                        <th class="px-4 py-3 text-left font-semibold text-muted-foreground">Sender</th>
                        <th class="px-4 py-3 text-left font-semibold text-muted-foreground hidden md:table-cell">Subject</th>
                        <th class="px-4 py-3 text-left font-semibold text-muted-foreground hidden lg:table-cell">Date</th>
                        <th class="px-4 py-3 text-right font-semibold text-muted-foreground">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    <tr
                        v-for="contact in contacts.data"
                        :key="contact.id"
                        class="hover:bg-muted/20 transition-colors"
                        :class="!contact.read_at ? 'bg-primary/[0.03]' : ''"
                    >
                        <!-- Unread dot -->
                        <td class="pl-4 py-3">
                            <div
                                class="w-2 h-2 rounded-full"
                                :class="!contact.read_at ? 'bg-primary' : 'bg-transparent'"
                            />
                        </td>
                        <td class="px-4 py-3">
                            <div class="font-semibold text-foreground" :class="!contact.read_at ? '' : 'font-normal'">
                                {{ contact.name }}
                            </div>
                            <div class="text-xs text-muted-foreground">{{ contact.email }}</div>
                            <div v-if="contact.company" class="text-xs text-muted-foreground italic">{{ contact.company }}</div>
                        </td>
                        <td class="px-4 py-3 hidden md:table-cell text-foreground max-w-xs truncate">
                            {{ contact.subject }}
                        </td>
                        <td class="px-4 py-3 hidden lg:table-cell text-muted-foreground text-xs whitespace-nowrap">
                            {{ formatDate(contact.created_at) }}
                        </td>
                        <td class="px-4 py-3 text-right">
                            <div class="flex items-center justify-end gap-1">
                                <Link
                                    :href="`/admin/contacts/${contact.id}`"
                                    class="p-1.5 rounded-lg hover:bg-accent transition-colors text-muted-foreground hover:text-foreground"
                                    title="View message"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </Link>
                                <button
                                    @click="deleteContact(contact.id)"
                                    class="p-1.5 rounded-lg hover:bg-destructive/10 transition-colors text-muted-foreground hover:text-destructive"
                                    title="Delete"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr v-if="contacts.data.length === 0">
                        <td colspan="5" class="px-4 py-16 text-center">
                            <div class="flex flex-col items-center gap-2 text-muted-foreground">
                                <svg class="w-8 h-8 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span class="text-sm">No messages yet.</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Pagination -->
            <div v-if="contacts.last_page > 1" class="px-4 py-3 border-t border-border flex items-center justify-between">
                <p class="text-xs text-muted-foreground">
                    Showing {{ contacts.from }}–{{ contacts.to }} of {{ contacts.total }}
                </p>
                <div class="flex gap-1">
                    <Link
                        v-for="link in contacts.links"
                        :key="link.label"
                        :href="link.url ?? '#'"
                        class="inline-flex items-center justify-center px-3 py-1.5 text-xs rounded-lg border transition-colors"
                        :class="link.active
                            ? 'bg-primary text-primary-foreground border-primary'
                            : link.url
                                ? 'border-border hover:bg-accent'
                                : 'border-border text-muted-foreground cursor-not-allowed opacity-50'"
                        v-html="link.label"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
