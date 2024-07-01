@extends('layouts.app')

@section('content')

    <div class="container mx-auto p-4">
        <h1 class="text-4xl font-bold mb-4">{{ $featuredItems->title }}</h1>

        <div class="bg-white p-4 rounded-lg shadow-lg">

            @if ($featuredItems->mime_type)
                @php
                    $mimeType = Storage::disk('public')->mimeType($featuredItems->file_path);
                @endphp
                @if (mime_type == 'video/mp4')
                    <!-- Autoplay Video -->
                    <video class="w-full h-auto mb-4" controls autoplay muted loop>
                        <source src="{{ Storage::url($featuredItems->file_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @elseif ($mime_type == 'image/jpg')
                    <!-- Gallery Image -->
                    <img src="{{ Storage::url($featuredItems->file_path) }}" class="w-full h-auto mb-4"
                        alt="{{ $featuredItem->title }}">
                @elseif ($mime_type == 'application/pdf')
                    <!-- PDF Icon for News -->
                    <img src="/pdf.svg" class="w-12 h-12 mb-4" alt="PDF">
                @elseif (in_array($mime_type, [
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    ]))
                    <!-- Doc Icon for News -->
                    <img src="/doc-icon.svg" class="w-12 h-12 mb-4" alt="Document">
                @elseif (in_array($mime_type, [
                        'application/vnd.ms-excel',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    ]))
                    <!-- Spreadsheet Icon for News -->
                    <img src="/spreadsheet-icon.svg" class="w-12 h-12 mb-4" alt="Spreadsheet">
                @else
                    <!-- Default News Icon -->
                    <img src="/default-news-icon.svg" class="w-12 h-12 mb-4" alt="News">
                @endif
            @endif

            <h2 class="text-2xl font-semibold mb-2">Description</h2>
            <p class="text-gray-700 mb-4">{{ $featuredItems->description }}</p>

            <div class="text-gray-500 mb-4">
                <p><strong>Published on:</strong> {{ $featuredItems->created_at->format('F j, Y') }}</p>
                <p><strong>Views:</strong> {{ $featuredItems->views }}</p>
                <p><strong>Likes:</strong> {{ $featuredItems->likes }}</p>
                @if ($featuredItems->file)
                    <p><strong>File Type:</strong> {{ $featuredItems->mime_type }}</p>
                @endif
            </div>

            <div class="text-gray-500 mb-4">
                @if ($featuredItems->additional_metadata)
                    <h3 class="text-xl font-semibold mb-2">Additional Info</h3>
                    <p>{{ $featuredItems->additional_metadata }}</p>
                @endif
            </div>

            <div class="mt-4">
                {{--  <a href="{{ route('featured.index') }}" class="text-blue-500 hover:underline">Back to Featured Items</a>  --}}
            </div>
        </div>
    </div>
@endsection



{{--  @php
    $mimeType = Storage::disk('public')->mimeType($featuredItems->file_path);
@endphp

@if ($mimeType == 'video/mp4')
    <!-- Video-specific content -->
@endif  --}}
