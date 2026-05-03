@props([
    'classes' => '',
    'sticky'  => false,
])

<nav {{ $attributes->except('class')->merge(['class' => $classes]) }}>

    {{-- Brand / Logo --}}
    <div class="flex items-center gap-3 shrink-0">
        @isset($brand)
            {{ $brand }}
        @endisset
    </div>

    {{-- Center nav links --}}
    @isset($links)
        <div class="hidden md:flex items-center gap-1">
            {{ $links }}
        </div>
    @endisset

    {{-- Right side actions --}}
    <div class="flex items-center gap-2">
        @isset($actions)
            {{ $actions }}
        @endisset

        @isset($mobileMenu)
            <div class="md:hidden">
                {{ $mobileMenu }}
            </div>
        @else
            <x-zayne.action.button
                class="md:hidden"
                variant="ghost"
                color="base"
                size="sm"
                :square="true"
                @click="$dispatch('open-drawer-mobile-nav')"
                aria-label="Open menu"
            >
                <x-slot:leftIcon>
                    <x-zayne.ui.icon name="bars-3" class="size-5" />
                </x-slot:leftIcon>
            </x-zayne.action.button>
        @endisset
    </div>

</nav>