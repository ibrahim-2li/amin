import { createInertiaApp } from '@inertiajs/vue3';
import { initializeTheme } from '@/composables/useAppearance';
import AppLayout from '@/layouts/AppLayout.vue';
import AuthLayout from '@/layouts/AuthLayout.vue';
import CorporateLayout from '@/layouts/CorporateLayout.vue';
import SettingsLayout from '@/layouts/settings/Layout.vue';

const appName = import.meta.env.VITE_APP_NAME || 'Amin Group';

const corporatePages = new Set([
    'Home',
    'About',
    'Divisions/Index',
    'Divisions/Show',
    'Sustainability',
    'Quality',
    'Partners',
    'Contact',
]);

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),
    layout: (name) => {
        switch (true) {
            case corporatePages.has(name):
                return CorporateLayout;
            case name.startsWith('auth/'):
                return AuthLayout;
            case name.startsWith('settings/'):
                return [AppLayout, SettingsLayout];
            case name.startsWith('admin/'):
                return AppLayout;
            default:
                return AppLayout;
        }
    },
    progress: {
        color: '#c9a84c',
    },
});

// This will set light / dark mode on page load...
initializeTheme();
