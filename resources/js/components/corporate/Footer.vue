<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { Mail, MapPin, Phone } from 'lucide-vue-next';
import { computed } from 'vue';

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
    <footer class="bg-[#101820] text-white">
        <div class="mx-auto max-w-7xl px-6 py-16 lg:px-8 lg:py-20">
            <div class="grid gap-12 lg:grid-cols-[1.1fr_0.75fr_0.75fr_1fr]">
                <div>
                    <a href="/#top" class="inline-flex items-center gap-3">
                        <img
                            src="/images/IDEXA.png"
                            alt="IDEXA"
                            class="h-12 w-12 object-contain"
                        />
                        <span
                            class="text-sm font-bold tracking-[0.2em] uppercase"
                            >{{ appName }}</span
                        >
                    </a>
                    <p class="mt-6 max-w-sm text-sm leading-7 text-white/58">
                        Secure identity, printing, packaging, education, and
                        logistics services coordinated through one professional
                        group.
                    </p>
                </div>

                <div>
                    <h3
                        class="text-xs font-bold tracking-[0.22em] text-[#00c4cc] uppercase"
                    >
                        Landing Page
                    </h3>
                    <ul class="mt-6 space-y-3">
                        <li v-for="link in companyLinks" :key="link.href">
                            <a
                                :href="link.href"
                                class="text-sm text-white/62 transition-colors hover:text-white"
                            >
                                {{ link.label }}
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3
                        class="text-xs font-bold tracking-[0.22em] text-[#00c4cc] uppercase"
                    >
                        Business Units
                    </h3>
                    <ul class="mt-6 space-y-3">
                        <li v-for="unit in businessUnits" :key="unit.slug">
                            <a
                                href="/#expertise"
                                class="text-sm text-white/62 transition-colors hover:text-white"
                            >
                                {{ unit.name }}
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3
                        class="text-xs font-bold tracking-[0.22em] text-[#00c4cc] uppercase"
                    >
                        Get in Touch
                    </h3>
                    <div class="mt-6 space-y-4">
                        <a
                            :href="emailHref"
                            class="flex gap-3 text-sm text-white/62 transition-colors hover:text-white"
                        >
                            <Mail
                                class="mt-0.5 h-4 w-4 flex-none text-[#00c4cc]"
                            />
                            <span>{{ settings.email || 'info@idexa.sa' }}</span>
                        </a>
                        <a
                            :href="phoneHref"
                            class="flex gap-3 text-sm text-white/62 transition-colors hover:text-white"
                        >
                            <Phone
                                class="mt-0.5 h-4 w-4 flex-none text-[#00c4cc]"
                            />
                            <span>{{ settings.phone || '+966000000000' }}</span>
                        </a>
                        <p class="flex gap-3 text-sm leading-6 text-white/62">
                            <MapPin
                                class="mt-0.5 h-4 w-4 flex-none text-[#00c4cc]"
                            />
                            <span>{{
                                settings.address ||
                                'Riyadh, Kingdom of Saudi Arabia'
                            }}</span>
                        </p>
                    </div>
                </div>
            </div>

            <div
                class="mt-14 border-t border-white/10 pt-8 text-sm text-white/46"
            >
                &copy; {{ new Date().getFullYear() }} {{ appName }}. All rights
                reserved.
            </div>
        </div>
    </footer>
</template>
