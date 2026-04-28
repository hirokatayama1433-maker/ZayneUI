@props([
    'wrapperClasses' => '',
    'classes'        => '',
    'rowClasses'     => '',
    'selectable'     => false,
    'striped'        => false,
    'loading'        => false,
    'columns'        => [],  // [['key' => '', 'label' => '', 'width' => '']]
    'rows'           => [],  // array of row data — or use slot
    'emptyTitle'     => 'No records found',
    'emptyDescription' => null,
])

<div class="{{ $wrapperClasses }}">
    <table class="{{ $classes }}">

        {{-- Head --}}
        <thead>
            <tr class="bg-[var(--zayne-color-base-200)]">

                @if ($selectable)
                    <th class="w-10 px-4 py-3">
                        <x-zayne.checkbox name="select_all" size="sm" />
                    </th>
                @endif

                @foreach ($columns as $col)
                    <th
                        class="px-4 py-3 text-xs font-semibold uppercase tracking-wide text-[var(--zayne-color-base-content-muted)] whitespace-nowrap {{ $col['width'] ?? '' }}"
                    >
                        {{ $col['label'] ?? $col['key'] }}
                    </th>
                @endforeach

                {{-- Custom header slot --}}
                @isset($head)
                    {{ $head }}
                @endisset

            </tr>
        </thead>

        {{-- Body --}}
        <tbody>
            @if ($loading)
                {{-- Loading skeleton rows --}}
                @for ($i = 0; $i < 5; $i++)
                    <tr class="{{ $rowClasses }}">
                        @if ($selectable)
                            <td class="px-4 py-3">
                                <x-zayne.skeleton shape="box" width="16px" height="16px" />
                            </td>
                        @endif
                        @foreach ($columns as $col)
                            <td class="px-4 py-3">
                                <x-zayne.skeleton shape="line" width="{{ $loop->index === 0 ? '60%' : '80%' }}" />
                            </td>
                        @endforeach
                    </tr>
                @endfor

            @elseif (!empty($rows))
                {{-- Data rows --}}
                @foreach ($rows as $row)
                    <tr class="{{ $rowClasses }} {{ $striped && $loop->even ? 'bg-[var(--zayne-color-base-200)]' : '' }}">

                        @if ($selectable)
                            <td class="px-4 py-3">
                                <x-zayne.checkbox name="row_{{ $loop->index }}" size="sm" />
                            </td>
                        @endif

                        @foreach ($columns as $col)
                            <td class="px-4 py-3 text-[var(--zayne-color-base-content)]">
                                {{ $row[$col['key']] ?? '—' }}
                            </td>
                        @endforeach

                    </tr>
                @endforeach

            @elseif ($slot->isEmpty())
                {{-- Empty state --}}
                <tr>
                    <td colspan="{{ count($columns) + ($selectable ? 1 : 0) }}" class="px-4 py-8">
                        <x-zayne.empty-state
                            :title="$emptyTitle"
                            :description="$emptyDescription"
                        />
                    </td>
                </tr>
            @endif

            {{-- Manual slot rows --}}
            @if (!$slot->isEmpty())
                {{ $slot }}
            @endif
        </tbody>

        {{-- Optional tfoot slot --}}
        @isset($foot)
            <tfoot>
                {{ $foot }}
            </tfoot>
        @endisset

    </table>
</div>