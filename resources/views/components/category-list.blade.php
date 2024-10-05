@props(['category'])
<a class="hover:text-corduraGreen text-center block"
    href="{{ route('category', $category->id) }}">{{ $category->categorie }}</a>
