<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import { ref, onMounted } from 'vue'
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
    partners: Array<{
        id: number
        name: string
        logo: string | null
        website: string
    }>
    stats: {
        founded: string
        countries: string
        employees: string
        projects: string
    }
}>()

const isVisible = ref(false)
onMounted(() => {
    setTimeout(() => { isVisible.value = true }, 100)
})
</script>

<template>
    <div>
        <!-- Hero Section -->
        <section class="relative min-h-screen flex items-center overflow-hidden bg-[#0b1f3a]">
            <!-- Background photo -->
            <div class="absolute inset-0">
                <img
                    src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=1920&q=80&auto=format&fit=crop"
                    alt=""
                    class="w-full h-full object-cover opacity-20"
                    loading="eager"
                />
                <div class="absolute inset-0 bg-gradient-to-r from-[#0b1f3a] via-[#0b1f3a]/90 to-[#0b1f3a]/60" />
            </div>

            <!-- Gold accent -->
            <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-bl from-[#c9a84c]/10 to-transparent pointer-events-none" />

            <!-- Content -->
            <div class="relative max-w-7xl mx-auto px-6 lg:px-8 pt-32 pb-20">
                <div class="max-w-4xl">
                    <Transition
                        appear
                        enter-active-class="transition-all duration-1000 ease-out"
                        enter-from-class="opacity-0 translate-y-8"
                        enter-to-class="opacity-100 translate-y-0"
                    >
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-6">
                                Abu Dhabi, UAE · Backed by ADQ
                            </p>
                            <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-[1.05] tracking-tight mb-8">
                                Trusted Solutions<br />
                                <span class="text-[#c9a84c]">for Your Business</span><br />
                                Across the UAE.
                            </h1>
                            <p class="text-lg md:text-xl text-white/60 leading-relaxed max-w-2xl mb-10">
                                From identity solutions to printing, packaging and delivery, we provide seamless integrated solutions — designed for maximum efficiency and always focused on our clients' success.
                            </p>
                            <div class="flex flex-wrap gap-4">
                                <Link
                                    href="/capabilities"
                                    class="px-8 py-4 bg-[#c9a84c] text-[#0b1f3a] font-bold text-sm uppercase tracking-widest hover:bg-[#d4b366] transition-colors duration-200"
                                >
                                    Areas of Expertise
                                </Link>
                                <Link
                                    href="/contact"
                                    class="px-8 py-4 border border-white/30 text-white font-semibold text-sm uppercase tracking-widest hover:bg-white/10 transition-colors duration-200"
                                >
                                    Get in Touch
                                </Link>
                            </div>
                        </div>
                    </Transition>
                </div>
            </div>

            <!-- Scroll indicator -->
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-white/30">
                <span class="text-xs uppercase tracking-widest">Scroll</span>
                <div class="w-px h-12 bg-gradient-to-b from-white/30 to-transparent animate-pulse" />
            </div>
        </section>

        <!-- Stats Section -->
        <section class="bg-white border-b border-slate-100">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-bold text-[#0b1f3a] mb-2">5</div>
                        <div class="text-xs uppercase tracking-widest text-slate-400 font-semibold">Business Units</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-bold text-[#0b1f3a] mb-2">{{ stats.employees }}</div>
                        <div class="text-xs uppercase tracking-widest text-slate-400 font-semibold">Professionals</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-bold text-[#0b1f3a] mb-2">{{ stats.projects }}</div>
                        <div class="text-xs uppercase tracking-widest text-slate-400 font-semibold">Projects Delivered</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-bold text-[#0b1f3a] mb-2">ADQ</div>
                        <div class="text-xs uppercase tracking-widest text-slate-400 font-semibold">Backed By</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Introduction Section -->
        <section class="py-24 lg:py-32 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 lg:gap-24 items-center">
                    <div>
                        <SectionTitle
                            eyebrow="Who We Are"
                            title="Seamless integration at your service."
                            subtitle="From identity solutions and secure printing to packaging, education, and logistics, our seamless, integrated services work effortlessly together — designed for maximum efficiency and always focused on our clients' success."
                        />
                        <div class="mt-8 space-y-4 text-slate-500 leading-relaxed">
                            <p>e7 Group operates as a comprehensive business solutions provider offering an innovative and diversified portfolio of printing, packaging, and distribution solutions that empower essential industries.</p>
                            <p>Backed by the strength of ADQ, one of the region's leading investment and holding companies, we build long-term partnerships with the world's leading companies and governments — combining deep sector expertise with a relentless commitment to quality and innovation.</p>
                        </div>
                        <Link href="/about" class="inline-flex items-center gap-2 mt-8 text-sm font-semibold text-[#0b1f3a] hover:text-[#c9a84c] transition-colors duration-200 group">
                            <span>View more about us</span>
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </Link>
                    </div>
                    <div class="relative">
                        <div class="aspect-[4/3] rounded-sm overflow-hidden">
                            <img
                                src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&q=80&auto=format&fit=crop"
                                alt="e7 Group operations"
                                class="w-full h-full object-cover"
                                loading="lazy"
                            />
                        </div>
                        <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-[#c9a84c] opacity-30 rounded-sm" />
                        <div class="absolute -top-4 -left-4 w-12 h-12 border-2 border-[#c9a84c] opacity-40 rounded-sm" />
                    </div>
                </div>
            </div>
        </section>

        <!-- Business Units Section -->
        <section class="py-24 lg:py-32 bg-slate-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="mb-16">
                    <SectionTitle
                        eyebrow="Areas of Expertise"
                        title="Five business units. One seamless vision."
                        subtitle="Each business unit delivers specialised expertise across its domain — working in concert to provide comprehensive, integrated solutions for the most demanding clients in the UAE and beyond."
                    />
                </div>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <DivisionCard
                        v-for="(division, index) in divisions"
                        :key="division.id"
                        :division="division"
                        :index="index"
                    />
                </div>
                <div class="mt-12 text-center">
                    <Link href="/capabilities" class="inline-flex items-center gap-2 px-8 py-4 border border-[#0b1f3a] text-[#0b1f3a] font-semibold text-sm uppercase tracking-widest hover:bg-[#0b1f3a] hover:text-white transition-colors duration-300">
                        See All Business Units
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </Link>
                </div>
            </div>
        </section>

        <!-- ESG Section -->
        <section class="py-24 lg:py-32 bg-[#0b1f3a] relative overflow-hidden">
            <div class="absolute inset-0 opacity-5">
                <div class="absolute inset-0" style="background: radial-gradient(ellipse at 80% 50%, rgba(201,168,76,0.4) 0%, transparent 60%);" />
            </div>
            <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <SectionTitle
                            eyebrow="ESG Commitment"
                            title="Pioneering the future we want to see."
                            subtitle="Our commitment to environmental, social, and governance excellence runs through every decision we make — from the materials we select to the processes we design and the communities we serve."
                            :light="true"
                        />
                        <div class="mt-8 space-y-6">
                            <div v-for="item in [
                                { title: 'Environmental Stewardship', desc: 'Reducing our environmental footprint through responsible sourcing, waste minimisation, and energy-efficient operations across all business units.' },
                                { title: 'Social Responsibility', desc: 'Investing in communities, championing diversity, and fostering inclusive workplaces that reflect the UAE society we serve.' },
                                { title: 'Governance & Integrity', desc: 'Operating with the highest standards of transparency, ethics, and regulatory compliance, consistent with ADQ\'s governance framework.' },
                            ]" :key="item.title" class="flex gap-4">
                                <div class="w-1 flex-none bg-[#c9a84c] rounded-full" />
                                <div>
                                    <h4 class="text-white font-semibold mb-1">{{ item.title }}</h4>
                                    <p class="text-white/50 text-sm leading-relaxed">{{ item.desc }}</p>
                                </div>
                            </div>
                        </div>
                        <Link href="/sustainability" class="inline-flex items-center gap-2 mt-10 text-[#c9a84c] font-semibold text-sm hover:text-[#d4b366] transition-colors duration-200 group">
                            <span>Our ESG commitment</span>
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </Link>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div v-for="item in [
                            { value: 'ISO 9001', label: 'Quality Management' },
                            { value: 'ISO 14001', label: 'Environmental Management' },
                            { value: 'ISO 27001', label: 'Information Security' },
                            { value: 'ICAO', label: 'Document Compliance' },
                        ]" :key="item.value" class="bg-white/5 border border-white/10 p-6 text-center hover:bg-white/10 transition-colors duration-200">
                            <div class="text-2xl font-bold text-[#c9a84c] mb-2">{{ item.value }}</div>
                            <div class="text-xs text-white/50 uppercase tracking-wider">{{ item.label }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Partners Section -->
        <section class="py-24 lg:py-32 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <SectionTitle
                    eyebrow="Trusted By"
                    title="Global partners. Regional expertise."
                    subtitle="We collaborate with the world's leading companies and institutions to deliver best-in-class integrated solutions across the UAE."
                    :centered="true"
                />
                <div class="mt-16 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    <div
                        v-for="partner in partners"
                        :key="partner.id"
                        class="h-16 bg-slate-50 border border-slate-100 flex items-center justify-center px-4 hover:border-slate-300 transition-colors duration-200"
                    >
                        <span class="text-sm font-semibold text-slate-400 text-center leading-tight">{{ partner.name }}</span>
                    </div>
                </div>
                <div class="mt-10 text-center">
                    <Link href="/partners" class="text-sm font-semibold text-[#0b1f3a] hover:text-[#c9a84c] transition-colors duration-200 inline-flex items-center gap-1">
                        <span>View all partners</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </Link>
                </div>
            </div>
        </section>

        <!-- CTA Banner -->
        <section class="bg-[#c9a84c] py-20">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-[#0b1f3a] mb-4">
                    Ready to discuss your requirements?
                </h2>
                <p class="text-[#0b1f3a]/70 text-lg mb-8 max-w-xl mx-auto">
                    Our specialists are ready to understand your needs and engineer the right integrated solution for your business.
                </p>
                <Link
                    href="/contact"
                    class="inline-flex items-center gap-2 px-10 py-4 bg-[#0b1f3a] text-white font-bold text-sm uppercase tracking-widest hover:bg-[#16304f] transition-colors duration-200"
                >
                    Contact Us
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </Link>
            </div>
        </section>
    </div>
</template>
