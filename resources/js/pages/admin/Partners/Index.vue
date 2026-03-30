<script setup lang="ts">
import { Head, Link, router, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

defineOptions({
    layout: {
        breadcrumbs: [
            { title: 'Dashboard', href: '/dashboard' },
            { title: 'Partners', href: '/admin/partners' },
        ],
    },
})

defineProps<{
    partners: Array<{
        id: number
        name: string
        logo: string | null
        website: string
        category: string
        order: number
        is_active: boolean
    }>
}>()

function deletePartner(id: number, name: string) {
    if (!confirm(`Delete "${name}"?`)) { return }
    router.delete(`/admin/partners/${id}`, { preserveScroll: true })
}

const page = usePage()
const flash = computed(() => (page.props.flash as { success?: string }) ?? {})

const categoryLabels: Record<string, string> = {
    technology: 'Technology',
    government: 'Government',
    finance: 'Finance',
    general: 'General',
}
</script>

<template>
    <Head title="Manage Partners" />

    <div class="p-6 space-y-6">
        <!-- Flash -->
        <Transition enter-active-class="transition duration-300" enter-from-class="opacity-0 -translate-y-1" enter-to-class="opacity-100 translate-y-0">
            <div v-if="flash.success" class="p-4 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm dark:bg-emerald-900/20 dark:border-emerald-800 dark:text-emerald-400">
                {{ flash.success }}
            </div>
        </Transition>

        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-foreground">Partners</h1>
                <p class="text-sm text-muted-foreground mt-1">Manage partner organisations displayed on the website.</p>
            </div>
            <Link href="/admin/partners/create" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-primary-foreground text-sm font-semibold hover:bg-primary/90 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Partner
            </Link>
        </div>

        <!-- Table -->
        <div class="rounded-xl border border-border bg-card overflow-hidden">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-border bg-muted/40">
                        <th class="px-4 py-3 text-left font-semibold text-muted-foreground">Partner</th>
                        <th class="px-4 py-3 text-left font-semibold text-muted-foreground hidden sm:table-cell">Category</th>
                        <th class="px-4 py-3 text-left font-semibold text-muted-foreground hidden md:table-cell">Website</th>
                        <th class="px-4 py-3 text-center font-semibold text-muted-foreground">Order</th>
                        <th class="px-4 py-3 text-center font-semibold text-muted-foreground">Status</th>
                        <th class="px-4 py-3 text-right font-semibold text-muted-foreground">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    <tr v-for="partner in partners" :key="partner.id" class="hover:bg-muted/20 transition-colors">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <!-- Logo preview or initials -->
                                <div v-if="partner.logo" class="w-8 h-8 rounded border border-border overflow-hidden bg-muted flex-none">
                                    <img :src="partner.logo" :alt="partner.name" class="w-full h-full object-contain p-0.5" />
                                </div>
                                <div v-else class="w-8 h-8 rounded border border-border bg-muted flex items-center justify-center flex-none">
                                    <span class="text-xs font-bold text-muted-foreground">{{ partner.name.charAt(0) }}</span>
                                </div>
                                <span class="font-semibold text-foreground">{{ partner.name }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-3 hidden sm:table-cell">
                            <span class="px-2 py-0.5 rounded-full text-xs font-semibold bg-muted text-muted-foreground">
                                {{ categoryLabels[partner.category] ?? partner.category }}
                            </span>
                        </td>
                        <td class="px-4 py-3 hidden md:table-cell text-muted-foreground text-xs font-mono truncate max-w-[160px]">
                            {{ partner.website || '—' }}
                        </td>
                        <td class="px-4 py-3 text-center text-muted-foreground text-sm">{{ partner.order }}</td>
                        <td class="px-4 py-3 text-center">
                            <span
                                class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-semibold"
                                :class="partner.is_active
                                    ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400'
                                    : 'bg-muted text-muted-foreground'"
                            >
                                <span class="w-1.5 h-1.5 rounded-full" :class="partner.is_active ? 'bg-emerald-500' : 'bg-muted-foreground'" />
                                {{ partner.is_active ? 'Active' : 'Hidden' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-right">
                            <div class="flex items-center justify-end gap-1">
                                <Link :href="`/admin/partners/${partner.id}/edit`" class="p-1.5 rounded-lg hover:bg-accent transition-colors text-muted-foreground hover:text-foreground">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </Link>
                                <button @click="deletePartner(partner.id, partner.name)" class="p-1.5 rounded-lg hover:bg-destructive/10 transition-colors text-muted-foreground hover:text-destructive">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr v-if="partners.length === 0">
                        <td colspan="6" class="px-4 py-12 text-center text-sm text-muted-foreground">No partners yet.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
