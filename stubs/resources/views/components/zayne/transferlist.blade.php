@props([
    'listA'    => [],
    'listB'    => [],
    'labelA'   => 'Available',
    'labelB'   => 'Selected',
    'labelKey' => 'name',
    'valueKey' => 'id',
    'id'       => 'transfer',
])

@php
    $normalize = function ($items) use ($labelKey, $valueKey) {
        return collect($items)->map(function ($item, $index) use ($labelKey, $valueKey) {
            if (is_string($item) || is_numeric($item)) {
                return ['id' => (string) $item, 'label' => (string) $item];
            }
            $item = (array) $item;
            return [
                'id'    => (string) ($item[$valueKey] ?? $item['id'] ?? $index),
                'label' => (string) ($item[$labelKey] ?? $item['name'] ?? $item['label'] ?? 'Item'),
                'meta'  => $item,
            ];
        })->values()->toArray();
    };

    $itemsA = $normalize($listA);
    $itemsB = $normalize($listB);
@endphp
@once
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
    @endpush
@endonce

<div
    wire:ignore
    x-data="{
        listA: {{ Js::from($itemsA) }},
        listB: {{ Js::from($itemsB) }},
        selectedA: [],
        selectedB: [],

        {{-- Toggle selection on click --}}
        toggleA(id) {
            const i = this.selectedA.indexOf(id)
            i === -1 ? this.selectedA.push(id) : this.selectedA.splice(i, 1)
        },
        toggleB(id) {
            const i = this.selectedB.indexOf(id)
            i === -1 ? this.selectedB.push(id) : this.selectedB.splice(i, 1)
        },

        {{-- Move selected from A → B --}}
        moveToB() {
            const moving = this.listA.filter(i => this.selectedA.includes(i.id))
            this.listB.push(...moving)
            this.listA = this.listA.filter(i => !this.selectedA.includes(i.id))
            this.selectedA = []
            this.emitChange()
        },

        {{-- Move selected from B → A --}}
        moveToA() {
            const moving = this.listB.filter(i => this.selectedB.includes(i.id))
            this.listA.push(...moving)
            this.listB = this.listB.filter(i => !this.selectedB.includes(i.id))
            this.selectedB = []
            this.emitChange()
        },

        {{-- Move ALL from A → B --}}
        moveAllToB() {
            this.listB.push(...this.listA)
            this.listA = []
            this.selectedA = []
            this.emitChange()
        },

        {{-- Move ALL from B → A --}}
        moveAllToA() {
            this.listA.push(...this.listB)
            this.listB = []
            this.selectedB = []
            this.emitChange()
        },

        {{-- Dispatch change event for Livewire to listen --}}
        emitChange() {
            this.$dispatch('transfer-change-{{ $id }}', {
                listA: this.listA,
                listB: this.listB,
            })
        },

        {{-- Init SortableJS on both panels --}}
        initSortable() {
            const self = this
            const opts = (fromList, toListKey, fromListKey) => ({
                group: '{{ $id }}',           {{-- same group = can drag between panels --}}
                animation: 150,
                ghostClass: 'zayne-sortable-ghost',
                chosenClass: 'zayne-sortable-chosen',
                dragClass: 'zayne-sortable-drag',
                onEnd(evt) {
                    {{-- SortableJS already moved the DOM node --}}
                    {{-- We need to sync Alpine data to match --}}
                    const fromEl = evt.from
                    const toEl   = evt.to
                    const itemId = evt.item.dataset.id

                    {{-- Remove from source list --}}
                    const fromKey = fromEl.dataset.list
                    const toKey   = toEl.dataset.list
                    const item    = self[fromKey].find(i => i.id === itemId)
                        ?? self[toKey].find(i => i.id === itemId)

                    self[fromKey] = self[fromKey].filter(i => i.id !== itemId)
                    self[toKey]   = self[toKey].filter(i => i.id !== itemId)

                    {{-- Re-insert at correct position based on DOM order --}}
                    const siblings = [...toEl.querySelectorAll('[data-id]')]
                    const newIndex = siblings.findIndex(el => el.dataset.id === itemId)

                    if (item) {
                        self[toKey].splice(newIndex, 0, item)
                    }

                    {{-- Clear selections --}}
                    self.selectedA = []
                    self.selectedB = []
                    self.emitChange()
                }
            })

            Sortable.create(this.$refs.panelA, opts('listA', 'listB', 'listA'))
            Sortable.create(this.$refs.panelB, opts('listB', 'listA', 'listB'))
        }
    }"
    x-init="$nextTick(() => initSortable())"
    class="flex items-stretch gap-3 w-full"
>

    {{-- ── Panel A ─────────────────────────────────────────── --}}
    <div class="flex flex-col flex-1 min-w-0 rounded-[var(--zayne-radius-box)] border border-[var(--zayne-color-base-border)] overflow-hidden">

        {{-- Header --}}
        <div class="flex items-center justify-between px-3 py-2.5 bg-[var(--zayne-color-base-200)] border-b border-[var(--zayne-color-base-border)] shrink-0">
            <span class="text-xs font-semibold text-[var(--zayne-color-base-content)] uppercase tracking-wide">{{ $labelA }}</span>
            <span class="text-xs text-[var(--zayne-color-base-content-muted)]" x-text="listA.length + ' items'"></span>
        </div>

        {{-- List --}}
        <div
            x-ref="panelA"
            data-list="listA"
            class="flex flex-col flex-1 overflow-y-auto min-h-[200px] p-1.5 gap-1 bg-[var(--zayne-color-base-100)]"
        >
            <template x-for="item in listA" :key="item.id">
                <div
                    :data-id="item.id"
                    @click="toggleA(item.id)"
                    :class="selectedA.includes(item.id)
                        ? 'bg-[var(--zayne-color-primary)] text-[var(--zayne-color-primary-content)] border-[var(--zayne-color-primary)]'
                        : 'bg-[var(--zayne-color-base-100)] text-[var(--zayne-color-base-content)] border-[var(--zayne-color-base-border)] hover:bg-[var(--zayne-color-base-hover)]'"
                    class="flex items-center gap-2.5 px-3 py-2 rounded-[var(--zayne-radius-field)] border text-sm cursor-grab active:cursor-grabbing select-none transition-colors duration-100"
                >
                    {{-- Drag handle --}}
                    <svg class="size-3.5 shrink-0 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" d="M4 8h16M4 16h16"/>
                    </svg>
                    <span class="flex-1 truncate" x-text="item.label"></span>
                    {{-- Selected check --}}
                    <svg x-show="selectedA.includes(item.id)" class="size-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                    </svg>
                </div>
            </template>

            {{-- Empty state --}}
            <div
                x-show="listA.length === 0"
                class="flex flex-col items-center justify-center flex-1 min-h-[160px] text-center px-4"
            >
                <svg class="size-8 text-[var(--zayne-color-base-border)] mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
                </svg>
                <p class="text-xs text-[var(--zayne-color-base-content-muted)]">Empty</p>
                <p class="text-xs text-[var(--zayne-color-base-content-muted)] opacity-60">Drag items here</p>
            </div>
        </div>

    </div>

    {{-- ── Center controls ─────────────────────────────────── --}}
    <div class="flex flex-col items-center justify-center gap-1.5 shrink-0 py-2">

        {{-- Move all → --}}
        <button
            type="button"
            @click="moveAllToB()"
            :disabled="listA.length === 0"
            title="Move all to {{ $labelB }}"
            class="p-1.5 rounded-[var(--zayne-radius-field)] border border-[var(--zayne-color-base-border)] text-[var(--zayne-color-base-content-muted)] hover:text-[var(--zayne-color-base-content)] hover:bg-[var(--zayne-color-base-hover)] disabled:opacity-30 disabled:cursor-not-allowed transition-colors"
        >
            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5"/>
            </svg>
        </button>

        {{-- Move selected → --}}
        <button
            type="button"
            @click="moveToB()"
            :disabled="selectedA.length === 0"
            title="Move selected to {{ $labelB }}"
            class="p-1.5 rounded-[var(--zayne-radius-field)] border border-[var(--zayne-color-base-border)] text-[var(--zayne-color-base-content-muted)] hover:text-[var(--zayne-color-primary)] hover:border-[var(--zayne-color-primary)] hover:bg-[var(--zayne-color-primary)]/10 disabled:opacity-30 disabled:cursor-not-allowed transition-colors"
        >
            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
            </svg>
        </button>

        <div class="h-px w-5 bg-[var(--zayne-color-base-border)] my-1"></div>

        {{-- ← Move selected --}}
        <button
            type="button"
            @click="moveToA()"
            :disabled="selectedB.length === 0"
            title="Move selected to {{ $labelA }}"
            class="p-1.5 rounded-[var(--zayne-radius-field)] border border-[var(--zayne-color-base-border)] text-[var(--zayne-color-base-content-muted)] hover:text-[var(--zayne-color-primary)] hover:border-[var(--zayne-color-primary)] hover:bg-[var(--zayne-color-primary)]/10 disabled:opacity-30 disabled:cursor-not-allowed transition-colors"
        >
            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/>
            </svg>
        </button>

        {{-- ← Move all --}}
        <button
            type="button"
            @click="moveAllToA()"
            :disabled="listB.length === 0"
            title="Move all to {{ $labelA }}"
            class="p-1.5 rounded-[var(--zayne-radius-field)] border border-[var(--zayne-color-base-border)] text-[var(--zayne-color-base-content-muted)] hover:text-[var(--zayne-color-base-content)] hover:bg-[var(--zayne-color-base-hover)] disabled:opacity-30 disabled:cursor-not-allowed transition-colors"
        >
            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5"/>
            </svg>
        </button>

    </div>

    {{-- ── Panel B ─────────────────────────────────────────── --}}
    <div class="flex flex-col flex-1 min-w-0 rounded-[var(--zayne-radius-box)] border border-[var(--zayne-color-base-border)] overflow-hidden">

        {{-- Header --}}
        <div class="flex items-center justify-between px-3 py-2.5 bg-[var(--zayne-color-base-200)] border-b border-[var(--zayne-color-base-border)] shrink-0">
            <span class="text-xs font-semibold text-[var(--zayne-color-base-content)] uppercase tracking-wide">{{ $labelB }}</span>
            <span class="text-xs text-[var(--zayne-color-base-content-muted)]" x-text="listB.length + ' items'"></span>
        </div>

        {{-- List --}}
        <div
            x-ref="panelB"
            data-list="listB"
            class="flex flex-col flex-1 overflow-y-auto min-h-[200px] p-1.5 gap-1 bg-[var(--zayne-color-base-100)]"
        >
            <template x-for="item in listB" :key="item.id">
                <div
                    :data-id="item.id"
                    @click="toggleB(item.id)"
                    :class="selectedB.includes(item.id)
                        ? 'bg-[var(--zayne-color-primary)] text-[var(--zayne-color-primary-content)] border-[var(--zayne-color-primary)]'
                        : 'bg-[var(--zayne-color-base-100)] text-[var(--zayne-color-base-content)] border-[var(--zayne-color-base-border)] hover:bg-[var(--zayne-color-base-hover)]'"
                    class="flex items-center gap-2.5 px-3 py-2 rounded-[var(--zayne-radius-field)] border text-sm cursor-grab active:cursor-grabbing select-none transition-colors duration-100"
                >
                    <svg class="size-3.5 shrink-0 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" d="M4 8h16M4 16h16"/>
                    </svg>
                    <span class="flex-1 truncate" x-text="item.label"></span>
                    <svg x-show="selectedB.includes(item.id)" class="size-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                    </svg>
                </div>
            </template>

            {{-- Empty state --}}
            <div
                x-show="listB.length === 0"
                class="flex flex-col items-center justify-center flex-1 min-h-[160px] text-center px-4"
            >
                <svg class="size-8 text-[var(--zayne-color-base-border)] mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
                </svg>
                <p class="text-xs text-[var(--zayne-color-base-content-muted)]">Empty</p>
                <p class="text-xs text-[var(--zayne-color-base-content-muted)] opacity-60">Drag items here</p>
            </div>
        </div>

    </div>

</div>

@once
<style>
.zayne-sortable-ghost {
    opacity: 0.4;
    background: var(--zayne-color-primary) !important;
    color: var(--zayne-color-primary-content) !important;
    border-color: var(--zayne-color-primary) !important;
}
.zayne-sortable-chosen {
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    scale: 1.02;
}
.zayne-sortable-drag {
    opacity: 0 !important;
}
</style>
@endonce