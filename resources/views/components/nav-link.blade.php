@props(['href'])


<a href="{{ $href }}" {{ $attributes }}>
    {{ $slot }}
</a>
