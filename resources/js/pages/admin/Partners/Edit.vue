<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps<{
    partner: {
        id: number
        name: string
        logo: string | null
        website: string | null
        category: string
        order: number
        is_active: boolean
    } | null
}>()

const isEdit = computed(() => props.partner !== null)

defineOptions({
    layout: {
        breadcrumbs: [
            { title: 'Dashboard', href: '/dashboard' },
            { title: 'Partners', href: '/admin/partners' },
            { title: 'Edit', href: '#' },
        ],
    },
})

const form = useForm({
    name: props.partner?.name ?? '',
    logo: props.partner?.logo ?? '',
    website: props.partner?.website ?? '',
    category: props.partner?.category ?? 'general',
    order: props.partner?.order ?? 1,
    is_active: props.partner?.is_active ?? true,
})

function save() {
    if (isEdit.value) {
        form.put(`/admin/partners/${props.partner!.id}`)
    } else {
        form.post('/admin/partners')
    }
}
</script>

<template>
    <Head :title="isEdit ? `Edit — ${partner?.name}` : 'Add Partner'" />

    <div class="p-6 max-w-xl space-y-6">
        <!-- Header -->
        <div class="flex items-center gap-4">
            <Link href="/admin/partners" class="p-2 rounded-lg border border-border hover:bg-accent transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </Link>
            <h1 class="text-2xl font-bold text-foreground">{{ isEdit ? `Edit — ${partner?.name}` : 'Add Partner' }}</h1>
        </div>

        <!-- Form -->
        <div class="rounded-xl border border-border bg-card overflow-hidden">
            <div class="px-6 py-4 border-b border-border bg-muted/30">
                <h2 class="font-semibold text-foreground">Partner Details</h2>
            </div>
            <form @submit.prevent="save" class="p-6 space-y-5">
                <div>
                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Name *</label>
                    <input v-model="form.name" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" placeholder="Company name" />
                    <p v-if="form.errors.name" class="mt-1 text-xs text-destructive">{{ form.errors.name }}</p>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Logo URL</label>
                    <input v-model="form.logo" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm font-mono focus:outline-none focus:ring-2 focus:ring-ring" placeholder="https://…" />
                    <p class="mt-1 text-xs text-muted-foreground">Paste the URL of a logo image (PNG/SVG with transparent background preferred).</p>
                    <div v-if="form.logo" class="mt-2 inline-flex items-center justify-center h-12 w-24 rounded-lg border border-border bg-muted p-1">
                        <img :src="form.logo" alt="Logo preview" class="max-h-full max-w-full object-contain" @error="(e) => (e.target as HTMLImageElement).style.display = 'none'" />
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Website URL</label>
                    <input v-model="form.website" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm font-mono focus:outline-none focus:ring-2 focus:ring-ring" placeholder="https://partner.com" />
                    <p v-if="form.errors.website" class="mt-1 text-xs text-destructive">{{ form.errors.website }}</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Category *</label>
                        <select v-model="form.category" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring">
                            <option value="technology">Technology</option>
                            <option value="government">Government</option>
                            <option value="finance">Finance</option>
                            <option value="general">General</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Display Order</label>
                        <input v-model.number="form.order" type="number" min="0" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                    </div>
                </div>

                <div>
                    <label class="flex items-center gap-2 cursor-pointer text-sm">
                        <input v-model="form.is_active" type="checkbox" class="w-4 h-4 rounded border-input accent-primary" />
                        Show on website
                    </label>
                </div>

                <div class="flex items-center gap-3 pt-2">
                    <button type="submit" :disabled="form.processing" class="px-5 py-2 rounded-lg bg-primary text-primary-foreground text-sm font-semibold hover:bg-primary/90 transition-colors disabled:opacity-60">
                        {{ form.processing ? 'Saving…' : (isEdit ? 'Update Partner' : 'Add Partner') }}
                    </button>
                    <Link href="/admin/partners" class="px-4 py-2 rounded-lg border border-border text-sm font-semibold hover:bg-accent transition-colors">
                        Cancel
                    </Link>
                </div>
            </form>
        </div>
    </div>
</template>
