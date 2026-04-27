<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import SectionTitle from '@/components/corporate/SectionTitle.vue'
import { computed } from 'vue'
import { useTranslations } from '@/composables/useTranslations'

const { t, locale } = useTranslations()

const props = defineProps<{
    about: {
        hero_title: string | null;
        hero_title_ar: string | null;
        hero_subtitle: string | null;
        hero_subtitle_ar: string | null;
        hero_image: string | null;
        purpose_title: string | null;
        purpose_title_ar: string | null;
        purpose_description: string | null;
        purpose_description_ar: string | null;
        mission: string | null;
        mission_ar: string | null;
        vision: string | null;
        vision_ar: string | null;
        backing: string | null;
        backing_ar: string | null;
        values: Array<{ title: string; title_ar: string; desc: string; desc_ar: string; icon: string }> | null;
    } | null
    stats: {
        founded: string
        countries: string
        employees: string
        projects: string
    }
}>()

const defaultValues = [
    {
        title: 'Integrity',
        desc: 'We build lasting relationships through honest communication and dependable delivery.',
        icon: 'M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
    },
    {
        title: 'Excellence',
        desc: 'We hold our work to a high standard across every service, project, and partnership.',
        icon: 'M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.563.563 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z',
    },
    {
        title: 'Partnership',
        desc: 'We work closely with clients and partners to create practical, joined-up solutions.',
        icon: 'M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 9.094 9.094 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0z',
    },
    {
        title: 'Innovation',
        desc: 'We keep improving our methods, technology, and service experience.',
        icon: 'M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.311a7.5 7.5 0 01-3 0M12 2.25a6 6 0 00-3.75 10.687',
    },
]

const about = computed(() => {
    const isAr = locale.value === 'ar';
    return {
        hero_title: (isAr ? props.about?.hero_title_ar : props.about?.hero_title) || props.about?.hero_title || 'Trusted solutions for businesses across Saudi Arabia.',
        hero_subtitle:
            (isAr ? props.about?.hero_subtitle_ar : props.about?.hero_subtitle) ||
            props.about?.hero_subtitle ||
            'Amin Group brings together specialised capabilities, reliable operations, and long-term partnerships to support organisations with confidence.',
        hero_image: props.about?.hero_image || 'https://images.unsplash.com/photo-1486325212027-8081e485255e?w=1920&q=80',
        purpose_title: (isAr ? props.about?.purpose_title_ar : props.about?.purpose_title) || props.about?.purpose_title || 'Purpose-built support for ambitious organisations.',
        purpose_description:
            (isAr ? props.about?.purpose_description_ar : props.about?.purpose_description) ||
            props.about?.purpose_description ||
            'We help clients move from requirement to delivery with clear coordination, practical expertise, and a commitment to quality at every step.',
        mission:
            (isAr ? props.about?.mission_ar : props.about?.mission) ||
            props.about?.mission ||
            'To deliver dependable business solutions that help our clients operate, grow, and serve their customers better.',
        vision:
            (isAr ? props.about?.vision_ar : props.about?.vision) ||
            props.about?.vision ||
            'To be a trusted Saudi partner known for quality, reliability, and integrated service delivery.',
        backing:
            (isAr ? props.about?.backing_ar : props.about?.backing) ||
            props.about?.backing ||
            'Our work is strengthened by experienced teams, operational discipline, and partnerships with organisations that share our standards.',
        values: props.about?.values?.length 
            ? props.about.values.map(v => ({
                title: (isAr ? v.title_ar : v.title) || v.title,
                desc: (isAr ? v.desc_ar : v.desc) || v.desc,
                icon: v.icon
            })) 
            : defaultValues,
    }
})

const statValue = (value: string, fallback: string) => (value && value !== 'null' ? value : fallback)
const statItems = computed(() => [
    { value: '5', label: 'Business Units' },
    { value: statValue(props.stats.employees, '50+'), label: 'Professionals' },
    { value: statValue(props.stats.projects, '100+'), label: 'Projects Delivered' },
    { value: statValue(props.stats.countries, 'KSA'), label: 'Markets Served' },
])

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
                    <div
                        v-for="stat in statItems"
                        :key="stat.label"
                        class="text-center px-4"
                    >
                        <div class="text-5xl font-bold text-[#0b1f3a]">{{ stat.value }}</div>
                        <div class="text-xs uppercase tracking-widest text-slate-400 mt-2 font-semibold">{{ stat.label }}</div>
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
