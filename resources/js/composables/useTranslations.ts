import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

export function useTranslations() {
    const page = usePage();

    const locale = computed(() => (page.props.locale as string) || 'en');
    const isRtl = computed(() => locale.value === 'ar');
    
    const translations = computed(
        () => (page.props.translations as Record<string, string>) || {},
    );

    const t = (key: string): string => {
        return translations.value[key] || key;
    };

    return {
        locale,
        isRtl,
        t,
    };
}
