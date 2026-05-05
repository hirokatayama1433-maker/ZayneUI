/**
 * zayne/sidebar.js
 * State on <html>. Static mode ignores toggle.
 * Transitions killed until sidebar-ready — no FOUC.
 */

const Sidebar = {

    get collapsed() {
        return document.documentElement.classList.contains('sidebar-collapsed');
    },

    get mode() {
        return document.querySelector('.zaynesidebar')?.dataset.mode ?? 'collapsible';
    },

    collapse() {
        if (this.mode === 'static') return;
        document.documentElement.classList.add('sidebar-collapsed');
        localStorage.setItem('zayne-sidebar', 'true');
    },

    expand() {
        if (this.mode === 'static') return;
        document.documentElement.classList.remove('sidebar-collapsed');
        localStorage.setItem('zayne-sidebar', 'false');
    },

    toggle() {
        this.collapsed ? this.expand() : this.collapse();
    },

    init() {
        if (localStorage.getItem('zayne-sidebar') === 'true') {
            document.documentElement.classList.add('sidebar-collapsed');
        }

        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                document.documentElement.classList.add('sidebar-ready');
            });
        });
    },
};

Sidebar.init();

window.Zayne = window.Zayne || {};
window.Zayne.Sidebar = Sidebar;