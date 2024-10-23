@props(['type', 'message'])

@php
    $class =
        $type == 'success'
            ? 'p-10 bg-green text-white text-center font-bold w-[80%] rounded-md mx-auto'
            : 'p-10 bg-lightRed text-white text-center font-bold w-[80%]  rounded-md mx-auto';
@endphp

<div class=" w-full absolute top-2 z-10 rounded-md">
    <div {{ $attributes->merge(['class' => $class]) }} id='alert'>
        <p>{{ $message }}</p>
    </div>
</div>
