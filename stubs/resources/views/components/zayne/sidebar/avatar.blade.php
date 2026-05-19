<div class="zayne-sidebar-avatar" {{ $attributes }}>
    <zayne:avatar :src="$src" :alt="$alt" size="md" />
    @if($label !== null)
        <span class="sidebar-label">{{ $label }}</span>
    @endif
</div>
