@props(['imgUrl', 'title'])

<div class="rounded-xl hover:shadow-xl overflow-hidden ">
    <a href="#">
        <img src="{{ $imgUrl }}" alt="mate">
        <div class=" text-center text-white font-bold bg-corduraLightGreen hover:bg-corduraGreen">
            <h2>{{ $title }}</h2>
        </div>
    </a>
</div>
