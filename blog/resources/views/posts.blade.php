<x-layout>
    @foreach ($posts as $post)
        <article>
            <h2>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h2>
            <p>Created by <a href="/profile/{{ $post->author->username }}">{{$post->author->name}}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
            <p>{{ date("Y-m-d", $post->date) }}</p>
            <div>{{ $post->excerpt }}</div>
        </article>
    @endforeach
</x-layout>
