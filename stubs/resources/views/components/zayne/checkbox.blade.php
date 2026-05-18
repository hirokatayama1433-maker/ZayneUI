<label class="zayne-checkbox" {{ $attributes->except(['class', 'style']) }}>
    <span class="zayne-checkbox-box" style="{{ $style }}">
        <input type="checkbox" @checked($checked) {{ $attributes->only(['name', 'value', 'id']) }}>
        <svg viewBox="0 0 16 16" aria-hidden="true">
            <path d="M3 8.5L6.5 12L13 4.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </span>
    <span class="zayne-checkbox-label">{{ $slot }}</span>
</label>
