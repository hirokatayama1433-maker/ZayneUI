/**
 * zayne/sidebar.js
 * Manages sidebar collapsed state via <html> class.
 */

const Sidebar = {
    get collapsed() {
        return document.documentElement.classList.contains('sidebar-collapsed');
    },

    collapse() {
        document.documentElement.classList.add('sidebar-collapsed');
        localStorage.setItem('zayne-sidebar', 'true');
    },

    expand() {
        document.documentElement.classList.remove('sidebar-collapsed');
        localStorage.setItem('zayne-sidebar', 'false');
    },

    toggle() {
        if (this.collapsed) this.expand();
        else this.collapse();
    },
};

// Restore on load
if (localStorage.getItem('zayne-sidebar') === 'true') {
    Sidebar.collapse();
}

window.Zayne = window.Zayne || {};
window.Zayne.Sidebar = Sidebar;
