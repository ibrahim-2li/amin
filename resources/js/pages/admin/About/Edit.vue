<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3'
import { ref, computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

interface ValueItem {
    title: string;
    title_ar: string;
    desc: string;
    desc_ar: string;
    icon: string;
}

interface FeatureItem {
    title: string;
    title_ar: string;
    description: string;
    description_ar: string;
    icon: string;
}

const props = defineProps<{
    about: {
        id: number;
        hero_title: string;
        hero_title_ar: string;
        hero_subtitle: string;
        hero_subtitle_ar: string;
        hero_image: string;
        home_title: string;
        home_title_ar: string;
        home_text: string;
        home_text_ar: string;
        home_image: string;
        home_delivery_label: string;
        home_delivery_label_ar: string;
        home_delivery_text: string;
        home_delivery_text_ar: string;
        home_features: FeatureItem[];
        purpose_title: string;
        purpose_title_ar: string;
        purpose_description: string;
        purpose_description_ar: string;
        mission: string;
        mission_ar: string;
        vision: string;
        vision_ar: string;
        backing: string;
        backing_ar: string;
        values: ValueItem[];
    };
}>();

defineOptions({
    layout: {
        breadcrumbs: [
            { title: 'Dashboard', href: '/dashboard' },
            { title: 'About Page', href: '/admin/about' },
            { title: 'Edit Content', href: '#' },
        ],
    },
})

const form = useForm({
    hero_title: props.about?.hero_title || '',
    hero_title_ar: props.about?.hero_title_ar || '',
    hero_subtitle: props.about?.hero_subtitle || '',
    hero_subtitle_ar: props.about?.hero_subtitle_ar || '',
    hero_image: props.about?.hero_image || '',
    home_title: props.about?.home_title || '',
    home_title_ar: props.about?.home_title_ar || '',
    home_text: props.about?.home_text || '',
    home_text_ar: props.about?.home_text_ar || '',
    home_image: props.about?.home_image || '',
    home_delivery_label: props.about?.home_delivery_label || '',
    home_delivery_label_ar: props.about?.home_delivery_label_ar || '',
    home_delivery_text: props.about?.home_delivery_text || '',
    home_delivery_text_ar: props.about?.home_delivery_text_ar || '',
    home_features: Array.isArray(props.about?.home_features) ? [...props.about.home_features] : [],
    purpose_title: props.about?.purpose_title || '',
    purpose_title_ar: props.about?.purpose_title_ar || '',
    purpose_description: props.about?.purpose_description || '',
    purpose_description_ar: props.about?.purpose_description_ar || '',
    mission: props.about?.mission || '',
    mission_ar: props.about?.mission_ar || '',
    vision: props.about?.vision || '',
    vision_ar: props.about?.vision_ar || '',
    backing: props.about?.backing || '',
    backing_ar: props.about?.backing_ar || '',
    values: Array.isArray(props.about?.values) ? [...props.about.values] : [],
});

const page = usePage()
const flash = computed(() => (page.props.flash as { success?: string; error?: string }) ?? {})

const addValue = () => {
    form.values.push({ title: '', title_ar: '', desc: '', desc_ar: '', icon: '' });
};

const removeValue = (index: number) => {
    form.values.splice(index, 1);
};

const addFeature = () => {
    form.home_features.push({ title: '', title_ar: '', description: '', description_ar: '', icon: '' });
};

const removeFeature = (index: number) => {
    form.home_features.splice(index, 1);
};

const submit = () => {
    form.put('/admin/about');
};
</script>

<template>
    <Head title="About Page Settings" />

    <div class="p-6 space-y-8 max-w-4xl">
        <!-- Flash -->
        <Transition enter-active-class="transition duration-300" enter-from-class="opacity-0 -translate-y-1" enter-to-class="opacity-100 translate-y-0">
            <div v-if="flash.success" class="p-4 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm dark:bg-emerald-900/20 dark:border-emerald-800 dark:text-emerald-400">
                {{ flash.success }}
            </div>
        </Transition>

        <!-- Header -->
        <div class="flex items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold text-foreground">About Page Content</h1>
                <p class="text-sm text-muted-foreground">Manage the content, titles, and text for the public About page.</p>
            </div>
            <div class="ml-auto flex items-center gap-2">
                <a href="/about" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-border text-xs font-semibold hover:bg-accent transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                    Preview
                </a>
                <button
                    @click="submit"
                    :disabled="form.processing"
                    class="px-4 py-2 rounded-lg bg-primary text-primary-foreground text-sm font-semibold hover:bg-primary/90 transition-colors disabled:opacity-60"
                >
                    {{ form.processing ? 'Saving...' : 'Save Changes' }}
                </button>
            </div>
        </div>

        <form @submit.prevent="submit" class="space-y-6">

            <!-- Hero Section -->
            <section class="rounded-xl border border-border bg-card overflow-hidden">
                <div class="px-6 py-4 border-b border-border bg-muted/30">
                    <h2 class="font-semibold text-foreground">Hero Section</h2>
                    <p class="mt-0.5 text-xs text-muted-foreground">The main introduction at the top of the About page.</p>
                </div>
                <div class="p-6 space-y-5">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Hero Title (EN)</label>
                            <input v-model="form.hero_title" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" placeholder="An all-in-one partner..." />
                        </div>
                        <div dir="rtl">
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">العنوان الرئيسي (AR)</label>
                            <input v-model="form.hero_title_ar" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" placeholder="..." />
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Hero Subtitle (EN)</label>
                            <textarea v-model="form.hero_subtitle" rows="3" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-y"></textarea>
                        </div>
                        <div dir="rtl">
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">العنوان الفرعي (AR)</label>
                            <textarea v-model="form.hero_subtitle_ar" rows="3" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-y"></textarea>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Hero Image URL</label>
                        <input v-model="form.hero_image" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm font-mono focus:outline-none focus:ring-2 focus:ring-ring" placeholder="https://..." />
                        <!-- Preview -->
                        <div v-if="form.hero_image" class="mt-2 h-24 rounded-lg overflow-hidden border border-border">
                            <img :src="form.hero_image" alt="Hero preview" class="w-full h-full object-cover" @error="(e) => (e.target as HTMLImageElement).style.display = 'none'" />
                        </div>
                    </div>
                </div>
            </section>

            <!-- Home Page Snippet -->
            <section class="rounded-xl border border-border bg-card overflow-hidden">
                <div class="px-6 py-4 border-b border-border bg-muted/30">
                    <h2 class="font-semibold text-foreground">Home Page Snippet</h2>
                    <p class="mt-0.5 text-xs text-muted-foreground">The short snapshot displaying on the main landing page directing visitors to the About page.</p>
                </div>
                <div class="p-6 space-y-5">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Snippet Title (EN)</label>
                            <input v-model="form.home_title" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                        </div>
                        <div dir="rtl">
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">عنوان المقتطف (AR)</label>
                            <input v-model="form.home_title_ar" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Snippet Text (EN)</label>
                            <textarea v-model="form.home_text" rows="5" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-y"></textarea>
                        </div>
                        <div dir="rtl">
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">نص المقتطف (AR)</label>
                            <textarea v-model="form.home_text_ar" rows="5" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-y"></textarea>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Preview Image URL</label>
                        <input v-model="form.home_image" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm font-mono focus:outline-none focus:ring-2 focus:ring-ring" placeholder="https://..." />
                        <!-- Preview -->
                        <div v-if="form.home_image" class="mt-2 h-24 rounded-lg overflow-hidden border border-border">
                            <img :src="form.home_image" alt="Snippet preview" class="w-full h-full object-cover" @error="(e) => (e.target as HTMLImageElement).style.display = 'none'" />
                        </div>
                    </div>
                </div>
            </section>

            <!-- Home About Section -->
            <section class="rounded-xl border border-border bg-card overflow-hidden">
                <div class="px-6 py-4 border-b border-border bg-muted/30">
                    <h2 class="font-semibold text-foreground">Home About Section</h2>
                    <p class="mt-0.5 text-xs text-muted-foreground">The delivery model overlay and feature cards shown in the About section on the home page.</p>
                </div>
                <div class="p-6 space-y-5">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Delivery Label (EN)</label>
                            <input v-model="form.home_delivery_label" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" placeholder="Delivery Model" />
                        </div>
                        <div dir="rtl">
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">تسمية نموذج التسليم (AR)</label>
                            <input v-model="form.home_delivery_label_ar" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Delivery Text (EN)</label>
                            <textarea v-model="form.home_delivery_text" rows="3" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-y" placeholder="Design, produce, protect, and deliver from one coordinated platform."></textarea>
                        </div>
                        <div dir="rtl">
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">نص نموذج التسليم (AR)</label>
                            <textarea v-model="form.home_delivery_text_ar" rows="3" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-y"></textarea>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Home Feature Cards -->
            <section class="rounded-xl border border-border bg-card overflow-hidden">
                <div class="px-6 py-4 border-b border-border bg-muted/30 flex items-center justify-between">
                    <div>
                        <h2 class="font-semibold text-foreground">Home Feature Cards</h2>
                        <p class="mt-0.5 text-xs text-muted-foreground">The two feature highlight cards that appear in the About section on the home page.</p>
                    </div>
                    <button type="button" @click="addFeature" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-input bg-background text-xs font-semibold hover:bg-accent transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                        Add Feature
                    </button>
                </div>
                <div class="p-6 space-y-4">
                    <div v-for="(feature, index) in form.home_features" :key="index" class="p-5 border border-border rounded-lg bg-muted/10 relative group">
                        <button type="button" @click="removeFeature(index)" class="absolute top-3 right-3 text-destructive/70 hover:text-destructive hover:bg-destructive/10 p-1.5 rounded transition-colors" title="Remove feature">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                        <div class="space-y-4 pr-10">
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Feature Title (EN)</label>
                                    <input v-model="feature.title" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" placeholder="One accountable group" />
                                </div>
                                <div dir="rtl">
                                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">عنوان الميزة (AR)</label>
                                    <input v-model="feature.title_ar" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Description (EN)</label>
                                    <textarea v-model="feature.description" rows="2" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-y" placeholder="Connected teams reduce handoffs..."></textarea>
                                </div>
                                <div dir="rtl">
                                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">الوصف (AR)</label>
                                    <textarea v-model="feature.description_ar" rows="2" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-y"></textarea>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">SVG Path Icon (d attribute)</label>
                                <input v-model="feature.icon" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm font-mono focus:outline-none focus:ring-2 focus:ring-ring" placeholder="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5..." />
                            </div>
                        </div>
                    </div>
                    <div v-if="form.home_features.length === 0" class="text-center py-8 text-muted-foreground text-sm border border-dashed rounded-lg">
                        No feature cards added. Click "Add Feature" to create one.
                    </div>
                </div>
            </section>

            <!-- Purpose & Details -->
            <section class="rounded-xl border border-border bg-card overflow-hidden">
                <div class="px-6 py-4 border-b border-border bg-muted/30">
                    <h2 class="font-semibold text-foreground">Purpose & Identity</h2>
                    <p class="mt-0.5 text-xs text-muted-foreground">Update your company's mission and purpose statements.</p>
                </div>
                <div class="p-6 space-y-5">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Purpose Title (EN)</label>
                            <input v-model="form.purpose_title" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                        </div>
                        <div dir="rtl">
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">عنوان الغرض (AR)</label>
                            <input v-model="form.purpose_title_ar" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Purpose Description (EN)</label>
                            <textarea v-model="form.purpose_description" rows="4" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-y"></textarea>
                        </div>
                        <div dir="rtl">
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">وصف الغرض (AR)</label>
                            <textarea v-model="form.purpose_description_ar" rows="4" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-y"></textarea>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Mission (EN)</label>
                            <textarea v-model="form.mission" rows="3" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-y"></textarea>
                        </div>
                        <div dir="rtl">
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">المهمة (AR)</label>
                            <textarea v-model="form.mission_ar" rows="3" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-y"></textarea>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Vision (EN)</label>
                            <textarea v-model="form.vision" rows="3" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-y"></textarea>
                        </div>
                        <div dir="rtl">
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">الرؤية (AR)</label>
                            <textarea v-model="form.vision_ar" rows="3" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-y"></textarea>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Backing (EN)</label>
                            <textarea v-model="form.backing" rows="3" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-y"></textarea>
                        </div>
                        <div dir="rtl">
                            <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">الدعم (AR)</label>
                            <textarea v-model="form.backing_ar" rows="3" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-y"></textarea>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Values -->
            <section class="rounded-xl border border-border bg-card overflow-hidden">
                <div class="px-6 py-4 border-b border-border bg-muted/30 flex items-center justify-between">
                    <div>
                        <h2 class="font-semibold text-foreground">Core Values</h2>
                        <p class="mt-0.5 text-xs text-muted-foreground">Manage the core principles that display as cards.</p>
                    </div>
                    <button type="button" @click="addValue" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-input bg-background text-xs font-semibold hover:bg-accent transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                        Add Value
                    </button>
                </div>
                <div class="p-6 space-y-4">
                    <div v-for="(value, index) in form.values" :key="index" class="p-5 border border-border rounded-lg bg-muted/10 relative group">
                        <button type="button" @click="removeValue(index)" class="absolute top-3 right-3 text-destructive/70 hover:text-destructive hover:bg-destructive/10 p-1.5 rounded transition-colors" title="Remove value">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                        <div class="space-y-4 pr-10">
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Value Title (EN)</label>
                                    <input v-model="value.title" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                                </div>
                                <div dir="rtl">
                                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">العنوان (AR)</label>
                                    <input v-model="value.title_ar" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring" />
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">Description (EN)</label>
                                    <textarea v-model="value.desc" rows="2" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-y"></textarea>
                                </div>
                                <div dir="rtl">
                                    <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">الوصف (AR)</label>
                                    <textarea v-model="value.desc_ar" rows="2" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-y"></textarea>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wide mb-1.5">SVG Path Icon (d attribute)</label>
                                <input v-model="value.icon" type="text" class="w-full px-3 py-2 rounded-lg border border-input bg-background text-sm font-mono focus:outline-none focus:ring-2 focus:ring-ring" placeholder="M9 12l2 2 4-4m5.6..." />
                            </div>
                        </div>
                    </div>
                    <div v-if="form.values.length === 0" class="text-center py-8 text-muted-foreground text-sm border border-dashed rounded-lg">
                        No values added. Click "Add Value" to create one.
                    </div>
                </div>
            </section>

        </form>
    </div>
</template>
