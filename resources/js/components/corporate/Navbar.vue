<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { ArrowRight } from 'lucide-vue-next';
import { computed, onMounted, onUnmounted, ref } from 'vue';

const page = usePage();
const appName = computed(() => (page.props.name as string) || 'IDEXA Group');

const isScrolled = ref(false);
const isMobileMenuOpen = ref(false);

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
            class="mx-auto max-w-7xl border border-slate-200/80 bg-white/92 px-5 shadow-[0_18px_60px_rgba(15,23,42,0.08)] backdrop-blur-xl lg:px-6"
        >
            <div class="flex h-16 items-center justify-between">
                <a
                    href="/#top"
                    class="flex items-center gap-3"
                    @click="closeMobileMenu"
                >
                    <img
                        src="/images/IDEXA-black.png"
                        alt="IDEXA"
                        class="h-10 w-10 object-contain"
                    />
                    <span
                        class="hidden text-sm font-bold tracking-[0.16em] text-slate-950 uppercase sm:block"
                    >
                        {{ appName }}
                    </span>
                </a>

                <div class="hidden items-center gap-1 lg:flex">
                    <a
                        v-for="link in navLinks"
                        :key="link.href"
                        :href="link.href"
                        class="px-3 py-2 text-[12px] font-semibold tracking-[0.12em] text-slate-600 uppercase transition-colors duration-200 hover:text-cyan-700"
                    >
                        {{ link.label }}
                    </a>
                </div>

                <div class="hidden lg:block">
                    <a
                        href="/#contact"
                        class="inline-flex items-center gap-2 bg-slate-950 px-5 py-3 text-[11px] font-bold tracking-[0.18em] text-white uppercase transition-colors duration-300 hover:bg-cyan-600"
                    >
                        Contact
                        <ArrowRight class="h-4 w-4" />
                    </a>
                </div>

                <button
                    class="p-2 text-slate-950 transition-colors lg:hidden"
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
                class="mx-auto max-w-7xl border-x border-b border-slate-200/80 bg-white lg:hidden"
            >
                <div class="flex flex-col gap-1 px-5 py-5">
                    <a
                        v-for="link in navLinks"
                        :key="link.href"
                        :href="link.href"
                        class="px-2 py-3 text-sm font-bold tracking-[0.14em] text-slate-700 uppercase transition-colors hover:text-cyan-700"
                        @click="closeMobileMenu"
                    >
                        {{ link.label }}
                    </a>
                    <a
                        href="/#contact"
                        class="mt-3 inline-flex items-center justify-center gap-2 bg-slate-950 px-6 py-3 text-xs font-bold tracking-[0.18em] text-white uppercase"
                        @click="closeMobileMenu"
                    >
                        Contact
                        <ArrowRight class="h-4 w-4" />
                    </a>
                </div>
            </div>
        </Transition>
    </header>
</template>
