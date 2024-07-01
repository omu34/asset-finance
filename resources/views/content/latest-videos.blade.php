
@extends('layouts.app')

@section('content')
    <div class="bg-white dark:bg-gray-950 bg-center py-12 sm:py-16">
        <div class="mx-auto lg:px-0 px-10 max-w-7xl">
            <!-- Latest Videos Section -->
            <h2 class="text-2xl font-bold mb-4">Latest Videos</h2>
            <livewire:content :posts="$latestVideos" />
        </div>
    </div>
@endsection
