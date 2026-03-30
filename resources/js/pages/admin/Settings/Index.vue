<script setup lang="ts">
import { Head, useForm, usePage } from '@inertiajs/vue3'
import { computed, ref } from 'vue'

defineOptions({
    layout: {
        breadcrumbs: [
            { title: 'Dashboard', href: '/dashboard' },
            { title: 'Settings', href: '/admin/settings' },
        ],
    },
})

const props = defineProps<{
    settings: Record<string, {
        id: number
        key: string
        value: string | null
        type: string
    }>
}>()

const page = usePage()
const flash = computed(() => (page.props.flash as { success?: string }) ?? {})

// Build editable list from settings
const settingsList = computed(() =>
    Object.values(props.settings).map(s => ({ key: s.key, value: s.value ?? '' }))
)

const form = useForm({
    settings: settingsList.value,
})

function save() {
    form.put('/admin/settings')
}

const labels: Record<string, { label: string; hint?: string }> = {
    company_name: { label: 'Company Name' },
    company_tagline: { label: 'Company Tagline', hint: 'Appears in the hero and browser title.' },
    company_description: { label: 'Company Description', hint: 'Short paragraph shown in various sections.' },
    contact_email: { label: 'Contact Email' },
    contact_phone: { label: 'Contact Phone' },
    contact_address: { label: 'Office Address' },
    founded_year: { label: 'Founded Year' },
    countries_served: { label: 'Countries Served', hint: 'e.g. "30+"' },
    employees_count: { label: 'Number of Employees', hint: 'e.g. "2,500+"' },
    projects_completed: { label: 'Projects Completed', hint: 'e.g. "500+"' },
}

function getLabel(key: string) {
    return labels[key]?.label ?? key.replace(/_/g, ' ').replace(/\b\w/g, c => c.toUpperCase())
}
function getHint(key: string) {
    return labels[key]?.hint
}
function isTextarea(key: string) {
    return key === 'company_description'
}
</script>

<template>
    <Head title="Settings" />

    <div class="p-6 space-y-6 max-w-2xl">
        <!-- Flash -->
        <Transition enter-active-class="transition duration-300" enter-from-class="opacity-0 -translate-y-1" enter-to-class="opacity-100 translate-y-0">
            <div v-if="flash.success" class="p-4 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm dark:bg-emerald-900/20 dark:border-emerald-800 dark:text-emerald-400">
                {{ flash.success }}
            </div>
        </Transition>

        <div>
            <h1 class="text-2xl font-bold text-foreground">Settings</h1>
            <p class="text-sm text-muted-foreground mt-1">Edit global website content and company information.</p>
        </div>

        <form @submit.prevent="save" class="rounded-xl border border-border bg-card overflow-hidden">
            <div class="px-6 py-4 border-b border-border bg-muted/30">
                <h2 class="font-semibold text-foreground">Company Information</h2>
            </div>
            <div class="p-6 space-y-5">
                <div v-for="(item, index) in form.settings" :key="item.key">
                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">
                        {{ getLabel(item.key) }}
                    </label>
                    <textarea
                        v-if="isTextarea(item.key)"
                        v-model="form.settings[index].value"
                        rows="3"
                        class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-none"
                    />
                    <input
                        v-else
                        v-model="form.settings[index].value"
                        type="text"
                        class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring"
                    />
                    <p v-if="getHint(item.key)" class="mt-1 text-xs text-muted-foreground">{{ getHint(item.key) }}</p>
                </div>
            </div>
            <div class="px-6 py-4 border-t border-border bg-muted/20 flex justify-end">
                <button type="submit" :disabled="form.processing" class="px-5 py-2 rounded-lg bg-primary text-primary-foreground text-sm font-semibold hover:bg-primary/90 transition-colors disabled:opacity-60">
                    {{ form.processing ? 'Saving…' : 'Save Settings' }}
                </button>
            </div>
        </form>
    </div>
</template>
