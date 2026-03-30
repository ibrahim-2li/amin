<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import SectionTitle from '@/components/corporate/SectionTitle.vue'
import DivisionCard from '@/components/corporate/DivisionCard.vue'

defineProps<{
    divisions: Array<{
        id: number
        name: string
        slug: string
        tagline: string
        description: string
        color: string
        order: number
        services: Array<{ id: number; title: string; description: string }>
    }>
}>()
</script>

<template>
    <div>
        <!-- Hero -->
        <section class="relative bg-[#0b1f3a] py-40 overflow-hidden">
            <div class="absolute inset-0">
                <img
                    src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=1920&q=80&auto=format&fit=crop"
                    alt=""
                    class="w-full h-full object-cover opacity-15"
                    loading="lazy"
                />
                <div class="absolute inset-0 bg-gradient-to-b from-[#0b1f3a]/80 to-[#0b1f3a]" />
            </div>
            <div class="absolute inset-0 opacity-10" style="background: radial-gradient(ellipse at 30% 50%, rgba(201,168,76,0.5) 0%, transparent 65%);" />
            <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
                <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-4">Areas of Expertise</p>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white max-w-3xl leading-tight">
                    Five Business Units. One Seamless Group.
                </h1>
                <p class="mt-6 text-white/60 text-lg max-w-2xl leading-relaxed">
                    From identity solutions and secure printing to packaging, education, and logistics — our five specialised business units work in concert to provide seamless, integrated solutions across the UAE.
                </p>
            </div>
        </section>

        <!-- Divisions Grid -->
        <section class="py-24 lg:py-32 bg-slate-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <DivisionCard
                        v-for="(division, index) in divisions"
                        :key="division.id"
                        :division="division"
                        :index="index"
                    />
                </div>
            </div>
        </section>

        <!-- Division Overview List -->
        <section class="py-24 lg:py-32 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <SectionTitle
                    eyebrow="At a Glance"
                    title="What each business unit delivers."
                    subtitle="A snapshot of the core service areas within each of our five specialised business units."
                />
                <div class="mt-16 space-y-12">
                    <div
                        v-for="division in divisions"
                        :key="division.id"
                        class="grid lg:grid-cols-3 gap-8 pb-12 border-b border-slate-100 last:border-0 last:pb-0"
                    >
                        <div>
                            <div class="w-2 h-2 rounded-full mb-4" :style="{ backgroundColor: division.color }" />
                            <h3 class="text-xl font-bold text-[#0b1f3a] mb-3">{{ division.name }}</h3>
                            <p class="text-sm text-slate-500 leading-relaxed mb-4">{{ division.tagline }}</p>
                            <Link
                                :href="`/capabilities/${division.slug}`"
                                class="inline-flex items-center gap-1 text-sm font-semibold hover:gap-2 transition-all duration-200"
                                :style="{ color: division.color }"
                            >
                                Explore division
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </Link>
                        </div>
                        <div class="lg:col-span-2">
                            <ul class="grid sm:grid-cols-2 gap-2">
                                <li
                                    v-for="service in division.services.slice(0, 6)"
                                    :key="service.id"
                                    class="flex items-start gap-3 text-sm text-slate-600 py-2"
                                >
                                    <div class="w-1 h-1 rounded-full mt-2 flex-none" :style="{ backgroundColor: division.color }" />
                                    {{ service.title }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="bg-[#c9a84c] py-20">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold text-[#0b1f3a] mb-4">Have a specific requirement?</h2>
                <p class="text-[#0b1f3a]/70 text-lg mb-8">Our specialists will identify the right integrated solution for your business.</p>
                <Link href="/contact" class="inline-flex items-center gap-2 px-10 py-4 bg-[#0b1f3a] text-white font-bold text-sm uppercase tracking-widest hover:bg-[#16304f] transition-colors duration-200">
                    Talk to a Specialist
                </Link>
            </div>
        </section>
    </div>
</template>
