<x-layout>
    <section class="px-6 py-8 flex items-center justify-center">

        <form method="POST" action="/admin/posts" class="grid-cols-12 flex justify-center items-center flex-col p-3 border border-gray-300 rounded-lg w-1/2" enctype="multipart/form-data">
            <h1 class="text-lg font-bold ">New Post...</h1>
            @csrf
            <div class="mb-4 w-full flex items-start flex-col">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                    Title
                </label>
                <input type="text" name="title" id="title" required class="w-full rounded-lg border border-gray-300 p-2 text-sm" placeholder="Enter a unique title..." value="{{ old('title') }}">
                @error('title')
                    <p class="text-red 500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 w-full flex items-start flex-col">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
                    Category
                </label>
                <select name="category_id" id="category_id" class="w-full rounded-lg border border-gray-300 p-2 text-sm">

                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ old('category_id')  == $category->id ? 'selected' : ''}}>{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                @error('category')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4 w-full flex items-start flex-col">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
                    Slug
                </label>
                <input type="text" name="slug" id="slug" class="w-full rounded-lg border border-gray-300 p-2 text-sm"
                    placeholder="my-post-slug..." required value="{{ old('slug') }}">
                @error('slug')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4 w-full flex items-start flex-col">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="thumbnail">
                    Thumbnail
                </label>
                <input type="file" name="thumbnail" id="thumbnail" class="w-full rounded-lg border border-gray-300 p-2 text-sm"
                    required value="{{ old('thumbnail') }}">
                @error('thumb')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4 w-full flex items-start flex-col">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
                    Excerpt
                </label>
                <input type="text" name="excerpt" id="excerpt" class="w-full rounded-lg border border-gray-300 p-2 text-sm"
                    placeholder="Summarize your post in a short sentence..." required value="{{ old('excerpt') }}">
                @error('excerpt')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4 w-full flex items-start flex-col">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700 " for="body">
                    Body
                </label>
                <textarea name="body" class="w-full rounded-lg border border-gray-300 p-2 text-sm" rows="7"
                    placeholder="The post goes here..." required value="{{ old('body') }}"></textarea>
                @error('body')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full flex items-center justify-end">
                <input type="submit" value="Publish Post"
                    class="border border-gray-300 rounded-lg text-center bg-gradient-to-b from-gray-200 p-2 comment-submit"
                    name="submit">
            </div>
        </form>
    </section>
</x-layout>
