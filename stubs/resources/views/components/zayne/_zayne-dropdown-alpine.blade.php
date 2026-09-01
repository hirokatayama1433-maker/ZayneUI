@once
<script>
    window.zayneDropdown ??= function zayneDropdown() {
        return {
            open: false,
            _id: null,
            hideTimeout: null,
            hoverGroup: null,
            _reposition: null,
            _panel: null,

            init() {
                window.addEventListener('zayne:sidebar-toggled', () => this.hide());
            },

            cancelHide() {
                if (this.hideTimeout) { clearTimeout(this.hideTimeout); this.hideTimeout = null; }
            },
            startReposition(trigger) {
                this.stopReposition();
                this._reposition = () => {
                    if (this._panel) zaynePosition(trigger, this._panel);
                };
                window.addEventListener('scroll', this._reposition, { passive: true, capture: true });
                window.addEventListener('resize', this._reposition, { passive: true });
            },
            stopReposition() {
                if (!this._reposition) return;
                window.removeEventListener('scroll', this._reposition, { capture: true });
                window.removeEventListener('resize', this._reposition);
                this._reposition = null;
            },
            syncHoverGroup(panel) {
                this.hoverGroup = panel?.dataset?.zayneHoverGroup ?? null;
            },
            claimHoverGroup(panel) {
                this.syncHoverGroup(panel);
                if (!this.hoverGroup) return;
                window.__zayneHoverGroups ??= {};
                const active = window.__zayneHoverGroups[this.hoverGroup];
                if (active && active !== this) active.hide();
                window.__zayneHoverGroups[this.hoverGroup] = this;
            },
            releaseHoverGroup() {
                if (!this.hoverGroup || !window.__zayneHoverGroups) return;
                if (window.__zayneHoverGroups[this.hoverGroup] === this) {
                    delete window.__zayneHoverGroups[this.hoverGroup];
                }
            },
            show(trigger, panel) {
                this._panel = panel ?? this._panel;
                this.cancelHide();
                this.claimHoverGroup(this._panel);
                if (!this._id) {
                    this._id = Symbol();
                    ZayneOverlayStack.push({ id: this._id, type: 'positioned', hide: () => this.hide() });
                }
                this.open = true;
                this.$nextTick(() => {
                    zaynePosition(trigger, this._panel);
                    this.startReposition(trigger);
                });
            },
            toggle(trigger, panel) {
                this._panel = panel ?? this._panel;
                this.cancelHide();
                this.syncHoverGroup(this._panel);
                this.open = !this.open;
                if (this.open) {
                    this.claimHoverGroup(this._panel);
                    if (!this._id) {
                        this._id = Symbol();
                        ZayneOverlayStack.push({ id: this._id, type: 'positioned', hide: () => this.hide() });
                    }
                    this.$nextTick(() => {
                        zaynePosition(trigger, this._panel);
                        this.startReposition(trigger);
                    });
                } else {
                    this.stopReposition();
                    this.releaseHoverGroup();
                    if (this._id) { ZayneOverlayStack.pop(this._id); this._id = null; }
                }
            },
            hide() {
                this.cancelHide();
                this.open = false;
                this.stopReposition();
                this.releaseHoverGroup();
                if (this._id) { ZayneOverlayStack.pop(this._id); this._id = null; }
            },
            hideSoon(delay = 180) {
                this.cancelHide();
                this.hideTimeout = setTimeout(() => { this.hide(); this.hideTimeout = null; }, delay);
            },
            registerPanel(el) {
                this._panel = el;
            },
        };
    };

    document.addEventListener('alpine:init', () => {
        if (typeof Alpine === 'undefined') return;
        Alpine.data('zayneDropdown', window.zayneDropdown);
    });
</script>
@endonce
