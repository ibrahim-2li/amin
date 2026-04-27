<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { ArrowRight, Moon, Sun, Globe } from 'lucide-vue-next';
import { computed, onMounted, onUnmounted, ref } from 'vue';
import { useTheme } from '@/composables/useTheme';
import { useTranslations } from '@/composables/useTranslations';

const page = usePage();
const appName = computed(() => (page.props.name as string) || 'IDEXA Group');

const isScrolled = ref(false);
const isMobileMenuOpen = ref(false);

const { isDark, toggleTheme } = useTheme();
const { t, locale } = useTranslations();

const navLinks = [
    { label: 'About', href: '/#about' },
    { label: 'Expertise', href: '/#expertise' },
    { label: 'Process', href: '/#process' },
    { label: 'Commitment', href: '/#commitment' },
    { label: 'Partners', href: '/#partners' },
];

function handleScroll() {
    isScrolled.value = window.scrollY > 40;
}

function toggleMobileMenu() {
    isMobileMenuOpen.value = !isMobileMenuOpen.value;
}

function closeMobileMenu() {
    isMobileMenuOpen.value = false;
}

onMounted(() => {
    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll();
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>

<template>
    <header
        class="fixed top-0 right-0 left-0 z-50 px-3 pt-3 transition-all duration-300"
        :class="
            isScrolled || isMobileMenuOpen ? 'translate-y-0' : 'bg-transparent'
        "
    >
        <nav
            class="mx-auto max-w-7xl rounded-2xl border border-slate-200 bg-white/80 dark:border-white/10 dark:bg-slate-950/60 px-5 shadow-[0_4px_30px_rgba(0,0,0,0.1)] backdrop-blur-xl lg:px-6 transition-all duration-300"
            :class="isScrolled ? 'py-1' : 'py-2'"
        >
            <div class="flex h-14 items-center justify-between">
                <a
                    href="/#top"
                    class="flex items-center gap-3"
                    @click="closeMobileMenu"
                >
                    <span
                        class="text-sm font-bold tracking-[0.16em] text-slate-900 dark:text-white uppercase transition-colors"
                    >
                        {{ appName }}
                    </span>
                </a>

                <div class="hidden items-center gap-1 lg:flex">
                    <a
                        v-for="link in navLinks"
                        :key="link.href"
                        :href="link.href"
                        class="px-3 py-2 text-[12px] font-semibold tracking-[0.12em] text-slate-600 dark:text-slate-300 uppercase transition-all duration-300 hover:text-cyan-600 dark:hover:text-cyan-400 dark:hover:drop-shadow-[0_0_8px_rgba(34,211,238,0.5)]"
                    >
                        {{ t(link.label) }}
                    </a>
                </div>

                <div class="flex items-center gap-4">
                    <!-- Language Toggle -->
                    <a
                        :href="locale === 'en' ? '/locale/ar' : '/locale/en'"
                        class="flex items-center gap-1 p-2 text-xs font-bold text-slate-600 dark:text-slate-300 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors tracking-widest"
                    >
                        <Globe class="h-4 w-4" />
                        <span class="mt-0.5">{{ locale === 'en' ? 'عربي' : 'EN' }}</span>
                    </a>

                    <!-- Theme Toggle -->
                    <button
                        @click="toggleTheme"
                        class="p-2 text-slate-600 dark:text-slate-300 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors"
                        :aria-label="isDark ? 'Switch to Light Mode' : 'Switch to Dark Mode'"
                    >
                        <Sun v-if="isDark" class="h-5 w-5" />
                        <Moon v-else class="h-5 w-5" />
                    </button>

                    <div class="hidden lg:block">
                        <a
                            href="/#contact"
                            class="inline-flex items-center gap-2 rounded-full bg-cyan-500/10 border border-cyan-500/50 px-5 py-2.5 text-[11px] font-bold tracking-[0.18em] text-cyan-600 dark:text-cyan-400 uppercase transition-all duration-300 hover:bg-cyan-500 hover:text-white dark:hover:text-slate-950 hover:shadow-[0_0_20px_rgba(6,182,212,0.4)]"
                        >
                            {{ t('Contact') }}
                            <ArrowRight class="h-4 w-4 rtl:rotate-180" />
                        </a>
                    </div>

                    <button
                        class="p-2 text-slate-900 dark:text-white transition-colors lg:hidden"
                        :aria-label="isMobileMenuOpen ? 'Close menu' : 'Open menu'"
                        @click="toggleMobileMenu"
                    >
                        <svg
                            v-if="!isMobileMenuOpen"
                            class="h-6 w-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 7h16M4 12h16M4 17h16"
                            />
                        </svg>
                        <svg
                            v-else
                            class="h-6 w-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </nav>

        <Transition
            enter-active-class="transition-all duration-250 ease-out"
            enter-from-class="opacity-0 -translate-y-3"
            enter-to-class="opacity-100 translate-y-0"
            leave-active-class="transition-all duration-200 ease-in"
            leave-from-class="opacity-100 translate-y-0"
            leave-to-class="opacity-0 -translate-y-3"
        >
            <div
                v-if="isMobileMenuOpen"
                class="mx-auto mt-2 max-w-7xl rounded-2xl border border-slate-200 bg-white/95 dark:border-white/10 dark:bg-slate-950/90 backdrop-blur-xl lg:hidden"
            >
                <div class="flex flex-col gap-1 px-5 py-5">
                    <a
                        v-for="link in navLinks"
                        :key="link.href"
                        :href="link.href"
                        class="px-2 py-3 text-sm font-bold tracking-[0.14em] text-slate-600 dark:text-slate-300 uppercase transition-colors hover:text-cyan-600 dark:hover:text-cyan-400"
                        @click="closeMobileMenu"
                    >
                        {{ t(link.label) }}
                    </a>
                    <a
                        href="/#contact"
                        class="mt-3 inline-flex items-center justify-center gap-2 rounded-full bg-cyan-500/10 border border-cyan-500/50 px-6 py-3 text-xs font-bold tracking-[0.18em] text-cyan-600 dark:text-cyan-400 uppercase hover:bg-cyan-500 hover:text-white dark:hover:text-slate-950"
                        @click="closeMobileMenu"
                    >
                        {{ t('Contact') }}
                        <ArrowRight class="h-4 w-4 rtl:rotate-180" />
                    </a>
                </div>
            </div>
        </Transition>
    </header>
</template>
