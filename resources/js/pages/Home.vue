<script setup lang="ts">
import ContactForm from '@/components/corporate/ContactForm.vue';
import { usePage } from '@inertiajs/vue3';
import {
    ArrowRight,
    Building2,
    CheckCircle2,
    ChevronRight,
    Factory,
    Fingerprint,
    GraduationCap,
    Leaf,
    Mail,
    MapPin,
    Package,
    Phone,
    Printer,
    ShieldCheck,
    Truck,
} from 'lucide-vue-next';
import { computed } from 'vue';
import { useTranslations } from '@/composables/useTranslations';

type Service = {
    id: number;
    title: string;
    description: string;
};

type Division = {
    id: number;
    name: string;
    slug: string;
    tagline: string | null;
    description: string | null;
    hero_image: string | null;
    color: string | null;
    order: number;
    services: Service[];
};

type Partner = {
    id: number;
    name: string;
    logo: string | null;
    website: string;
};

const props = defineProps<{
    about: {
        home_title: string | null;
        home_text: string | null;
        home_image: string | null;
    } | null;
    divisions: Division[];
    partners: Partner[];
    stats: {
        founded: string;
        countries: string;
        employees: string;
        projects: string;
    };
}>();

const page = usePage();
const appName = computed(() => (page.props.name as string) || 'IDEXA Group');
const settings = computed(() => page.props.settings as Record<string, string>);

const { t } = useTranslations();

const fallbackDivisions: Division[] = [
    {
        id: -1,
        name: 'IDEXA Security',
        slug: 'security',
        tagline:
            'Secure identity, credentials, and data protection for critical operations.',
        description:
            'High-security identity, authentication, and personalization solutions for government, banking, telecom, travel, and enterprise environments.',
        hero_image:
            'https://images.unsplash.com/photo-1614064641938-3bbee52942c7?w=1200&q=80&auto=format&fit=crop',
        color: '#0e7490',
        order: 1,
        services: [
            { id: -11, title: 'Secure ID production', description: '' },
            { id: -12, title: 'Card personalization', description: '' },
            { id: -13, title: 'Biometric authentication', description: '' },
        ],
    },
    {
        id: -2,
        name: 'IDEXA Packaging',
        slug: 'packaging',
        tagline: 'Sustainable, protective, and brand-ready packaging systems.',
        description:
            'Advanced packaging programs that combine material performance, product protection, anti-counterfeit features, and sustainability.',
        hero_image:
            'https://images.unsplash.com/photo-1565793298595-6a879b1d9492?w=1200&q=80&auto=format&fit=crop',
        color: '#247857',
        order: 2,
        services: [
            { id: -21, title: 'Sustainable packaging', description: '' },
            { id: -22, title: 'Track and trace', description: '' },
            { id: -23, title: 'Brand protection', description: '' },
        ],
    },
    {
        id: -3,
        name: 'IDEXA Printing',
        slug: 'printing',
        tagline: 'Commercial and secure print production at dependable scale.',
        description:
            'Premium printing for publications, education, official documents, large-format campaigns, and secure business communications.',
        hero_image:
            'https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?w=1200&q=80&auto=format&fit=crop',
        color: '#9f6b1d',
        order: 3,
        services: [
            { id: -31, title: 'Security printing', description: '' },
            { id: -32, title: 'Commercial print', description: '' },
            { id: -33, title: 'Variable data', description: '' },
        ],
    },
    {
        id: -4,
        name: 'IDEXA Education',
        slug: 'education',
        tagline: 'Learning products and consulting for modern institutions.',
        description:
            'Educational content, institutional supplies, learning systems, and consulting support for public and private education teams.',
        hero_image:
            'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=1200&q=80&auto=format&fit=crop',
        color: '#384d91',
        order: 4,
        services: [
            { id: -41, title: 'Curriculum support', description: '' },
            { id: -42, title: 'Learning systems', description: '' },
            { id: -43, title: 'Institutional supply', description: '' },
        ],
    },
    {
        id: -5,
        name: 'Tawzea by IDEXA',
        slug: 'tawzea',
        tagline:
            'Smart distribution and logistics with operational visibility.',
        description:
            'End-to-end distribution, warehousing, tracking, and delivery services designed for sensitive, high-value, and time-critical work.',
        hero_image:
            'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=1200&q=80&auto=format&fit=crop',
        color: '#0f766e',
        order: 5,
        services: [
            { id: -51, title: 'Nationwide delivery', description: '' },
            { id: -52, title: 'Warehouse management', description: '' },
            { id: -53, title: 'Track and trace', description: '' },
        ],
    },
];

const fallbackPartners: Partner[] = [
    { id: -1, name: 'Thales Group', logo: null, website: '#' },
    { id: -2, name: 'IDEMIA', logo: null, website: '#' },
    { id: -3, name: 'HID Global', logo: null, website: '#' },
    { id: -4, name: 'SITA', logo: null, website: '#' },
    { id: -5, name: 'SGS Group', logo: null, website: '#' },
    { id: -6, name: 'Giesecke+Devrient', logo: null, website: '#' },
];

const landingDivisions = computed(() =>
    props.divisions?.length ? props.divisions : fallbackDivisions,
);
const featuredPartners = computed(() =>
    props.partners?.length ? props.partners.slice(0, 8) : fallbackPartners,
);

const about = computed(() => ({
    home_title:
        props.about?.home_title ||
        `${appName.value} brings critical business services into one coordinated group.`,
    home_text:
        props.about?.home_text ||
        'From secure identity and specialized printing to packaging, education, and logistics, we help organizations move faster with reliable execution and one connected delivery partner.',
    home_image:
        props.about?.home_image ||
        '/images/modern_control_center.png',
}));

const statValue = (value: string | undefined, fallback: string) =>
    value && value !== 'null' ? value : fallback;
const backingLabel = computed(() =>
    /^\d{4}/.test(props.stats?.founded || '') ? t('Founded') : t('Backed By'),
);
const statItems = computed(() => [
    { value: statValue(props.stats?.founded, 'ADQ'), label: backingLabel.value },
    { value: statValue(props.stats?.countries, 'KSA+'), label: t('Market Reach') },
    {
        value: statValue(props.stats?.employees, '1,000+'),
        label: t('Professionals'),
    },
    {
        value: statValue(props.stats?.projects, '500+'),
        label: t('Projects Delivered'),
    },
]);

const processSteps = computed(() => [
    {
        title: t('Map the requirement'),
        text: t('We clarify the operational, compliance, delivery, and customer experience needs before recommending a path.'),
    },
    {
        title: t('Design the solution'),
        text: t('Specialists from the right business units shape the scope, process, material, data, and service model.'),
    },
    {
        title: t('Execute with control'),
        text: t('Production, personalization, fulfillment, and delivery are coordinated through accountable operating teams.'),
    },
    {
        title: t('Improve continuously'),
        text: t('Performance signals, client feedback, and quality checks feed the next round of operational improvement.'),
    },
]);

const commitments = computed(() => [
    {
        title: t('Secure by design'),
        text: t('Sensitive data, documents, credentials, and materials are handled with strict process discipline.'),
        icon: ShieldCheck,
    },
    {
        title: t('Built for scale'),
        text: t('Programs are planned for dependable volume, repeatable delivery, and cross-unit coordination.'),
        icon: Factory,
    },
    {
        title: t('Sustainability in motion'),
        text: t('Materials, routing, packaging, and production choices are shaped around lower waste and smarter resource use.'),
        icon: Leaf,
    },
]);

const divisionIcon = (name: string) => {
    const lowerName = name.toLowerCase();

    if (lowerName.includes('security')) return Fingerprint;
    if (lowerName.includes('packaging')) return Package;
    if (lowerName.includes('printing')) return Printer;
    if (lowerName.includes('education')) return GraduationCap;
    if (lowerName.includes('tawzea') || lowerName.includes('logistics'))
        return Truck;

    return Building2;
};

const excerpt = (value: string | null, limit = 150) => {
    const text = value?.trim();

    if (!text) {
        return 'Specialized services delivered by experienced teams with dependable execution.';
    }

    return text.length > limit ? `${text.slice(0, limit).trim()}...` : text;
};

const phoneHref = computed(
    () =>
        `tel:${(settings.value.phone || '+966000000000').replace(/[^\d+]/g, '')}`,
);
const emailHref = computed(
    () => `mailto:${settings.value.email || 'info@idexa.sa'}`,
);
</script>

<template>
    <div class="bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-50 selection:bg-cyan-500/30 overflow-x-hidden transition-colors duration-300">
        
        <!-- Hero Section -->
        <section id="top" class="relative min-h-screen flex items-center justify-center overflow-hidden">
            <div class="absolute inset-0 z-0">
                <img src="/images/hero_background.png" class="w-full h-full object-cover scale-105 animate-[pulse_20s_ease-in-out_infinite]" alt="Hero Background">
                <div class="absolute inset-0 bg-white/70 dark:bg-slate-950/80 backdrop-blur-[2px] transition-colors duration-300"></div>
                <!-- Glowing Orbs / Gradient -->
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(6,182,212,0.15)_0%,transparent_60%)]"></div>
            </div>

            <div class="relative z-10 mx-auto max-w-7xl px-6 lg:px-8 pt-32 pb-20 text-center">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-cyan-500/30 bg-cyan-500/10 backdrop-blur-md mb-8 shadow-[0_0_15px_rgba(6,182,212,0.1)] dark:shadow-[0_0_15px_rgba(6,182,212,0.2)]">
                    <span class="w-2 h-2 rounded-full bg-cyan-600 dark:bg-cyan-400 animate-pulse"></span>
                    <span class="text-xs font-bold tracking-[0.2em] text-cyan-700 dark:text-cyan-400 uppercase">{{ appName }}</span>
                </div>
                
                <h1 class="mx-auto max-w-5xl text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-bold tracking-tight text-slate-900 dark:text-white uppercase leading-[1.1] transition-colors duration-300">
                    {{ t('Secure identity, print,') }} <br class="hidden md:block"/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-600 to-teal-500 dark:from-cyan-400 dark:to-teal-200 drop-shadow-[0_0_10px_rgba(6,182,212,0.2)] dark:drop-shadow-[0_0_20px_rgba(34,211,238,0.4)]">
                        {{ t('packaging.') }}
                    </span>
                </h1>
                
                <p class="mx-auto mt-8 max-w-2xl text-lg md:text-xl text-slate-700 dark:text-slate-300 font-light leading-relaxed transition-colors duration-300">
                    {{ t('A single landing point for specialized business services across Saudi Arabia, built for organizations that need precision, reliability, and accountable delivery.') }}
                </p>
                
                <div class="mt-12 mb-12 flex flex-col sm:flex-row items-center justify-center gap-5">
                    <a href="#contact" class="group relative inline-flex items-center justify-center gap-3 rounded-full bg-cyan-600 dark:bg-cyan-500 px-8 py-4 text-sm font-bold tracking-widest text-white dark:text-slate-950 uppercase transition-all duration-300 hover:bg-cyan-500 dark:hover:bg-cyan-400 hover:scale-105 hover:shadow-[0_0_20px_rgba(6,182,212,0.4)] dark:hover:shadow-[0_0_30px_rgba(6,182,212,0.5)]">
                        {{ t('Start a Project') }}
                        <ArrowRight class="h-4 w-4 transition-transform group-hover:translate-x-1 rtl:rotate-180 rtl:group-hover:-translate-x-1" />
                    </a>
                    <a href="#expertise" class="group inline-flex items-center justify-center gap-3 rounded-full border border-slate-300 dark:border-slate-700 bg-white/50 dark:bg-slate-900/50 backdrop-blur-sm px-8 py-4 text-sm font-bold tracking-widest text-slate-800 dark:text-white uppercase transition-all duration-300 hover:border-cyan-500/50 hover:bg-cyan-50 dark:hover:bg-cyan-500/10 hover:text-cyan-700 dark:hover:text-cyan-400 hover:shadow-[0_0_15px_rgba(6,182,212,0.1)] dark:hover:shadow-[0_0_20px_rgba(6,182,212,0.2)]">
                        {{ t('Explore Capabilities') }}
                        <ChevronRight class="h-4 w-4 transition-transform group-hover:translate-x-1 rtl:rotate-180 rtl:group-hover:-translate-x-1" />
                    </a>
                </div>
            </div>
        </section>

        <!-- Stats Section (Floating Glass Cards) -->
        <section class="relative z-20 -mt-24 px-6 lg:px-8">
            <div class="mx-auto max-w-7xl">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
                    <div v-for="stat in statItems" :key="stat.label" class="rounded-2xl border border-slate-200 dark:border-white/10 bg-white/80 dark:bg-slate-900/60 backdrop-blur-xl p-6 md:p-8 text-center transition-all duration-500 hover:-translate-y-2 hover:border-cyan-400 dark:hover:border-cyan-500/40 hover:shadow-[0_10px_30px_rgba(6,182,212,0.1)] dark:hover:shadow-[0_10px_40px_rgba(6,182,212,0.15)] group">
                        <div class="text-3xl md:text-5xl font-bold text-slate-900 dark:text-white group-hover:text-cyan-600 dark:group-hover:text-cyan-400 transition-colors drop-shadow-[0_0_10px_rgba(6,182,212,0)] group-hover:drop-shadow-[0_0_10px_rgba(6,182,212,0.2)] dark:group-hover:drop-shadow-[0_0_15px_rgba(34,211,238,0.5)]">
                            <span dir="ltr" class="inline-block">{{ stat.value }}</span>
                        </div>
                        <div class="mt-3 text-xs md:text-sm font-bold tracking-[0.15em] text-slate-500 dark:text-slate-400 uppercase transition-colors">
                            {{ stat.label }}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About/Delivery Model -->
        <section id="about" class="scroll-mt-24 py-24 lg:py-32 relative">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid lg:grid-cols-[1fr_1fr] gap-16 items-center">
                    <div class="order-2 lg:order-1 relative">
                        <div class="absolute -inset-4 bg-gradient-to-tr from-cyan-400/20 to-teal-400/5 dark:from-cyan-500/20 dark:to-teal-500/5 rounded-3xl blur-2xl"></div>
                        <div class="relative rounded-3xl overflow-hidden border border-slate-200 dark:border-white/10 bg-white dark:bg-slate-900 shadow-2xl transition-colors duration-300">
                            <img :src="about.home_image" alt="IDEXA Operations" class="w-full h-full object-cover min-h-[500px]" loading="lazy" />
                            <div class="absolute inset-0 bg-gradient-to-t from-white via-white/40 dark:from-slate-950 dark:via-slate-950/40 to-transparent transition-colors duration-300"></div>
                            
                            <div class="absolute bottom-0 left-0 right-0 p-8 md:p-12">
                                <div class="rounded-2xl border border-slate-200 dark:border-white/10 bg-white/90 dark:bg-slate-950/60 backdrop-blur-xl p-6 shadow-xl transition-colors duration-300">
                                    <p class="text-xs font-bold tracking-[0.2em] text-cyan-600 dark:text-cyan-400 uppercase flex items-center gap-2">
                                        <ShieldCheck class="w-4 h-4" />
                                        {{ t('Delivery Model') }}
                                    </p>
                                    <p class="mt-4 text-xl md:text-2xl font-bold text-slate-900 dark:text-white leading-tight transition-colors">
                                        {{ t('Design, produce, protect, and deliver from one coordinated platform.') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="order-1 lg:order-2">
                        <p class="mb-4 text-sm font-bold tracking-[0.2em] text-cyan-600 dark:text-cyan-500 uppercase flex items-center gap-3">
                            <span class="w-8 h-[1px] bg-cyan-600 dark:bg-cyan-500"></span>
                            {{ t('What We Do') }}
                        </p>
                        <h2 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white leading-tight mb-6 transition-colors">
                            {{ about.home_title }}
                        </h2>
                        <p class="text-lg text-slate-600 dark:text-slate-300 leading-relaxed mb-10 transition-colors">
                            {{ about.home_text }}
                        </p>
                        
                        <div class="grid gap-6 sm:grid-cols-2">
                            <div class="rounded-2xl border border-slate-200 dark:border-white/10 bg-white/50 dark:bg-slate-900/50 p-6 backdrop-blur-sm transition-all hover:border-cyan-500/30 shadow-sm dark:shadow-none">
                                <div class="w-10 h-10 rounded-full bg-cyan-100 dark:bg-cyan-500/10 flex items-center justify-center mb-4 text-cyan-600 dark:text-cyan-400">
                                    <Building2 class="w-5 h-5" />
                                </div>
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2 transition-colors">{{ t('One accountable group') }}</h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">{{ t('Connected teams reduce handoffs and keep complex programs moving.') }}</p>
                            </div>
                            <div class="rounded-2xl border border-slate-200 dark:border-white/10 bg-white/50 dark:bg-slate-900/50 p-6 backdrop-blur-sm transition-all hover:border-cyan-500/30 shadow-sm dark:shadow-none">
                                <div class="w-10 h-10 rounded-full bg-teal-100 dark:bg-teal-500/10 flex items-center justify-center mb-4 text-teal-600 dark:text-teal-400">
                                    <ShieldCheck class="w-5 h-5" />
                                </div>
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2 transition-colors">{{ t('Specialized execution') }}</h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">{{ t('Each business unit brings focused expertise for demanding work.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Capabilities (Bento Box) -->
        <section id="expertise" class="scroll-mt-24 py-24 lg:py-32 relative bg-slate-100/50 dark:bg-slate-900/20 border-y border-slate-200 dark:border-white/5 transition-colors duration-300">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <p class="mb-4 text-sm font-bold tracking-[0.2em] text-cyan-600 dark:text-cyan-500 uppercase">{{ t('Capabilities') }}</p>
                    <h2 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white leading-tight mb-6 transition-colors">
                        {{ t('Five specialist units.') }} <br/> {{ t('One sharper experience.') }}
                    </h2>
                    <p class="text-lg text-slate-600 dark:text-slate-400 transition-colors">
                        {{ t('Instead of sending clients across separate vendors, IDEXA combines adjacent capabilities into one practical ecosystem.') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <article v-for="(division, index) in landingDivisions" :key="division.id" 
                        class="group relative rounded-3xl overflow-hidden bg-white/90 dark:bg-slate-900/80 border border-slate-200 dark:border-white/10 backdrop-blur-xl transition-all duration-500 hover:-translate-y-2 shadow-lg hover:shadow-[0_20px_40px_rgba(0,0,0,0.1)] dark:shadow-none dark:hover:shadow-[0_20px_40px_rgba(0,0,0,0.5)]"
                        :class="[index === 0 || index === 3 ? 'lg:col-span-2' : 'lg:col-span-1']"
                    >
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-white/80 to-white dark:via-slate-950/80 dark:to-slate-950 z-10 pointer-events-none transition-colors duration-300"></div>
                        <img :src="division.hero_image || 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=900&q=80&auto=format&fit=crop'" :alt="division.name" class="absolute inset-0 w-full h-full object-cover opacity-10 dark:opacity-40 grayscale dark:grayscale-0 transition-all duration-700 group-hover:scale-110 group-hover:opacity-20 dark:group-hover:opacity-60" loading="lazy" />
                        
                        <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/0 to-transparent group-hover:from-cyan-500/5 dark:group-hover:from-cyan-500/10 transition-colors z-10 pointer-events-none"></div>

                        <div class="relative z-20 h-full flex flex-col p-8 justify-end min-h-[360px]">
                            <div class="mb-auto">
                                <div class="w-12 h-12 rounded-2xl bg-white/50 dark:bg-white/10 backdrop-blur-md border border-slate-200 dark:border-white/20 flex items-center justify-center text-slate-900 dark:text-white mb-6 group-hover:text-cyan-600 dark:group-hover:text-cyan-400 group-hover:border-cyan-400/50 transition-all duration-300">
                                    <component :is="divisionIcon(division.name)" class="h-6 w-6" />
                                </div>
                            </div>
                            
                            <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-3 transition-colors">{{ division.name }}</h3>
                            <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed mb-6 max-w-lg transition-colors">
                                {{ excerpt(division.description, 120) }}
                            </p>
                            
                            <div class="flex flex-wrap gap-2 mb-6">
                                <span v-for="service in division.services.slice(0, 3)" :key="service.id" class="rounded-full border border-slate-200 dark:border-white/10 bg-slate-100/50 dark:bg-white/5 px-3 py-1 text-xs font-medium text-slate-700 dark:text-slate-300 backdrop-blur-md transition-colors">
                                    {{ service.title }}
                                </span>
                            </div>

                            <a href="#contact" class="inline-flex items-center gap-2 text-sm font-bold tracking-[0.1em] text-cyan-600 dark:text-cyan-400 uppercase hover:text-cyan-700 dark:hover:text-cyan-300 transition-colors">
                                {{ t('Request') }} <ArrowRight class="h-4 w-4 rtl:rotate-180" />
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Process (Timeline / Stepped) -->
        <section id="process" class="scroll-mt-24 py-24 lg:py-32 relative">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-20">
                    <p class="mb-4 text-sm font-bold tracking-[0.2em] text-cyan-600 dark:text-cyan-500 uppercase">{{ t('Operating Model') }}</p>
                    <h2 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white leading-tight transition-colors">
                        {{ t('A clear path from requirement to reliable delivery.') }}
                    </h2>
                </div>

                <div class="relative">
                    <!-- Connecting line -->
                    <div class="hidden lg:block absolute top-1/2 left-0 w-full h-0.5 bg-gradient-to-r from-transparent via-cyan-400/50 dark:via-cyan-500/50 to-transparent -translate-y-1/2 z-0"></div>

                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 relative z-10">
                        <div v-for="(step, index) in processSteps" :key="step.title" class="relative group">
                            <div class="rounded-3xl border border-slate-200 dark:border-white/10 bg-white/90 dark:bg-slate-900/80 backdrop-blur-xl p-8 h-full transition-all duration-300 hover:border-cyan-500/50 hover:bg-slate-50 dark:hover:bg-slate-800/80 shadow-md dark:shadow-none hover:-translate-y-2">
                                <div class="w-14 h-14 rounded-full bg-slate-50 dark:bg-slate-950 border border-cyan-500/30 flex items-center justify-center text-xl font-bold text-cyan-600 dark:text-cyan-400 mb-6 shadow-[0_0_10px_rgba(6,182,212,0.1)] dark:shadow-[0_0_15px_rgba(6,182,212,0.15)] group-hover:shadow-[0_0_15px_rgba(6,182,212,0.2)] dark:group-hover:shadow-[0_0_25px_rgba(6,182,212,0.3)] transition-all">
                                    0{{ index + 1 }}
                                </div>
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-4 transition-colors">{{ step.title }}</h3>
                                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed transition-colors">{{ step.text }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Marquee / Commitments -->
        <section id="commitment" class="py-24 relative overflow-hidden bg-white dark:bg-slate-900 border-y border-slate-200 dark:border-white/5 transition-colors duration-300">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(6,182,212,0.03)_0%,transparent_70%)] dark:bg-[radial-gradient(ellipse_at_center,rgba(6,182,212,0.05)_0%,transparent_70%)] pointer-events-none transition-colors"></div>
            
            <div class="mx-auto max-w-7xl px-6 lg:px-8 mb-20">
                <div class="text-center max-w-3xl mx-auto">
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-6 transition-colors">{{ t('Built on steadfast commitments.') }}</h2>
                    <p class="text-slate-600 dark:text-slate-400 text-lg transition-colors">{{ t('The work behind identity, printing, packaging, and logistics has to be secure, traceable, and consistent.') }}</p>
                </div>
                
                <div class="mt-16 grid gap-8 md:grid-cols-3">
                    <div v-for="commitment in commitments" :key="commitment.title" class="text-center">
                        <div class="mx-auto w-16 h-16 rounded-full bg-cyan-50 dark:bg-cyan-500/10 border border-cyan-200 dark:border-cyan-500/30 flex items-center justify-center text-cyan-600 dark:text-cyan-400 mb-6 transition-colors">
                            <component :is="commitment.icon" class="h-8 w-8" />
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 transition-colors">{{ commitment.title }}</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed transition-colors">{{ commitment.text }}</p>
                    </div>
                </div>
            </div>

            <!-- Partners Marquee -->
            <div id="partners" class="relative flex overflow-x-hidden border-t border-slate-200 dark:border-white/5 pt-16 transition-colors duration-300">
                <div class="py-4 animate-marquee whitespace-nowrap flex items-center gap-16 px-8" dir="ltr">
                    <div v-for="partner in featuredPartners" :key="partner.id" class="flex items-center justify-center opacity-50 hover:opacity-100 transition-opacity grayscale hover:grayscale-0">
                        <span class="text-xl font-bold text-slate-400 dark:text-slate-300 tracking-wider transition-colors">{{ partner.name }}</span>
                    </div>
                    <!-- Duplicate for infinite scroll -->
                    <div v-for="partner in featuredPartners" :key="partner.id + '_dup'" class="flex items-center justify-center opacity-50 hover:opacity-100 transition-opacity grayscale hover:grayscale-0">
                        <span class="text-xl font-bold text-slate-400 dark:text-slate-300 tracking-wider transition-colors">{{ partner.name }}</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Form (Glass Pane) -->
        <section id="contact" class="scroll-mt-24 py-24 lg:py-32 relative">
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=1600&q=80&auto=format&fit=crop')] bg-cover bg-center opacity-5 pointer-events-none"></div>
            
            <div class="mx-auto max-w-7xl px-6 lg:px-8 relative z-10">
                <div class="grid lg:grid-cols-[1fr_1.2fr] gap-16 items-start">
                    <div>
                        <p class="mb-4 text-sm font-bold tracking-[0.2em] text-cyan-600 dark:text-cyan-500 uppercase transition-colors">{{ t('Get in Touch') }}</p>
                        <h2 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white leading-tight mb-6 transition-colors">
                            {{ t('Tell us what you need to build, protect, or deliver.') }}
                        </h2>
                        <p class="text-lg text-slate-600 dark:text-slate-300 mb-12 transition-colors">
                            {{ t('Share a brief and our team will connect you with the right specialists across the group.') }}
                        </p>

                        <div class="space-y-8">
                            <a :href="emailHref" class="group flex items-center gap-5">
                                <div class="w-14 h-14 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/10 flex items-center justify-center text-cyan-600 dark:text-cyan-400 group-hover:border-cyan-500/50 group-hover:bg-cyan-50 dark:group-hover:bg-cyan-500/10 transition-all shadow-sm dark:shadow-none">
                                    <Mail class="w-6 h-6" />
                                </div>
                                <div>
                                    <p class="text-xs font-bold tracking-wider text-slate-500 uppercase mb-1">{{ t('Email Us') }}</p>
                                    <p class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-cyan-600 dark:group-hover:text-cyan-400 transition-colors" dir="ltr">{{ settings.email || 'info@idexa.sa' }}</p>
                                </div>
                            </a>
                            <a :href="phoneHref" class="group flex items-center gap-5">
                                <div class="w-14 h-14 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/10 flex items-center justify-center text-cyan-600 dark:text-cyan-400 group-hover:border-cyan-500/50 group-hover:bg-cyan-50 dark:group-hover:bg-cyan-500/10 transition-all shadow-sm dark:shadow-none">
                                    <Phone class="w-6 h-6" />
                                </div>
                                <div>
                                    <p class="text-xs font-bold tracking-wider text-slate-500 uppercase mb-1">{{ t('Call Us') }}</p>
                                    <p class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-cyan-600 dark:group-hover:text-cyan-400 transition-colors" dir="ltr">{{ settings.phone || '+966000000000' }}</p>
                                </div>
                            </a>
                            <div class="group flex items-center gap-5">
                                <div class="w-14 h-14 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/10 flex items-center justify-center text-cyan-600 dark:text-cyan-400 shadow-sm dark:shadow-none transition-colors">
                                    <MapPin class="w-6 h-6" />
                                </div>
                                <div>
                                    <p class="text-xs font-bold tracking-wider text-slate-500 uppercase mb-1">{{ t('Headquarters') }}</p>
                                    <p class="text-lg font-bold text-slate-900 dark:text-white transition-colors">{{ settings.address || 'Riyadh, Kingdom of Saudi Arabia' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-3xl border border-slate-200 dark:border-white/10 bg-white/90 dark:bg-slate-900/60 backdrop-blur-2xl p-8 md:p-12 shadow-[0_20px_50px_rgba(0,0,0,0.05)] dark:shadow-[0_0_50px_rgba(0,0,0,0.5)] transition-colors duration-300">
                        <div class="mb-8 flex items-center gap-3 border-b border-slate-200 dark:border-white/10 pb-6 transition-colors">
                            <CheckCircle2 class="h-6 w-6 text-cyan-600 dark:text-cyan-400" />
                            <p class="text-sm font-bold tracking-[0.15em] text-slate-900 dark:text-white uppercase transition-colors">
                                {{ t('Direct connection to IDEXA experts') }}
                            </p>
                        </div>
                        <ContactForm class="theme-aware-form" />
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<style>
/* Add a custom animation for the marquee if not defined in tailwind config */
@keyframes marquee {
  0% { transform: translateX(0%); }
  100% { transform: translateX(-50%); }
}
.animate-marquee {
  animation: marquee 25s linear infinite;
}

/* Light mode defaults */
.theme-aware-form input,
.theme-aware-form textarea,
.theme-aware-form select {
    background-color: rgba(255, 255, 255, 0.8) !important;
    border-color: rgba(0, 0, 0, 0.1) !important;
    color: #0f172a !important;
    transition: all 0.3s ease;
}
.theme-aware-form input:focus,
.theme-aware-form textarea:focus,
.theme-aware-form select:focus {
    border-color: rgba(6, 182, 212, 0.5) !important;
    box-shadow: 0 0 0 1px rgba(6, 182, 212, 0.5) !important;
}
.theme-aware-form label {
    color: rgba(71, 85, 105, 0.9) !important;
    transition: color 0.3s ease;
}
.theme-aware-form button[type="submit"] {
    background-color: #0891b2 !important;
    color: #ffffff !important;
    font-weight: bold !important;
    transition: all 0.3s ease;
}
.theme-aware-form button[type="submit"]:hover {
    background-color: #06b6d4 !important;
    box-shadow: 0 0 15px rgba(6, 182, 212, 0.2) !important;
}

/* Dark mode overrides */
html.dark .theme-aware-form input,
html.dark .theme-aware-form textarea,
html.dark .theme-aware-form select {
    background-color: rgba(15, 23, 42, 0.5) !important;
    border-color: rgba(255, 255, 255, 0.1) !important;
    color: white !important;
}
html.dark .theme-aware-form label {
    color: rgba(203, 213, 225, 0.9) !important;
}
html.dark .theme-aware-form button[type="submit"] {
    background-color: #06b6d4 !important;
    color: #020617 !important;
}
html.dark .theme-aware-form button[type="submit"]:hover {
    background-color: #22d3ee !important;
    box-shadow: 0 0 20px rgba(6, 182, 212, 0.4) !important;
}
</style>
