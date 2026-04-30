{{-- resources/views/zayne-test.blade.php --}}
<!DOCTYPE html>
<html class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZayneUI — Full Component Test</title>
    @zayneStyles
</head>
<body class="min-h-svh bg-[var(--zayne-color-base-200)] text-[var(--zayne-color-base-content)]">

<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 space-y-12">

    <div class="sticky top-4 z-50 flex flex-wrap gap-2">
        <x-zayne.button variant="solid" onclick="Zayne.Theme.set('light')" class="bg-neutral-100 text-neutral-700">Light</x-zayne.button>
        <x-zayne.button variant="solid" onclick="Zayne.Theme.set('dark')" class="bg-neutral-800 text-white">Dark</x-zayne.button>
        <x-zayne.button variant="solid" onclick="Zayne.Theme.set('abyss')" class="bg-indigo-900 text-white">Abyss</x-zayne.button>
    </div>

    <section class="rounded-[28px] border border-[var(--zayne-color-base-border)] bg-[var(--zayne-color-base-100)] shadow-[var(--zayne-shadow)] overflow-hidden">
        <div class="grid gap-8 px-6 py-8 lg:grid-cols-[1.15fr_0.85fr] lg:px-8">
            <div class="space-y-5">
                <x-zayne.badge variant="soft" color="primary" size="sm">Preview Workspace</x-zayne.badge>
                <div class="space-y-3">
                    <h1 class="text-3xl font-semibold tracking-tight sm:text-4xl">ZayneUI component previews, updated to match the current stubs.</h1>
                    <p class="max-w-2xl text-sm leading-6 text-[var(--zayne-color-base-content-muted)] sm:text-base">
                        This page is a living reference for the current component set. It covers layout, actions, display, forms, data, and overlays using the component names and props that exist right now.
                    </p>
                </div>

                <div class="flex flex-wrap gap-3">
                    <x-zayne.button color="primary">
                        <x-slot:leftIcon><x-zayne.icon name="sparkles" class="size-4" /></x-slot:leftIcon>
                        Explore Components
                    </x-zayne.button>
                    <x-zayne.button variant="outline" color="base">Layout Preview</x-zayne.button>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <x-zayne.card paddingClasses="p-5">
                    <div class="space-y-2">
                        <p class="text-xs font-medium uppercase tracking-[0.18em] text-[var(--zayne-color-base-content-muted)]">Theme</p>
                        <p class="text-2xl font-semibold">{{ ucfirst('light / dark / abyss') }}</p>
                        <p class="text-sm text-[var(--zayne-color-base-content-muted)]">Instant theme switching with persistent client-side state.</p>
                    </div>
                </x-zayne.card>

                <x-zayne.card paddingClasses="p-5">
                    <div class="space-y-2">
                        <p class="text-xs font-medium uppercase tracking-[0.18em] text-[var(--zayne-color-base-content-muted)]">Layout</p>
                        <p class="text-2xl font-semibold">Sidebar Ready</p>
                        <p class="text-sm text-[var(--zayne-color-base-content-muted)]">Includes the current `visibleicons` collapse behavior and inset sidebar shell.</p>
                    </div>
                </x-zayne.card>

                <x-zayne.card paddingClasses="p-5" class="sm:col-span-2">
                    <div class="flex flex-wrap items-center gap-3">
                        <x-zayne.avatar initials="ZU" color="primary" size="lg" />
                        <div class="space-y-1">
                            <p class="font-semibold">Preview note</p>
                            <p class="text-sm text-[var(--zayne-color-base-content-muted)]">
                                Nested components were aligned to the current tag names like `x-zayne.sidebar.item`, `x-zayne.board.card`, and `x-zayne.timeline.item`.
                            </p>
                        </div>
                    </div>
                </x-zayne.card>
            </div>
        </div>
    </section>

    <section class="space-y-4">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold">Layout</h2>
                <p class="text-sm text-[var(--zayne-color-base-content-muted)]">Sidebar and content preview using the current collapse behavior.</p>
            </div>
            <x-zayne.badge variant="outline" color="base">Layout Demo</x-zayne.badge>
        </div>

        <div class="overflow-hidden rounded-[28px] border border-[var(--zayne-color-base-border)] bg-[var(--zayne-color-base-100)] shadow-[var(--zayne-shadow)]">
            <div class="flex h-[34rem]">
                <x-zayne.sidebar
                    collapsedstate="visibleicons"
                    sidebarmargin="[14px]"
                    sidebarradius="[22px]"
                    sidebarborder="[1px]"
                >
                    <x-slot:header>
                        <div class="flex items-center gap-3">
                            <div class="size-10 rounded-[14px] bg-white/10"></div>
                            <div class="truncate">
                                <div class="text-sm font-semibold">ZayneUI</div>
                                <div class="text-xs opacity-60">Admin Workspace</div>
                            </div>
                        </div>
                    </x-slot:header>

                    <x-zayne.group label="Main">
                        <x-zayne.sidebar.item href="#" icon="home" label="Dashboard" />
                        <x-zayne.sidebar.item href="#" icon="users" label="Users" />
                        <x-zayne.sidebar.item href="#" icon="folder" label="Projects" />
                    </x-zayne.group>

                    <x-zayne.group label="Management">
                        <x-zayne.sidebar.tree icon="cog-6-tooth" label="Settings" :badge="3">
                            <x-slot:items>
                                <x-zayne.sidebar.item href="#" icon="adjustments-horizontal">General</x-zayne.sidebar.item>
                                <x-zayne.sidebar.item href="#" icon="shield-check">Security</x-zayne.sidebar.item>
                            </x-slot:items>
                        </x-zayne.sidebar.tree>
                    </x-zayne.group>

                    <x-slot:footer>
                        <div class="flex items-center justify-between gap-2">
                            <x-zayne.themetoggle />
                            <x-zayne.sidebar.toggle />
                        </div>
                    </x-slot:footer>
                </x-zayne.sidebar>

                <div class="flex min-w-0 flex-1 flex-col bg-[var(--zayne-color-base-200)]">
                    <x-zayne.header class="border-b border-[var(--zayne-color-base-border)] bg-[var(--zayne-color-base-100)]">
                        <div>
                            <div class="text-sm font-semibold">Overview</div>
                            <div class="text-xs text-[var(--zayne-color-base-content-muted)]">Main application header</div>
                        </div>

                        <div class="flex items-center gap-2">
                            <x-zayne.button variant="soft">Action</x-zayne.button>
                        </div>
                    </x-zayne.header>

                    <div class="flex-1 overflow-y-auto p-6">
                        <x-zayne.maincontent class="rounded-[24px] border border-[var(--zayne-color-base-border)] bg-[var(--zayne-color-base-100)] p-6">
                            <div class="space-y-4">
                                <div>
                                    <h3 class="text-2xl font-semibold">Main Content</h3>
                                    <p class="mt-1 text-sm text-[var(--zayne-color-base-content-muted)]">
                                        This preview keeps the sidebar embedded in a component gallery instead of forcing a full-screen app shell.
                                    </p>
                                </div>

                                <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                                    <x-zayne.card>
                                        <div class="space-y-2">
                                            <div class="text-sm font-medium">Responsive Sidebar</div>
                                            <div class="text-sm text-[var(--zayne-color-base-content-muted)]">Uses the current inset frame and centered icon rail collapse.</div>
                                        </div>
                                    </x-zayne.card>

                                    <x-zayne.card>
                                        <div class="space-y-2">
                                            <div class="text-sm font-medium">Current Theme Tokens</div>
                                            <div class="text-sm text-[var(--zayne-color-base-content-muted)]">All previews render against the live CSS variables from `zayne-theme.css`.</div>
                                        </div>
                                    </x-zayne.card>

                                    <x-zayne.card>
                                        <div class="space-y-2">
                                            <div class="text-sm font-medium">Preview Catalog</div>
                                            <div class="text-sm text-[var(--zayne-color-base-content-muted)]">The rest of the page showcases the components in a more complete testing surface.</div>
                                        </div>
                                    </x-zayne.card>
                                </div>
                            </div>
                        </x-zayne.maincontent>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-y-5">
        <h2 class="border-b border-[var(--zayne-color-base-border)] pb-2 text-lg font-bold">Action</h2>

        <div class="grid gap-5 rounded-[28px] border border-[var(--zayne-color-base-border)] bg-[var(--zayne-color-base-100)] p-6 shadow-[var(--zayne-shadow)]">
            <div class="space-y-3">
                <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Variants</p>
                <div class="flex flex-wrap gap-3">
                    <x-zayne.button variant="solid">Solid</x-zayne.button>
                    <x-zayne.button variant="soft">Soft</x-zayne.button>
                    <x-zayne.button variant="outline">Outline</x-zayne.button>
                    <x-zayne.button variant="dashed">Dashed</x-zayne.button>
                    <x-zayne.button variant="ghost">Ghost</x-zayne.button>
                    <x-zayne.button variant="link">Link</x-zayne.button>
                </div>
            </div>

            @foreach(['solid', 'soft', 'outline'] as $variant)
                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">{{ strtoupper($variant) }}</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach(['primary','secondary','accent','base','danger','success','warning','info'] as $color)
                            <x-zayne.button :variant="$variant" :color="$color">{{ ucfirst($color) }}</x-zayne.button>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <div class="grid gap-4 lg:grid-cols-3">
                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Sizes</p>
                    <div class="flex flex-wrap items-center gap-3">
                        <x-zayne.button size="xs">XS</x-zayne.button>
                        <x-zayne.button size="sm">SM</x-zayne.button>
                        <x-zayne.button size="md">MD</x-zayne.button>
                        <x-zayne.button size="lg">LG</x-zayne.button>
                        <x-zayne.button size="xl">XL</x-zayne.button>
                    </div>
                </div>

                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Square</p>
                    <div class="flex flex-wrap items-center gap-3">
                        @foreach(['xs','sm','md','lg','xl'] as $sz)
                            <x-zayne.button :size="$sz" :square="true">+</x-zayne.button>
                        @endforeach
                    </div>
                </div>

                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">With Icons</p>
                    <div class="flex flex-wrap gap-3">
                        <x-zayne.button color="primary">
                            <x-slot:leftIcon><x-zayne.icon name="arrow-left" class="size-4" /></x-slot:leftIcon>
                            Back
                        </x-zayne.button>
                        <x-zayne.button color="success">
                            Save
                            <x-slot:rightIcon><x-zayne.icon name="check" class="size-4" /></x-slot:rightIcon>
                        </x-zayne.button>
                    </div>
                </div>
            </div>

            <div class="grid gap-6 lg:grid-cols-2">
                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">States</p>
                    <div class="flex flex-wrap gap-3">
                        <x-zayne.button color="primary">Normal</x-zayne.button>
                        <x-zayne.button color="primary" :disabled="true">Disabled</x-zayne.button>
                        <x-zayne.button color="primary" :fullWidth="true" class="max-w-xs">Full Width</x-zayne.button>
                    </div>
                </div>

                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Button Group</p>
                    <div class="flex flex-wrap items-start gap-6">
                        <x-zayne.button.group>
                            <x-zayne.button variant="outline" color="success">One</x-zayne.button>
                            <x-zayne.button variant="outline" color="warning">Two</x-zayne.button>
                            <x-zayne.button variant="outline" color="danger">Three</x-zayne.button>
                        </x-zayne.button.group>

                        <x-zayne.button.group orientation="vertical">
                            <x-zayne.button variant="outline">Top</x-zayne.button>
                            <x-zayne.button variant="outline">Mid</x-zayne.button>
                            <x-zayne.button variant="outline">Bottom</x-zayne.button>
                        </x-zayne.button.group>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-y-5">
        <h2 class="border-b border-[var(--zayne-color-base-border)] pb-2 text-lg font-bold">Display</h2>

        <div class="grid gap-6 rounded-[28px] border border-[var(--zayne-color-base-border)] bg-[var(--zayne-color-base-100)] p-6 shadow-[var(--zayne-shadow)] lg:grid-cols-2">
            <div class="space-y-5">
                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Badge</p>
                    <div class="flex flex-wrap gap-2">
                        <x-zayne.badge>Default</x-zayne.badge>
                        <x-zayne.badge variant="solid" color="primary">Solid</x-zayne.badge>
                        <x-zayne.badge variant="soft" color="success">Soft</x-zayne.badge>
                        <x-zayne.badge variant="outline" color="danger">Outline</x-zayne.badge>
                        <x-zayne.badge color="success" :dot="true" size="xs">Active</x-zayne.badge>
                        <x-zayne.badge variant="solid" color="primary" :pill="true">Pill</x-zayne.badge>
                    </div>
                </div>

                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Avatar</p>
                    <div class="flex items-center gap-4">
                        <x-zayne.avatar src="https://i.pravatar.cc/80?img=1" alt="User" size="lg" />
                        <x-zayne.avatar initials="JD" color="primary" size="lg" />
                        <x-zayne.avatar color="base" size="lg" />
                    </div>
                </div>

                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Progress</p>
                    <div class="space-y-3 max-w-sm">
                        @foreach(['primary','success','warning','danger','info'] as $color)
                            <x-zayne.progress :value="($loop->index + 1) * 18" :color="$color" :label="ucfirst($color)" />
                        @endforeach
                    </div>
                </div>

                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Stat</p>
                    <div class="flex flex-wrap gap-6">
                        <x-zayne.stat label="Total Revenue" value="$48,295" change="+12%" trend="up" />
                        <x-zayne.stat label="Active Users" value="3,842" change="-3%" trend="down" />
                        <x-zayne.stat label="Uptime" value="99.9%" trend="neutral" />
                    </div>
                </div>
            </div>

            <div class="space-y-5">
                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Alert</p>
                    <div class="space-y-2">
                        @foreach(['info','success','warning','danger'] as $color)
                            <x-zayne.alert :color="$color" :title="ucfirst($color).' Alert'" :dismissible="true">
                                This is a {{ $color }} alert message.
                            </x-zayne.alert>
                        @endforeach
                    </div>
                </div>

                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Toast</p>
                    <div class="flex flex-col gap-2 max-w-xs">
                        @foreach(['info','success','warning','danger'] as $color)
                            <x-zayne.toast :color="$color" :title="ucfirst($color)" :duration="null">
                                This is a {{ $color }} toast.
                            </x-zayne.toast>
                        @endforeach
                    </div>
                </div>

                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Skeleton</p>
                    <div class="flex items-center gap-4 max-w-sm">
                        <x-zayne.skeleton shape="circle" width="48px" height="48px" />
                        <div class="flex-1 space-y-2">
                            <x-zayne.skeleton shape="line" width="60%" />
                            <x-zayne.skeleton shape="line" width="80%" />
                        </div>
                    </div>
                    <x-zayne.skeleton shape="box" width="100%" height="80px" class="max-w-sm" />
                </div>
            </div>
        </div>
    </section>

    <section class="space-y-5">
        <h2 class="border-b border-[var(--zayne-color-base-border)] pb-2 text-lg font-bold">Form</h2>

        <div class="grid grid-cols-1 gap-6 rounded-[28px] border border-[var(--zayne-color-base-border)] bg-[var(--zayne-color-base-100)] p-6 shadow-[var(--zayne-shadow)] md:grid-cols-2">
            <x-zayne.fieldset label="Input — default">
                <x-zayne.input placeholder="Type something..." />
            </x-zayne.fieldset>

            <x-zayne.fieldset label="Input — error" error="This field is required.">
                <x-zayne.input :error="true" placeholder="Error state" />
            </x-zayne.fieldset>

            <x-zayne.fieldset label="Input — prefix / suffix">
                <x-zayne.input placeholder="Amount">
                    <x-slot:prefix>$</x-slot:prefix>
                    <x-slot:suffix>USD</x-slot:suffix>
                </x-zayne.input>
            </x-zayne.fieldset>

            <x-zayne.fieldset label="Select">
                <x-zayne.select>
                    <option value="">Pick an option</option>
                    <option>Option A</option>
                    <option>Option B</option>
                </x-zayne.select>
            </x-zayne.fieldset>

            <x-zayne.fieldset label="Textarea">
                <x-zayne.textarea placeholder="Write something..." />
            </x-zayne.fieldset>

            <x-zayne.fieldset label="Range">
                <div class="flex flex-col gap-3">
                    <x-zayne.range label="Volume" min="0" max="100" value="40" :showValue="true" />
                    <x-zayne.range label="Success" min="0" max="100" value="70" :showValue="true" color="success" />
                </div>
            </x-zayne.fieldset>

            <x-zayne.fieldset label="Checkbox">
                <div class="flex flex-col gap-2">
                    <x-zayne.checkbox label="Option A" />
                    <x-zayne.checkbox label="Option B" checked />
                    <x-zayne.checkbox label="Disabled" :disabled="true" />
                </div>
            </x-zayne.fieldset>

            <x-zayne.fieldset label="Radio">
                <div class="flex flex-col gap-2">
                    <x-zayne.radio name="demo_radio" label="Choice A" />
                    <x-zayne.radio name="demo_radio" label="Choice B" />
                    <x-zayne.radio name="demo_radio" label="Disabled" :disabled="true" />
                </div>
            </x-zayne.fieldset>

            <x-zayne.fieldset label="Toggle">
                <div class="flex flex-col gap-2">
                    <x-zayne.toggle label="Default" />
                    <x-zayne.toggle label="Success" color="success" />
                    <x-zayne.toggle label="Disabled" :disabled="true" />
                </div>
            </x-zayne.fieldset>

            <x-zayne.fieldset label="File Upload" class="md:col-span-2">
                <x-zayne.file-upload label="Click or drag files here" hint="PNG, JPG, PDF up to 10MB" />
            </x-zayne.fieldset>
        </div>
    </section>

    <section class="space-y-5">
        <h2 class="border-b border-[var(--zayne-color-base-border)] pb-2 text-lg font-bold">Navigation</h2>

        <div class="space-y-6 rounded-[28px] border border-[var(--zayne-color-base-border)] bg-[var(--zayne-color-base-100)] p-6 shadow-[var(--zayne-shadow)]">
            <div class="space-y-3">
                <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Breadcrumb</p>
                <x-zayne.breadcrumb :items="[
                    ['label' => 'Home', 'href' => '/'],
                    ['label' => 'Products', 'href' => '/products'],
                    ['label' => 'Edit'],
                ]" />
            </div>

            <div class="space-y-3">
                <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Tabs</p>
                <x-zayne.tabs
                    variant="underline"
                    :tabs="[
                        ['id' => 'tab1', 'label' => 'Overview', 'icon' => 'home'],
                        ['id' => 'tab2', 'label' => 'Analytics', 'badge' => 3],
                        ['id' => 'tab3', 'label' => 'Settings', 'icon' => 'cog-6-tooth'],
                    ]"
                    defaultTab="tab1"
                >
                    <div x-show="activeTab === 'tab1'" class="text-sm pt-2">Overview panel.</div>
                    <div x-show="activeTab === 'tab2'" class="text-sm pt-2">Analytics panel.</div>
                    <div x-show="activeTab === 'tab3'" class="text-sm pt-2">Settings panel.</div>
                </x-zayne.tabs>
            </div>

            <div class="grid gap-6 lg:grid-cols-2">
                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Steps</p>
                    <x-zayne.steps :current="2" :steps="[
                        ['label' => 'Account', 'description' => 'Create account'],
                        ['label' => 'Profile', 'description' => 'Fill details'],
                        ['label' => 'Billing', 'description' => 'Payment info'],
                        ['label' => 'Confirm'],
                    ]" />
                </div>

                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Pagination</p>
                    <x-zayne.pagination :currentPage="3" :totalPages="10" :pageNumbers="[1,2,3,4,5,null,10]" class="flex items-center gap-1" />
                </div>
            </div>

            <div class="space-y-3">
                <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Navbar</p>
                <x-zayne.navbar class="rounded-[var(--zayne-radius-box)] border border-[var(--zayne-color-base-border)] bg-[var(--zayne-color-base-100)]">
                    <x-slot:brand><span class="font-bold text-[var(--zayne-color-primary)]">ZayneUI</span></x-slot:brand>
                    <x-slot:links>
                        <x-zayne.button variant="ghost" size="sm">Docs</x-zayne.button>
                        <x-zayne.button variant="ghost" size="sm">Components</x-zayne.button>
                    </x-slot:links>
                    <x-slot:actions>
                        <x-zayne.button variant="solid" color="primary" size="sm">Get Started</x-zayne.button>
                    </x-slot:actions>
                </x-zayne.navbar>
            </div>
        </div>
    </section>

    <section class="space-y-5">
        <h2 class="border-b border-[var(--zayne-color-base-border)] pb-2 text-lg font-bold">Data</h2>

        <div class="space-y-6 rounded-[28px] border border-[var(--zayne-color-base-border)] bg-[var(--zayne-color-base-100)] p-6 shadow-[var(--zayne-shadow)]">
            <div class="space-y-3">
                <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Table</p>
                <x-zayne.table
                    :columns="[
                        ['key' => 'name', 'label' => 'Name'],
                        ['key' => 'role', 'label' => 'Role'],
                        ['key' => 'status', 'label' => 'Status'],
                    ]"
                    :rows="[
                        ['name' => 'Alice', 'role' => 'Admin', 'status' => 'Active'],
                        ['name' => 'Bob', 'role' => 'Editor', 'status' => 'Inactive'],
                        ['name' => 'Charlie', 'role' => 'Viewer', 'status' => 'Active'],
                    ]"
                    :striped="true"
                    :selectable="true"
                />
            </div>

            <div class="grid gap-6 xl:grid-cols-2">
                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Empty State</p>
                    <x-zayne.empty-state title="Nothing here yet" description="Create your first item to get started.">
                        <x-zayne.button color="primary" size="sm">
                            <x-slot:leftIcon><x-zayne.icon name="plus" class="size-4" /></x-slot:leftIcon>
                            Create Item
                        </x-zayne.button>
                    </x-zayne.empty-state>
                </div>

                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Timeline</p>
                    <x-zayne.timeline>
                        <x-zayne.timeline.item color="success" timestamp="2 min ago">
                            <x-slot:title>Deployment successful</x-slot:title>
                            Version 2.4.0 deployed to production.
                        </x-zayne.timeline.item>
                        <x-zayne.timeline.item color="warning" timestamp="1 hr ago">
                            <x-slot:title>Build warning</x-slot:title>
                            Deprecated API usage detected.
                        </x-zayne.timeline.item>
                        <x-zayne.timeline.item color="danger" :last="true" timestamp="3 hrs ago">
                            <x-slot:title>Build failed</x-slot:title>
                            Tests failed on PR #142.
                        </x-zayne.timeline.item>
                    </x-zayne.timeline>
                </div>
            </div>

            <div class="space-y-3">
                <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Board</p>
                <x-zayne.board>
                    @foreach(['To Do', 'In Progress', 'Done'] as $col)
                        <x-zayne.board.column :title="$col" :count="2">
                            <x-zayne.board.card>
                                <x-slot:footer>
                                    <x-zayne.badge color="primary" size="xs">Feature</x-zayne.badge>
                                </x-slot:footer>
                                Task in {{ $col }}
                            </x-zayne.board.card>
                            <x-zayne.board.card>
                                Another task in {{ $col }}
                            </x-zayne.board.card>
                        </x-zayne.board.column>
                    @endforeach
                </x-zayne.board>
            </div>

            <div class="grid gap-6 xl:grid-cols-2">
                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Gallery</p>
                    <x-zayne.gallery cols="3" gap="sm">
                        @foreach([1,2,3] as $i)
                            <x-zayne.gallery.item
                                src="https://picsum.photos/seed/zayne{{ $i }}/300/200"
                                alt="Image {{ $i }}"
                                aspect="video"
                                :overlay="true"
                            >
                                Photo {{ $i }}
                            </x-zayne.gallery.item>
                        @endforeach
                    </x-zayne.gallery>
                </div>

                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">List</p>
                    <x-zayne.datalist class="max-w-md">
                        @foreach(['Alice — Admin','Bob — Editor','Charlie — Viewer'] as $item)
                            <x-zayne.listitem class="flex items-center gap-3 px-4 py-3 hover:bg-[var(--zayne-color-base-hover)]">
                                <x-slot:leading>
                                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[var(--zayne-color-primary)] text-xs font-bold text-white">
                                        {{ substr($item, 0, 1) }}
                                    </span>
                                </x-slot:leading>
                                {{ $item }}
                                <x-slot:trailing>
                                    <x-zayne.badge color="base" size="xs">Active</x-zayne.badge>
                                </x-slot:trailing>
                            </x-zayne.listitem>
                        @endforeach
                    </x-zayne.datalist>
                </div>
            </div>

            <div class="space-y-3">
                <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Transfer List</p>
                <x-zayne.transferlist
                    :listA="['Apple','Banana','Cherry','Date','Elderberry']"
                    :listB="['Fig','Grape']"
                    labelA="Available"
                    labelB="Selected"
                    id="fruit-transfer"
                />
            </div>
        </div>
    </section>

    <section class="space-y-5">
        <h2 class="border-b border-[var(--zayne-color-base-border)] pb-2 text-lg font-bold">Overlay</h2>

        <div class="space-y-6 rounded-[28px] border border-[var(--zayne-color-base-border)] bg-[var(--zayne-color-base-100)] p-6 shadow-[var(--zayne-shadow)]">
            <div class="space-y-3">
                <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Tooltip</p>
                <div class="flex flex-wrap gap-6 py-2">
                    @foreach(['top','bottom','left','right'] as $pos)
                        <x-zayne.tooltip :position="$pos" text="Tooltip {{ $pos }}">
                            <x-zayne.button variant="outline" size="sm">{{ ucfirst($pos) }}</x-zayne.button>
                        </x-zayne.tooltip>
                    @endforeach
                </div>
            </div>

            <div class="grid gap-6 lg:grid-cols-2">
                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Dropdown</p>
                    <x-zayne.dropdown>
                        <x-slot:trigger>
                            <x-zayne.button variant="outline">
                                Options
                                <x-slot:rightIcon><x-zayne.icon name="chevron-down" class="size-4" /></x-slot:rightIcon>
                            </x-zayne.button>
                        </x-slot:trigger>
                        <div class="flex flex-col py-1">
                            <button class="px-4 py-2 text-left text-sm hover:bg-[var(--zayne-color-base-hover)]">Edit</button>
                            <button class="px-4 py-2 text-left text-sm hover:bg-[var(--zayne-color-base-hover)]">Duplicate</button>
                            <button class="px-4 py-2 text-left text-sm text-[var(--zayne-color-danger)] hover:bg-[var(--zayne-color-base-hover)]">Delete</button>
                        </div>
                    </x-zayne.dropdown>
                </div>

                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Popover</p>
                    <x-zayne.popover title="Filter Options">
                        <x-slot:trigger>
                            <x-zayne.button variant="outline" color="base">
                                <x-slot:leftIcon><x-zayne.icon name="funnel" class="size-4" /></x-slot:leftIcon>
                                Filter
                            </x-zayne.button>
                        </x-slot:trigger>
                        <div class="flex flex-col gap-3">
                            <x-zayne.fieldset label="Status">
                                <x-zayne.select>
                                    <option>All</option>
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </x-zayne.select>
                            </x-zayne.fieldset>
                            <x-zayne.button color="primary" size="sm">Apply</x-zayne.button>
                        </div>
                    </x-zayne.popover>
                </div>
            </div>

            <div class="grid gap-6 lg:grid-cols-2">
                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Modal</p>
                    <div class="flex flex-wrap gap-3">
                        <x-zayne.modal id="demo-basic" title="Basic Modal">
                            <x-slot:trigger>
                                <x-zayne.button variant="solid" color="primary">Open Modal</x-zayne.button>
                            </x-slot:trigger>
                            <p class="text-sm">Modal body content.</p>
                            <x-slot:footer>
                                <x-zayne.button variant="ghost" color="base" @click="$dispatch('close-modal-demo-basic')">Cancel</x-zayne.button>
                                <x-zayne.button variant="solid" color="primary" @click="$dispatch('close-modal-demo-basic')">Confirm</x-zayne.button>
                            </x-slot:footer>
                        </x-zayne.modal>

                        <x-zayne.button variant="outline" color="danger" @click="$dispatch('open-modal-demo-danger')">Delete Item</x-zayne.button>
                        <x-zayne.modal id="demo-danger" title="Delete item?" size="sm">
                            <p class="text-sm">This action cannot be undone. Are you sure?</p>
                            <x-slot:footer>
                                <x-zayne.button variant="ghost" color="base" @click="$dispatch('close-modal-demo-danger')">Cancel</x-zayne.button>
                                <x-zayne.button variant="solid" color="danger" @click="$dispatch('close-modal-demo-danger')">Delete</x-zayne.button>
                            </x-slot:footer>
                        </x-zayne.modal>
                    </div>
                </div>

                <div class="space-y-3">
                    <p class="text-xs font-mono text-[var(--zayne-color-base-content-muted)]">Drawer</p>
                    <div class="flex flex-wrap gap-3">
                        <x-zayne.drawer id="drawer-right" title="Right Drawer" side="right">
                            <x-slot:trigger>
                                <x-zayne.button variant="solid" color="primary">Right</x-zayne.button>
                            </x-slot:trigger>
                            <p class="text-sm">Right drawer for detail panels, settings, and filters.</p>
                            <x-slot:footer>
                                <x-zayne.button variant="ghost" color="base" @click="$dispatch('close-drawer-drawer-right')">Close</x-zayne.button>
                                <x-zayne.button variant="solid" color="primary">Apply</x-zayne.button>
                            </x-slot:footer>
                        </x-zayne.drawer>

                        <x-zayne.button variant="outline" color="base" @click="$dispatch('open-drawer-drawer-left')">Left</x-zayne.button>
                        <x-zayne.drawer id="drawer-left" title="Left Drawer" side="left">
                            <p class="text-sm">Left drawer for navigation menus.</p>
                        </x-zayne.drawer>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@zayneScripts
</body>
</html>
