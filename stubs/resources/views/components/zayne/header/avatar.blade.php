<div class="zayne-header-avatar" {{ $attributes }}>
    <zayne:avatar src="{{ $src }}" alt="{{ $alt }}" size="sm" />
    @if($label !== 'unset')
        <span>{{ $label }}</span>
    @endif
</div>
