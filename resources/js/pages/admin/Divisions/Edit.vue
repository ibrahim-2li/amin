<script setup lang="ts">
import { Head, Link, useForm, router } from '@inertiajs/vue3'
import { ref, computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const props = defineProps<{
    division: {
        id: number
        name: string
        name_ar: string | null
        slug: string
        tagline: string | null
        tagline_ar: string | null
        description: string
        description_ar: string | null
        long_description: string | null
        long_description_ar: string | null
        hero_image: string | null
        color: string
        order: number
        is_active: boolean
        services: Array<{
            id: number
            title: string
            description: string
            order: number
            is_active: boolean
        }>
    }
}>()

defineOptions({
    layout: {
        breadcrumbs: [
            { title: 'Dashboard', href: '/dashboard' },
            { title: 'Divisions', href: '/admin/divisions' },
            { title: 'Edit', href: '#' },
        ],
    },
})

// Division form
const divisionForm = useForm({
    name: props.division.name,
    name_ar: props.division.name_ar ?? '',
    slug: props.division.slug,
    tagline: props.division.tagline ?? '',
    tagline_ar: props.division.tagline_ar ?? '',
    description: props.division.description,
    description_ar: props.division.description_ar ?? '',
    long_description: props.division.long_description ?? '',
    long_description_ar: props.division.long_description_ar ?? '',
    hero_image: props.division.hero_image ?? '',
    color: props.division.color,
    order: props.division.order,
    is_active: props.division.is_active,
})

function saveDivision() {
    divisionForm.put(`/admin/divisions/${props.division.id}`)
}

const page = usePage()
const flash = computed(() => (page.props.flash as { success?: string; error?: string }) ?? {})
</script>

<template>
    <Head :title="`Edit — ${division.name}`" />

    <div class="p-6 space-y-8 max-w-4xl">
        <!-- Flash -->
        <Transition enter-active-class="transition duration-300" enter-from-class="opacity-0 -translate-y-1" enter-to-class="opacity-100 translate-y-0">
            <div v-if="flash.success" class="p-4 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm dark:bg-emerald-900/20 dark:border-emerald-800 dark:text-emerald-400">
                {{ flash.success }}
            </div>
        </Transition>

        <!-- Header -->
        <div class="flex items-center gap-4">
            <Link href="/admin/divisions" class="p-2 rounded-lg border border-border hover:bg-accent transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </Link>
            <div>
                <h1 class="text-2xl font-bold text-foreground">{{ division.name }}</h1>
                <p class="text-sm text-muted-foreground">Edit division details and manage its services.</p>
            </div>
            <div class="ml-auto flex items-center gap-2">
                <a :href="`/capabilities/${division.slug}`" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-border text-xs font-semibold hover:bg-accent transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                    Preview
                </a>
            </div>
        </div>

        <!-- Division Details Form -->
        <section class="rounded-xl border border-border bg-card overflow-hidden">
            <div class="px-6 py-4 border-b border-border bg-muted/30">
                <h2 class="font-semibold text-foreground">Division Details</h2>
            </div>
            <form @submit.prevent="saveDivision" class="p-6 space-y-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Name (EN) *</label>
                        <input v-model="divisionForm.name" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                        <p v-if="divisionForm.errors.name" class="mt-1 text-xs text-destructive">{{ divisionForm.errors.name }}</p>
                    </div>
                    <div dir="rtl">
                        <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5 text-right">الاسم (AR)</label>
                        <input v-model="divisionForm.name_ar" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Slug *</label>
                        <input v-model="divisionForm.slug" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm font-mono focus:outline-none focus:ring-2 focus:ring-ring" />
                        <p v-if="divisionForm.errors.slug" class="mt-1 text-xs text-destructive">{{ divisionForm.errors.slug }}</p>
                    </div>
                    <div class="hidden sm:block"></div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Tagline (EN)</label>
                        <input v-model="divisionForm.tagline" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" placeholder="Short punchy tagline…" />
                    </div>
                    <div dir="rtl">
                        <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5 text-right">شعار الوحدة (AR)</label>
                        <input v-model="divisionForm.tagline_ar" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Description (EN) *</label>
                        <textarea v-model="divisionForm.description" rows="3" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-none" placeholder="Short description shown on cards and listing pages…" />
                        <p v-if="divisionForm.errors.description" class="mt-1 text-xs text-destructive">{{ divisionForm.errors.description }}</p>
                    </div>
                    <div dir="rtl">
                        <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5 text-right">الوصف (AR)</label>
                        <textarea v-model="divisionForm.description_ar" rows="3" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-none" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Long Description (EN)</label>
                        <textarea v-model="divisionForm.long_description" rows="6" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-y" placeholder="Full description shown on the division detail page. Separate paragraphs with a blank line." />
                    </div>
                    <div dir="rtl">
                        <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5 text-right">الوصف الطويل (AR)</label>
                        <textarea v-model="divisionForm.long_description_ar" rows="6" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-y" />
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Hero Image URL</label>
                    <input v-model="divisionForm.hero_image" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm font-mono focus:outline-none focus:ring-2 focus:ring-ring" placeholder="https://images.unsplash.com/…" />
                    <p class="mt-1 text-xs text-muted-foreground">Paste any image URL. Recommended: Unsplash (1920×1080).</p>
                    <!-- Preview -->
                    <div v-if="divisionForm.hero_image" class="mt-2 h-24 rounded-lg overflow-hidden border border-border">
                        <img :src="divisionForm.hero_image" alt="Hero preview" class="w-full h-full object-cover" @error="(e) => (e.target as HTMLImageElement).style.display = 'none'" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Accent Color *</label>
                        <div class="flex items-center gap-2">
                            <input v-model="divisionForm.color" type="color" class="w-10 h-9 rounded border border-input cursor-pointer bg-background p-0.5" />
                            <input v-model="divisionForm.color" type="text" class="flex-1 px-3 py-2 rounded-lg border border-input bg-background text-sm font-mono focus:outline-none focus:ring-2 focus:ring-ring" />
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Display Order</label>
                        <input v-model.number="divisionForm.order" type="number" min="0" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Visibility</label>
                        <label class="flex items-center gap-2 cursor-pointer mt-2.5">
                            <input v-model="divisionForm.is_active" type="checkbox" class="w-4 h-4 rounded border-input accent-primary" />
                            <span class="text-sm">Visible on website</span>
                        </label>
                    </div>
                </div>

                <div class="flex justify-end pt-2">
                    <button
                        type="submit"
                        :disabled="divisionForm.processing"
                        class="px-5 py-2 rounded-lg bg-primary text-primary-foreground text-sm font-semibold hover:bg-primary/90 transition-colors disabled:opacity-60"
                    >
                        {{ divisionForm.processing ? 'Saving…' : 'Save Division' }}
                    </button>
                </div>
            </form>
        </section>

    </div>
</template>
