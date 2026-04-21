{{-- resources/views/components/zayne/sidebar/group.blade.php --}}
@props([
    'label'   => '', 
])

<div class="">
    @if($label)
            <span class="text-(--zayne-custom-sidebar-content) text-[12px] truncate text-ellipsis flex">
                {{ $label }}
            </span>
    @endif

    {{-- Items — scrollable if max exceeded --}}
    <div
        class="flex flex-col" >
        {{ $slot }}
    </div>

</div>