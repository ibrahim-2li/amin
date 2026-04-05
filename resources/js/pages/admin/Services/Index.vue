<script setup lang="ts">
import { Head, Link, useForm, router } from '@inertiajs/vue3'
import { ref, computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const props = defineProps<{
    services: Array<{
        id: number
        division_id: number
        division_name: string
        title: string
        description: string
        order: number
        is_active: boolean
    }>
    divisions: Array<{
        id: number
        name: string
    }>
}>()

defineOptions({
    layout: {
        breadcrumbs: [
            { title: 'Dashboard', href: '/dashboard' },
            { title: 'Services', href: '/admin/services' },
        ],
    },
})

// New service form
const newServiceForm = useForm({
    division_id: props.divisions.length > 0 ? props.divisions[0].id : '',
    title: '',
    description: '',
    order: 0,
})

function addService() {
    newServiceForm.post('/admin/services', {
        onSuccess: () => {
            newServiceForm.reset('title', 'description')
            newServiceForm.order = props.services.filter(s => s.division_id === newServiceForm.division_id).length + 1
        },
    })
}

// Inline editing
const editingServiceId = ref<number | null>(null)
const serviceEdits = ref<Record<number, { division_id: number; title: string; description: string; order: number; is_active: boolean }>>({})

function startEditService(service: typeof props.services[0]) {
    editingServiceId.value = service.id
    serviceEdits.value[service.id] = {
        division_id: service.division_id,
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
    <Head title="Manage Services" />

    <div class="p-6 space-y-8 max-w-6xl">
        <!-- Flash -->
        <Transition enter-active-class="transition duration-300" enter-from-class="opacity-0 -translate-y-1" enter-to-class="opacity-100 translate-y-0">
            <div v-if="flash.success" class="p-4 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm dark:bg-emerald-900/20 dark:border-emerald-800 dark:text-emerald-400">
                {{ flash.success }}
            </div>
        </Transition>

        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-foreground">Services</h1>
                <p class="text-sm text-muted-foreground mt-1">Manage all services across different divisions.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            
            <div class="lg:col-span-2 space-y-6">
                <!-- Services List -->
                <section class="rounded-xl border border-border bg-card overflow-hidden">
                    <div class="px-6 py-4 border-b border-border bg-muted/30">
                        <h2 class="font-semibold text-foreground">All Services <span class="text-muted-foreground font-normal text-sm ml-1">({{ services.length }})</span></h2>
                    </div>

                    <div class="divide-y divide-border">
                        <div v-if="services.length === 0" class="p-8 text-center text-muted-foreground">
                            No services added yet.
                        </div>
                        <div v-for="service in services" :key="service.id">
                            <!-- View mode -->
                            <div v-if="editingServiceId !== service.id" class="flex flex-col sm:flex-row sm:items-start gap-4 px-6 py-4">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-primary/10 text-primary border border-primary/20">
                                            {{ service.division_name }}
                                        </span>
                                        <span v-if="!service.is_active" class="px-1.5 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-muted text-muted-foreground">Hidden</span>
                                    </div>
                                    <p class="font-semibold text-base text-foreground">{{ service.title }}</p>
                                    <p class="text-sm text-muted-foreground mt-1 leading-relaxed">{{ service.description }}</p>
                                </div>
                                <div class="flex items-center gap-1 flex-none sm:pt-2">
                                    <span class="text-xs font-mono text-muted-foreground mr-3" title="Order">{{ service.order }}</span>
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
                            <div v-else class="px-6 py-5 bg-muted/10 space-y-4 shadow-[inset_0_2px_4px_rgba(0,0,0,0.05)] shadow-border/50">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Division</label>
                                        <select v-model="serviceEdits[service.id].division_id" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring">
                                            <option v-for="div in divisions" :key="div.id" :value="div.id">{{ div.name }}</option>
                                        </select>
                                    </div>
                                    <div class="flex gap-4">
                                        <div class="flex-1">
                                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Order</label>
                                            <input v-model.number="serviceEdits[service.id].order" type="number" min="0" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Title</label>
                                    <input v-model="serviceEdits[service.id].title" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Description</label>
                                    <textarea v-model="serviceEdits[service.id].description" rows="3" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-none" />
                                </div>
                                <div class="flex items-center justify-between pt-2">
                                    <label class="flex items-center gap-2 cursor-pointer text-sm">
                                        <input v-model="serviceEdits[service.id].is_active" type="checkbox" class="w-4 h-4 rounded border-input accent-primary" />
                                        Visible
                                    </label>
                                    <div class="flex gap-2">
                                        <button @click="cancelEditService" class="px-4 py-2 rounded-lg border border-border text-xs font-semibold hover:bg-accent transition-colors">Cancel</button>
                                        <button @click="saveService(service.id)" class="px-4 py-2 rounded-lg bg-primary text-primary-foreground text-xs font-semibold hover:bg-primary/90 transition-colors">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Add new service sticky sidebar -->
            <div class="lg:col-span-1 border border-border bg-card rounded-xl sticky top-6">
                <div class="px-5 py-4 border-b border-border bg-muted/30">
                    <h3 class="font-semibold text-foreground">Add New Service</h3>
                </div>
                <form @submit.prevent="addService" class="p-5 space-y-4">
                    <div v-if="divisions.length === 0" class="text-sm text-destructive">
                        You must create a Division first.
                    </div>
                    
                    <template v-else>
                        <div>
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Division</label>
                            <select v-model="newServiceForm.division_id" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring">
                                <option v-for="div in divisions" :key="div.id" :value="div.id">{{ div.name }}</option>
                            </select>
                            <p v-if="newServiceForm.errors.division_id" class="mt-1 text-xs text-destructive">{{ newServiceForm.errors.division_id }}</p>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Title</label>
                            <input v-model="newServiceForm.title" type="text" placeholder="Service title…" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                            <p v-if="newServiceForm.errors.title" class="mt-1 text-xs text-destructive">{{ newServiceForm.errors.title }}</p>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Description</label>
                            <textarea v-model="newServiceForm.description" rows="3" placeholder="Service description…" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-none" />
                            <p v-if="newServiceForm.errors.description" class="mt-1 text-xs text-destructive">{{ newServiceForm.errors.description }}</p>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Order (Optional)</label>
                            <input v-model.number="newServiceForm.order" type="number" min="0" placeholder="0" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                        </div>
                        <button type="submit" :disabled="newServiceForm.processing" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2 mt-2 rounded-lg bg-primary text-primary-foreground text-sm font-semibold hover:bg-primary/90 transition-colors disabled:opacity-60">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            {{ newServiceForm.processing ? 'Adding…' : 'Add Service' }}
                        </button>
                    </template>
                </form>
            </div>

        </div>
    </div>
</template>
