<th
    class="zayne-table-head"
    style="{{ $style }}"
    @if($sort) x-data="zayneTableSort()" @click="toggle('{{ $attributes->get('name', '') }}')" @endif
    {{ $attributes->except(['name']) }}
>
    <span class="zayne-table-head-inner">
        {{ $slot }}

        @if($sort)
            <span class="zayne-table-sort-icon" data-direction="{{ $sort }}">
                <zayne:icon :name="$sort === 'desc' ? 'chevron-down' : 'chevron-up'" />
            </span>
        @endif
    </span>
</th>
