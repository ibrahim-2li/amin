<script setup lang="ts">
defineProps<{
    eyebrow?: string
    title: string
    subtitle?: string
    centered?: boolean
    light?: boolean
}>()
</script>

<template>
    <div :class="centered ? 'text-center' : ''">
        <p
            v-if="eyebrow"
            class="text-xs font-semibold uppercase tracking-widest mb-3"
            :class="light ? 'text-[#c9a84c]' : 'text-[#c9a84c]'"
        >
            {{ eyebrow }}
        </p>
        <h2
            class="text-3xl md:text-4xl lg:text-5xl font-bold leading-tight tracking-tight"
            :class="light ? 'text-white' : 'text-[#0b1f3a]'"
        >
            {{ title }}
        </h2>
        <p
            v-if="subtitle"
            class="mt-4 text-base md:text-lg leading-relaxed max-w-2xl"
            :class="[light ? 'text-white/60' : 'text-slate-500', centered ? 'mx-auto' : '']"
        >
            {{ subtitle }}
        </p>
    </div>
</template>
