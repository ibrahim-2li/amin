<script setup lang="ts">
import { Head, Link, useForm, router } from '@inertiajs/vue3'
import { ref, computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const props = defineProps<{
    division: {
        id: number
        name: string
        slug: string
        tagline: string
        description: string
        long_description: string
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
    slug: props.division.slug,
    tagline: props.division.tagline ?? '',
    description: props.division.description,
    long_description: props.division.long_description ?? '',
    hero_image: props.division.hero_image ?? '',
    color: props.division.color,
    order: props.division.order,
    is_active: props.division.is_active,
})

function saveDivision() {
    divisionForm.put(`/admin/divisions/${props.division.id}`)
}

// New service form
const newServiceForm = useForm({
    title: '',
    description: '',
    order: props.division.services.length + 1,
})

function addService() {
    newServiceForm.post(`/admin/divisions/${props.division.id}/services`, {
        onSuccess: () => newServiceForm.reset(),
    })
}

// Per-service inline editing
const editingServiceId = ref<number | null>(null)
const serviceEdits = ref<Record<number, { title: string; description: string; order: number; is_active: boolean }>>({})

function startEditService(service: typeof props.division.services[0]) {
    editingServiceId.value = service.id
    serviceEdits.value[service.id] = {
        title: service.title,
        description: service.description,
        order: service.order,
        is_active: service.is_active,
    }
}

function cancelEditService() {
    editingServiceId.value = null
}

function saveService(serviceId: number) {
    router.put(`/admin/services/${serviceId}`, serviceEdits.value[serviceId], {
        onSuccess: () => { editingServiceId.value = null },
        preserveScroll: true,
    })
}

function deleteService(serviceId: number) {
    if (!confirm('Delete this service?')) { return }
    router.delete(`/admin/services/${serviceId}`, { preserveScroll: true })
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
                        <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Name *</label>
                        <input v-model="divisionForm.name" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                        <p v-if="divisionForm.errors.name" class="mt-1 text-xs text-destructive">{{ divisionForm.errors.name }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Slug *</label>
                        <input v-model="divisionForm.slug" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm font-mono focus:outline-none focus:ring-2 focus:ring-ring" />
                        <p v-if="divisionForm.errors.slug" class="mt-1 text-xs text-destructive">{{ divisionForm.errors.slug }}</p>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Tagline</label>
                    <input v-model="divisionForm.tagline" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" placeholder="Short punchy tagline…" />
                </div>

                <div>
                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Description *</label>
                    <textarea v-model="divisionForm.description" rows="3" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-none" placeholder="Short description shown on cards and listing pages…" />
                    <p v-if="divisionForm.errors.description" class="mt-1 text-xs text-destructive">{{ divisionForm.errors.description }}</p>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Long Description</label>
                    <textarea v-model="divisionForm.long_description" rows="6" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-y" placeholder="Full description shown on the division detail page. Separate paragraphs with a blank line." />
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

        <!-- Services Section -->
        <section class="rounded-xl border border-border bg-card overflow-hidden">
            <div class="px-6 py-4 border-b border-border bg-muted/30">
                <h2 class="font-semibold text-foreground">Services <span class="text-muted-foreground font-normal text-sm ml-1">({{ division.services.length }})</span></h2>
            </div>

            <div class="divide-y divide-border">
                <!-- Existing services -->
                <div v-for="service in division.services" :key="service.id">
                    <!-- View mode -->
                    <div v-if="editingServiceId !== service.id" class="flex items-start gap-4 px-6 py-4">
                        <span class="text-xs font-mono text-muted-foreground w-6 pt-0.5">{{ service.order }}</span>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2">
                                <p class="font-semibold text-sm text-foreground">{{ service.title }}</p>
                                <span v-if="!service.is_active" class="px-1.5 py-0.5 rounded text-xs bg-muted text-muted-foreground">Hidden</span>
                            </div>
                            <p class="text-xs text-muted-foreground mt-1 leading-relaxed">{{ service.description }}</p>
                        </div>
                        <div class="flex items-center gap-1 flex-none">
                            <button @click="startEditService(service)" class="p-1.5 rounded-lg hover:bg-accent transition-colors text-muted-foreground hover:text-foreground">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            <button @click="deleteService(service.id)" class="p-1.5 rounded-lg hover:bg-destructive/10 transition-colors text-muted-foreground hover:text-destructive">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Edit mode -->
                    <div v-else class="px-6 py-4 bg-muted/20 space-y-3">
                        <div class="grid grid-cols-1 sm:grid-cols-4 gap-3">
                            <div class="sm:col-span-3">
                                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1">Title</label>
                                <input v-model="serviceEdits[service.id].title" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1">Order</label>
                                <input v-model.number="serviceEdits[service.id].order" type="number" min="0" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1">Description</label>
                            <textarea v-model="serviceEdits[service.id].description" rows="2" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-none" />
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="flex items-center gap-2 cursor-pointer text-sm">
                                <input v-model="serviceEdits[service.id].is_active" type="checkbox" class="w-4 h-4 rounded border-input accent-primary" />
                                Visible
                            </label>
                            <div class="flex gap-2">
                                <button @click="cancelEditService" class="px-3 py-1.5 rounded-lg border border-border text-xs font-semibold hover:bg-accent transition-colors">Cancel</button>
                                <button @click="saveService(service.id)" class="px-3 py-1.5 rounded-lg bg-primary text-primary-foreground text-xs font-semibold hover:bg-primary/90 transition-colors">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add new service -->
                <div class="px-6 py-5 bg-muted/10">
                    <h3 class="text-sm font-semibold text-foreground mb-4">Add New Service</h3>
                    <form @submit.prevent="addService" class="space-y-3">
                        <div class="grid grid-cols-1 sm:grid-cols-4 gap-3">
                            <div class="sm:col-span-3">
                                <input v-model="newServiceForm.title" type="text" placeholder="Service title…" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                                <p v-if="newServiceForm.errors.title" class="mt-1 text-xs text-destructive">{{ newServiceForm.errors.title }}</p>
                            </div>
                            <div>
                                <input v-model.number="newServiceForm.order" type="number" min="0" placeholder="Order" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                            </div>
                        </div>
                        <textarea v-model="newServiceForm.description" rows="2" placeholder="Service description…" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-none" />
                        <p v-if="newServiceForm.errors.description" class="mt-1 text-xs text-destructive">{{ newServiceForm.errors.description }}</p>
                        <button type="submit" :disabled="newServiceForm.processing" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg border border-dashed border-border text-sm font-semibold hover:bg-accent hover:border-solid transition-colors disabled:opacity-60">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            {{ newServiceForm.processing ? 'Adding…' : 'Add Service' }}
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</template>
