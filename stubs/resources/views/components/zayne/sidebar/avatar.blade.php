<div class="zayne-sidebar-avatar" {{ $attributes }}>
    <zayne:avatar src="{{ $src }}" alt="{{ $alt }}" size="md" />
    @if($label !== 'unset')
        <span class="sidebar-label">{{ $label }}</span>
    @endif
</div>
