<div>
    <div class="grid grid-cols-2 gap-8 sm:grid-cols-3">
        @if (is_array($posts) && count($posts) > 0)
            @foreach ($posts as $index => $post)
                <img class="max-w-full shadow-xl h-auto object-cover cursor-pointer aspect-w-16 aspect-h-9 sm:aspect-w-4 sm:aspect-h-3 md:aspect-w-3 md:aspect-h-2 lg:aspect-w-4 lg:aspect-h-3 xl:aspect-w-3 xl:aspect-h-2 transform transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-2xl"
                    src="{{ $post }}" alt="" wire:click="selectPost({{ $index }})">
            @endforeach
        @else
            <p>No posts available.</p>
        @endif
    </div>

    @if ($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-black opacity-75"></div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg max-w-3xl mx-auto my-auto">
                @if (isset($posts[$selectedPostIndex]))
                    <img class="max-w-full object-cover rounded-t-lg" src="{{ $posts[$selectedPostIndex] }}"
                        alt="">
                @endif
                <div class="absolute top-1/2 -translate-y-1/2 left-0 mt-4 ml-4 flex">
                    <button wire:click="previousPost"
                        class="px-4 py-2 text-base font-medium text-white bg-gray-800 border border-transparent rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                </div>
                <div class="absolute top-1/2 -translate-y-1/2 right-0 mt-4 mr-4 flex">
                    <button wire:click="nextPost"
                        class="px-4 py-2 text-base font-medium text-white bg-gray-800 border border-transparent rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
                <button wire:click="closePopup"
                    class="absolute top-0 right-0 mt-4 mr-4 flex items-center justify-center w-12 h-12 bg-white text-black rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    @endif
</div>







