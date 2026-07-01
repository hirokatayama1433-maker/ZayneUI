@php($tag = $href !== '' ? 'a' : 'button')

<{{ $tag }}
    @if($href !== '') href="{{ $href }}" @endif
    @if($tag === 'button') type="button" @endif
    onclick="Zayne.Sidebar.closeMobile()"
    {{ $attributes->except('class') }}
    style="{{ $baseStyle }}"
    @if(!$active)
        onmouseover="this.style.background='{{ $hoverBg }}'; this.style.color='{{ $hoverColor }}';"
        onmouseout="this.style.background='{{ $background ?? 'transparent' }}'; this.style.color='{{ $color ?? 'var(--zayne-custom-sidebar-content)' }}';"
    @endif
>{{ $slot }}</{{ $tag }}>
