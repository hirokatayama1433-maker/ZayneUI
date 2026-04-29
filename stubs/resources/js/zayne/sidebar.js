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

        if (!primarySidebar) {
            return '51px';
        }

        if (primarySidebar.dataset.collapseMode === 'fullclosed') {
            return '0px';
        }

        const frame = primarySidebar.querySelector('.zaynesidebar-frame');
        const nav = primarySidebar.querySelector('nav');
        const iconRailItem = primarySidebar.querySelector('[data-sidebar-item]');

        const shellStyles = getComputedStyle(primarySidebar);
        const frameStyles = frame ? getComputedStyle(frame) : null;
        const navStyles = nav ? getComputedStyle(nav) : null;

        const shellWidth = this.getHorizontalSpace(shellStyles, 'padding');
        const frameWidth = frameStyles
            ? this.getHorizontalSpace(frameStyles, 'padding') + this.getHorizontalSpace(frameStyles, 'border', 'Width')
            : 0;
        const navWidth = navStyles ? this.getHorizontalSpace(navStyles, 'padding') : 0;
        const iconRailWidth = iconRailItem
            ? Math.ceil(iconRailItem.getBoundingClientRect().height)
            : 34;

        return `${Math.ceil(shellWidth + frameWidth + navWidth + iconRailWidth)}px`;
    },

    getHorizontalSpace(styles, prefix, suffix = '') {
        const left = Number.parseFloat(styles[`${prefix}Left${suffix}`]) || 0;
        const right = Number.parseFloat(styles[`${prefix}Right${suffix}`]) || 0;

        return left + right;
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

window.addEventListener('resize', () => {
    Sidebar.sync();
});

window.Zayne = window.Zayne || {};
window.Zayne.Sidebar = Sidebar;
