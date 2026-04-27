<script setup lang="ts">
import { useForm, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const form = useForm({
    name: '',
    email: '',
    company: '',
    subject: '',
    message: '',
});

const page = usePage();
const successMessage = computed(() => {
    const flash = page.props.flash as { success?: string | null } | undefined;

    return flash?.success;
});

function submit() {
    form.post('/contact', {
        onSuccess: () => form.reset(),
    });
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
                class="mb-6 border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800"
            >
                {{ successMessage }}
            </div>
        </Transition>

        <form class="space-y-6" @submit.prevent="submit">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                    <label
                        for="name"
                        class="mb-2 block text-xs font-semibold tracking-wider text-slate-500 uppercase"
                    >
                        Full Name <span class="text-red-500">*</span>
                    </label>
                    <input
                        id="name"
                        v-model="form.name"
                        type="text"
                        autocomplete="name"
                        class="w-full border bg-white px-4 py-3 text-sm text-[#12343b] placeholder-slate-400 transition-colors duration-200 focus:border-[#00c4cc] focus:outline-none"
                        :class="
                            form.errors.name
                                ? 'border-red-400'
                                : 'border-[#1f2933]/10'
                        "
                        placeholder="John Smith"
                    />
                    <p
                        v-if="form.errors.name"
                        class="mt-1 text-xs text-red-500"
                    >
                        {{ form.errors.name }}
                    </p>
                </div>
                <div>
                    <label
                        for="email"
                        class="mb-2 block text-xs font-semibold tracking-wider text-slate-500 uppercase"
                    >
                        Email Address <span class="text-red-500">*</span>
                    </label>
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        autocomplete="email"
                        class="w-full border bg-white px-4 py-3 text-sm text-[#12343b] placeholder-slate-400 transition-colors duration-200 focus:border-[#00c4cc] focus:outline-none"
                        :class="
                            form.errors.email
                                ? 'border-red-400'
                                : 'border-[#1f2933]/10'
                        "
                        placeholder="john@company.com"
                    />
                    <p
                        v-if="form.errors.email"
                        class="mt-1 text-xs text-red-500"
                    >
                        {{ form.errors.email }}
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                    <label
                        for="company"
                        class="mb-2 block text-xs font-semibold tracking-wider text-slate-500 uppercase"
                    >
                        Company / Organisation
                    </label>
                    <input
                        id="company"
                        v-model="form.company"
                        type="text"
                        autocomplete="organization"
                        class="w-full border border-[#1f2933]/10 bg-white px-4 py-3 text-sm text-[#12343b] placeholder-slate-400 transition-colors duration-200 focus:border-[#00c4cc] focus:outline-none"
                        placeholder="Company Name"
                    />
                </div>
                <div>
                    <label
                        for="subject"
                        class="mb-2 block text-xs font-semibold tracking-wider text-slate-500 uppercase"
                    >
                        Subject <span class="text-red-500">*</span>
                    </label>
                    <input
                        id="subject"
                        v-model="form.subject"
                        type="text"
                        class="w-full border bg-white px-4 py-3 text-sm text-[#12343b] placeholder-slate-400 transition-colors duration-200 focus:border-[#00c4cc] focus:outline-none"
                        :class="
                            form.errors.subject
                                ? 'border-red-400'
                                : 'border-[#1f2933]/10'
                        "
                        placeholder="How can we help?"
                    />
                    <p
                        v-if="form.errors.subject"
                        class="mt-1 text-xs text-red-500"
                    >
                        {{ form.errors.subject }}
                    </p>
                </div>
            </div>

            <div>
                <label
                    for="message"
                    class="mb-2 block text-xs font-semibold tracking-wider text-slate-500 uppercase"
                >
                    Message <span class="text-red-500">*</span>
                </label>
                <textarea
                    id="message"
                    v-model="form.message"
                    rows="6"
                    class="w-full resize-none border bg-white px-4 py-3 text-sm text-[#12343b] placeholder-slate-400 transition-colors duration-200 focus:border-[#00c4cc] focus:outline-none"
                    :class="
                        form.errors.message
                            ? 'border-red-400'
                            : 'border-[#1f2933]/10'
                    "
                    placeholder="Tell us about your project or enquiry..."
                />
                <p v-if="form.errors.message" class="mt-1 text-xs text-red-500">
                    {{ form.errors.message }}
                </p>
            </div>

            <button
                type="submit"
                :disabled="form.processing"
                class="w-full bg-[#12343b] px-10 py-4 text-sm font-bold tracking-widest text-white uppercase transition-colors duration-300 hover:bg-[#00c4cc] hover:text-[#09212b] disabled:cursor-not-allowed disabled:opacity-60 sm:w-auto"
            >
                <span v-if="!form.processing">Send Message</span>
                <span v-else class="flex items-center gap-2">
                    <svg
                        class="h-4 w-4 animate-spin"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <circle
                            class="opacity-25"
                            cx="12"
                            cy="12"
                            r="10"
                            stroke="currentColor"
                            stroke-width="4"
                        />
                        <path
                            class="opacity-75"
                            fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"
                        />
                    </svg>
                    Sending...
                </span>
            </button>
        </form>
    </div>
</template>
