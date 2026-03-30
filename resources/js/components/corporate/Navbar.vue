<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue'
import { Link } from '@inertiajs/vue3'

const isScrolled = ref(false)
const isMobileMenuOpen = ref(false)

const navLinks = [
    { label: 'Home', href: '/' },
    { label: 'About Us', href: '/about' },
    { label: 'Areas of Expertise', href: '/capabilities' },
    { label: 'ESG Commitment', href: '/sustainability' },
    { label: 'Partners', href: '/partners' },
    { label: 'Contact Us', href: '/contact' },
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
        :class="isScrolled ? 'bg-[#0b1f3a]/95 backdrop-blur-md shadow-lg' : 'bg-transparent'"
    >
        <nav class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <Link href="/" class="flex items-center gap-2 group" @click="closeMobileMenu">
                    <div class="flex items-center gap-2">
                        <div class="w-9 h-9 bg-[#c9a84c] rounded-sm flex items-center justify-center">
                            <span class="text-[#0b1f3a] font-black text-base tracking-tight">e7</span>
                        </div>
                        <span class="text-white font-bold text-xl tracking-tight">
                            <span class="text-[#c9a84c]">e7</span> Group
                        </span>
                    </div>
                </Link>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center gap-1">
                    <Link
                        v-for="link in navLinks"
                        :key="link.href"
                        :href="link.href"
                        class="relative px-4 py-2 text-sm font-medium text-white/80 hover:text-white transition-colors duration-200 group"
                    >
                        {{ link.label }}
                        <span class="absolute bottom-0 left-4 right-4 h-px bg-[#c9a84c] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left" />
                    </Link>
                </div>

                <!-- CTA Button -->
                <div class="hidden lg:block">
                    <Link
                        href="/contact"
                        class="px-6 py-2.5 bg-[#c9a84c] text-[#0b1f3a] text-sm font-semibold rounded-sm hover:bg-[#d4b366] transition-colors duration-200 tracking-wide"
                    >
                        Get in Touch
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
                class="lg:hidden bg-[#0b1f3a]/98 backdrop-blur-md border-t border-white/10"
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
                        class="mt-2 px-6 py-3 bg-[#c9a84c] text-[#0b1f3a] font-semibold rounded-sm text-center hover:bg-[#d4b366] transition-colors duration-200"
                        @click="closeMobileMenu"
                    >
                        Get in Touch
                    </Link>
                </div>
            </div>
        </Transition>
    </header>
</template>
