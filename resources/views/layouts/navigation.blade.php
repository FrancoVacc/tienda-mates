<nav x-data="{ open: false }" class="pb-3 bg-black w-full">
    <!-- Primary Navigation Menu -->
    <div class="hidden md:flex align-middle justify-between md:justify-normal border-b-2 border-corduraGreen">
        <div class="hidden w-full md:flex justify-between align-middle h-[70px]">

            <!-- Logo -->


            <x-application-logo />


            <!-- Navigation Links -->
            <nav class=" hidden md:flex align-middle">
                <ul class="flex  w-[100%] justify-around items-end my-auto text-base">

                    <li class="mx-3">
                        <x-nav-link :href="route('home')"
                            class="text-corduraLightGreen hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">
                            {{ __('Mi Tienda') }}
                        </x-nav-link>
                    </li>

                    <li class="mx-3">
                        <x-nav-link :href="route('myorders')"
                            class="text-corduraLightGreen hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">
                            {{ __('Mis Compras') }}
                        </x-nav-link>
                    </li>
                    @role('admin')
                        <li class="mx-3">
                            <x-nav-link :href="route('dashboard')"
                                class="text-corduraLightGreen hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                        </li>
                        <li class="mx-3">
                            <x-nav-link :href="route('products.index')"
                                class="text-corduraLightGreen hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">
                                {{ __('Productos') }}
                            </x-nav-link>
                        </li>
                        <li class="mx-3">
                            <x-nav-link :href="route('categories.index')"
                                class="text-corduraLightGreen hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">
                                {{ __('Categorías') }}
                            </x-nav-link>
                        </li>
                        <li class="mx-3">
                            <x-nav-link :href="route('ordersshow')"
                                class="text-corduraLightGreen hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">
                                {{ __('Ordenes de Compra') }}
                            </x-nav-link>
                        </li>
                        <li class="mx-3">
                            <x-nav-link :href="route('customers')"
                                class="text-corduraLightGreen hover:text-corduraGreen hover:border-b-2 hover:border-corduraGreen">
                                {{ __('Clientes') }}
                            </x-nav-link>
                        </li>
                    @endrole
                </ul>
            </nav>


            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

        </div>
    </div>
    <div class=" md:hidden border-b-2 border-corduraGreen">
        <x-application-logo />
        <!-- Hamburger -->
        <div class="-me-2 flex items-center sm:hidden justify-end mr-5 text-corduraLightGreen">
            <button @click="open = ! open"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-nav-link :href="route('home')"
                    class="text-corduraLightGreen block py-2 px-5 border-l border-corduraLightGreen  hover:text-corduraGreen ">
                    {{ __('Mi Tienda') }}
                </x-nav-link>
                <x-nav-link :href="route('myorders')"
                    class="text-corduraLightGreen block py-2 px-5 border-l border-corduraLightGreen hover:text-corduraGreen ">
                    {{ __('Mis Compras') }}
                </x-nav-link>
                @role('admin')
                    <x-nav-link :href="route('dashboard')"
                        class="text-corduraLightGreen block py-2 px-5 border-l border-corduraLightGreen hover:text-corduraGreen ">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('products.index')"
                        class="text-corduraLightGreen block py-2 px-5 border-l border-corduraLightGreen hover:text-corduraGreen  ">
                        {{ __('Productos') }}
                    </x-nav-link>
                    <x-nav-link :href="route('categories.index')"
                        class="text-corduraLightGreen block py-2 px-5 border-l border-corduraLightGreen hover:text-corduraGreen  ">
                        {{ __('Categorías') }}
                    </x-nav-link>
                    <x-nav-link :href="route('ordersshow')"
                        class="text-corduraLightGreen block py-2 px-5 border-l border-corduraLightGreen hover:text-corduraGreen ">
                        {{ __('Ordenes de Compra') }}
                    </x-nav-link>
                    <x-nav-link :href="route('customers')"
                        class="text-corduraLightGreen block py-2 px-5 border-l border-corduraLightGreen hover:text-corduraGreen  ">
                        {{ __('Clientes') }}
                    </x-nav-link>
                @endrole
            </div>
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-corduraGreen">
                <div class="px-4">
                    <div class="font-medium text-base text-corduraLightGreen">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-corduraLightGreen">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-nav-link :href="route('profile.edit')"
                        class="text-corduraLightGreen block py-2 px-5 border-l border-corduraLightGreen hover:text-corduraGreen  ">
                        {{ __('profile') }}
                    </x-nav-link>


                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-nav-link :href="route('logout')"
                            class="text-corduraLightGreen block py-2 px-5 border-l border-corduraLightGreen hover:text-corduraGreen  "
                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-nav-link>

                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
