<script setup lang="ts">
defineProps<{
    service: {
        id: number
        title: string
        description: string
        icon?: string | null
    }
    accentColor?: string
}>()
</script>

<template>
    <div class="group p-6 bg-white border border-slate-100 hover:border-transparent hover:shadow-lg rounded-sm transition-all duration-300">
        <!-- Icon -->
        <div
            class="w-10 h-10 rounded-sm flex items-center justify-center mb-4"
            :style="{ backgroundColor: (accentColor ?? '#0b1f3a') + '15' }"
        >
            <svg class="w-5 h-5" :style="{ color: accentColor ?? '#0b1f3a' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        <h4 class="text-base font-semibold text-[#0b1f3a] mb-2 leading-snug">
            {{ service.title }}
        </h4>
        <p class="text-sm text-slate-500 leading-relaxed">
            {{ service.description }}
        </p>
    </div>
</template>
