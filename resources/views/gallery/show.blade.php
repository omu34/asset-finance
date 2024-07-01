@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-4xl font-bold mb-4">{{ $singleGallery->title }}</h1>

    <div class="bg-white p-4 rounded-lg shadow-lg">
        @if ($singleGallery->file)
            @if ($singleGallery->file->mime_type == 'video/mp4')
                <!-- Autoplay Video -->
                <video class="w-full h-auto mb-4" controls autoplay muted loop>
                    <source src="{{ Storage::url($singleGallery->file_path) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @elseif ($singleGallery->file->mime_type == 'image/jpeg')
                <!-- Gallery Image -->
                <img src="{{ Storage::url($singleGallery->file_path) }}" class="w-full h-auto mb-4" alt="{{ $singleGallery->title }}">
            @elseif ($singleGallery->file->mime_type == 'application/pdf')
                <!-- PDF Icon for News -->
                <img src="/pdf.svg" class="w-12 h-12 mb-4" alt="PDF">
            @elseif (in_array($singleGallery->file->mime_type, ['application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']))
                <!-- Doc Icon for News -->
                <img src="/doc-icon.svg" class="w-12 h-12 mb-4" alt="Document">
            @elseif (in_array($singleGallery->file->mime_type, ['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']))
                <!-- Spreadsheet Icon for News -->
                <img src="/spreadsheet-icon.svg" class="w-12 h-12 mb-4" alt="Spreadsheet">
            @else
                <!-- Default News Icon -->
                <img src="/default-news-icon.svg" class="w-12 h-12 mb-4" alt="News">
            @endif
        @endif

        <h2 class="text-2xl font-semibold mb-2">Description</h2>
        <p class="text-gray-700 mb-4">{{ $singleGallery->description }}</p>

        <div class="text-gray-500 mb-4">
            <p><strong>Published on:</strong> {{ $singleGallery->created_at->format('F j, Y') }}</p>
            <p><strong>Views:</strong> {{ $singleGallery->views }}</p>
            <p><strong>Likes:</strong> {{ $singleGallery->likes }}</p>
            @if ($singleGallery->file)
                <p><strong>File Type:</strong> {{ $singleGallery->file->mime_type }}</p>
            @endif
        </div>

        <div class="text-gray-500 mb-4">
            @if($singleGallery->additional_metadata)
                <h3 class="text-xl font-semibold mb-2">Additional Info</h3>
                <p>{{ $singleGallery->additional_metadata }}</p>
            @endif
        </div>

        <div class="mt-4">
            <a href="{{ route('featured.index') }}" class="text-blue-500 hover:underline">Back to Featured Items</a>
        </div>
    </div>
</div>
@endsection
