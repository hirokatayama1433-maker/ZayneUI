@props([
    'zoneClasses'  => '',
    'inputClasses' => '',
    'multiple'     => false,
    'accept'       => null,
    'disabled'     => false,
    'label'        => 'Click or drag files here to upload',
    'hint'         => null,
])

<div {{ $attributes->only('class')->merge(['class' => $zoneClasses]) }}>
    {{-- Hidden file input — $attributes go here for wire:model etc. --}}
    <input
        type="file"
        class="{{ $inputClasses }}"
        @if ($multiple) multiple @endif
        @if ($accept) accept="{{ $accept }}" @endif
        @disabled($disabled)
        {{ $attributes->except('class') }}
    />

    {{-- Upload icon --}}
    @isset($icon)
        {{ $icon }}
    @else
        <x-zayne.icon name="arrow-down-tray" class="size-8 text-[var(--zayne-color-base-content-muted)]" />
    @endisset

    {{-- Label --}}
    <div class="text-center">
        <p class="text-sm font-medium text-[var(--zayne-color-base-content)]">{{ $label }}</p>
        @if ($hint)
            <p class="text-xs text-[var(--zayne-color-base-content-muted)] mt-0.5">{{ $hint }}</p>
        @endif
    </div>

    {{-- Optional custom slot content --}}
    @if (!$slot->isEmpty())
        {{ $slot }}
    @endif
</div>