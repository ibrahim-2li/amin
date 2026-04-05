<script setup lang="ts">
import { ref, onMounted, onUnmounted, computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

const page = usePage()
const appName = computed(() => (page.props.name as string) || 'NULL')
const appNameFirstPart = computed(() => {
    const parts = appName.value.trim().split(' ')
    return parts[0]
})
const appNameSecondPart = computed(() => {
    const parts = appName.value.trim().split(' ')
    return parts.slice(1).join(' ')
})

const isScrolled = ref(false)
const isMobileMenuOpen = ref(false)

const navLinks = [
    { label: 'Home', href: '/' },
    { label: 'About us', href: '/about' },
    { label: 'Areas of expertise', href: '/capabilities' },
    { label: 'Our commitment', href: '/sustainability' },
    { label: 'Investor relations', href: '/partners' },
    { label: 'Careers', href: '/contact' },
]

function handleScroll() {
    isScrolled.value = window.scrollY > 50
}

function toggleMobileMenu() {
    isMobileMenuOpen.value = !isMobileMenuOpen.value
}

function closeMobileMenu() {
    isMobileMenuOpen.value = false
}

onMounted(() => {
    window.addEventListener('scroll', handleScroll, { passive: true })
    handleScroll()
})

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll)
})
</script>

<template>
    <header
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-500"
        :class="isScrolled ? 'bg-[#222222]/95 backdrop-blur-md shadow-lg border-b border-[#333333]' : 'bg-transparent'"
    >
        <nav class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <Link href="/" class="flex items-center gap-2 group" @click="closeMobileMenu">
                    <div class="flex items-baseline">
                        <span class="text-[#00C4CC] font-black text-4xl tracking-tighter">{{ appNameFirstPart }}</span>
                        <span v-if="appNameSecondPart" class="text-white font-medium text-lg ml-2 tracking-wide uppercase">{{ appNameSecondPart }}</span>
                    </div>
                </Link>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center gap-1">
                    <Link
                        v-for="link in navLinks"
                        :key="link.href"
                        :href="link.href"
                        class="relative px-4 py-2 text-[13px] font-medium text-white/90 hover:text-white transition-colors duration-200 group uppercase tracking-wider"
                    >
                        {{ link.label }}
                        <span class="absolute bottom-0 left-4 right-4 h-[2px] bg-[#00C4CC] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left" />
                    </Link>
                </div>

                <!-- CTA Button -->
                <div class="hidden lg:flex items-center gap-4">
                    <!-- <button class="text-white hover:text-[#00C4CC] transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </button> -->
                    <Link
                        href="/contact#contact"
                        class="px-6 py-2 border border-[#00C4CC] text-[#00C4CC] uppercase tracking-widest text-[11px] font-bold rounded-full hover:bg-[#00C4CC] hover:text-white transition-colors duration-300"
                    >
                        Contact
                    </Link>
                </div>

                <!-- Mobile Menu Button -->
                <button
                    class="lg:hidden p-2 text-white/80 hover:text-white transition-colors"
                    @click="toggleMobileMenu"
                    :aria-label="isMobileMenuOpen ? 'Close menu' : 'Open menu'"
                >
                    <svg v-if="!isMobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg v-else class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Mobile Menu -->
        <Transition
            enter-active-class="transition-all duration-300 ease-out"
            enter-from-class="opacity-0 -translate-y-4"
            enter-to-class="opacity-100 translate-y-0"
            leave-active-class="transition-all duration-200 ease-in"
            leave-from-class="opacity-100 translate-y-0"
            leave-to-class="opacity-0 -translate-y-4"
        >
            <div
                v-if="isMobileMenuOpen"
                class="lg:hidden bg-[#222222]/98 backdrop-blur-md border-t border-[#333333]"
            >
                <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col gap-2">
                    <Link
                        v-for="link in navLinks"
                        :key="link.href"
                        :href="link.href"
                        class="px-4 py-3 text-white/80 hover:text-white hover:bg-white/5 rounded-sm transition-colors duration-200 font-medium"
                        @click="closeMobileMenu"
                    >
                        {{ link.label }}
                    </Link>
                    <Link
                        href="/contact"
                        class="mt-4 px-6 py-3 border border-[#00C4CC] text-[#00C4CC] font-bold uppercase tracking-widest text-[11px] rounded-full text-center hover:bg-[#00C4CC] hover:text-white transition-colors duration-200"
                        @click="closeMobileMenu"
                    >
                        Contact
                    </Link>
                </div>
            </div>
        </Transition>
    </header>
</template>
