@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-4xl font-bold mb-4">News Items</h1>

    <div class="bg-white p-4 rounded-lg shadow-lg">
        @if ($newsItems->isEmpty())
            <p>No video items found.</p>
        @else
            <ul>
                @foreach ($newsItems as $item)
                    <li>
                        <a href="{{ route('news.show', $item->id) }}" class="text-blue-500 hover:underline">
                            {{ $item->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="mt-4">
        <a href="{{ route('/') }}" class="text-blue-500 hover:underline">Back to Home</a>
    </div>
</div>
@endsection
