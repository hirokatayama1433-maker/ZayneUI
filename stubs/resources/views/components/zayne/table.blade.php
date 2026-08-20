@once
<style>
    .zayne-table-container {
        width: 100%;
        overflow-x: auto;
    }

    .zayne-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.875rem;
        color: var(--zayne-color-base-content);
    }

    .zayne-table-head {
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--zayne-color-base-content);
        opacity: 0.6;
        text-align: left;
        padding: 0.625rem 0.75rem;
        border-bottom: var(--zayne-border-box) solid var(--zayne-color-base-border);
        white-space: nowrap;
        user-select: none;
    }

    .zayne-table-head-inner {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
    }

    .zayne-table-head[x-data] {
        cursor: pointer;
    }

    .zayne-table-head[x-data]:hover {
        opacity: 1;
        color: var(--zayne-color-primary);
    }

    .zayne-table-sort-icon {
        width: 0.875rem;
        height: 0.875rem;
        opacity: 0.4;
        transition: opacity 150ms ease, transform 150ms ease;
    }

    .zayne-table-sort-icon[data-direction="asc"] {
        opacity: 1;
        transform: rotate(0deg);
    }

    .zayne-table-sort-icon[data-direction="desc"] {
        opacity: 1;
        transform: rotate(180deg);
    }

    .zayne-table-tbody tr {
        border-bottom: var(--zayne-border-box) solid var(--zayne-color-base-border);
        transition: background 100ms ease;
    }

    .zayne-table-tbody tr:hover {
        background: color-mix(in oklch, var(--zayne-color-base-content) 4%, transparent);
    }

    .zayne-table-tbody tr:last-child .zayne-table-cell {
        border-bottom: none;
    }

    .zayne-table--striped tbody tr:nth-child(even) {
        background: color-mix(in oklch, var(--zayne-color-base-content) 3%, transparent);
    }

    .zayne-table--striped tbody tr:nth-child(even):hover {
        background: color-mix(in oklch, var(--zayne-color-base-content) 6%, transparent);
    }
</style>
@endonce

<div class="zayne-table-container">
    <table class="zayne-table {{ $striped ? 'zayne-table--striped' : '' }}" style="{{ $style }}" {{ $attributes }}>
        @isset($header)
            <thead class="zayne-table-thead">
                <tr>{{ $header }}</tr>
            </thead>
        @endisset

        <tbody class="zayne-table-tbody">
            {{ $slot }}
        </tbody>
    </table>
</div>
