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
