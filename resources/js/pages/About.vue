<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import SectionTitle from '@/components/corporate/SectionTitle.vue'

defineProps<{
    stats: {
        founded: string
        countries: string
        employees: string
        projects: string
    }
}>()

const values = [
    {
        title: 'Integrity',
        desc: 'We operate with absolute transparency and the highest ethical standards in every engagement, every transaction, and every commitment we make.',
        icon: 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
    },
    {
        title: 'Excellence',
        desc: 'We pursue the highest quality in every solution — from the security features embedded in an identity document to the sustainability built into our packaging.',
        icon: 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z',
    },
    {
        title: 'Innovation',
        desc: 'Innovation drives us. We invest continuously in research and development, anticipating the evolving needs of businesses and institutions across the UAE.',
        icon: 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
    },
    {
        title: 'Partnership',
        desc: 'We build long-term partnerships with our clients — working as genuine partners invested in the success of the businesses and institutions we serve.',
        icon: 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z',
    },
]
</script>

<template>
    <div>
        <!-- Hero -->
        <section class="relative bg-[#0b1f3a] py-40 overflow-hidden">
            <div class="absolute inset-0">
                <img
                    src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=1920&q=80&auto=format&fit=crop"
                    alt=""
                    class="w-full h-full object-cover opacity-15"
                    loading="lazy"
                />
                <div class="absolute inset-0 bg-gradient-to-b from-[#0b1f3a]/80 to-[#0b1f3a]" />
            </div>
            <div class="absolute inset-0 opacity-10" style="background: radial-gradient(ellipse at 70% 50%, rgba(201,168,76,0.5) 0%, transparent 65%);" />
            <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
                <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-4">About e7 Group</p>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white max-w-3xl leading-tight">
                    An all-in-one partner for secure & smart solutions.
                </h1>
                <p class="mt-6 text-white/60 text-lg max-w-2xl leading-relaxed">
                    e7 Group is an Abu Dhabi-based company providing an innovative and diversified portfolio of printing, packaging, and distribution solutions that empower essential industries — backed by ADQ, one of the region's leading investment and holding companies.
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
                            title="Innovation and excellence in every solution."
                        />
                        <p class="mt-6 text-slate-500 leading-relaxed">
                            e7 Group exists to give businesses and institutions across the UAE the fully integrated solutions they need to operate efficiently and securely. Whether we are protecting a national identity infrastructure, enabling seamless logistics, or empowering the next generation through education — our purpose is the same: to deliver solutions that matter.
                        </p>
                        <p class="mt-4 text-slate-500 leading-relaxed">
                            With a proven track record of quality, reliability, and cutting-edge expertise, we anticipate the evolving needs of businesses and institutions — building long-term partnerships with the world's leading companies and governments.
                        </p>
                    </div>
                    <div class="space-y-4">
                        <div class="p-6 bg-[#0b1f3a] text-white">
                            <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-3">Our Mission</p>
                            <p class="text-white/80 leading-relaxed">
                                To deliver transformative, integrated solutions that empower essential industries — combining innovation, reliability, and excellence in every service we provide.
                            </p>
                        </div>
                        <div class="p-6 bg-slate-50 border border-slate-100">
                            <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-3">Our Vision</p>
                            <p class="text-slate-600 leading-relaxed">
                                To be the UAE's most trusted all-in-one partner for secure and smart solutions — recognised for our seamless integration, our people, and our commitment to building a better future.
                            </p>
                        </div>
                        <div class="p-6 bg-slate-50 border border-slate-100">
                            <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-3">Our Backing</p>
                            <p class="text-slate-600 leading-relaxed">
                                Backed by ADQ, one of the region's leading investment and holding companies, e7 Group has the strength and resources to deliver at scale across the UAE and beyond.
                            </p>
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
                    <div v-for="value in values" :key="value.title" class="p-8 bg-white border border-slate-100 hover:shadow-md transition-shadow duration-300">
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
