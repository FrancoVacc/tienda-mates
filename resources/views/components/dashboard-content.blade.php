@props(['title'])
<section class="md:flex">
    <x-dashboard-menu title="{{ $title }}" />
    <div class=" w-full md:h-screen overflow-x-hidden md:overflow-y-scroll">
        {{ $slot }}
    </div>
</section>
