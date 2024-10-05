<div class="mt-2 md:mt-0">
    @session('items')
        @if (session('items') > 0)
            <div class=" text-center mr-5 md:ml-0">
                <span class="text-sm text-corduraLightGreen">{{ session('items') }}</span>
            </div>
        @endif
    @endsession
    <a href="{{ route('cart') }}"
        class=" text-2xl mr-5 md:ml-0 text-corduraLightGreen hover:text-corduraGreen  hover:border-b-2 hover:border-corduraGreen my-auto md:text-base ">
        <i class="fa-solid fa-cart-shopping"></i>
    </a>
</div>
