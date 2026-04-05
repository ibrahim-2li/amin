<script setup lang="ts">
import SectionTitle from '@/components/corporate/SectionTitle.vue'
import ContactForm from '@/components/corporate/ContactForm.vue'
import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const page = usePage()
const settings = computed(() => page.props.settings as Record<string, string>)
const appName = computed(() => page.props.name as string || 'AMIN Group')

const mapUrl = computed(() => {
    if (!settings.value?.address) return '';
    return `https://maps.google.com/maps?q=${encodeURIComponent(settings.value.address)}&t=&z=14&ie=UTF8&iwloc=&output=embed`;
})
</script>

<template>
    <div>
        <!-- Hero -->
        <section class="relative bg-[#0b1f3a] py-40 overflow-hidden">
            <div class="absolute inset-0">
                <img
                    src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=1920&q=80&auto=format&fit=crop"
                    alt=""
                    class="w-full h-full object-cover opacity-15"
                    loading="lazy"
                />
                <div class="absolute inset-0 bg-gradient-to-b from-[#0b1f3a]/80 to-[#0b1f3a]" />
            </div>
            <div class="absolute inset-0 opacity-10" style="background: radial-gradient(ellipse at 40% 50%, rgba(201,168,76,0.5) 0%, transparent 65%);" />
            <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
                <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-4">Get in Touch</p>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white max-w-3xl leading-tight">
                    Let's start a conversation.
                </h1>
                <p class="mt-6 text-white/60 text-lg max-w-2xl leading-relaxed">
                    Whether you have a specific project in mind or simply want to understand how {{ appName }} can help — our team is ready to assist you.
                </p>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="py-24 lg:py-32 bg-white" id="contact">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid lg:grid-cols-3 gap-16">
                    <!-- Contact Info -->
                    <div>
                        <SectionTitle
                            eyebrow="Contact Details"
                            title="Reach us directly."
                        />

                        <div class="mt-10 space-y-8">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-2">Head Office</p>
                                <p class="text-slate-600 leading-relaxed whitespace-pre-wrap">
                                    {{ appName }}
                                    {{ settings.address }}
                                </p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-2">Email</p>
                                <a :href="`mailto:${settings.email}`" class="text-slate-600 hover:text-[#c9a84c] transition-colors duration-200">
                                    {{ settings.email }}
                                </a>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-2">Toll-Free</p>
                                <a :href="`tel:${settings.phone}`" class="text-slate-600 hover:text-[#c9a84c] transition-colors duration-200">
                                    {{ settings.phone }}
                                </a>
                                <p class="text-xs text-slate-400 mt-1">Available in English and Arabic</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-2">Business Hours</p>
                                <p class="text-slate-600 leading-relaxed">
                                    Monday – Friday<br />
                                    8:00 AM – 5:00 PM GST
                                </p>
                            </div>
                        </div>

                        <!-- Business unit enquiries -->
                        <div class="mt-12 p-6 bg-slate-50 border border-slate-100">
                            <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-4">Business Unit Enquiries</p>
                            <ul class="space-y-2 text-sm text-slate-500">
                                <!-- <li>e7 Security: security@e7group.ae</li>
                                <li>e7 Packaging: packaging@e7group.ae</li>
                                <li>e7 Printing: printing@e7group.ae</li>
                                <li>e7 Education: education@e7group.ae</li>
                                <li>Tawzea by e7: tawzea@e7group.ae</li> -->
                            </ul>
                        </div>
                    </div>

                    <!-- Form -->
                    <div class="lg:col-span-2">
                        <SectionTitle
                            eyebrow="Send a Message"
                            title="Tell us about your requirements."
                        />
                        <div class="mt-10">
                            <ContactForm />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Location Map -->
        <section class="h-96 w-full bg-[#0b1f3a] relative overflow-hidden group">
            <iframe
                v-if="mapUrl" 
                :src="mapUrl"
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="false" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"
                class="absolute inset-0 w-full h-full grayscale-[0.8] opacity-80 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-700"
            ></iframe>
            
            <div v-else class="absolute inset-0 flex items-center justify-center opacity-30">
                <div class="text-center">
                    <div class="w-3 h-3 bg-[#c9a84c] rounded-full mx-auto mb-2 animate-pulse" />
                    <p class="text-white text-sm font-semibold max-w-sm">Location details pending</p>
                </div>
            </div>
            
            <!-- Overlay to prevent strict map scrolling until hovered fully (improves page scroll UX) -->
            <div class="absolute inset-0 pointer-events-none group-hover:pointer-events-auto bg-[#0b1f3a]/10 transition-colors duration-500"></div>
        </section>
    </div>
</template>
