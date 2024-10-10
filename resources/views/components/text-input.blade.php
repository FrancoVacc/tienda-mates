@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => ' text-black focus:border-corduraGreen rounded-md']) !!}>
