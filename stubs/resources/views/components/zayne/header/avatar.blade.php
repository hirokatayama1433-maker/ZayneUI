<div class="zayne-header-avatar" {{ $attributes }}>
    <zayne:avatar :src="$src" :alt="$alt" size="sm" />
    @if($label !== null)
        <span>{{ $label }}</span>
    @endif
</div>
