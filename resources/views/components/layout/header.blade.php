<header class=" pb-3 bg-black ">
    <div class="flex align-middle justify-between md:justify-normal border-b-2 border-corduraGreen">

        <div class=" md:ml-10 ">
            <img src="{{ asset('img/tu logo.png') }}"
                class=" max-w-[100px] max-h-[100px] md:max-w-[150px] md:max-h-[150px]"></img>
        </div>

        {{-- nav clasico --}}
        <nav class=" hidden ml-60 md:w-[40%] md:flex align-middle">
            <ul class="flex text-corduraLightGreen  w-[100%] justify-around my-auto text-base">
                <li><a href="{{ route('home') }}"
                        class="hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">Home</a>
                </li>
                <li><a href="#"
                        class="hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">Tienda</a></li>
                <li><a href="{{ route('about') }}"
                        class="hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">Nosotros</a></li>
                <li><a href="{{ route('contact') }}"
                        class="hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">Contacto</a></li>
            </ul>
        </nav>

        {{-- nav mobile --}}


        <div class="flex align-middle">
            <button id="menu-btn" class=" md:hidden mr-6 text-corduraLightGreen hover:text-corduraGreen text-2xl"><i
                    class="fa-solid fa-bars"></i></button>


            <a href="#"
                class="  text-2xl mr-5 md:ml-0 text-corduraLightGreen hover:text-corduraGreen  hover:border-b-2 hover:border-corduraGreen my-auto md:text-base ">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
        </div>


    </div>
    <nav id="sm-nav" class=" hidden w-full  bg-black z-10 absolute">
        <ul class="text-corduraLightGreen text-xl text-center">
            <li><a href="{{ route('home') }}"
                    class="hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">Home</a>
            </li>
            <li><a href="#" class="hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">Tienda</a>
            </li>
            <li><a href="{{ route('about') }}"
                    class="hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">Nosotros</a></li>
            <li><a href="{{ route('contact') }}"
                    class="hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">Contacto</a></li>
        </ul>
    </nav>

</header>
<script>
    const menuBtn = document.getElementById('menu-btn');
    const nav = document.getElementById('sm-nav');

    menuBtn.addEventListener('click', () => {
        nav.classList.toggle('hidden')
    })
</script>
