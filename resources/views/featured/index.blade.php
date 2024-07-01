{{--  @extends('layouts.app')
@section('content')
<div>
    <livewire:featured-items.index />
</div
@endsection  --}}




@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-4xl font-bold mb-4">Featured Items</h1>

    <div class="bg-white p-4 rounded-lg shadow-lg">
        @if ($featuredItems->isEmpty())
            <p>No featured items found.</p>
        @else
            <ul>
                @foreach ($featuredItems as $item)
                    <li>
                        <a href="{{ route('featured.show', $item->id) }}" class="text-blue-500 hover:underline">
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



