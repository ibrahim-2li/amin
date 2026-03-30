<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const form = useForm({
    name: '',
    email: '',
    company: '',
    subject: '',
    message: '',
})

const page = usePage()
const successMessage = computed(() => page.props.flash?.success)

function submit() {
    form.post('/contact', {
        onSuccess: () => form.reset(),
    })
}
</script>

<template>
    <div>
        <Transition
            enter-active-class="transition-all duration-500"
            enter-from-class="opacity-0 -translate-y-2"
            enter-to-class="opacity-100 translate-y-0"
        >
            <div
                v-if="successMessage"
                class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm rounded-sm"
            >
                {{ successMessage }}
            </div>
        </Transition>

        <form @submit.prevent="submit" class="space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">
                        Full Name <span class="text-red-500">*</span>
                    </label>
                    <input
                        id="name"
                        v-model="form.name"
                        type="text"
                        autocomplete="name"
                        class="w-full px-4 py-3 border bg-white text-[#0b1f3a] placeholder-slate-400 focus:outline-none focus:border-[#c9a84c] transition-colors duration-200 text-sm"
                        :class="form.errors.name ? 'border-red-400' : 'border-slate-200'"
                        placeholder="John Smith"
                    />
                    <p v-if="form.errors.name" class="mt-1 text-xs text-red-500">{{ form.errors.name }}</p>
                </div>
                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">
                        Email Address <span class="text-red-500">*</span>
                    </label>
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        autocomplete="email"
                        class="w-full px-4 py-3 border bg-white text-[#0b1f3a] placeholder-slate-400 focus:outline-none focus:border-[#c9a84c] transition-colors duration-200 text-sm"
                        :class="form.errors.email ? 'border-red-400' : 'border-slate-200'"
                        placeholder="john@company.com"
                    />
                    <p v-if="form.errors.email" class="mt-1 text-xs text-red-500">{{ form.errors.email }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="company" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">
                        Company / Organisation
                    </label>
                    <input
                        id="company"
                        v-model="form.company"
                        type="text"
                        autocomplete="organization"
                        class="w-full px-4 py-3 border border-slate-200 bg-white text-[#0b1f3a] placeholder-slate-400 focus:outline-none focus:border-[#c9a84c] transition-colors duration-200 text-sm"
                        placeholder="Company Name"
                    />
                </div>
                <div>
                    <label for="subject" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">
                        Subject <span class="text-red-500">*</span>
                    </label>
                    <input
                        id="subject"
                        v-model="form.subject"
                        type="text"
                        class="w-full px-4 py-3 border bg-white text-[#0b1f3a] placeholder-slate-400 focus:outline-none focus:border-[#c9a84c] transition-colors duration-200 text-sm"
                        :class="form.errors.subject ? 'border-red-400' : 'border-slate-200'"
                        placeholder="How can we help?"
                    />
                    <p v-if="form.errors.subject" class="mt-1 text-xs text-red-500">{{ form.errors.subject }}</p>
                </div>
            </div>

            <div>
                <label for="message" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">
                    Message <span class="text-red-500">*</span>
                </label>
                <textarea
                    id="message"
                    v-model="form.message"
                    rows="6"
                    class="w-full px-4 py-3 border bg-white text-[#0b1f3a] placeholder-slate-400 focus:outline-none focus:border-[#c9a84c] transition-colors duration-200 text-sm resize-none"
                    :class="form.errors.message ? 'border-red-400' : 'border-slate-200'"
                    placeholder="Tell us about your project or enquiry..."
                />
                <p v-if="form.errors.message" class="mt-1 text-xs text-red-500">{{ form.errors.message }}</p>
            </div>

            <button
                type="submit"
                :disabled="form.processing"
                class="w-full sm:w-auto px-10 py-4 bg-[#0b1f3a] text-white font-semibold text-sm uppercase tracking-widest hover:bg-[#c9a84c] hover:text-[#0b1f3a] transition-colors duration-300 disabled:opacity-60 disabled:cursor-not-allowed"
            >
                <span v-if="!form.processing">Send Message</span>
                <span v-else class="flex items-center gap-2">
                    <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                    </svg>
                    Sending…
                </span>
            </button>
        </form>
    </div>
</template>
