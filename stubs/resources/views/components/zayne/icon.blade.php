@if($svg || $slot->isNotEmpty())
<span
    class="zayne-icon-wrapper"
    style="width: {{ $size }}; height: {{ $size }}; color: {{ $color ?? 'currentColor' }}; display:inline-flex; align-items:center; justify-content:center; flex-shrink:0;"
>
    @if($svg)
        {!! $svg !!}
    @else
        {{ $slot }}
    @endif
</span>
@endif
