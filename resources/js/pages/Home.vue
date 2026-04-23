<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import { ref, onMounted } from 'vue'

const props = defineProps<{
    about: {
        home_title: string;
        home_text: string;
        home_image: string;
    }
    divisions: Array<{
        id: number
        name: string
        slug: string
        tagline: string
        description: string
        hero_image: string | null
        color: string
        order: number
        services: Array<{ id: number; title: string; description: string }>
    }>
    partners: Array<{
        id: number
        name: string
        logo: string | null
        website: string
    }>
    stats: {
        founded: string
        countries: string
        employees: string
        projects: string
    }
}>()

const isVisible = ref(false)
onMounted(() => {
    setTimeout(() => { isVisible.value = true }, 100)
})
</script>

<template>
    <div>
        <!-- Hero Section -->
        <section class="relative min-h-screen flex items-center overflow-hidden bg-[#222222]">
            <!-- Background photo -->
            <div class="absolute inset-0">
                <video
                    src="https://e7group.ae/public/assets/img/banner/home_banner.mp4"
                    alt="Industrial Machinery"
                    class="w-full h-full object-cover"
                    loading="eager"
                    autoplay
                    muted
                    loop
                />
                <div class="absolute inset-0 bg-black/40" />
            </div>

            <!-- Content -->
            <div class="relative w-full max-w-7xl mx-auto px-6 lg:px-8 pt-32 pb-20 mt-10">
                <Transition
                    appear
                    enter-active-class="transition-all duration-1000 ease-out"
                    enter-from-class="opacity-0 translate-y-8"
                    enter-to-class="opacity-100 translate-y-0"
                >
                    <div class="max-w-[1000px]">
                        <h1 class="text-[3rem] sm:text-[4rem] md:text-[5rem] lg:text-[6.5rem] font-bold text-white uppercase leading-[0.9] tracking-tighter mix-blend-normal">
                            TRUSTED<br />
                            SOLUTIONS FOR<br />
                            YOUR BUSINESS<br />
                            ACROSS THE KSA
                        </h1>
                    </div>
                </Transition>
            </div>

            <div class="absolute bottom-12 left-1/2 -translate-x-1/2 text-white/70 animate-bounce">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="square" stroke-linejoin="miter" stroke-width="1.5" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </div>
        </section>

        <!-- About Us Section -->
        <section class="py-24 lg:py-32 bg-[#F2F2F2]">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 lg:gap-24 items-center">
                    <div>
                        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-[#222222] leading-[1.15] tracking-tight mb-8">
                            {{ about.home_title }}
                        </h2>
                        <div class="space-y-6 text-[#222222]/70 text-lg leading-relaxed mb-10 whitespace-pre-wrap">{{ about.home_text }}</div>
                        <Link href="/about" class="inline-flex items-center justify-center px-8 py-3.5 border border-[#00C4CC] text-[#00C4CC] font-bold text-xs uppercase tracking-widest rounded-full hover:bg-[#00C4CC] hover:text-white transition-all duration-300">
                            View More
                        </Link>
                    </div>
                    <div class="relative w-full h-full min-h-[400px]">
                        <img
                            :src="about.home_image || 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&q=80'"
                            alt="e7 Group operations"
                            class="absolute inset-0 w-full h-full object-cover"
                            loading="lazy"
                        />
                    </div>
                </div>
            </div>
        </section>

        <!-- Business Expertise Cards -->
        <section class="py-24 lg:py-32 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-[#222222] tracking-tight">Areas of Expertise</h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div
                        v-for="(division, index) in divisions.slice(0, 4)"
                        :key="division.id"
                        class="bg-white border border-[#eaeaea] group hover:shadow-2xl transition-all duration-500 overflow-hidden flex flex-col h-full"
                    >
                        <div class="relative w-full h-50 overflow-hidden bg-[#222222]">
                            <img
                                :src="division.hero_image || 'https://images.unsplash.com/photo-1589939705384-5185137a7f0f?w=800&q=80'"
                                :alt="division.name"
                                class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-700"
                            />
                        </div>
                        <div class="p-8 flex flex-col flex-1">
                            <h3 class="text-2xl font-bold text-[#222222] mb-3">{{ division.name }}</h3>
                            <p class="text-[#222222]/60 text-sm leading-relaxed mb-8 flex-1">
                                {{ division.description.length > 100 ? division.description.substring(0, 50) + '...' : division.description }}
                            </p>
                            <Link
                                :href="`/capabilities/${division.slug}`"
                                class="inline-flex w-full items-center justify-center px-6 py-3 border border-[#00C4CC] text-[#00C4CC] font-bold text-[11px] uppercase tracking-widest rounded-full hover:bg-[#00C4CC] hover:text-white transition-all duration-300"
                            >
                                Contact Us
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bottom Feature Links (Investor Relations & Careers) -->
        <section class="bg-white pb-24 lg:pb-32">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid md:grid-cols-2 gap-6 w-full h-[500px]">

                    <!-- Investor Relations -->
                    <Link href="/partners" class="relative group block h-full w-full overflow-hidden bg-[#222222]">
                        <img
                            src="https://images.unsplash.com/photo-1560520653-9e0e4c89eb11?w=900&q=80"
                            alt="Investor Relations"
                            class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-1000"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent" />
                        <div class="absolute inset-x-0 bottom-0 p-10 flex items-center justify-between">
                            <h3 class="text-3xl md:text-4xl font-bold text-white">Investor Relations</h3>
                            <div class="w-14 h-14 bg-[#00C4CC] text-white flex items-center justify-center rotate-45 group-hover:rotate-0 transition-transform duration-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="square" stroke-linejoin="miter" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </Link>

                    <!-- Careers -->
                    <Link href="/contact" class="relative group block h-full w-full overflow-hidden bg-[#222222]">
                        <img
                            src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=900&q=80"
                            alt="Careers"
                            class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-1000"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent" />
                        <div class="absolute inset-x-0 bottom-0 p-10 flex items-center justify-between">
                            <h3 class="text-3xl md:text-4xl font-bold text-white">Careers</h3>
                            <div class="w-14 h-14 bg-[#00C4CC] text-white flex items-center justify-center rotate-45 group-hover:rotate-0 transition-transform duration-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="square" stroke-linejoin="miter" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </Link>

                </div>
            </div>
        </section>

    </div>
</template>
