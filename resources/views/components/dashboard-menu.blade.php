@props(['title'])
<div class="md:w-[20%]">
    <div class="bg-black pb-1 text-corduraLightGreen">
        <div class="flex justify-around mb-2 border-b-2 border-b-corduraGreen ">
            <x-dashboard-header>{{ $title }}</x-dashboard-header>
            <div class="bg-corduraLightGreen rounded-sm h-5 w-5 text-black text-center md:hidden" id="menu-btn">
                <i class="fa-solid fa-caret-down"></i>
            </div>
            <div class="bg-corduraLightGreen rounded-sm h-5 w-5 text-black text-center hidden" id="close-btn">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
        <nav class="w-[80%] ml-4 hidden md:block md:h-screen" id="menu-nav">
            <ul>
                <li>
                    <x-dashboard-aside-menu :href="route('messages_show')" name="Mensajes" icon="fa-regular fa-envelope" />
                </li>
                <li>
                    <x-dashboard-aside-menu :href="route('ordersshow')" name="Ordenes" icon="fa-solid fa-cart-shopping" />
                </li>
                <li>
                    <x-dashboard-aside-menu :href="route('customers')" name="Clientes" icon="fa-solid fa-users" />
                </li>
                <li>
                    <x-dashboard-aside-menu :href="route('products.index')" name="Productos" icon="fa-solid fa-box" />
                </li>
                <li>
                    <x-dashboard-aside-menu :href="route('categories.index')" name="Categorías" icon="fa-solid fa-paperclip" />
                </li>
                <li>
                    <x-dashboard-aside-menu :href="route('products.index')" name="Ajustes" icon="fa-solid fa-user-gear" />
                </li>
            </ul>
        </nav>
    </div>
    <script src="{{ asset('js/dashboardMenu.js') }}"></script>
</div>
