<div
    x-data="zayneTab('{{ $default }}')"
    class="zayne-tab zayne-tab--{{ $orientation }}"
    style="{{ $wrapperStyle }}"
    {{ $attributes->except(['class', 'style']) }}
>
    <div
        class="zayne-tab-list zayne-tab-list--{{ $variant }}{{ $muted ? ' zayne-tab-list--muted' : '' }}"
        style="{{ $listStyle }}"
        role="tablist"
    >
        {{ $tabs }}
    </div>

    <div
        class="zayne-tab-panels"
        style="{{ $panelsStyle }}"
    >
        {{ $slot }}
    </div>
</div>