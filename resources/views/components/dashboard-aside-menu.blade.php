@props(['href', 'name', 'icon'])


<div class="my-4 hover:border-b hover-b-corduraLightGreen mb-2">
    <a href="{{ $href }}">
        <p><i class="{{ $icon }}"></i> - {{ $name }}</p>
    </a>
</div>
