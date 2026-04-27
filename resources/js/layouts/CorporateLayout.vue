<script setup lang="ts">
import Navbar from '@/components/corporate/Navbar.vue'
import Footer from '@/components/corporate/Footer.vue'
import { usePage } from '@inertiajs/vue3'
import { onMounted } from 'vue'
import { useTheme } from '@/composables/useTheme'
import { useTranslations } from '@/composables/useTranslations'

const page = usePage()
const { initTheme } = useTheme()
const { isRtl } = useTranslations()

onMounted(() => {
    initTheme()
})
</script>

<template>
    <div :dir="isRtl ? 'rtl' : 'ltr'" class="min-h-screen flex flex-col bg-slate-50 text-slate-900 dark:bg-slate-950 dark:text-slate-50 selection:bg-cyan-500/30 transition-colors duration-300">
        <Navbar />
        <main class="flex-1">
            <slot />
        </main>
        <Footer />
    </div>
</template>
