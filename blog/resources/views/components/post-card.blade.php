@props(['posts'])

<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5">
        <div>
            @if (Storage::exists($posts->thumbnail))
            <img src="{{ asset('storage/' . $posts->thumbnail)  }}" alt="Blog Post illustration" class="rounded-xl">
            @else
            <img src="/images/illustration-1.png" alt="Blog Post illustration" class="rounded-xl">
            @endif
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
                    <x-category-button :category="$posts->category" />
                </div>

                <div class="mt-4">
                    <a href="/post/{{ $posts->slug }}">
                        <h1 class="text-3xl">
                            {{ $posts->title }}
                        </h1>
                    </a>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $posts->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4 space-y-4">
                {!! $posts->excerpt !!}
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="https://i.pravatar.cc/60?img={{ $posts->user_id }}" alt="Lary avatar" class="border border-gray-400 rounded avatar">
                    <div class="ml-3">
                        <h5 class="font-bold"><a href="/?author={{ $posts->author->username }}">{{ $posts->author->name }}</a></h5>
                    </div>
                </div>

                <div>
                    <a href="/posts/{{ $posts->slug }}"
                        class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8 read">Read
                        More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
