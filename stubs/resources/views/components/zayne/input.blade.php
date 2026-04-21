@props([
    'wrapperClasses'     => '',
    'inputClasses'       => '',
    'floatLabelClasses'  => '',
    'affixDividerClasses' => 'h-5 text-sm',
    'type'               => 'text',
    'labelPosition'      => 'top',
    'label'              => null,
    'legend'             => null,
    'disabled'           => false,
    'error'              => false,
])

<div class="w-full flex flex-col gap-1">

    @if ($label && $labelPosition === 'top')
        <label class="text-sm font-medium text-[var(--zayne-color-base-content)]">
            {{ $label }}
        </label>
    @endif

    @if ($legend)
        <span class="text-xs pl-1 text-[var(--zayne-color-base-content-muted)]">{{ $legend }}</span>
    @endif

    <div class="{{ $wrapperClasses }}">

        {{-- Prefix --}}
        @isset($prefix)
            <div class="pl-5 pr-0 flex items-center shrink-0 text-[var(--zayne-color-base-content-muted)]">
                <div class="pr-5 border-r border-[var(--zayne-color-base-border)] flex items-center {{ $affixDividerClasses }}">
                    {{ $prefix }}
                </div>
            </div>
        @endisset

        <div class="relative flex-1 h-full flex items-center">
            <input
                type="{{ $type }}"
                placeholder="{{ $labelPosition === 'float' && $label ? ' ' : ($attributes->get('placeholder', '')) }}"
                @disabled($disabled)
                {{ $attributes->except('placeholder')->merge(['class' => $inputClasses]) }}
            />

            @if ($label && $labelPosition === 'float')
                <span class="{{ $floatLabelClasses }}">{{ $label }}</span>
            @endif
        </div>

        @isset($suffix)
            <div class="pr-5 pl-0 flex items-center shrink-0 text-[var(--zayne-color-base-content-muted)]">
                <div class="pl-5 border-l border-[var(--zayne-color-base-border)] flex items-center {{ $affixDividerClasses }}">
                    {{ $suffix }}
                </div>
            </div>
        @endisset

    </div>

</div>
