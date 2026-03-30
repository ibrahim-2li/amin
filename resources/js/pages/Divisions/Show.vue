<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import SectionTitle from '@/components/corporate/SectionTitle.vue'
import ServiceCard from '@/components/corporate/ServiceCard.vue'

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
        services: Array<{
            id: number
            title: string
            description: string
            icon: string | null
        }>
    }
    otherDivisions: Array<{
        id: number
        name: string
        slug: string
        tagline: string
        color: string
    }>
}>()
</script>

<template>
    <div>
        <!-- Hero -->
        <section
            class="relative py-44 overflow-hidden"
            :style="{ backgroundColor: division.color }"
        >
            <div v-if="division.hero_image" class="absolute inset-0">
                <img
                    :src="division.hero_image"
                    :alt="division.name"
                    class="w-full h-full object-cover opacity-25"
                    loading="lazy"
                />
                <div class="absolute inset-0" :style="{ background: `linear-gradient(to right, ${division.color}ee, ${division.color}99)` }" />
            </div>
            <div class="absolute inset-0 opacity-10" style="background: radial-gradient(ellipse at 80% 50%, rgba(255,255,255,0.3) 0%, transparent 65%);" />
            <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
                <Link href="/capabilities" class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-white/50 hover:text-white mb-8 transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    All Capabilities
                </Link>
                <p class="text-xs font-semibold uppercase tracking-widest text-white/50 mb-4">Division</p>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white max-w-3xl leading-tight">
                    {{ division.name }}
                </h1>
                <p class="mt-6 text-white/70 text-lg max-w-2xl leading-relaxed">
                    {{ division.tagline }}
                </p>
            </div>
        </section>

        <!-- Description -->
        <section class="py-24 lg:py-32 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-start">
                    <div>
                        <SectionTitle
                            eyebrow="Overview"
                            :title="division.name"
                        />
                        <div class="mt-6 space-y-4 text-slate-500 leading-relaxed">
                            <p v-for="(paragraph, i) in division.long_description?.split('\n\n') ?? [division.description]" :key="i">
                                {{ paragraph }}
                            </p>
                        </div>
                        <Link
                            href="/contact"
                            class="inline-flex items-center gap-2 mt-10 px-8 py-4 font-bold text-sm uppercase tracking-widest text-white transition-colors duration-200"
                            :style="{ backgroundColor: division.color }"
                        >
                            Discuss a Project
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </Link>
                    </div>
                    <div>
                        <!-- Visual highlight box -->
                        <div class="p-8 border-l-4" :style="{ borderColor: division.color, backgroundColor: division.color + '08' }">
                            <p class="text-xs font-semibold uppercase tracking-widest mb-4" :style="{ color: division.color }">Why Choose Us</p>
                            <ul class="space-y-4">
                                <li v-for="item in [
                                    'Decades of specialised expertise in this domain',
                                    'Deep understanding of regional regulatory requirements',
                                    'Proven track record with sovereign and enterprise clients',
                                    'End-to-end capability from design through delivery',
                                    'ISO-certified quality management throughout',
                                ]" :key="item" class="flex items-start gap-3 text-sm text-slate-600">
                                    <svg class="w-4 h-4 flex-none mt-0.5" :style="{ color: division.color }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    {{ item }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services -->
        <section class="py-24 lg:py-32 bg-slate-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <SectionTitle
                    eyebrow="Services"
                    :title="`What we deliver in ${division.name}`"
                    subtitle="A comprehensive range of services designed to address the most complex requirements."
                />
                <div class="mt-16 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <ServiceCard
                        v-for="service in division.services"
                        :key="service.id"
                        :service="service"
                        :accentColor="division.color"
                    />
                </div>
            </div>
        </section>

        <!-- Other Divisions -->
        <section v-if="otherDivisions.length > 0" class="py-24 lg:py-32 bg-[#0b1f3a]">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <SectionTitle
                    eyebrow="Explore More"
                    title="Our other divisions."
                    subtitle="Discover the breadth of our capabilities across Amin Group."
                    :light="true"
                />
                <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <Link
                        v-for="other in otherDivisions.slice(0, 4)"
                        :key="other.id"
                        :href="`/capabilities/${other.slug}`"
                        class="group p-6 bg-white/5 border border-white/10 hover:bg-white/10 transition-colors duration-200"
                    >
                        <div class="w-2 h-2 rounded-full mb-4" :style="{ backgroundColor: other.color }" />
                        <h4 class="text-sm font-bold text-white mb-2 leading-snug group-hover:text-[#c9a84c] transition-colors duration-200">
                            {{ other.name }}
                        </h4>
                        <p class="text-xs text-white/40 leading-relaxed">{{ other.tagline }}</p>
                    </Link>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="bg-[#c9a84c] py-20">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold text-[#0b1f3a] mb-4">Ready to get started?</h2>
                <p class="text-[#0b1f3a]/70 text-lg mb-8">Tell us about your requirements and our team will be in touch.</p>
                <Link href="/contact" class="inline-flex items-center gap-2 px-10 py-4 bg-[#0b1f3a] text-white font-bold text-sm uppercase tracking-widest hover:bg-[#16304f] transition-colors duration-200">
                    Contact Our Team
                </Link>
            </div>
        </section>
    </div>
</template>
