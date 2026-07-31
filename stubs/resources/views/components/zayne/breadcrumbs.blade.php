@php
    // Pass separator as a view shared variable scoped to this render
    // Children access it via $separator which Blade resolves from the current view data
    view()->share('zayne_breadcrumb_separator', $separator);
@endphp

<nav aria-label="Breadcrumb" {{ $attributes->except('class') }}>
    <ol
        class="zayne-breadcrumbs"
        style="{{ $style }}"
    >
        {{ $slot }}
    </ol>
</nav>

@php
    // Clean up — unshare so it doesn't leak to other views
    view()->share('zayne_breadcrumb_separator', null);
@endphp
