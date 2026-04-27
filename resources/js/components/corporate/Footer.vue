<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { Mail, MapPin, Phone, ShieldCheck } from 'lucide-vue-next';
import { computed } from 'vue';
import { useTranslations } from '@/composables/useTranslations';

type FooterDivision = {
    id: number;
    name: string;
    slug: string;
};

const page = usePage();
const settings = computed(() => page.props.settings as Record<string, string>);
const appName = computed(() => (page.props.name as string) || 'IDEXA Group');
const businessUnits = computed(
    () => (page.props.navDivisions as FooterDivision[]) || [],
);

const { t } = useTranslations();

const companyLinks = [
    { label: 'About', href: '/#about' },
    { label: 'Expertise', href: '/#expertise' },
    { label: 'Process', href: '/#process' },
    { label: 'Commitment', href: '/#commitment' },
    { label: 'Partners', href: '/#partners' },
    { label: 'Contact', href: '/#contact' },
];

const phoneHref = computed(
    () =>
        `tel:${(settings.value.phone || '+966000000000').replace(/[^\d+]/g, '')}`,
);
const emailHref = computed(
    () => `mailto:${settings.value.email || 'info@idexa.sa'}`,
);
</script>

<template>
    <footer class="bg-white dark:bg-slate-950 border-t border-slate-200 dark:border-white/10 text-slate-600 dark:text-slate-300 relative overflow-hidden transition-colors duration-300">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_bottom_left,_rgba(34,211,238,0.05)_0%,_transparent_40%)] pointer-events-none"></div>
        <div class="mx-auto max-w-7xl px-6 py-16 lg:px-8 lg:py-20 relative z-10">
            <div class="grid gap-12 lg:grid-cols-[1.1fr_0.75fr_0.75fr_1fr]">
                <div>
                    <a href="/#top" class="inline-flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-cyan-500/10 border border-cyan-500/30 text-cyan-600 dark:text-cyan-400">
                            <ShieldCheck class="h-6 w-6" />
                        </div>
                        <span class="text-lg font-bold tracking-[0.2em] text-slate-900 dark:text-white uppercase transition-colors">{{ appName }}</span>
                    </a>
                    <p class="mt-6 max-w-sm text-sm leading-7 text-slate-500 dark:text-slate-400">
                        {{ t('Footer Description') }}
                    </p>
                </div>

                <div>
                    <h3 class="text-xs font-bold tracking-[0.22em] text-cyan-600 dark:text-cyan-400 uppercase">
                        {{ t('Landing Page') }}
                    </h3>
                    <ul class="mt-6 space-y-3">
                        <li v-for="link in companyLinks" :key="link.href">
                            <a :href="link.href" class="text-sm text-slate-500 dark:text-slate-400 transition-all hover:text-cyan-600 dark:hover:text-cyan-400 hover:ml-1 rtl:hover:ml-0 rtl:hover:mr-1">
                                {{ t(link.label) }}
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xs font-bold tracking-[0.22em] text-cyan-600 dark:text-cyan-400 uppercase">
                        {{ t('Business Units') }}
                    </h3>
                    <ul class="mt-6 space-y-3">
                        <li v-for="unit in businessUnits" :key="unit.slug">
                            <a href="/#expertise" class="text-sm text-slate-500 dark:text-slate-400 transition-all hover:text-cyan-600 dark:hover:text-cyan-400 hover:ml-1 rtl:hover:ml-0 rtl:hover:mr-1">
                                {{ unit.name }}
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xs font-bold tracking-[0.22em] text-cyan-600 dark:text-cyan-400 uppercase">
                        {{ t('Get in Touch') }}
                    </h3>
                    <div class="mt-6 space-y-4">
                        <a :href="emailHref" class="group flex gap-3 text-sm text-slate-500 dark:text-slate-400 transition-colors hover:text-cyan-600 dark:hover:text-cyan-400">
                            <Mail class="mt-0.5 h-4 w-4 flex-none text-cyan-500/70 group-hover:text-cyan-600 dark:group-hover:text-cyan-400 transition-colors" />
                            <span>{{ settings.email || 'info@idexa.sa' }}</span>
                        </a>
                        <a :href="phoneHref" class="group flex gap-3 text-sm text-slate-500 dark:text-slate-400 transition-colors hover:text-cyan-600 dark:hover:text-cyan-400">
                            <Phone class="mt-0.5 h-4 w-4 flex-none text-cyan-500/70 group-hover:text-cyan-600 dark:group-hover:text-cyan-400 transition-colors" />
                            <span dir="ltr">{{ settings.phone || '+966000000000' }}</span>
                        </a>
                        <p class="flex gap-3 text-sm leading-6 text-slate-500 dark:text-slate-400">
                            <MapPin class="mt-0.5 h-4 w-4 flex-none text-cyan-500/70" />
                            <span>{{ settings.address || 'Riyadh, Kingdom of Saudi Arabia' }}</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-14 border-t border-slate-200 dark:border-white/10 pt-8 flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-slate-500 transition-colors">
                <div>
                    &copy; {{ new Date().getFullYear() }} {{ appName }}. {{ t('All rights reserved') }}.
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-cyan-600/50 dark:text-cyan-500/50">{{ t('Designed with precision') }}</span>
                </div>
            </div>
        </div>
    </footer>
</template>
