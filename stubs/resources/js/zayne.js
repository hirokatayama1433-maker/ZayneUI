/* ============================================================
|  zayne.js - ZayneUI JavaScript
|  1. POSITIONING
|  2. ALPINE DATA
|  3. SIDEBAR
|  4. SUBBAR
|  5. THEME
============================================================ */

/* ============================================================
|  SECTION 1 - SMART POSITIONING
============================================================ */

function zaynePosition(trigger, panel) {
    if (!trigger || !panel) return;

    const tRect = trigger.getBoundingClientRect();
    const gap   = 8;
    const placement = panel.dataset.zaynePlacement ?? 'bottom-start';

    // Reset to measure natural size
    panel.style.top  = '-9999px';
    panel.style.left = '-9999px';

    const pRect = panel.getBoundingClientRect();
    const vw    = window.innerWidth;
    const vh    = window.innerHeight;

    let top;
    let left;

    if (placement === 'right-center' || placement === 'right-start') {
        left = tRect.right + gap;
        if (left + pRect.width > vw - gap) {
            left = Math.max(gap, tRect.left - pRect.width - gap);
        }

        if (placement === 'right-center') {
            top = tRect.top + ((tRect.height - pRect.height) / 2);
        } else {
            top = tRect.top;
        }
    } else {
        // Vertical — prefer below, flip to above if needed
        const spaceBelow = vh - tRect.bottom;
        const spaceAbove = tRect.top;
        if (spaceBelow >= pRect.height + gap || spaceBelow >= spaceAbove) {
            top = tRect.bottom + gap;
        } else {
            top = tRect.top - pRect.height - gap;
        }

        // Horizontal — align to trigger left, clamp to viewport
        left = tRect.left;
        if (left + pRect.width > vw - gap) {
            left = vw - pRect.width - gap;
        }
        if (left < gap) left = gap;
    }

    if (top + pRect.height > vh - gap) {
        top = vh - pRect.height - gap;
    }
    if (left < gap) left = gap;
    if (top < gap) top = gap;

    panel.style.top  = top  + 'px';
    panel.style.left = left + 'px';
}

/* ============================================================
|  SECTION 2 - ALPINE DATA
============================================================ */

function zayneModal() {
    return {
        open: false,
        show() { this.open = true; },
        hide() { this.open = false; },
    };
}

function zayneDrawer() {
    return {
        open: false,
        show() { this.open = true; },
        hide() { this.open = false; },
    };
}

function zayneDropdown() {
    return {
        open: false,
        hideTimeout: null,
        hoverGroup: null,
        cancelHide() {
            if (this.hideTimeout) {
                clearTimeout(this.hideTimeout);
                this.hideTimeout = null;
            }
        },
        syncHoverGroup(panel) {
            this.hoverGroup = panel?.dataset?.zayneHoverGroup ?? null;
        },
        claimHoverGroup(panel) {
            this.syncHoverGroup(panel);

            if (!this.hoverGroup) return;

            window.__zayneHoverGroups ??= {};

            const active = window.__zayneHoverGroups[this.hoverGroup];
            if (active && active !== this) {
                active.hide();
            }

            window.__zayneHoverGroups[this.hoverGroup] = this;
        },
        releaseHoverGroup() {
            if (!this.hoverGroup || !window.__zayneHoverGroups) return;
            if (window.__zayneHoverGroups[this.hoverGroup] === this) {
                delete window.__zayneHoverGroups[this.hoverGroup];
            }
        },
        show(trigger, panel) {
            this.cancelHide();
            this.claimHoverGroup(panel);
            this.open = true;
            this.$nextTick(() => zaynePosition(trigger, panel));
        },
        toggle(trigger, panel) {
            this.cancelHide();
            this.syncHoverGroup(panel);
            this.open = !this.open;
            if (this.open) {
                this.claimHoverGroup(panel);
                this.$nextTick(() => zaynePosition(trigger, panel));
            } else {
                this.releaseHoverGroup();
            }
        },
        hide() {
            this.cancelHide();
            this.open = false;
            this.releaseHoverGroup();
        },
        hideSoon(delay = 180) {
            this.cancelHide();
            this.hideTimeout = setTimeout(() => {
                this.open = false;
                this.hideTimeout = null;
                this.releaseHoverGroup();
            }, delay);
        },
    };
}

function zayneTooltip() {
    return {
        open: false,
        show(trigger, panel) {
            this.open = true;
            this.$nextTick(() => zaynePosition(trigger, panel));
        },
        hide() { this.open = false; },
    };
}

function zaynePopover() {
    return {
        open: false,
        toggle(trigger, panel) {
            this.open = !this.open;
            if (this.open) {
                this.$nextTick(() => zaynePosition(trigger, panel));
            }
        },
        hide() { this.open = false; },
    };
}

function zayneLayout() {
    return {
        sidebarCollapsed: false,
        mobileOpen: false,
    };
}

document.addEventListener('alpine:init', () => {
    if (typeof Alpine === 'undefined') return;
    Alpine.data('zayneModal',    zayneModal);
    Alpine.data('zayneDrawer',   zayneDrawer);
    Alpine.data('zayneDropdown', zayneDropdown);
    Alpine.data('zayneTooltip',  zayneTooltip);
    Alpine.data('zaynePopover',  zaynePopover);
    Alpine.data('zayneLayout',   zayneLayout);
});

/* ============================================================
|  SECTION 3 - SIDEBAR
============================================================ */

const Sidebar = {
    scrollRegions:   [],
    savedOpenTrees:  new Set(),

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

    syncCollapseState() {
        new MutationObserver(() => {
            if (this.collapsed) {
                this.savedOpenTrees = new Set();
                document.querySelectorAll('.zaynenavtree.navtree-open').forEach(tree => {
                    this.savedOpenTrees.add(tree);
                    const items   = tree.querySelector('.navtree-items');
                    const chevron = tree.querySelector('.navtree-chevron');
                    if (items)   { items.style.maxHeight = '0px'; items.style.opacity = '0'; }
                    if (chevron) { chevron.style.transform = 'rotate(0deg)'; }
                    tree.classList.remove('navtree-open');
                });
            } else {
                this.savedOpenTrees.forEach(tree => {
                    if (!document.contains(tree)) return;
                    const items   = tree.querySelector('.navtree-items');
                    const chevron = tree.querySelector('.navtree-chevron');
                    if (items)   { items.style.maxHeight = items.scrollHeight + 'px'; items.style.opacity = '1'; }
                    if (chevron) { chevron.style.transform = 'rotate(180deg)'; }
                    tree.classList.add('navtree-open');
                });
            }
        }).observe(document.documentElement, { attributeFilter: ['class'] });
    },

    updateScrollIndicator(region) {
        const indicator = region.parentElement?.querySelector('[data-sidebar-scroll-indicator]');
        if (!indicator) return;
        const canScroll = region.scrollHeight > region.clientHeight + 1;
        const atBottom  = region.scrollTop + region.clientHeight >= region.scrollHeight - 4;
        const show      = canScroll && !atBottom;
        indicator.style.opacity = show ? '1' : '0';
        indicator.style.height  = show ? '20px' : '0';
    },

    initScrollRegions() {
        this.scrollRegions = Array.from(document.querySelectorAll('[data-sidebar-scroll-region]'));
        this.scrollRegions.forEach(region => {
            new ResizeObserver(() => this.updateScrollIndicator(region)).observe(region);
            region.addEventListener('scroll', () => this.updateScrollIndicator(region), { passive: true });
            this.updateScrollIndicator(region);
        });
    },

    init() {
        if (localStorage.getItem('zayne-sidebar') === 'true') {
            document.documentElement.classList.add('sidebar-collapsed');
        }

        this.syncCollapseState();

        document.addEventListener('DOMContentLoaded', () => {
            this.initScrollRegions();

            window.addEventListener('resize', () => {
                document.querySelectorAll('.zaynenavtree.navtree-open').forEach(tree => {
                    const items = tree.querySelector('.navtree-items');
                    if (items) items.style.maxHeight = items.scrollHeight + 'px';
                });
                this.scrollRegions.forEach(r => this.updateScrollIndicator(r));
            });

            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    document.documentElement.classList.add('sidebar-ready');
                });
            });
        });
    },
};

Sidebar.init();

/* ============================================================
|  SECTION 4 - SUBBAR
============================================================ */

const Subbar = {
    get collapsed() { return document.documentElement.classList.contains('subbar-collapsed'); },
    collapse() { document.documentElement.classList.add('subbar-collapsed'); localStorage.setItem('zayne-subbar', 'true'); },
    expand()   { document.documentElement.classList.remove('subbar-collapsed'); localStorage.setItem('zayne-subbar', 'false'); },
    toggle()   { this.collapsed ? this.expand() : this.collapse(); },
};

if (localStorage.getItem('zayne-subbar') === 'true') Subbar.collapse();

/* ============================================================
|  SECTION 5 - THEME
============================================================ */

const Theme = {
    current: localStorage.getItem('zayne-theme') || 'light',

    set(theme) {
        this.current = theme;
        document.documentElement.classList.remove('light', 'dark', 'abyss');
        document.documentElement.classList.add(theme);
        localStorage.setItem('zayne-theme', theme);
    },

    toggle() {
        if      (this.current === 'light') this.set('dark');
        else if (this.current === 'dark')  this.set('light');
        else                               this.set('light');
    },

    isLight() { return this.current === 'light'; },
    isDark()  { return this.current === 'dark';  },
    isAbyss() { return this.current === 'abyss'; },
};

Theme.set(Theme.current);

/* ============================================================
|  EXPORT
============================================================ */

window.Zayne = { Sidebar, Subbar, Theme };


/* ============================================================
|  SECTION 6 - INPUT ACTIONS
============================================================ */

document.addEventListener('click', (e) => {
    const btn = e.target.closest('[data-zayne-input-action]');
    if (!btn) return;

    const wrapper = btn.closest('.zayne-input-wrapper');
    const field = wrapper?.querySelector('[data-zayne-input-field]');
    if (!field) return;

    const action = btn.dataset.zayneInputAction;

    if (action === 'clearable') {
        field.value = '';
        field.dispatchEvent(new Event('input', { bubbles: true }));
        field.focus();
        return;
    }

    if (action === 'copyable') {
        navigator.clipboard?.writeText(field.value ?? '').then(() => {
            const copyIcon   = btn.querySelector('[data-zayne-icon-copy]');
            const copiedIcon = btn.querySelector('[data-zayne-icon-copied]');
            if (!copyIcon || !copiedIcon) return;

            copyIcon.style.display   = 'none';
            copiedIcon.style.display = '';

            setTimeout(() => {
                copyIcon.style.display   = '';
                copiedIcon.style.display = 'none';
            }, 1500);
        });
        return;
    }

    if (action === 'viewable') {
        const showIcon = btn.querySelector('[data-zayne-icon-show]');
        const hideIcon = btn.querySelector('[data-zayne-icon-hide]');
        const isPassword = field.type === 'password';

        field.type = isPassword ? 'text' : 'password';

        if (showIcon && hideIcon) {
            showIcon.style.display = isPassword ? 'none' : '';
            hideIcon.style.display = isPassword ? '' : 'none';
        }
        return;
    }
});