@auth
    <form method="POST" action="/posts/{{ $post->slug }}/comments"
        class="border border-gray-400 p-6 rounded-lg flex flex-col items-stretch bg-gradient-to-b from-gray-200 to-transparent mb-6 justify-center">
        @csrf

        <header class="flex items-center mb-3">
            <img src="https://i.pravatar.cc/60?img={{ auth()->id() }}" alt=""
                class="border border-gray-300 rounded avatar">
            <h2 class="ml-3 font-semibold justify-self-center">Want to participate?</h2>
        </header>
        <div class="mb-2">
            <textarea name="body" class="w-full rounded-lg border border-gray-300 p-2 text-sm" rows="7"
                placeholder="Start typing..." required></textarea>
            @error('body')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-full flex items-center justify-end">
            <input type="submit" value="Post Comment"
                class="border border-gray-300 rounded-lg text-center bg-gradient-to-b from-gray-200 p-2 comment-submit"
                name="submit">
        </div>
    </form>
@else<p class="mb-6">
        <a href="/login" class="text-blue-600">Login</a> to join the conversation!
    </p>
@endauth
