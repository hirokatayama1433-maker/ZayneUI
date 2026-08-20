@php($tag = $href ? 'a' : 'div')
@once
<style>
    .zayne-profile {
        display: flex;
        align-items: center;
        gap: 0.625rem;
    }
</style>
@endonce

<{{ $tag }}
    @if($href) href="{{ $href }}" @endif
    class="zayne-profile zayne-profile--{{ $layout }}"
    style="{{ $style }}"
    {{ $attributes }}
>
    {{-- Avatar --}}
    <div style="{{ $avatarStyle }}">
        @if($src)
            <img src="{{ $src }}" alt="{{ $alt ?: $name }}" style="width:100%;height:100%;object-fit:cover;" />
        @else
            {{ collect(explode(' ', trim($name)))->map(fn($w) => strtoupper($w[0] ?? ''))->take(2)->join('') }}
        @endif
    </div>

    {{-- Info --}}
    <div style="
        display:flex;
        flex-direction:column;
        min-width:0;
        {{ $layout === 'vertical' ? 'align-items:center; text-align:center;' : '' }}
        {{ $layout === 'compact' ? 'gap:0;' : 'gap:0.125rem;' }}
    ">
        <span style="font-size:{{ $layout === 'compact' ? '0.875rem' : '0.9375rem' }}; font-weight:600; line-height:1.3; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; color:var(--zayne-color-base-content);">
            {{ $name }}
        </span>

        @if($role)
            <span style="font-size:0.8125rem; line-height:1.3; color:var(--zayne-color-base-content-muted); overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                {{ $role }}
            </span>
        @endif

        @if($email && $layout !== 'compact')
            <span style="font-size:0.75rem; line-height:1.3; color:var(--zayne-color-base-content-muted); overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                {{ $email }}
            </span>
        @endif

        @isset($meta)
            <div style="margin-top:0.25rem;">{{ $meta }}</div>
        @endisset
    </div>

    @isset($trailing)
        <div style="margin-left:auto; flex-shrink:0;">{{ $trailing }}</div>
    @endisset

</{{ $tag }}>
