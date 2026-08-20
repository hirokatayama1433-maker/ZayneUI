<zayne:sidebar borderright="1px">
    <x-slot:header>
            <div style="display:flex; flex-direction: column; width:100%; gap:0.5rem;">
                <zayne:sidebar-brand src="{{ asset('storage/logo.svg') }}" href="/" name="MyVita" />
                <zayne:sidebar-search
                    placeholder="Search..."
                />
            </div>
        </x-slot:header>

    
    <zayne:sidebar-navitem href="/installation" icon="download">
        Installation
    </zayne:sidebar-navitem>

       <zayne:sidebar-navtree label="Components" :active="request()->is('components*')" icon="component">

    <zayne:sidebar-navtreeitem href="/components/accordion" :active="request()->is('components/accordion')">Accordion</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/alert" :active="request()->is('components/alert')">Alert</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/autocomplete" :active="request()->is('components/autocomplete')">Autocomplete</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/avatar" :active="request()->is('components/avatar')">Avatar</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/badge" :active="request()->is('components/badge')">Badge</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/brand" :active="request()->is('components/brand')">Brand</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/button" :active="request()->is('components/button')">Button</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/breadcrumbs" :active="request()->is('components/breadcrumbs')">Breadcrumbs</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/calendar" :active="request()->is('components/calendar')">Calendar</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/callout" :active="request()->is('components/callout')">Callout</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/card" :active="request()->is('components/card')">Card</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/carousel" :active="request()->is('components/carousel')">Carousel</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/chart" :active="request()->is('components/chart')">Chart</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/checkbox" :active="request()->is('components/checkbox')">Checkbox</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/color-picker" :active="request()->is('components/color-picker')">Color Picker</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/command" :active="request()->is('components/command')">Command</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/context-menu" :active="request()->is('components/context-menu')">Context Menu</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/date-picker" :active="request()->is('components/date-picker')">Date Picker</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/drawer" :active="request()->is('components/drawer')">Drawer</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/dropdown" :active="request()->is('components/dropdown')">Dropdown</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/editor" :active="request()->is('components/editor')">Editor</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/fieldset" :active="request()->is('components/fieldset')">Fieldset</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/file-upload" :active="request()->is('components/file-upload')">File Upload</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/heading" :active="request()->is('components/heading')">Heading</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/icon" :active="request()->is('components/icon')">Icon</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/input" :active="request()->is('components/input')">Input</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/kanban" :active="request()->is('components/kanban')">Kanban</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/modal" :active="request()->is('components/modal')">Modal</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/navbar" :active="request()->is('components/navbar')">Navbar / Header</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/otp-input" :active="request()->is('components/otp-input')">OTP Input</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/pagination" :active="request()->is('components/pagination')">Pagination</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/panel" :active="request()->is('components/panel')">Panel</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/pillbox" :active="request()->is('components/pillbox')">Pillbox / Tag Input</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/popover" :active="request()->is('components/popover')">Popover</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/profile" :active="request()->is('components/profile')">Profile</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/progress" :active="request()->is('components/progress')">Progress</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/radio" :active="request()->is('components/radio')">Radio</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/range-slider" :active="request()->is('components/range-slider')">Range / Slider</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/select" :active="request()->is('components/select')">Select</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/separator" :active="request()->is('components/separator')">Separator / Divider</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/sidebar" :active="request()->is('components/sidebar')">Sidebar</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/skeleton" :active="request()->is('components/skeleton')">Skeleton</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/switch" :active="request()->is('components/switch')">Switch / Toggle</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/table" :active="request()->is('components/table')">Table</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/tab" :active="request()->is('components/tab')">Tabs</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/text" :active="request()->is('components/text')">Text</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/textarea" :active="request()->is('components/textarea')">Textarea</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/time-picker" :active="request()->is('components/time-picker')">Time Picker</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/timeline" :active="request()->is('components/timeline')">Timeline</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/toast" :active="request()->is('components/toast')">Toast</zayne:sidebar-navtreeitem>
    <zayne:sidebar-navtreeitem href="/components/tooltip" :active="request()->is('components/tooltip')">Tooltip</zayne:sidebar-navtreeitem>
</zayne:sidebar-navtree>



















<zayne:sidebar-navitem href="/schedule" icon="calendar-days">
    Schedule
</zayne:sidebar-navitem>


        <zayne:sidebar-label title="test Templates" />

        <zayne:sidebar-navitem href="/dashboard" icon="layout-dashboard">
            Dashboard
        </zayne:sidebar-navitem>     
        <zayne:sidebar-navitem href="/usermanagement" icon="file-user">
            User Management
        </zayne:sidebar-navitem>     














    <x-slot:footer> 
        
        <div style="width:100%;height:1px;background-color:#ccc;margin:10px 0; opacity:0.5;" ></div>
        
                 <zayne:popover>
                    <x-slot:trigger>
                        <zayne:sidebar-navitem>
                            <x-slot:lefticon>
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                    fill="none" 
                                    viewBox="0 0 24 24" 
                                    stroke-width="1" 
                                    stroke="currentColor" 
                                    style="width:1.5rem;height:1.5rem;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z" />
                                </svg>
                            </x-slot:lefticon>
                            Portals
                        </zayne:sidebar-navitem>
                            </x-slot:trigger>
                            <div style="padding:0.5rem;">
                                <p style="font-weight:600; margin:0 0 0.5rem;">Portals</p>
                                <div style="display:flex; flex-direction:column; gap:0.3rem; font-size:0.82rem;">
{{--  -------------------------------------------------------------------------------}}
                             <zayne:sidebar-navitem  hoverBg="var">
                                        <x-slot:lefticon>
                                            <svg xmlns="http://www.w3.org/2000/svg" 
                                                fill="none" 
                                                viewBox="0 0 24 24" 
                                                stroke-width="1" 
                                                stroke="currentColor" 
                                                style="width:1.5rem;height:1.5rem;">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z" />
                                            </svg>
                                        </x-slot:lefticon>
                                        Student Portal
                            </zayne:sidebar-navitem>
{{--  -------------------------------------------------------------------------------}}
                            <zayne:sidebar-navitem >
                                <x-slot:lefticon>
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke-width="1" 
                                        stroke="currentColor" 
                                        style="width:1.5rem;height:1.5rem;">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z" />
                                    </svg>
                                </x-slot:lefticon>
                                Faculty Portal
                            </zayne:sidebar-navitem>


{{--  -------------------------------------------------------------------------------}}


                            <zayne:sidebar-navitem >
                                <x-slot:lefticon>
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke-width="1" 
                                        stroke="currentColor" 
                                        style="width:1.5rem;height:1.5rem;">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                    </svg>
                                </x-slot:lefticon>
                                Enrollment Portal
                            </zayne:sidebar-navitem>


{{--  -------------------------------------------------------------------------------}}


                            <zayne:sidebar-navitem >
                                <x-slot:lefticon>
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke-width="1" 
                                        stroke="currentColor" 
                                        style="width:1.5rem;height:1.5rem;">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z" />
                                    </svg>
                                </x-slot:lefticon>
                                Parent Portal
                            </zayne:sidebar-navitem>

 {{--  -------------------------------------------------------------------------------}}            
                
                        </div>
                        <div style="margin-top:0.75rem;">
                        </div>
                    </div>
                </zayne:popover>
        


{{--  -------------------------------------------------------------------------------}}



       <zayne:popover>
                    <x-slot:trigger>
                        <zayne:sidebar-avatar src="https://i.pravatar.cc/100?img=1" alt="User" name="Sample name" email="example@example.com" />
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
    </x-slot:footer>
</zayne:sidebar>
