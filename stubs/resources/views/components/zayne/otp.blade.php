@php
    $inputMode = match($type) {
        'numeric'      => 'numeric',
        'alphanumeric' => 'text',
        'password'     => 'text',
        default        => 'text',
    };
    $inputType = $type === 'password' ? 'password' : 'text';
    $pattern   = $type === 'numeric' ? '[0-9]' : '[A-Za-z0-9]';
@endphp

<div
    x-data="zayneOtp({
        length: {{ $length }},
        type: '{{ $type }}',
        name: {{ $name ? json_encode($name) : 'null' }}
    })"
    class="zayne-otp"
    style="{{ $style }}"
    {{ $attributes->except(['class', 'style']) }}
>
    {{-- Hidden combined input for form submission --}}
    @if($name)
        <input type="hidden" :name="{{ json_encode($name) }}" :value="getValue()">
    @endif

    {{-- Individual digit boxes --}}
    @for ($i = 0; $i < $length; $i++)
        <input
            type="{{ $inputType }}"
            inputmode="{{ $inputMode }}"
            maxlength="1"
            class="zayne-otp-box"
            style="{{ $boxStyle }}"
            :ref="'box{{ $i }}'"
            x-ref="box{{ $i }}"
            :value="digits[{{ $i }}]"
            @if($disabled) disabled @endif
            @if($autofocus && $i === 0) autofocus @endif
            autocomplete="one-time-code"
            spellcheck="false"
            data-index="{{ $i }}"
            @input="onInput($event, {{ $i }})"
            @keydown="onKeydown($event, {{ $i }})"
            @paste.prevent="onPaste($event)"
            @focus="onFocus($event, {{ $i }})"
            @click="$event.target.select()"
        >
        @if($i === ($length / 2) - 1 && $length % 2 === 0 && $length > 4)
            <span style="
                display: flex;
                align-items: center;
                color: var(--zayne-color-base-content);
                opacity: 0.25;
                font-size: 1.25rem;
                font-weight: 300;
                flex-shrink: 0;
                user-select: none;
            ">—</span>
        @endif
    @endfor
</div>
