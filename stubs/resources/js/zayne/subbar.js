/**
 * zayne/subbar.js
 * Manages inner content sub-sidebar collapsed state.
 */

const Subbar = {
    get collapsed() {
        return document.documentElement.classList.contains('subbar-collapsed');
    },

    collapse() {
        document.documentElement.classList.add('subbar-collapsed');
        localStorage.setItem('zayne-subbar', 'true');
    },

    expand() {
        document.documentElement.classList.remove('subbar-collapsed');
        localStorage.setItem('zayne-subbar', 'false');
    },

    toggle() {
        if (this.collapsed) this.expand();
        else this.collapse();
    },
};

// Restore on load
if (localStorage.getItem('zayne-subbar') === 'true') {
    Subbar.collapse();
}

window.Zayne = window.Zayne || {};
window.Zayne.Subbar = Subbar;
