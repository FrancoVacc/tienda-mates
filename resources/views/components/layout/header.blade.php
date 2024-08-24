<header class=" pb-3 bg-black fixed top-0 z-10 w-full" id="header">
    <div class="flex align-middle justify-between md:justify-normal border-b-2 border-corduraGreen">

        {{-- nav clasico --}}
        <div class="hidden w-full md:flex justify-between align-middle h-[150px] duration-700" id="md-nav">
            <div class=" md:ml-10 p-2 flex align-middle">
                <img src="{{ asset('img/tu logo.svg') }}" class="max-w-[70px]"></img>
            </div>
            <nav class=" hidden ml-60 md:w-[40%] md:flex align-middle">
                <ul class="flex text-corduraLightGreen  w-[100%] justify-around my-auto text-base">
                    <li><a href="{{ route('home') }}"
                            class="hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">Home</a>
                    </li>
                    <li><a href="{{ route('shop') }}"
                            class="hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">Tienda</a></li>
                    <li><a href="{{ route('about') }}"
                            class="hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">Nosotros</a></li>
                    <li><a href="{{ route('contact') }}"
                            class="hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">Contacto</a></li>



                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ route('cart') }}"
                                    class="hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">
                                    <i class="fa-solid fa-cart-shopping"></i></a></li>
                            <li><a href="{{ route('dashboard') }}"
                                    class="hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">
                                    <i class="fa-solid fa-user"></i></a></li>
                        @else
                            <li><a href="{{ route('login') }}"
                                    class="hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">
                                    Iniciar Sesión
                                </a></li>
                        @endauth
                    @endif
                </ul>
            </nav>
        </div>

        {{-- nav mobile --}}

        <div class=" md:ml-10 md:hidden">
            <img src="{{ asset('img/tu logo.png') }}"
                class=" max-w-[100px] max-h-[100px] md:max-w-[150px] md:max-h-[150px]"></img>
        </div>

        <div class="flex align-middle">
            <button id="menu-btn" class=" md:hidden mr-6 text-corduraLightGreen hover:text-corduraGreen text-2xl"><i
                    class="fa-solid fa-bars"></i></button>

            @if (Route::has('login'))
                @auth
                    <a href="{{ route('cart') }}"
                        class=" md:hidden text-2xl mr-5 md:ml-0 text-corduraLightGreen hover:text-corduraGreen  hover:border-b-2 hover:border-corduraGreen my-auto md:text-base ">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                    <a href="{{ route('dashboard') }}"
                        class=" md:hidden text-2xl mr-5 md:ml-0 text-corduraLightGreen hover:text-corduraGreen  hover:border-b-2 hover:border-corduraGreen my-auto md:text-base ">
                        <i class="fa-solid fa-user"></i>
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="md:hidden text-2xl mr-5 md:ml-0 text-corduraLightGreen hover:text-corduraGreen  hover:border-b-2 hover:border-corduraGreen my-auto md:text-base ">
                        <i class="fa-solid fa-right-to-bracket"></i>
                    </a>
                @endauth
            @endif
        </div>


    </div>
    <nav id="sm-nav" class=" hidden w-full  bg-black z-10 absolute">
        <ul class="text-corduraLightGreen text-xl text-center">
            <li><a href="{{ route('home') }}"
                    class="hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">Home</a>
            </li>
            <li><a href="{{ route('shop') }}"
                    class="hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">Tienda</a>
            </li>
            <li><a href="{{ route('about') }}"
                    class="hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">Nosotros</a></li>
            <li><a href="{{ route('contact') }}"
                    class="hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">Contacto</a></li>
        </ul>
    </nav>

</header>
<div class="h-[155px]"></div>
<script>
    const menuBtn = document.getElementById('menu-btn');
    const nav = document.getElementById('sm-nav');
    const mdNav = document.getElementById('md-nav');
    const header = document.getElementById('header');

    menuBtn.addEventListener('click', () => {
        nav.classList.toggle('hidden')
    })

    window.addEventListener('scroll', () => {

        if (window.scrollY > 0) {
            // header.classList.add('fixed', 'top-0', 'w-full');
            mdNav.classList.remove('h-[150px]');
            mdNav.classList.add('h-[70px]');
        } else {
            // header.classList.remove('fixed', 'top-0', 'w-full');
            mdNav.classList.remove('h-[70px]');
            mdNav.classList.add('h-[150px]');
        }
    })
</script>
