<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import SectionTitle from '@/components/corporate/SectionTitle.vue'

const props = defineProps<{
    partnersByCategory: Record<string, Array<{
        id: number
        name: string
        logo: string | null
        website: string
        category: string
    }>>
}>()

const categoryLabels: Record<string, string> = {
    technology: 'Technology Partners',
    government: 'Government & Institutional',
    finance: 'Financial & Standards Bodies',
    general: 'Strategic Partners',
}
</script>

<template>
    <div>
        <!-- Hero -->
        <section class="relative bg-[#0b1f3a] py-40 overflow-hidden">
            <div class="absolute inset-0">
                <img
                    src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1920&q=80&auto=format&fit=crop"
                    alt=""
                    class="w-full h-full object-cover opacity-15"
                    loading="lazy"
                />
                <div class="absolute inset-0 bg-gradient-to-b from-[#0b1f3a]/80 to-[#0b1f3a]" />
            </div>
            <div class="absolute inset-0 opacity-10" style="background: radial-gradient(ellipse at 50% 50%, rgba(201,168,76,0.5) 0%, transparent 65%);" />
            <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
                <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-4">Our Partners</p>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white max-w-3xl leading-tight">
                    Trusted partnerships. Shared excellence.
                </h1>
                <p class="mt-6 text-white/60 text-lg max-w-2xl leading-relaxed">
                    Our global network of technology partners, institutional collaborators, and strategic allies enables us to deliver best-in-class solutions — combining our regional expertise with world-leading capabilities.
                </p>
            </div>
        </section>

        <!-- Partnership Philosophy -->
        <section class="py-24 lg:py-32 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <SectionTitle
                            eyebrow="How We Partner"
                            title="Relationships built on mutual excellence."
                        />
                        <p class="mt-6 text-slate-500 leading-relaxed">
                            We approach partnerships with the same rigour we apply to our client engagements. We work exclusively with partners who share our commitment to quality, security, and integrity — organisations whose capabilities genuinely complement our own.
                        </p>
                        <p class="mt-4 text-slate-500 leading-relaxed">
                            Our partnerships are not transactional. They are long-term relationships built on shared values, mutual accountability, and a genuine desire to deliver the best possible outcomes for our shared clients.
                        </p>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div v-for="stat in [
                            { value: '30+', label: 'Global Partners' },
                            { value: '15+', label: 'Years Average Partnership' },
                            { value: '40+', label: 'Joint Projects' },
                        ]" :key="stat.label" class="col-span-1 p-6 bg-slate-50 border border-slate-100 text-center">
                            <div class="text-3xl font-bold text-[#0b1f3a] mb-1">{{ stat.value }}</div>
                            <div class="text-xs uppercase tracking-wider text-slate-400">{{ stat.label }}</div>
                        </div>
                        <div class="col-span-3 p-6 bg-[#0b1f3a] text-center">
                            <p class="text-white/70 text-sm italic">
                                "Our partners are chosen for their excellence — and they hold us to the same standard."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Partners by Category -->
        <section class="py-24 lg:py-32 bg-slate-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <SectionTitle
                    eyebrow="Partner Directory"
                    title="Our global partner network."
                />
                <div class="mt-16 space-y-16">
                    <div v-for="(partners, category) in partnersByCategory" :key="category">
                        <h3 class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-6">
                            {{ categoryLabels[category as string] ?? category }}
                        </h3>
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                            <div
                                v-for="partner in partners"
                                :key="partner.id"
                                class="h-20 bg-white border border-slate-100 flex items-center justify-center px-4 hover:border-slate-300 hover:shadow-sm transition-all duration-200"
                            >
                                <span class="text-sm font-semibold text-slate-500 text-center leading-tight">{{ partner.name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Become a Partner -->
        <section class="py-24 lg:py-32 bg-[#0b1f3a]">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="max-w-2xl">
                    <SectionTitle
                        eyebrow="Partner with Us"
                        title="Interested in a partnership?"
                        subtitle="We are always open to exploring new partnerships with organisations that share our values and bring genuine complementary capability."
                        :light="true"
                    />
                    <Link href="/contact" class="inline-flex items-center gap-2 mt-10 px-8 py-4 bg-[#c9a84c] text-[#0b1f3a] font-bold text-sm uppercase tracking-widest hover:bg-[#d4b366] transition-colors duration-200">
                        Enquire About Partnership
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </Link>
                </div>
            </div>
        </section>
    </div>
</template>
