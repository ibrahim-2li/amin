<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import SectionTitle from '@/components/corporate/SectionTitle.vue'

defineProps<{
    about: {
        hero_title: string;
        hero_subtitle: string;
        hero_image: string;
        purpose_title: string;
        purpose_description: string;
        mission: string;
        vision: string;
        backing: string;
        values: Array<{ title: string; desc: string; icon: string }>;
    }
    stats: {
        founded: string
        countries: string
        employees: string
        projects: string
    }
}>()

</script>

<template>
    <div>
        <!-- Hero -->
        <section class="relative bg-[#0b1f3a] py-40 overflow-hidden">
            <div class="absolute inset-0">
                <img
                    :src="about.hero_image || 'https://images.unsplash.com/photo-1486325212027-8081e485255e?w=1920&q=80'"
                    alt=""
                    class="w-full h-full object-cover opacity-15"
                    loading="lazy"
                />
                <div class="absolute inset-0 bg-gradient-to-b from-[#0b1f3a]/80 to-[#0b1f3a]" />
            </div>
            <div class="absolute inset-0 opacity-10" style="background: radial-gradient(ellipse at 70% 50%, rgba(201,168,76,0.5) 0%, transparent 65%);" />
            <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
                <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-4">About Us</p>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white max-w-3xl leading-tight">
                    {{ about.hero_title }}
                </h1>
                <p class="mt-6 text-white/60 text-lg max-w-2xl leading-relaxed whitespace-pre-wrap">
                    {{ about.hero_subtitle }}
                </p>
            </div>
        </section>

        <!-- Stats -->
        <section class="bg-white border-b border-slate-100">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-14">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 divide-x divide-slate-100">
                    <div class="text-center px-4">
                        <div class="text-5xl font-bold text-[#0b1f3a]">5</div>
                        <div class="text-xs uppercase tracking-widest text-slate-400 mt-2 font-semibold">Business Units</div>
                    </div>
                    <div class="text-center px-4">
                        <div class="text-5xl font-bold text-[#0b1f3a]">{{ stats.employees }}</div>
                        <div class="text-xs uppercase tracking-widest text-slate-400 mt-2 font-semibold">Professionals</div>
                    </div>
                    <div class="text-center px-4">
                        <div class="text-5xl font-bold text-[#0b1f3a]">{{ stats.projects }}</div>
                        <div class="text-xs uppercase tracking-widest text-slate-400 mt-2 font-semibold">Projects Delivered</div>
                    </div>
                    <div class="text-center px-4">
                        <div class="text-5xl font-bold text-[#0b1f3a]">ADQ</div>
                        <div class="text-xs uppercase tracking-widest text-slate-400 mt-2 font-semibold">Backed By</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mission & Vision -->
        <section class="py-24 lg:py-32 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-start">
                    <div>
                        <SectionTitle
                            eyebrow="Our Purpose"
                            :title="about.purpose_title"
                        />
                        <p class="mt-6 text-slate-500 leading-relaxed whitespace-pre-wrap">{{ about.purpose_description }}</p>
                    </div>
                    <div class="space-y-4">
                        <div class="p-6 bg-[#0b1f3a] text-white">
                            <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-3">Our Mission</p>
                            <p class="text-white/80 leading-relaxed whitespace-pre-wrap">{{ about.mission }}</p>
                        </div>
                        <div class="p-6 bg-slate-50 border border-slate-100">
                            <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-3">Our Vision</p>
                            <p class="text-slate-600 leading-relaxed whitespace-pre-wrap">{{ about.vision }}</p>
                        </div>
                        <div class="p-6 bg-slate-50 border border-slate-100">
                            <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-3">Our Backing</p>
                            <p class="text-slate-600 leading-relaxed whitespace-pre-wrap">{{ about.backing }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Values -->
        <section class="py-24 lg:py-32 bg-slate-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <SectionTitle
                    eyebrow="Our Values"
                    title="The principles that guide everything we do."
                    :centered="true"
                />
                <div class="mt-16 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div v-for="value in about.values" :key="value.title" class="p-8 bg-white border border-slate-100 hover:shadow-md transition-shadow duration-300">
                        <div class="w-12 h-12 bg-[#0b1f3a]/5 rounded-sm flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-[#0b1f3a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" :d="value.icon" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-[#0b1f3a] mb-3">{{ value.title }}</h3>
                        <p class="text-sm text-slate-500 leading-relaxed">{{ value.desc }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Business Units Overview -->
        <section class="py-24 lg:py-32 bg-[#0b1f3a]">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <SectionTitle
                    eyebrow="Our Business Units"
                    title="Five specialised units. One integrated group."
                    :light="true"
                />
                <div class="mt-16 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div
                        v-for="unit in [
                            { name: 'e7 Security', desc: 'Secure printing and identity management for banking, government, telecom, retail, hospitality, and transport.' },
                            { name: 'e7 Packaging', desc: 'Innovative and environmentally friendly packaging solutions using state-of-the-art production technologies.' },
                            { name: 'e7 Printing', desc: 'A long-established regional powerhouse serving newspapers, magazines, books, and educational materials.' },
                            { name: 'e7 Education', desc: 'Innovative educational products and solutions for UAE public and private institutions, established 2019.' },
                            { name: 'Tawzea by e7', desc: 'Next-generation distribution and logistics with smart technology and integrated sustainability practices.' },
                        ]"
                        :key="unit.name"
                        class="p-6 bg-white/5 border border-white/10 hover:bg-white/10 transition-colors duration-200"
                    >
                        <div class="w-2 h-2 rounded-full bg-[#c9a84c] mb-4" />
                        <h3 class="text-base font-bold text-white mb-3">{{ unit.name }}</h3>
                        <p class="text-sm text-white/50 leading-relaxed">{{ unit.desc }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="bg-[#c9a84c] py-20">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-[#0b1f3a] mb-4">Explore our areas of expertise</h2>
                <p class="text-[#0b1f3a]/70 text-lg mb-8">Discover the five business units that make e7 Group your all-in-one partner.</p>
                <Link href="/capabilities" class="inline-flex items-center gap-2 px-10 py-4 bg-[#0b1f3a] text-white font-bold text-sm uppercase tracking-widest hover:bg-[#16304f] transition-colors duration-200">
                    See All
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </Link>
            </div>
        </section>
    </div>
</template>
