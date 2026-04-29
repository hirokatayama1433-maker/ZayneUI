/**
 * zayne/sidebar.js
 * Manages sidebar collapsed state via <html> class.
 */

const Sidebar = {
    get collapsed() {
        return document.documentElement.classList.contains('sidebar-collapsed');
    },

    get collapseWidth() {
        const primarySidebar = document.querySelector('.zaynesidebar');

        return primarySidebar?.dataset.collapseMode === 'fullclosed' ? '0px' : '51px';
    },

    sync() {
        document.querySelectorAll('.zaynesidebar').forEach((sidebar) => {
            sidebar.dataset.sidebar = this.collapsed ? 'collapsed' : 'expanded';
        });

        document.documentElement.style.setProperty('--sidebar-w-collapsed', this.collapseWidth);
    },

    collapse() {
        document.documentElement.classList.add('sidebar-collapsed');
        localStorage.setItem('zayne-sidebar', 'true');
        this.sync();
    },

    expand() {
        document.documentElement.classList.remove('sidebar-collapsed');
        localStorage.setItem('zayne-sidebar', 'false');
        this.sync();
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
else {
    Sidebar.sync();
}

window.Zayne = window.Zayne || {};
window.Zayne.Sidebar = Sidebar;
