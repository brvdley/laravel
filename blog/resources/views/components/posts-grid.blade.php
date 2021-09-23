@props(['posts'])

<x-post-featured-card :posts="$posts->first()" />
@if ($posts->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($posts->skip(1) as $posts)
            <x-post-card :posts="$posts" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" />
        @endforeach
    </div>
@endif
