@props([
    'classes'  => '',
    'label'    => null,
    'hint'     => null,
    'error'    => null,
    'required' => false,
])

<div {{ $attributes->merge(['class' => $classes]) }}>

    {{-- Label --}}
    @if ($label && !($label instanceof \Illuminate\View\ComponentSlot))
        <label class="block text-sm font-medium text-[var(--zayne-color-base-content)] mb-1 flex items-center gap-1.5">
            {{ $label }}
            @if ($required)
                <x-zayne.badge color="danger" size="xs">Required</x-zayne.badge>
            @endif
        </label>
    @elseif (isset($label) && $label instanceof \Illuminate\View\ComponentSlot)
        <label class="block text-sm font-medium text-[var(--zayne-color-base-content)] mb-1 flex items-center gap-1.5">
            {{ $label }}
        </label>
    @endif

    {{-- Field --}}
    {{ $slot }}

    {{-- Hint --}}
    @if ($hint && !$error)
        <p class="text-xs text-[var(--zayne-color-base-content-muted)] mt-1">{{ $hint }}</p>
    @endif

    {{-- Error --}}
    @if ($error)
        <p class="text-xs text-[var(--zayne-color-danger)] mt-1">{{ $error }}</p>
    @endif

</div>