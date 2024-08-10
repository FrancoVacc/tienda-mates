<x-layout.layout-web>
    @if (count($productos))
        <a href="">
            <div class=" m-2 hover:shadow-xl hover:shadow-black max-w-80 rounded-md overflow-hidden">
                <img class=" mx-auto"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBGy1qEBSoXKIOTCpL2dsY-6_AcwNjkSFoCQ&s"
                    alt="">
                <div class=" bg-corduraLightGreen">
                    <h2 class="font-bold text-xl p-2">Mate imperial chico</h2>
                    <p class="font-semibold text-md p-2">$10000</p>
                </div>
            </div>
        </a>
    @else
        <div class=" px-5 pt-2 bg-corduraLightGreen rounded-md text-center font-bold text-white my-10 mx-auto w-[80%]">
            <p>Lamentablemente aún no hay productos disponibles a la venta</p>
        </div>
    @endif

</x-layout.layout-web>
