
@extends('layouts.app')
@section('content')
<div class="py-6">
    <div class="mx-auto max-w-lg px-4">
        <!-- Search Form -->
        <form method="GET" action="{{ route('search.search') }}">
            <div class="flex items-center border border-blue-100 rounded-lg overflow-hidden">
                <a href="{{ route('search.search') }}" target="_blank" rel="noopener noreferrer">
                <div class="flex items-center px-3 py-2">
                    <svg class="h-6 w-6 text-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35m1.8-5.15a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                    </svg>
                </div>
                </a>
                <input type="text" name="query" class="w-full text-lg py-2 px-1 text-gray-700 focus:outline-none"
                    placeholder="Search" value="{{ request('query') }}">
            </div>
        </form>

        <!-- Search Results -->
        @if (isset($allResults) && $allResults->isNotEmpty())
            <ul class="mt-4">
                @foreach ($allResults as $result)
                    <li class="py-2 border-b">
                        <a href="#"
                            class="text-blue-600">{{ $result->title ?? ($result->name ?? 'No Title') }}</a>
                    </li>
                @endforeach
            </ul>
        @elseif (isset($allResults))
            <p class="mt-4 text-gray-500">No results found.</p>
        @endif
    </div>
</div>
@endsection
