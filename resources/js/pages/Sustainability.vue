<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import SectionTitle from '@/components/corporate/SectionTitle.vue'

const pillars = [
    {
        icon: 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
        title: 'Environmental Responsibility',
        desc: 'We minimise our environmental footprint through sustainable material sourcing, energy-efficient production across all business units, waste reduction programmes, and a commitment to responsible operations.',
        initiatives: ['Sustainable material sourcing policy', 'Energy-efficient production processes', 'Zero-waste manufacturing initiatives', 'Environmentally friendly packaging solutions'],
    },
    {
        icon: 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
        title: 'Social Impact',
        desc: 'Our social responsibility extends beyond our workforce to the communities we operate in. We invest in education, skills development, and social programmes that create lasting positive impact across the UAE.',
        initiatives: ['UAE community development investments', 'Youth education sponsorships', 'Inclusive employment practices', 'Emiratization commitment'],
    },
    {
        icon: 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
        title: 'Corporate Governance',
        desc: 'Strong governance is the foundation of trust. Operating within ADQ\'s governance framework, we maintain transparent reporting, robust risk management, and a zero-tolerance policy for unethical conduct.',
        initiatives: ['ADQ governance framework compliance', 'Anti-corruption framework', 'Transparent ESG reporting', 'Independent ethics hotline (24/7)'],
    },
    {
        icon: 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
        title: 'Innovation for Good',
        desc: 'We channel our investment towards technologies that solve real-world problems — from identity systems that empower citizens to logistics innovations that reduce carbon emissions across the supply chain.',
        initiatives: ['R&D investment in sustainable technologies', 'Smart packaging for product integrity', 'Digital transformation initiatives', 'Sustainable logistics fleet programmes'],
    },
]

const certifications = [
    { title: 'ISO 9001:2015', subtitle: 'Quality Management Systems' },
    { title: 'ISO 14001:2015', subtitle: 'Environmental Management' },
    { title: 'ISO 27001:2022', subtitle: 'Information Security' },
    { title: 'ISO 45001:2018', subtitle: 'Occupational Health & Safety' },
    { title: 'ICAO Doc 9303', subtitle: 'Travel Document Compliance' },
    { title: 'Common Criteria', subtitle: 'Security Evaluation' },
]
</script>

<template>
    <div>
        <!-- Hero -->
        <section class="relative bg-[#0b1f3a] py-40 overflow-hidden">
            <div class="absolute inset-0">
                <img
                    src="https://images.unsplash.com/photo-1466611653911-95081537e5b7?w=1920&q=80&auto=format&fit=crop"
                    alt=""
                    class="w-full h-full object-cover opacity-20"
                    loading="lazy"
                />
                <div class="absolute inset-0 bg-gradient-to-b from-[#0b1f3a]/70 to-[#0b1f3a]" />
            </div>
            <div class="absolute inset-0 opacity-10" style="background: radial-gradient(ellipse at 60% 30%, rgba(34,197,94,0.4) 0%, transparent 65%);" />
            <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
                <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-4">ESG Commitment</p>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white max-w-3xl leading-tight">
                    Pioneering the future we want to see.
                </h1>
                <p class="mt-6 text-white/60 text-lg max-w-2xl leading-relaxed">
                    Sustainability is not a programme at e7 Group — it is a fundamental principle that shapes how we operate, innovate, and grow. We believe that the best businesses create lasting value for all stakeholders.
                </p>
            </div>
        </section>

        <!-- Pillars -->
        <section class="py-24 lg:py-32 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <SectionTitle
                    eyebrow="ESG Framework"
                    title="Four pillars of responsible practice."
                    subtitle="Our Environmental, Social, and Governance approach is structured around four interconnected pillars that guide our decisions across all five business units."
                />
                <div class="mt-16 space-y-16">
                    <div
                        v-for="(pillar, index) in pillars"
                        :key="pillar.title"
                        class="grid lg:grid-cols-2 gap-12 items-center"
                    >
                        <div :class="index % 2 !== 0 ? 'lg:order-2' : ''">
                            <div class="w-12 h-12 bg-[#0b1f3a]/5 rounded-sm flex items-center justify-center mb-6">
                                <svg class="w-6 h-6 text-[#0b1f3a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" :d="pillar.icon" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-[#0b1f3a] mb-4">{{ pillar.title }}</h3>
                            <p class="text-slate-500 leading-relaxed mb-6">{{ pillar.desc }}</p>
                        </div>
                        <div :class="index % 2 !== 0 ? 'lg:order-1' : ''" class="p-8 bg-slate-50 border border-slate-100">
                            <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-6">Key Initiatives</p>
                            <ul class="space-y-3">
                                <li v-for="initiative in pillar.initiatives" :key="initiative" class="flex items-center gap-3 text-sm text-slate-600">
                                    <div class="w-1.5 h-1.5 bg-[#c9a84c] rounded-full flex-none" />
                                    {{ initiative }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Certifications -->
        <section class="py-24 lg:py-32 bg-[#0b1f3a]">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <SectionTitle
                    eyebrow="Certifications & Standards"
                    title="Internationally recognised standards."
                    subtitle="Our operations are certified against the world's most rigorous standards — providing clients with confidence in our quality, security, and environmental practices."
                    :light="true"
                    :centered="true"
                />
                <div class="mt-16 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                    <div v-for="cert in certifications" :key="cert.title" class="p-6 bg-white/5 border border-white/10 text-center hover:bg-white/10 transition-colors duration-200">
                        <div class="text-lg font-bold text-[#c9a84c] mb-2">{{ cert.title }}</div>
                        <div class="text-xs text-white/40 leading-tight">{{ cert.subtitle }}</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="bg-[#c9a84c] py-20">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold text-[#0b1f3a] mb-4">Committed to a sustainable UAE.</h2>
                <p class="text-[#0b1f3a]/70 text-lg mb-8">Learn how our integrated solutions are built with sustainability at their core.</p>
                <Link href="/contact" class="inline-flex items-center gap-2 px-10 py-4 bg-[#0b1f3a] text-white font-bold text-sm uppercase tracking-widest hover:bg-[#16304f] transition-colors duration-200">
                    Get in Touch
                </Link>
            </div>
        </section>
    </div>
</template>
