<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

defineProps<{
    division: {
        id: number
        name: string
        slug: string
        tagline: string
        description: string
        color: string
        order: number
    }
    index?: number
}>()
</script>

<template>
    <Link
        :href="`/capabilities/${division.slug}`"
        class="group relative flex flex-col overflow-hidden rounded-sm border border-slate-200 bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300"
    >
        <!-- Color accent bar -->
        <div class="h-1 w-full" :style="{ backgroundColor: division.color }" />

        <div class="p-8 flex-1 flex flex-col">
            <!-- Number -->
            <span class="text-xs font-bold tracking-widest text-slate-300 mb-6">
                {{ String(index !== undefined ? index + 1 : 1).padStart(2, '0') }}
            </span>

            <!-- Icon placeholder -->
            <div
                class="w-12 h-12 rounded-sm flex items-center justify-center mb-6 opacity-80"
                :style="{ backgroundColor: division.color + '18' }"
            >
                <svg class="w-6 h-6" :style="{ color: division.color }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
            </div>

            <h3 class="text-lg font-bold text-[#0b1f3a] mb-3 group-hover:text-[#c9a84c] transition-colors duration-200 leading-snug">
                {{ division.name }}
            </h3>
            <p class="text-sm text-slate-500 leading-relaxed flex-1">
                {{ division.description.length > 120 ? division.description.substring(0, 120) + '…' : division.description }}
            </p>

            <!-- Arrow -->
            <div class="mt-6 flex items-center gap-2 text-xs font-semibold uppercase tracking-wider" :style="{ color: division.color }">
                <span>Explore</span>
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </div>
        </div>
    </Link>
</template>
