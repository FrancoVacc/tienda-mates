<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center bg-blue  px-2 py-1  rounded-md font-semibold text-xs text-white  uppercase tracking-widest hover:bg-lightBlue  focus:bg-lightBlue active:bg-lightBlue focus:outline-none transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
