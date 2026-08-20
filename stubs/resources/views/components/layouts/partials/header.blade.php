<zayne:header borderbottom="1px">
    <x-slot:left>
        <zayne:breadcrumbs separator="›">
            <zayne:breadcrumb-item href="/">Home</zayne:breadcrumb-item>
            <zayne:breadcrumb-item :current="true">Dashboard</zayne:breadcrumb-item>
        </zayne:breadcrumbs>
    </x-slot:left>
    

    <x-slot:right>
        <zayne:header-search placeholder="Search..." />
        {{-- Notifications --}}
            <div style="position:relative; display:flex; align-items:center;">
                <button
                    type="button"
                    style="
                        display:inline-flex; align-items:center; justify-content:center;
                        width:34px; height:34px; border-radius:var(--zayne-radius-field);
                        border:none; background:transparent; cursor:pointer;
                        color:var(--zayne-color-base-content); opacity:0.65;
                        transition:opacity 150ms ease, background 150ms ease;
                    "
                    onmouseover="this.style.opacity='1'; this.style.background='var(--zayne-color-base-hover)';"
                    onmouseout="this.style.opacity='0.65'; this.style.background='transparent';"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:1.25rem; height:1.25rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                </button>
                <span style="
                    position:absolute; top:-2px; right:-2px;
                    min-width:16px; height:16px; padding:0 4px;
                    background:var(--zayne-color-danger);
                    color:var(--zayne-color-danger-content);
                    border-radius:999px; font-size:0.65rem;
                    display:flex; align-items:center; justify-content:center;
                    font-weight:600; box-sizing:border-box;
                ">3</span>
            </div>





        

            <zayne:popover>
                    <x-slot:trigger>
                        <zayne:header-avatar
                            name="{{ auth()->user()->name ?? 'Guest' }}"
                        />
                    </x-slot:trigger>

                    <zayne:modal size="lg">
                        <x-slot:trigger>
                            <zayne:button
                                variant="ghost"
                                color="base"
                                size="sm"
                                fullwidth
                                onmouseover="this.style.background='var(--zayne-custom-sidebar-item-bg-hover)'; this.style.color='var(--zayne-custom-sidebar-item-content-hover)';"
                                onmouseout="this.style.background='transparent'; this.style.color='var(--zayne-custom-sidebar-content)';"
                            >
                                <x-slot:iconslot>
                                    <zayne:icon name='settings' />
                                </x-slot:iconslot>
                                Settings
                            </zayne:button>
                        </x-slot:trigger>
                        <h3 style="font-weight:600; margin:0 0 0.5rem;">Custom Size</h3>
                        <p style="opacity:0.6; margin:0;">Uses <code>width="900px" height="min(80dvh, 700px)"</code> directly.</p>
                    </zayne:modal>





                    <zayne:button
                        href="/settings/profile"
                        variant="ghost"
                        color="base"
                        size="sm"
                        fullwidth
                        onmouseover="this.style.background='var(--zayne-custom-sidebar-item-bg-hover)'; this.style.color='var(--zayne-custom-sidebar-item-content-hover)';"
                        onmouseout="this.style.background='transparent'; this.style.color='var(--zayne-custom-sidebar-content)';"
                    >
                        <x-slot:iconslot>
                            <zayne:icon name='circle-user-round' />
                        </x-slot:iconslot>
                        Profile
                    </zayne:button>

                    <zayne:button
                        href="/settings/billing"
                        variant="ghost"
                        color="base"
                        size="sm"
                        fullwidth
                        onmouseover="this.style.background='var(--zayne-custom-sidebar-item-bg-hover)'; this.style.color='var(--zayne-custom-sidebar-item-content-hover)';"
                        onmouseout="this.style.background='transparent'; this.style.color='var(--zayne-custom-sidebar-content)';"
                    >
                        <x-slot:iconslot>
                            <zayne:icon name='wallet-cards' />
                        </x-slot:iconslot>
                        Billing
                    </zayne:button>

                    <zayne:button
                        href="/settings/team"
                        variant="ghost"
                        color="base"
                        size="sm"
                        fullwidth
                        onmouseover="this.style.background='var(--zayne-custom-sidebar-item-bg-hover)'; this.style.color='var(--zayne-custom-sidebar-item-content-hover)';"
                        onmouseout="this.style.background='transparent'; this.style.color='var(--zayne-custom-sidebar-content)';"
                    >
                        <x-slot:iconslot>
                            <zayne:icon name='users-round' />
                        </x-slot:iconslot>
                        Team
                    </zayne:button>

                    <zayne:theme-toggle/>

                    <zayne:button
                        href="/logout"
                        variant="ghost"
                        color="danger"
                        size="sm"
                        fullwidth
                        onmouseover="this.style.background='color-mix(in oklch, var(--zayne-color-danger) 12%, transparent)';"
                        onmouseout="this.style.background='transparent';"
                    >
                        <x-slot:iconslot>
                            <zayne:icon name='door-open' />
                        </x-slot:iconslot>
                        Logout
                    </zayne:button>
                </zayne:popover>

        
    </x-slot:right>
</zayne:header>