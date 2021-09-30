<x-dropdown>
    <x-slot name="trigger">
        <button
            class="py-2 pl-3 pr-9 lg:w-40 w-full text-left font-semibold lg:inline-flex text-sm">{{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
            <x-icon class="absolute pointer-events-none" style="right: 12px; top:9px;" name="down-arrow"/>
        </button>
    </x-slot>
    <x-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page')) }}" :active="request()->routeIs('home')">View
        All</x-dropdown-item>
    @foreach ($categories as $category)
    <x-dropdown-item href="/?category={{ $category->slug }}{{ http_build_query(request()->except('category', 'page')) }}" :active="request()->is('categories/{$category->slug}')">{{ucwords($category->name)}}</x-dropdown-item>
    @endforeach
</x-dropdown>
