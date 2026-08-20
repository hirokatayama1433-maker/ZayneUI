@once
<style>
    .zayne-timeline {
        display: flex;
        flex-direction: column;
        position: relative;
    }
</style>
@endonce

<div
    class="zayne-timeline zayne-timeline--{{ $variant }}"
    style="{{ $style }}"
    {{ $attributes }}
>
    {{ $slot }}
</div>
