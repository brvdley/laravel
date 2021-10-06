@props(['comment'])
<article class="flex items-stretch bg-gradient-to-b from-gray-200 to-transparent border border-gray-300 rounded-lg p-6 mb-4">
    <div class="flex-none">
        <img src="https://i.pravatar.cc/60?img={{ $comment->user_id }}" alt="" class="border border-gray-400 rounded avatar">
    </div>
    <div class="ml-3">
        <header>
            <h3 class="font-bold">{{ $comment->author->username }}</h3>
            <p class="text-sm">
                Posted <time>{{ $comment->created_at->diffForHumans() }}</time>
            </p>
        </header>

        <p>
            {{ $comment->body }}
        </p>
    </div>
</article>
