import { ref, watch } from 'vue';

export type Theme = 'light' | 'dark' | 'system';

const theme = ref<Theme>('system');
const isDark = ref(false);

function applyTheme() {
    if (typeof window === 'undefined') return;

    if (
        theme.value === 'dark' ||
        (theme.value === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)
    ) {
        document.documentElement.classList.add('dark');
        isDark.value = true;
    } else {
        document.documentElement.classList.remove('dark');
        isDark.value = false;
    }
}

export function useTheme() {
    function initTheme() {
        if (typeof window === 'undefined') return;
        
        const savedTheme = localStorage.getItem('theme') as Theme | null;
        if (savedTheme && ['light', 'dark', 'system'].includes(savedTheme)) {
            theme.value = savedTheme;
        }
        
        applyTheme();

        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
            if (theme.value === 'system') {
                applyTheme();
            }
        });
    }

    function setTheme(newTheme: Theme) {
        theme.value = newTheme;
        if (typeof window !== 'undefined') {
            localStorage.setItem('theme', newTheme);
            applyTheme();
        }
    }

    function toggleTheme() {
        setTheme(isDark.value ? 'light' : 'dark');
    }

    return {
        theme,
        isDark,
        initTheme,
        setTheme,
        toggleTheme
    };
}
