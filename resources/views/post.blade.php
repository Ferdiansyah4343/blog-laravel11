<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <h3 class="text-xl">Welcome to my Blog</h3>

    <article class="py-8 max-w-screen-md border-gray-300">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-500">{{ $post['title'] }}</h2>
        <div>
            By
            <a class="text-base text-gray-500 hover:underline"
                href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>
            in
            <a href="/categories/{{ $post->category->slug }}"
                class="hover:underline text-base text-gray-500">{{ $post->category->name }}</a>
            | {{ $post['created_at']->diffForHumans() }}
        </div>
        <p class="my-4 font-light">{{ $post['body'] }}</p>
        <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back to posts</a>
    </article>


</x-layout>
