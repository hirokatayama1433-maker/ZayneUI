@props([
    'classes'          => '',
    'listClasses'      => '',
    'tabClasses'       => '',
    'activeTabClasses' => '',
    'tabs'             => [],
    'defaultTab'       => null,
])

@php $first = $defaultTab ?? ($tabs[0]['id'] ?? ''); @endphp

<div
    {{ $attributes->merge(['class' => $classes]) }}
    x-data="{ activeTab: '{{ $first }}' }"
>
    {{-- Tab list --}}
    <div class="{{ $listClasses }}" role="tablist">
        @foreach ($tabs as $tab)
            <button
                type="button"
                role="tab"
                :aria-selected="activeTab === '{{ $tab['id'] }}'"
                @click="activeTab = '{{ $tab['id'] }}'"
                class="{{ $tabClasses }}"
                :class="activeTab === '{{ $tab['id'] }}' ? '{{ $activeTabClasses }}' : ''"
            >
                {{-- Optional leading icon --}}
                @if (!empty($tab['icon']))
                    <x-zayne.icon :name="$tab['icon']" class="size-4 shrink-0" />
                @endif

                {{-- Label --}}
                {{ $tab['label'] }}

                {{-- Optional badge/count --}}
                @if (!empty($tab['badge']))
                    <span class="
                        ml-1 inline-flex items-center justify-center
                        min-w-[1.1rem] h-[1.1rem] px-1
                        text-[10px] font-semibold leading-none
                        rounded-full
                        bg-[var(--zayne-color-base-300)]
                        text-[var(--zayne-color-base-content-muted)]
                    ">{{ $tab['badge'] }}</span>
                @endif
            </button>
        @endforeach
    </div>

    {{-- Panels --}}
    <div class="mt-4">
        {{ $slot }}
    </div>
</div>
