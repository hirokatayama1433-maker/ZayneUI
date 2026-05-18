<label class="zayne-toggle" {{ $attributes->except(['class', 'style']) }}>
    <span class="zayne-toggle-track" style="{{ $style }}">
        <input type="checkbox" @checked($checked) {{ $attributes->only(['name', 'value', 'id']) }}>
        <span class="zayne-toggle-thumb{{ $checked ? ' is-on' : '' }}"></span>
    </span>
    <span class="zayne-toggle-label">{{ $slot }}</span>
</label>
