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
    props.divisions.length ? props.divisions : fallbackDivisions,
);
const featuredPartners = computed(() =>
    props.partners.length ? props.partners.slice(0, 8) : fallbackPartners,
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
        'https://images.unsplash.com/photo-1497366216548-37526070297c?w=1200&q=80&auto=format&fit=crop',
}));

const statValue = (value: string, fallback: string) =>
    value && value !== 'null' ? value : fallback;
const backingLabel = computed(() =>
    /^\d{4}/.test(props.stats.founded || '') ? 'Founded' : 'Backed By',
);
const statItems = computed(() => [
    { value: statValue(props.stats.founded, 'ADQ'), label: backingLabel.value },
    { value: statValue(props.stats.countries, 'KSA+'), label: 'Market Reach' },
    {
        value: statValue(props.stats.employees, '1,000+'),
        label: 'Professionals',
    },
    {
        value: statValue(props.stats.projects, '500+'),
        label: 'Projects Delivered',
    },
]);

const processSteps = [
    {
        title: 'Map the requirement',
        text: 'We clarify the operational, compliance, delivery, and customer experience needs before recommending a path.',
    },
    {
        title: 'Design the solution',
        text: 'Specialists from the right business units shape the scope, process, material, data, and service model.',
    },
    {
        title: 'Execute with control',
        text: 'Production, personalization, fulfillment, and delivery are coordinated through accountable operating teams.',
    },
    {
        title: 'Improve continuously',
        text: 'Performance signals, client feedback, and quality checks feed the next round of operational improvement.',
    },
];

const commitments = [
    {
        title: 'Secure by design',
        text: 'Sensitive data, documents, credentials, and materials are handled with strict process discipline.',
        icon: ShieldCheck,
    },
    {
        title: 'Built for scale',
        text: 'Programs are planned for dependable volume, repeatable delivery, and cross-unit coordination.',
        icon: Factory,
    },
    {
        title: 'Sustainability in motion',
        text: 'Materials, routing, packaging, and production choices are shaped around lower waste and smarter resource use.',
        icon: Leaf,
    },
];

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
    <div class="bg-[#f5f1e8] text-[#1f2933]">
        <!-- Hero -->
        <section
            id="top"
            class="relative min-h-[88vh] overflow-hidden bg-[#161616] lg:min-h-[92vh]"
        >
            <div class="absolute inset-0">
                <video
                    src="https://e7group.ae/public/assets/img/banner/home_banner.mp4"
                    class="h-full w-full object-cover"
                    autoplay
                    muted
                    loop
                    playsinline
                />
                <div class="absolute inset-0 bg-black/55" />
                <div
                    class="absolute inset-0 bg-[linear-gradient(90deg,rgba(8,21,32,0.92)_0%,rgba(8,21,32,0.58)_48%,rgba(8,21,32,0.2)_100%)]"
                />
            </div>

            <div
                class="relative mx-auto flex min-h-[88vh] max-w-7xl items-end px-6 pt-36 pb-12 lg:min-h-[92vh] lg:px-8 lg:pb-16"
            >
                <div class="max-w-5xl">
                    <p
                        class="mb-5 text-xs font-bold tracking-[0.38em] text-[#00c4cc] uppercase"
                    >
                        {{ appName }}
                    </p>
                    <h1
                        class="max-w-5xl text-5xl leading-[0.92] font-bold tracking-normal text-white uppercase sm:text-6xl md:text-7xl lg:text-8xl"
                    >
                        Secure identity, print, packaging and logistics under
                        one roof.
                    </h1>
                    <p
                        class="mt-7 max-w-2xl text-base leading-8 text-white/76 md:text-lg"
                    >
                        A single landing point for specialized business services
                        across Saudi Arabia, built for organizations that need
                        precision, reliability, and accountable delivery.
                    </p>
                    <div class="mt-10 flex flex-col gap-3 sm:flex-row">
                        <a
                            href="#contact"
                            class="inline-flex items-center justify-center gap-3 rounded-full bg-[#00c4cc] px-7 py-4 text-sm font-bold tracking-widest text-[#09212b] uppercase transition-colors duration-300 hover:bg-white"
                        >
                            Start a Project
                            <ArrowRight class="h-4 w-4" />
                        </a>
                        <a
                            href="#expertise"
                            class="inline-flex items-center justify-center gap-3 rounded-full border border-white/35 px-7 py-4 text-sm font-bold tracking-widest text-white uppercase transition-colors duration-300 hover:border-white hover:bg-white hover:text-[#09212b]"
                        >
                            Explore Capabilities
                            <ChevronRight class="h-4 w-4" />
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Proof -->
        <section class="border-b border-[#1f2933]/10 bg-white">
            <div
                class="mx-auto grid max-w-7xl grid-cols-2 gap-px bg-[#1f2933]/10 px-6 lg:grid-cols-4 lg:px-8"
            >
                <div
                    v-for="stat in statItems"
                    :key="stat.label"
                    class="bg-white py-8 md:py-10"
                >
                    <div class="px-4 md:px-6">
                        <div
                            class="text-3xl font-bold text-[#12343b] md:text-5xl"
                        >
                            {{ stat.value }}
                        </div>
                        <div
                            class="mt-2 text-[11px] font-bold tracking-[0.22em] text-[#6b7280] uppercase"
                        >
                            {{ stat.label }}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About -->
        <section id="about" class="scroll-mt-24 bg-[#f5f1e8] py-24 lg:py-32">
            <div
                class="mx-auto grid max-w-7xl gap-14 px-6 lg:grid-cols-[0.95fr_1.05fr] lg:items-center lg:px-8"
            >
                <div>
                    <p
                        class="mb-4 text-xs font-bold tracking-[0.28em] text-[#0e7490] uppercase"
                    >
                        What We Do
                    </p>
                    <h2
                        class="text-4xl leading-tight font-bold tracking-normal text-[#1f2933] md:text-5xl"
                    >
                        {{ about.home_title }}
                    </h2>
                    <p
                        class="mt-6 text-lg leading-8 whitespace-pre-wrap text-[#46535f]"
                    >
                        {{ about.home_text }}
                    </p>
                    <div class="mt-9 grid gap-4 sm:grid-cols-2">
                        <div class="border-l-4 border-[#00c4cc] bg-white p-5">
                            <p class="text-sm font-bold text-[#1f2933]">
                                One accountable group
                            </p>
                            <p class="mt-2 text-sm leading-6 text-[#62717d]">
                                Connected teams reduce handoffs and keep complex
                                programs moving.
                            </p>
                        </div>
                        <div class="border-l-4 border-[#c9a84c] bg-white p-5">
                            <p class="text-sm font-bold text-[#1f2933]">
                                Specialized execution
                            </p>
                            <p class="mt-2 text-sm leading-6 text-[#62717d]">
                                Each business unit brings focused expertise for
                                demanding work.
                            </p>
                        </div>
                    </div>
                </div>

                <div
                    class="relative min-h-[520px] overflow-hidden bg-[#12343b]"
                >
                    <img
                        :src="about.home_image"
                        alt="IDEXA operations"
                        class="absolute inset-0 h-full w-full object-cover"
                        loading="lazy"
                    />
                    <div
                        class="absolute inset-0 bg-[linear-gradient(180deg,rgba(18,52,59,0)_0%,rgba(18,52,59,0.86)_100%)]"
                    />
                    <div class="absolute right-0 bottom-0 left-0 p-7 md:p-9">
                        <div
                            class="max-w-sm border border-white/20 bg-white/10 p-5 backdrop-blur-md"
                        >
                            <p
                                class="text-xs font-bold tracking-[0.22em] text-[#00c4cc] uppercase"
                            >
                                Delivery Model
                            </p>
                            <p
                                class="mt-3 text-2xl leading-tight font-bold text-white"
                            >
                                Design, produce, protect, and deliver from one
                                coordinated platform.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Expertise -->
        <section
            id="expertise"
            class="scroll-mt-24 bg-[#101820] py-24 text-white lg:py-32"
        >
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div
                    class="grid gap-10 lg:grid-cols-[0.8fr_1.2fr] lg:items-end"
                >
                    <div>
                        <p
                            class="mb-4 text-xs font-bold tracking-[0.28em] text-[#00c4cc] uppercase"
                        >
                            Areas of Expertise
                        </p>
                        <h2
                            class="text-4xl leading-tight font-bold tracking-normal md:text-5xl"
                        >
                            Five specialist units. One sharper client
                            experience.
                        </h2>
                    </div>
                    <p
                        class="max-w-2xl text-base leading-8 text-white/64 lg:ml-auto"
                    >
                        Instead of sending clients across separate vendors,
                        IDEXA combines adjacent capabilities into one practical
                        ecosystem for secure, physical, digital, and
                        distribution work.
                    </p>
                </div>

                <div class="mt-14 grid gap-5 md:grid-cols-2 xl:grid-cols-5">
                    <article
                        v-for="division in landingDivisions"
                        :key="division.id"
                        class="group flex min-h-[470px] flex-col overflow-hidden border border-white/10 bg-white/[0.04] transition-all duration-300 hover:-translate-y-1 hover:border-[#00c4cc]/70"
                    >
                        <div class="relative h-48 overflow-hidden bg-[#1f2933]">
                            <img
                                :src="
                                    division.hero_image ||
                                    'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=900&q=80&auto=format&fit=crop'
                                "
                                :alt="division.name"
                                class="h-full w-full object-cover opacity-72 transition-transform duration-700 group-hover:scale-105"
                                loading="lazy"
                            />
                            <div
                                class="absolute top-4 left-4 flex h-11 w-11 items-center justify-center bg-white text-[#12343b]"
                            >
                                <component
                                    :is="divisionIcon(division.name)"
                                    class="h-5 w-5"
                                />
                            </div>
                        </div>
                        <div class="flex flex-1 flex-col p-6">
                            <h3
                                class="text-xl leading-tight font-bold text-white"
                            >
                                {{ division.name }}
                            </h3>
                            <p class="mt-3 text-sm leading-6 text-white/62">
                                {{ excerpt(division.description) }}
                            </p>
                            <div class="mt-6 flex flex-wrap gap-2">
                                <span
                                    v-for="service in division.services.slice(
                                        0,
                                        3,
                                    )"
                                    :key="service.id"
                                    class="border border-white/10 px-3 py-1 text-[11px] font-bold tracking-wider text-white/70 uppercase"
                                >
                                    {{ service.title }}
                                </span>
                            </div>
                            <a
                                href="#contact"
                                class="mt-auto inline-flex items-center gap-2 pt-8 text-xs font-bold tracking-[0.18em] text-[#00c4cc] uppercase"
                            >
                                Request this capability
                                <ArrowRight class="h-4 w-4" />
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Process -->
        <section id="process" class="scroll-mt-24 bg-white py-24 lg:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid gap-10 lg:grid-cols-[0.8fr_1.2fr]">
                    <div>
                        <p
                            class="mb-4 text-xs font-bold tracking-[0.28em] text-[#9f6b1d] uppercase"
                        >
                            Operating Model
                        </p>
                        <h2
                            class="text-4xl leading-tight font-bold tracking-normal text-[#1f2933] md:text-5xl"
                        >
                            A clear path from requirement to reliable delivery.
                        </h2>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div
                            v-for="(step, index) in processSteps"
                            :key="step.title"
                            class="border border-[#1f2933]/10 bg-[#f5f1e8] p-6"
                        >
                            <div class="flex items-center gap-4">
                                <span
                                    class="flex h-10 w-10 items-center justify-center bg-[#12343b] text-sm font-bold text-white"
                                >
                                    {{ index + 1 }}
                                </span>
                                <h3 class="text-lg font-bold text-[#1f2933]">
                                    {{ step.title }}
                                </h3>
                            </div>
                            <p class="mt-5 text-sm leading-7 text-[#62717d]">
                                {{ step.text }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Commitment -->
        <section
            id="commitment"
            class="scroll-mt-24 overflow-hidden bg-[#12343b] text-white"
        >
            <div class="grid lg:grid-cols-2">
                <div class="relative min-h-[420px] lg:min-h-[760px]">
                    <img
                        src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=1400&q=80&auto=format&fit=crop"
                        alt="Professional team planning operations"
                        class="absolute inset-0 h-full w-full object-cover"
                        loading="lazy"
                    />
                    <div class="absolute inset-0 bg-[#12343b]/20" />
                </div>
                <div class="flex items-center px-6 py-20 lg:px-16 xl:px-24">
                    <div class="max-w-xl">
                        <p
                            class="mb-4 text-xs font-bold tracking-[0.28em] text-[#c9a84c] uppercase"
                        >
                            Our Commitment
                        </p>
                        <h2
                            class="text-4xl leading-tight font-bold tracking-normal md:text-5xl"
                        >
                            Professional delivery for work that cannot afford
                            loose ends.
                        </h2>
                        <p class="mt-6 text-base leading-8 text-white/68">
                            The work behind identity, printed documents,
                            education supply, packaging, and logistics has to be
                            secure, traceable, and consistent. Our operating
                            culture is built around that standard.
                        </p>
                        <div class="mt-10 space-y-5">
                            <div
                                v-for="commitment in commitments"
                                :key="commitment.title"
                                class="flex gap-4 border-t border-white/12 pt-5"
                            >
                                <div
                                    class="flex h-11 w-11 flex-none items-center justify-center bg-[#00c4cc] text-[#09212b]"
                                >
                                    <component
                                        :is="commitment.icon"
                                        class="h-5 w-5"
                                    />
                                </div>
                                <div>
                                    <h3 class="font-bold text-white">
                                        {{ commitment.title }}
                                    </h3>
                                    <p
                                        class="mt-2 text-sm leading-6 text-white/62"
                                    >
                                        {{ commitment.text }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Partners -->
        <section id="partners" class="scroll-mt-24 bg-[#f5f1e8] py-24 lg:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid gap-8 lg:grid-cols-[0.8fr_1.2fr] lg:items-end">
                    <div>
                        <p
                            class="mb-4 text-xs font-bold tracking-[0.28em] text-[#0e7490] uppercase"
                        >
                            Partners
                        </p>
                        <h2
                            class="text-4xl leading-tight font-bold tracking-normal text-[#1f2933] md:text-5xl"
                        >
                            A stronger network for complex programs.
                        </h2>
                    </div>
                    <p
                        class="max-w-2xl text-base leading-8 text-[#62717d] lg:ml-auto"
                    >
                        We collaborate with technology, standards,
                        institutional, and delivery partners to bring global
                        capability into local execution.
                    </p>
                </div>

                <div class="mt-14 grid grid-cols-2 gap-3 md:grid-cols-4">
                    <a
                        v-for="partner in featuredPartners"
                        :key="partner.id"
                        :href="partner.website || '#'"
                        class="flex min-h-28 items-center justify-center border border-[#1f2933]/10 bg-white px-5 text-center text-sm font-bold text-[#46535f] transition-colors duration-300 hover:border-[#00c4cc] hover:text-[#12343b]"
                        :target="
                            partner.website && partner.website !== '#'
                                ? '_blank'
                                : undefined
                        "
                        :rel="
                            partner.website && partner.website !== '#'
                                ? 'noopener noreferrer'
                                : undefined
                        "
                    >
                        <img
                            v-if="partner.logo"
                            :src="partner.logo"
                            :alt="partner.name"
                            class="max-h-12 max-w-full object-contain"
                            loading="lazy"
                        />
                        <span v-else>{{ partner.name }}</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Contact -->
        <section id="contact" class="scroll-mt-24 bg-white py-24 lg:py-32">
            <div
                class="mx-auto grid max-w-7xl gap-14 px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8"
            >
                <div>
                    <p
                        class="mb-4 text-xs font-bold tracking-[0.28em] text-[#0e7490] uppercase"
                    >
                        Contact
                    </p>
                    <h2
                        class="text-4xl leading-tight font-bold tracking-normal text-[#1f2933] md:text-5xl"
                    >
                        Tell us what you need to build, protect, print, pack, or
                        deliver.
                    </h2>
                    <p class="mt-6 text-base leading-8 text-[#62717d]">
                        Share a brief and our team will connect you with the
                        right specialists across the group.
                    </p>

                    <div class="mt-10 space-y-5">
                        <a
                            :href="emailHref"
                            class="flex items-center gap-4 text-[#1f2933] transition-colors hover:text-[#0e7490]"
                        >
                            <span
                                class="flex h-11 w-11 items-center justify-center bg-[#f5f1e8] text-[#0e7490]"
                            >
                                <Mail class="h-5 w-5" />
                            </span>
                            <span class="font-bold">{{
                                settings.email || 'info@idexa.sa'
                            }}</span>
                        </a>
                        <a
                            :href="phoneHref"
                            class="flex items-center gap-4 text-[#1f2933] transition-colors hover:text-[#0e7490]"
                        >
                            <span
                                class="flex h-11 w-11 items-center justify-center bg-[#f5f1e8] text-[#0e7490]"
                            >
                                <Phone class="h-5 w-5" />
                            </span>
                            <span class="font-bold">{{
                                settings.phone || '+966000000000'
                            }}</span>
                        </a>
                        <div class="flex items-start gap-4 text-[#1f2933]">
                            <span
                                class="flex h-11 w-11 flex-none items-center justify-center bg-[#f5f1e8] text-[#0e7490]"
                            >
                                <MapPin class="h-5 w-5" />
                            </span>
                            <span class="pt-2 leading-7 font-bold">{{
                                settings.address ||
                                'Riyadh, Kingdom of Saudi Arabia'
                            }}</span>
                        </div>
                    </div>
                </div>

                <div class="border border-[#1f2933]/10 bg-[#f5f1e8] p-6 md:p-8">
                    <div class="mb-8 flex items-center gap-3">
                        <CheckCircle2 class="h-5 w-5 text-[#0e7490]" />
                        <p
                            class="text-sm font-bold tracking-[0.18em] text-[#46535f] uppercase"
                        >
                            Response from the IDEXA team
                        </p>
                    </div>
                    <ContactForm />
                </div>
            </div>
        </section>
    </div>
</template>
