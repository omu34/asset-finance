{{--  @extends('layouts.app')

@section('content')
    <div class="bg-white dark:bg-gray-950 bg-center py-12 sm:py-16">
        <div class="mx-auto lg:px-0 px-10 max-w-7xl">
            <!-- Latest Videos Section -->
            <h2 class="text-2xl font-bold mb-4">Latest Videos</h2>
            <div class="mx-auto grid max-w-2xl auto-rows-fr grid-cols-2 gap-8 sm:mt-4 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach($latestVideos as $index => $post)
                    <img class="max-w-full shadow-xl h-auto object-cover rounded-0 cursor-pointer aspect-w-16 aspect-h-9 sm:aspect-w-4 sm:aspect-h-3 md:aspect-w-3 md:aspect-h-2 lg:aspect-w-4 lg:aspect-h-3 xl:aspect-w-3 xl:aspect-h-2 transform transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-2xl" src="{{ $post }}" alt="" wire:click="selectPost({{ $index }})">
                @endforeach
            </div>

            <!-- Latest Gallery Section -->
            <h2 class="text-2xl font-bold mt-10 mb-4">Latest Gallery</h2>
            <div class="mx-auto grid max-w-2xl auto-rows-fr grid-cols-2 gap-8 sm:mt-4 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach($latestGallery as $index => $post)
                    <img class="max-w-full shadow-xl h-auto object-cover rounded-0 cursor-pointer aspect-w-16 aspect-h-9 sm:aspect-w-4 sm:aspect-h-3 md:aspect-w-3 md:aspect-h-2 lg:aspect-w-4 lg:aspect-h-3 xl:aspect-w-3 xl:aspect-h-2 transform transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-2xl" src="{{ $post }}" alt="" wire:click="selectPost({{ $index }})">
                @endforeach
            </div>

            <!-- Latest News Section -->
            <h2 class="text-2xl font-bold mt-10 mb-4">Latest News</h2>
            <div class="mx-auto grid max-w-2xl auto-rows-fr grid-cols-2 gap-8 sm:mt-4 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach($latestNews as $index => $post)
                    <img class="max-w-full shadow-xl h-auto object-cover rounded-0 cursor-pointer aspect-w-16 aspect-h-9 sm:aspect-w-4 sm:aspect-h-3 md:aspect-w-3 md:aspect-h-2 lg:aspect-w-4 lg:aspect-h-3 xl:aspect-w-3 xl:aspect-h-2 transform transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-2xl" src="{{ $post }}" alt="" wire:click="selectPost({{ $index }})">
                @endforeach
            </div>
        </div>

        <!-- Popup Modal -->
        @if($showModal)
            <div x-data="{ showModal: @entangle('showModal') }" x-show="showModal" class="fixed z-50 inset-0 overflow-y-auto flex items-center justify-center">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true" x-show="showModal"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-black opacity-90"></div>
                </div>
                <div class="relative z-20 bg-white dark:bg-gray-800 rounded-lg max-w-3xl"
                    x-show="showModal"
                    x-transition:enter="transform transition ease-in-out duration-300"
                    x-transition:enter-start="scale-90 opacity-0"
                    x-transition:enter-end="scale-100 opacity-100"
                    x-transition:leave="transform transition ease-in-out duration-300"
                    x-transition:leave-start="scale-100 opacity-100"
                    x-transition:leave-end="scale-90 opacity-0">
                    <img class="max-w-full object-cover rounded-t-lg" src="{{ $posts[$selectedPostIndex] }}" alt="">
                    <!-- Navigation Buttons -->
                    <div class="absolute top-1/2 -translate-y-1/2 left-0 mt-4 ml-4 flex">
                        <button wire:click="previousPost" class="px-4 py-2 text-base font-medium text-white bg-gray-800 border border-transparent rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>
                    </div>
                    <div class="absolute top-1/2 -translate-y-1/2 right-0 mt-4 mr-4 flex">
                        <button wire:click="nextPost" class="px-4 py-2 text-base font-medium text-white bg-gray-800 border border-transparent rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                    <!-- Close Button -->
                    <button wire:click="closePopup" class="absolute top-0 right-0 mt-4 mr-4 flex items-center justify-center w-12 h-12 bg-white text-black rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        @endif
    </div>
@endsection  --}}




@extends('layouts.app')

@section('content')
    <div class="bg-white dark:bg-gray-950 bg-center py-12 sm:py-16">
        <div class="mx-auto lg:px-0 px-10 max-w-7xl">
            <!-- Latest Videos Section -->
            <h2 class="text-2xl font-bold mb-4">Latest Videos</h2>
            <livewire:content-gallery :posts="$latestVideos" />

            <!-- Latest Gallery Section -->
            <h2 class="text-2xl font-bold mt-10 mb-4">Latest Gallery</h2>
            <livewire:content-gallery :posts="$latestGallery" />

            <!-- Latest News Section -->
            <h2 class="text-2xl font-bold mt-10 mb-4">Latest News</h2>
            <livewire:content-gallery :posts="$latestNews" />
        </div>
    </div>
@endsection


