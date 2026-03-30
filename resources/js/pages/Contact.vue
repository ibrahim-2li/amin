<script setup lang="ts">
import SectionTitle from '@/components/corporate/SectionTitle.vue'
import ContactForm from '@/components/corporate/ContactForm.vue'
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
                    Whether you have a specific project in mind or simply want to understand how Amin Group can help — we'd be glad to hear from you.
                </p>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="py-24 lg:py-32 bg-white">
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
                                <p class="text-slate-600 leading-relaxed">
                                    Amin Group Headquarters<br />
                                    Dubai, United Arab Emirates
                                </p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-2">Email</p>
                                <a href="mailto:info@amingroup.ae" class="text-slate-600 hover:text-[#c9a84c] transition-colors duration-200">
                                    info@amingroup.ae
                                </a>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-2">Telephone</p>
                                <a href="tel:+97140000000" class="text-slate-600 hover:text-[#c9a84c] transition-colors duration-200">
                                    +971 4 000 0000
                                </a>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-2">Business Hours</p>
                                <p class="text-slate-600 leading-relaxed">
                                    Sunday – Thursday<br />
                                    8:00 AM – 5:00 PM GST
                                </p>
                            </div>
                        </div>

                        <!-- Division enquiries -->
                        <div class="mt-12 p-6 bg-slate-50 border border-slate-100">
                            <p class="text-xs font-semibold uppercase tracking-widest text-[#c9a84c] mb-4">Division Enquiries</p>
                            <ul class="space-y-2 text-sm text-slate-500">
                                <li>Identity Solutions: identity@amingroup.ae</li>
                                <li>Packaging: packaging@amingroup.ae</li>
                                <li>Printing: printing@amingroup.ae</li>
                                <li>Education: education@amingroup.ae</li>
                                <li>Logistics: logistics@amingroup.ae</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Form -->
                    <div class="lg:col-span-2">
                        <SectionTitle
                            eyebrow="Send a Message"
                            title="Tell us about your project."
                        />
                        <div class="mt-10">
                            <ContactForm />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Map placeholder -->
        <section class="h-80 bg-[#0b1f3a] relative overflow-hidden">
            <div class="absolute inset-0 flex items-center justify-center opacity-10">
                <svg class="w-48 h-48 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                </svg>
            </div>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-center">
                    <div class="w-3 h-3 bg-[#c9a84c] rounded-full mx-auto mb-2 animate-pulse" />
                    <p class="text-white/50 text-sm">Dubai, United Arab Emirates</p>
                </div>
            </div>
        </section>
    </div>
</template>
