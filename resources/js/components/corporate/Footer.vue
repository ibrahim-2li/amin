<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

const divisions = [
    { label: 'Secure Identity & Digital Trust', href: '/capabilities/secure-identity-digital-trust' },
    { label: 'Advanced Packaging Technologies', href: '/capabilities/advanced-packaging-technologies' },
    { label: 'Smart Printing Solutions', href: '/capabilities/smart-printing-solutions' },
    { label: 'Education & Knowledge Systems', href: '/capabilities/education-knowledge-systems' },
    { label: 'Intelligent Logistics & Fulfilment', href: '/capabilities/intelligent-logistics-fulfilment' },
]

const company = [
    { label: 'About Us', href: '/about' },
    { label: 'Capabilities', href: '/capabilities' },
    { label: 'Sustainability', href: '/sustainability' },
    { label: 'Quality & Compliance', href: '/quality' },
    { label: 'Partners', href: '/partners' },
    { label: 'Contact', href: '/contact' },
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
                        <div class="w-8 h-8 bg-[#c9a84c] rounded-sm flex items-center justify-center">
                            <span class="text-[#0b1f3a] font-black text-sm">A</span>
                        </div>
                        <span class="text-white font-bold text-xl tracking-tight">
                            Amin<span class="text-[#c9a84c]">Group</span>
                        </span>
                    </div>
                    <p class="text-white/50 text-sm leading-relaxed mb-8">
                        A diversified group delivering world-class solutions across identity, packaging, printing, education, and logistics — trusted by governments and enterprises across the MENA region.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-9 h-9 rounded-full border border-white/20 flex items-center justify-center text-white/50 hover:text-[#c9a84c] hover:border-[#c9a84c] transition-colors duration-200">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-full border border-white/20 flex items-center justify-center text-white/50 hover:text-[#c9a84c] hover:border-[#c9a84c] transition-colors duration-200">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
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

                <!-- Divisions Links -->
                <div class="lg:col-span-2">
                    <h3 class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-6">Our Divisions</h3>
                    <ul class="space-y-3">
                        <li v-for="division in divisions" :key="division.href">
                            <Link :href="division.href" class="text-white/50 hover:text-white text-sm transition-colors duration-200">
                                {{ division.label }}
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
                    <a href="mailto:info@amingroup.ae" class="hover:text-[#c9a84c] transition-colors duration-200 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        info@amingroup.ae
                    </a>
                    <a href="tel:+97140000000" class="hover:text-[#c9a84c] transition-colors duration-200 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        +971 4 000 0000
                    </a>
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Dubai, United Arab Emirates
                    </span>
                </div>
                <p class="text-white/30 text-xs">
                    &copy; {{ new Date().getFullYear() }} Amin Group. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</template>
