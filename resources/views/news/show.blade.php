@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-4xl font-bold mb-4">{{ $singleNews->title }}</h1>

    <div class="bg-white p-4 rounded-lg shadow-lg">
        @if ($singleNews->file)
            @if ($singleNews->file->mime_type == 'video/mp4')
                <!-- Autoplay Video -->
                <video class="w-full h-auto mb-4" controls autoplay muted loop>
                    <source src="{{ Storage::url($singleNews->file_path) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @elseif ($singleNews->file->mime_type == 'image/jpeg')
                <!-- Video Image -->
                <img src="{{ Storage::url($singleNews->file_path) }}" class="w-full h-auto mb-4" alt="{{ $singleNews->title }}">
            @elseif ($singleNews->file->mime_type == 'application/pdf')
                <!-- PDF Icon for Video -->
                <img src="/pdf.svg" class="w-12 h-12 mb-4" alt="PDF">
            @elseif (in_array($singleNews->file->mime_type, ['application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']))
                <!-- Doc Icon for Video -->
                <img src="/doc-icon.svg" class="w-12 h-12 mb-4" alt="Document">
            @elseif (in_array($singleNews->file->mime_type, ['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']))
                <!-- Spreadsheet Icon for Video -->
                <img src="/spreadsheet-icon.svg" class="w-12 h-12 mb-4" alt="Spreadsheet">
            @else
                <!-- Default Video Icon -->
                <img src="/default-Video-icon.svg" class="w-12 h-12 mb-4" alt="Video">
            @endif
        @endif

        <h2 class="text-2xl font-semibold mb-2">Description</h2>
        <p class="text-gray-700 mb-4">{{ $singleNews->description }}</p>

        <div class="text-gray-500 mb-4">
            <p><strong>Published on:</strong> {{ $singleNews->created_at->format('F j, Y') }}</p>
            <p><strong>Views:</strong> {{ $singleNews->views }}</p>
            <p><strong>Likes:</strong> {{ $singleNews->likes }}</p>
            @if ($singleNews->file)
                <p><strong>File Type:</strong> {{ $singleNews->file->mime_type }}</p>
            @endif
        </div>

        <div class="text-gray-500 mb-4">
            @if($singleNews->additional_metadata)
                <h3 class="text-xl font-semibold mb-2">Additional Info</h3>
                <p>{{ $singleNews->additional_metadata }}</p>
            @endif
        </div>

        <div class="mt-4">
            <a href="{{ route('featured.index') }}" class="text-blue-500 hover:underline">Back to Featured Items</a>
        </div>
    </div>
</div>
@endsection


