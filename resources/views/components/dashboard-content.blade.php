@props(['title'])
<section class="md:flex">
    <x-dashboard-menu title="{{ $title }}" />
    <div class=" w-full ">
        {{ $slot }}
    </div>
</section>
