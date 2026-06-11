<span
    class="zayne-icon-wrapper"
    style="width: {{ $size }}; height: {{ $size }}; color: {{ $color ?? 'currentColor' }};"
>
    @if($svg)
        {!! $svg !!}
    @else
        {{ $slot }}
    @endif
</span>
