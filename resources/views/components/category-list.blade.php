@props(['category'])
<a class="hover:text-corduraGreen text-center block"
    href="{{ route('category', $category->slug) }}">{{ $category->categorie }}</a>
