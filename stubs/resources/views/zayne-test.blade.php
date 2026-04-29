{{-- resources/views/zayne-test.blade.php --}}
<!DOCTYPE html>
<html class="Light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZayneUI — Layout Test</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @zayneStyles
</head>
<body class="h-svh overflow-hidden">

    <x-zayne.mainlayout>
        <x-zayne.sidebar collapsedstate="visibleicons">
            <x-slot:header>
                <div class="flex items-center gap-3">
                    <div class="size-9 rounded-[14px] bg-white/10"></div>
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
                    <div class="text-xs opacity-70">Collapse</div>
                    <x-zayne.sidebar.toggle />
                </div>
            </x-slot:footer>
        </x-zayne.sidebar>

        <x-zayne.main class="flex flex-col min-w-0">
            <x-zayne.header class="border-b border-[var(--zayne-color-base-border)] bg-[var(--zayne-color-base-100)]">
                <div class="flex min-w-0 items-center gap-3">
                    <div>
                        <div class="text-sm font-semibold">Overview</div>
                        <div class="text-xs opacity-60">Main application header</div>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <x-zayne.button variant="soft">Action</x-zayne.button>
                </div>
            </x-zayne.header>

            <div class="flex-1 overflow-y-auto bg-[var(--zayne-color-base-50)] p-6">
                <x-zayne.maincontent class="rounded-[24px] border border-[var(--zayne-color-base-border)] bg-[var(--zayne-color-base-100)] p-6">
                    <div class="space-y-4">
                        <div>
                            <h1 class="text-2xl font-semibold">Main Content</h1>
                            <p class="mt-1 text-sm opacity-70">
                                This is the scrollable content area inside the ZayneUI layout.
                            </p>
                        </div>

                        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                            <x-zayne.card>
                                <div class="p-4">
                                    <div class="text-sm font-medium">Card One</div>
                                    <div class="mt-2 text-sm opacity-70">Use this area for dashboard blocks or page sections.</div>
                                </div>
                            </x-zayne.card>

                            <x-zayne.card>
                                <div class="p-4">
                                    <div class="text-sm font-medium">Card Two</div>
                                    <div class="mt-2 text-sm opacity-70">The layout CSS controls structure; components fill the regions.</div>
                                </div>
                            </x-zayne.card>

                            <x-zayne.card>
                                <div class="p-4">
                                    <div class="text-sm font-medium">Card Three</div>
                                    <div class="mt-2 text-sm opacity-70">You can now reuse the same pattern for app pages.</div>
                                </div>
                            </x-zayne.card>
                        </div>
                    </div>
                </x-zayne.maincontent>
            </div>
        </x-zayne.main>
    </x-zayne.mainlayout>

    @zayneScripts
</body>
</html>
