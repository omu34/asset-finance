@extends('layouts.app')

@section('content')
    <div class="bg-white dark:bg-gray-950 bg-center py-12 sm:py-16">
        <div class="mx-auto lg:px-0 px-10 max-w-7xl">

            <!-- Latest News Section -->
            <h2 class="text-2xl font-bold mt-10 mb-4">Latest News</h2>
            <livewire:content :posts="$latestNews" />
        </div>
    </div>
@endsection
