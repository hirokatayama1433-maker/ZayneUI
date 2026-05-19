<div class="zayne-navtree" {{ $attributes }}>
    @if($title !== null)
        <div class="zayne-sidebar-label">{{ $title }}</div>
    @endif

    <div class="zayne-navtree-items">{{ $slot }}</div>
</div>
