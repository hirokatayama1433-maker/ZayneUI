@if($variant === 'text' && $lines > 1)
    <div style="display:flex; flex-direction:column; gap:0.5rem; {{ $margin ? 'margin:' . $margin . ';' : '' }}" {{ $attributes }}>
        @for($i = 0; $i < $lines; $i++)
            <span
                class="zayne-skeleton"
                style="{{ $style }}; {{ $i === $lines - 1 ? 'width:75%;' : '' }} margin:0;"
                aria-hidden="true"
            ></span>
        @endfor
    </div>
@else
    <span
        class="zayne-skeleton zayne-skeleton--{{ $variant }}"
        style="{{ $style }}"
        aria-hidden="true"
        {{ $attributes }}
    ></span>
@endif
