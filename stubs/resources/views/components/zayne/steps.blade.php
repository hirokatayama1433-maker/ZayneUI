@props([
    'classes'     => '',
    'orientation' => 'horizontal',
    'steps'       => [],
])

<ol {{ $attributes->merge(['class' => $classes]) }}>
    @foreach ($steps as $step)
        @php
            $status = $step['status'] ?? 'upcoming';
            $isLast = $loop->last;
        @endphp

        <li class="{{ $orientation === 'horizontal' ? 'flex-1 flex flex-col items-center relative' : 'flex gap-4 relative pb-8 last:pb-0' }}">

            {{-- Connector line --}}
            @if (!$isLast)
                <div class="
                    {{ $orientation === 'horizontal'
                        ? 'absolute top-3.5 left-[calc(50%+16px)] right-[calc(-50%+16px)] h-[5px]'
                        : 'absolute left-3.5 top-8 bottom-0 w-[5px]' }}
                    {{ $status === 'complete' ? 'bg-[var(--zayne-color-primary)]' : 'bg-[var(--zayne-color-base-border)]' }}
                "></div>
            @endif

            {{-- Circle indicator --}}
            <div class="
                relative z-10 flex items-center justify-center w-8 h-8 rounded-full text-xs font-semibold shrink-0
                {{ $status === 'complete' ? 'bg-[var(--zayne-color-primary)] text-[var(--zayne-color-primary-content)]' : '' }}
                {{ $status === 'current'  ? 'bg-[var(--zayne-color-base-100)] border-2 border-[var(--zayne-color-primary)] text-[var(--zayne-color-primary)]' : '' }}
                {{ $status === 'upcoming' ? 'bg-[var(--zayne-color-base-100)] border-2 border-[var(--zayne-color-base-border)] text-[var(--zayne-color-base-content-muted)]' : '' }}
            ">
                @if ($status === 'complete')
                    <x-zayne.icon name="check" class="size-4" />
                @else
                    {{ $loop->index + 1 }}
                @endif
            </div>

            {{-- Label + description --}}
            <div class="{{ $orientation === 'horizontal' ? 'mt-2 text-center' : 'pt-1' }}">
                <p class="text-sm font-medium
                    {{ $status === 'current'  ? 'text-[var(--zayne-color-primary)]' : '' }}
                    {{ $status === 'complete' ? 'text-[var(--zayne-color-base-content)]' : '' }}
                    {{ $status === 'upcoming' ? 'text-[var(--zayne-color-base-content-muted)]' : '' }}
                ">{{ $step['label'] }}</p>
                @if (!empty($step['description']))
                    <p class="text-xs text-[var(--zayne-color-base-content-muted)] mt-0.5">{{ $step['description'] }}</p>
                @endif
            </div>

        </li>
    @endforeach
</ol>