<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const page = usePage()
const settings = computed(() => page.props.settings as Record<string, string>)
const appName = computed(() => page.props.name as string || 'AMIN Group')
const appNameFirstPart = computed(() => {
    const parts = appName.value.trim().split(' ')
    return parts[0]
})
const appNameSecondPart = computed(() => {
    const parts = appName.value.trim().split(' ')
    return parts.slice(1).join(' ')
})

const businessUnits = computed(() => (page.props.navDivisions as Array<any>) || [])

const company = [
    { label: 'About Us', href: '/about' },
    { label: 'Areas of Expertise', href: '/capabilities' },
    { label: 'Our Commitment', href: '/sustainability' },
    { label: 'Investor Relations', href: '/partners' },
    { label: 'Careers', href: '/contact' },
]
</script>

<template>
    <footer class="bg-[#222222] text-white">
        <!-- Main Footer -->
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16 lg:py-20">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <!-- Brand -->
                <div class="lg:col-span-1 border-r border-white/10 pr-8">
                    <div class="flex items-baseline mb-6">
                        <span class="text-[#00C4CC] font-black text-4xl tracking-tighter">{{ appNameFirstPart }}</span>
                        <span v-if="appNameSecondPart" class="text-white font-medium text-lg ml-2 tracking-wide uppercase">{{ appNameSecondPart }}</span>
                    </div>
                </div>

                <!-- Company Links -->
                <div>
                    <h3 class="text-sm font-semibold mb-6">Company</h3>
                    <ul class="space-y-3">
                        <li v-for="link in company" :key="link.href">
                            <Link :href="link.href" class="text-white/70 hover:text-[#00C4CC] text-sm transition-colors duration-200">
                                {{ link.label }}
                            </Link>
                        </li>
                    </ul>
                </div>

                <!-- Business Units -->
                <div>
                    <h3 class="text-sm font-semibold mb-6">Business Units</h3>
                    <ul class="space-y-3">
                        <li v-for="unit in businessUnits" :key="unit.slug">
                            <Link :href="`/capabilities/${unit.slug}`" class="text-white/70 hover:text-[#00C4CC] text-sm transition-colors duration-200">
                                {{ unit.name }}
                            </Link>
                        </li>
                    </ul>
                </div>

                <!-- Contact & Social -->
                <div>
                    <h3 class="text-sm font-semibold mb-6">Get in touch</h3>
                    <p class="text-white/70 text-sm mb-2">{{ settings.address }}</p>
                    <a :href="`mailto:${settings.email}`" class="block text-white/70 hover:text-[#00C4CC] text-sm mb-4 transition-colors">{{ settings.email }}</a>
                    <div class="flex gap-4 mt-6">
                        <a v-if="settings.linkedin" :href="settings.linkedin" target="_blank" class="text-white/70 hover:text-[#00C4CC] transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                        <a v-if="settings.instagram" :href="settings.instagram" target="_blank" class="text-white/70 hover:text-[#00C4CC] transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a v-if="settings.twitter" :href="settings.twitter" target="_blank" class="text-white/70 hover:text-[#00C4CC] transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="mt-16 pt-8 border-t border-white/10 flex flex-col items-center">
                <p class="text-white/50 text-sm">
                    &copy; {{ new Date().getFullYear() }} {{ appName }}. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</template>
