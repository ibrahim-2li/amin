<script setup lang="ts">
import Navbar from '@/components/corporate/Navbar.vue'
import Footer from '@/components/corporate/Footer.vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()
</script>

<template>
    <div class="min-h-screen flex flex-col bg-white">
        <Navbar />
        <main class="flex-1">
            <slot />
        </main>
        <Footer />
    </div>
</template>
