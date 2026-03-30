<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import SectionTitle from '@/components/corporate/SectionTitle.vue'

const standards = [
    {
        code: 'ISO 9001:2015',
        name: 'Quality Management Systems',
        desc: 'Our quality management system ensures consistent, high-quality delivery across all divisions — from initial design through to final product and service delivery.',
        color: '#0f2d4a',
    },
    {
        code: 'ISO 27001:2022',
        name: 'Information Security Management',
        desc: 'We protect client data and sensitive information with internationally recognised information security controls — essential for our work with sovereign governments and financial institutions.',
        color: '#1a3a2a',
    },
    {
        code: 'ISO 14001:2015',
        name: 'Environmental Management',
        desc: 'Our environmental management system drives continuous improvement in our environmental performance, reducing waste, emissions, and resource consumption across our facilities.',
        color: '#2d1a3a',
    },
    {
        code: 'ICAO Doc 9303',
        name: 'Machine Readable Travel Documents',
        desc: 'Full compliance with international standards for biometric passports, travel documents, and other machine-readable identity credentials issued by government clients.',
        color: '#3a2a0a',
    },
    {
        code: 'Common Criteria',
        name: 'IT Security Evaluation',
        desc: 'Our identity and digital trust solutions are evaluated against Common Criteria standards — the globally recognised framework for IT security certification.',
        color: '#0a2a3a',
    },
    {
        code: 'GMP',
        name: 'Good Manufacturing Practice',
        desc: 'Our packaging facilities operate under GMP guidelines, ensuring the highest levels of quality control for pharmaceutical and regulated product packaging.',
        color: '#2a0a0a',
    },
]

const qcProcess = [
    { step: '01', title: 'Requirements Analysis', desc: 'Rigorous review of client specifications, regulatory requirements, and applicable standards before any project commences.' },
    { step: '02', title: 'Design Review', desc: 'Multi-stage design review process with independent verification to ensure specifications are correctly translated into design.' },
    { step: '03', title: 'Production Controls', desc: 'In-line quality checks at every production stage with automated and manual inspection protocols and full traceability.' },
    { step: '04', title: 'Final Inspection', desc: 'Comprehensive final inspection against all requirements before shipment, with documented quality records retained.' },
    { step: '05', title: 'Continuous Improvement', desc: 'Post-delivery review and non-conformance management drives continuous improvement across all our processes.' },
]
</script>

<template>
    <div>
        <!-- Hero -->
        <section class="relative bg-[#0b1f3a] py-40 overflow-hidden">
            <div class="absolute inset-0">
                <img
                    src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=1920&q=80&auto=format&fit=crop"
                    alt=""
                    class="w-full h-full object-cover opacity-15"
                    loading="lazy"
                />
                <div class="absolute inset-0 bg-gradient-to-b from-[#0b1f3a]/80 to-[#0b1f3a]" />
            </div>
            <div class="absolute inset-0 opacity-10" style="background: radial-gradient(ellipse at 70% 40%, rgba(201,168,76,0.5) 0%, transparent 65%);" />
            <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
                <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-4">Quality & Compliance</p>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white max-w-3xl leading-tight">
                    Uncompromising quality. Absolute compliance.
                </h1>
                <p class="mt-6 text-white/60 text-lg max-w-2xl leading-relaxed">
                    Our clients operate in some of the world's most regulated and demanding environments. Our quality and compliance frameworks are designed to meet — and exceed — their most exacting requirements.
                </p>
            </div>
        </section>

        <!-- Intro -->
        <section class="py-24 lg:py-32 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <SectionTitle
                            eyebrow="Our Approach"
                            title="Quality is not a department. It is a culture."
                        />
                        <p class="mt-6 text-slate-500 leading-relaxed">
                            At Amin Group, quality is embedded in everything we do — from the people we hire and the suppliers we select, to the processes we design and the metrics we measure. It is a commitment that pervades every division and every project.
                        </p>
                        <p class="mt-4 text-slate-500 leading-relaxed">
                            We hold internationally recognised certifications across quality, information security, environmental management, and industry-specific standards — providing our clients with the assurance they need to trust us with their most critical requirements.
                        </p>
                    </div>
                    <div class="rounded-sm overflow-hidden aspect-[4/3]">
                        <img
                            src="https://images.unsplash.com/photo-1563986768494-4dee2763ff3f?w=900&q=80&auto=format&fit=crop"
                            alt="Quality assurance"
                            class="w-full h-full object-cover"
                            loading="lazy"
                        />
                    </div>
                </div>
            </div>
        </section>

        <!-- Standards -->
        <section class="py-24 lg:py-32 bg-slate-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <SectionTitle
                    eyebrow="Certifications"
                    title="Certified to the world's highest standards."
                    subtitle="Our multi-division operations are certified against a comprehensive set of international standards."
                />
                <div class="mt-16 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div
                        v-for="standard in standards"
                        :key="standard.code"
                        class="p-8 bg-white border border-slate-100 hover:shadow-md transition-shadow duration-300"
                    >
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-1 h-8 rounded-full" :style="{ backgroundColor: standard.color }" />
                            <div>
                                <div class="font-bold text-sm" :style="{ color: standard.color }">{{ standard.code }}</div>
                                <div class="text-xs text-slate-400">{{ standard.name }}</div>
                            </div>
                        </div>
                        <p class="text-sm text-slate-500 leading-relaxed">{{ standard.desc }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- QC Process -->
        <section class="py-24 lg:py-32 bg-[#0b1f3a]">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <SectionTitle
                    eyebrow="Quality Process"
                    title="End-to-end quality control."
                    subtitle="A structured, documented quality control process applied to every project — regardless of scale or complexity."
                    :light="true"
                />
                <div class="mt-16 relative">
                    <div class="hidden lg:block absolute top-12 left-0 right-0 h-px bg-white/10" />
                    <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-8">
                        <div v-for="step in qcProcess" :key="step.step" class="relative">
                            <div class="w-10 h-10 bg-[#c9a84c] text-[#0b1f3a] font-black text-sm flex items-center justify-center mb-6 relative z-10">
                                {{ step.step }}
                            </div>
                            <h4 class="font-bold text-white mb-3">{{ step.title }}</h4>
                            <p class="text-sm text-white/50 leading-relaxed">{{ step.desc }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="bg-[#c9a84c] py-20">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold text-[#0b1f3a] mb-4">Require documentation or an audit?</h2>
                <p class="text-[#0b1f3a]/70 text-lg mb-8">Contact our quality team — we are happy to provide certification documentation and answer compliance questions.</p>
                <Link href="/contact" class="inline-flex items-center gap-2 px-10 py-4 bg-[#0b1f3a] text-white font-bold text-sm uppercase tracking-widest hover:bg-[#16304f] transition-colors duration-200">
                    Contact Our Quality Team
                </Link>
            </div>
        </section>
    </div>
</template>
