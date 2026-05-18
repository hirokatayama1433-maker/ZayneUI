document.addEventListener('alpine:init', () => {
    Alpine.data('zayneLayout', () => ({
        sidebarCollapsed: false,
        mobileOpen: false,
    }));

    Alpine.data('zayneModal', () => ({
        open: false,
    }));

    Alpine.data('zayneDrawer', () => ({
        open: false,
    }));

    Alpine.data('zayneDropdown', () => ({
        open: false,
    }));

    Alpine.data('zayneTooltip', () => ({
        open: false,
    }));

    Alpine.data('zaynePopover', () => ({
        open: false,
    }));
});
