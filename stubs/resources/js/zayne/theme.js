/**
 * zayne/theme.js
 * Manages light / dark / abyss theme via <html> class.
 */

const Theme = {
    current: localStorage.getItem('zayne-theme') || 'light',

    set(theme) {
        this.current = theme;
        document.documentElement.classList.remove('light', 'dark', 'abyss');
        document.documentElement.classList.add(this.current);
        localStorage.setItem('zayne-theme', this.current);
    },

    toggle() {
        if (this.current === 'light') this.set('dark');
        else if (this.current === 'dark') this.set('light');
        else this.set('light');
    },

    isLight() { return this.current === 'light'; },
    isDark()  { return this.current === 'dark';  },
    isAbyss() { return this.current === 'abyss'; },
};

// Apply on load
Theme.set(Theme.current);

window.Zayne = window.Zayne || {};
window.Zayne.Theme = Theme;
