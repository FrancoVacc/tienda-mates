@props(['category'])

<div class="p-1 md:w-[30%] ">
    <div class="rounded-xl hover:shadow-xl overflow-hidden ">
        <a href="{{ route('category', $category->id) }}">
            <img src="{{ $category->imgUrl() }}" alt="mate">
            <div class=" text-center text-white font-bold bg-corduraLightGreen hover:bg-corduraGreen">
                <h2>{{ $category->categorie }}</h2>
            </div>
        </a>
    </div>
</div>
