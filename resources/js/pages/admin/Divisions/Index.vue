<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3'

defineOptions({
    layout: {
        breadcrumbs: [
            { title: 'Dashboard', href: '/dashboard' },
            { title: 'Divisions', href: '/admin/divisions' },
        ],
    },
})

defineProps<{
    divisions: Array<{
        id: number
        name: string
        slug: string
        tagline: string
        color: string
        order: number
        is_active: boolean
        services_count: number
    }>
}>()
</script>

<template>
    <Head title="Manage Divisions" />

    <div class="p-6 space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-foreground">Divisions</h1>
                <p class="text-sm text-muted-foreground mt-1">Edit division content, descriptions, and services.</p>
            </div>
        </div>

        <!-- Divisions table -->
        <div class="rounded-xl border border-border bg-card overflow-hidden">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-border bg-muted/40">
                        <th class="px-4 py-3 text-left font-semibold text-muted-foreground w-8">#</th>
                        <th class="px-4 py-3 text-left font-semibold text-muted-foreground">Division</th>
                        <th class="px-4 py-3 text-left font-semibold text-muted-foreground hidden md:table-cell">Tagline</th>
                        <th class="px-4 py-3 text-center font-semibold text-muted-foreground hidden sm:table-cell">Services</th>
                        <th class="px-4 py-3 text-center font-semibold text-muted-foreground">Status</th>
                        <th class="px-4 py-3 text-right font-semibold text-muted-foreground">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    <tr v-for="division in divisions" :key="division.id" class="hover:bg-muted/20 transition-colors">
                        <td class="px-4 py-4">
                            <div class="w-3 h-3 rounded-full" :style="{ backgroundColor: division.color }" />
                        </td>
                        <td class="px-4 py-4">
                            <div class="font-semibold text-foreground">{{ division.name }}</div>
                            <div class="text-xs text-muted-foreground font-mono mt-0.5">{{ division.slug }}</div>
                        </td>
                        <td class="px-4 py-4 hidden md:table-cell text-muted-foreground max-w-xs truncate">
                            {{ division.tagline }}
                        </td>
                        <td class="px-4 py-4 text-center hidden sm:table-cell">
                            <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-muted text-xs font-semibold">
                                {{ division.services_count }}
                            </span>
                        </td>
                        <td class="px-4 py-4 text-center">
                            <span
                                class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-semibold"
                                :class="division.is_active
                                    ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400'
                                    : 'bg-muted text-muted-foreground'"
                            >
                                <span class="w-1.5 h-1.5 rounded-full" :class="division.is_active ? 'bg-emerald-500' : 'bg-muted-foreground'" />
                                {{ division.is_active ? 'Active' : 'Hidden' }}
                            </span>
                        </td>
                        <td class="px-4 py-4 text-right">
                            <Link
                                :href="`/admin/divisions/${division.id}/edit`"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-border text-xs font-semibold hover:bg-accent transition-colors"
                            >
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
