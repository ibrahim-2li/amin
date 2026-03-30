<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

const businessUnits = [
    { label: 'e7 Security', href: '/capabilities/e7-security' },
    { label: 'e7 Packaging', href: '/capabilities/e7-packaging' },
    { label: 'e7 Printing', href: '/capabilities/e7-printing' },
    { label: 'e7 Education', href: '/capabilities/e7-education' },
    { label: 'Tawzea by e7', href: '/capabilities/tawzea-by-e7' },
]

const company = [
    { label: 'About Us', href: '/about' },
    { label: 'Areas of Expertise', href: '/capabilities' },
    { label: 'ESG Commitment', href: '/sustainability' },
    { label: 'Partners', href: '/partners' },
    { label: 'Contact Us', href: '/contact' },
]
</script>

<template>
    <footer class="bg-[#080f1e] text-white">
        <!-- Main Footer -->
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16 lg:py-20">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <!-- Brand -->
                <div class="lg:col-span-1">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="w-9 h-9 bg-[#c9a84c] rounded-sm flex items-center justify-center">
                            <span class="text-[#0b1f3a] font-black text-base tracking-tight">e7</span>
                        </div>
                        <span class="text-white font-bold text-xl tracking-tight">
                            <span class="text-[#c9a84c]">e7</span> Group
                        </span>
                    </div>
                    <p class="text-white/50 text-sm leading-relaxed mb-6">
                        From identity solutions to printing, packaging and delivery, we provide seamless integrated solutions — backed by the strength of ADQ.
                    </p>
                    <p class="text-white/30 text-xs mb-6">
                        Plot 220, Old Shahama, Abu Dhabi, UAE
                    </p>
                    <!-- Social -->
                    <div class="flex gap-3">
                        <a href="https://linkedin.com/company/e7groupofficial" target="_blank" rel="noopener" class="w-9 h-9 rounded-full border border-white/20 flex items-center justify-center text-white/50 hover:text-[#c9a84c] hover:border-[#c9a84c] transition-colors duration-200">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                        <a href="https://instagram.com/e7group_official" target="_blank" rel="noopener" class="w-9 h-9 rounded-full border border-white/20 flex items-center justify-center text-white/50 hover:text-[#c9a84c] hover:border-[#c9a84c] transition-colors duration-200">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="https://twitter.com/E7groupofficial" target="_blank" rel="noopener" class="w-9 h-9 rounded-full border border-white/20 flex items-center justify-center text-white/50 hover:text-[#c9a84c] hover:border-[#c9a84c] transition-colors duration-200">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Company Links -->
                <div>
                    <h3 class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-6">Company</h3>
                    <ul class="space-y-3">
                        <li v-for="link in company" :key="link.href">
                            <Link :href="link.href" class="text-white/50 hover:text-white text-sm transition-colors duration-200">
                                {{ link.label }}
                            </Link>
                        </li>
                    </ul>
                </div>

                <!-- Business Units -->
                <div class="lg:col-span-2">
                    <h3 class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-6">Business Units</h3>
                    <ul class="space-y-3">
                        <li v-for="unit in businessUnits" :key="unit.href">
                            <Link :href="unit.href" class="text-white/50 hover:text-white text-sm transition-colors duration-200">
                                {{ unit.label }}
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Contact Bar -->
        <div class="border-t border-white/10">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-8 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex flex-col sm:flex-row gap-6 text-sm text-white/40">
                    <a href="mailto:info@e7group.ae" class="hover:text-[#c9a84c] transition-colors duration-200 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        info@e7group.ae
                    </a>
                    <a href="tel:+971600500877" class="hover:text-[#c9a84c] transition-colors duration-200 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        +971 600500877
                    </a>
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Plot 220, Old Shahama, Abu Dhabi, UAE
                    </span>
                </div>
                <p class="text-white/30 text-xs">
                    &copy; {{ new Date().getFullYear() }} e7 Group. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</template>
