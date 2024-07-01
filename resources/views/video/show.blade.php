@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-4xl font-bold mb-4">{{ $singleVideo->title }}</h1>

        <div class="bg-white p-4 rounded-lg shadow-lg">
            @if ($singleVideo->file)
                @if ($singleVideo->file->mime_type == 'video/mp4')
                    <!-- Autoplay Video -->
                    <video class="w-full h-auto mb-4" controls autoplay muted loop>
                        <source src="{{ Storage::url($singleVideo->file_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @elseif ($singleVideo->file->mime_type == 'image/jpeg')
                    <!-- Video Image -->
                    <img src="{{ Storage::url($singleVideo->file_path) }}" class="w-full h-auto mb-4"
                        alt="{{ $singleVideo->title }}">
                @elseif ($singleVideo->file->mime_type == 'application/pdf')
                    <!-- PDF Icon for Video -->
                    <img src="/pdf.svg" class="w-12 h-12 mb-4" alt="PDF">
                @elseif (in_array($singleVideo->file->mime_type, [
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    ]))
                    <!-- Doc Icon for Video -->
                    <img src="/doc-icon.svg" class="w-12 h-12 mb-4" alt="Document">
                @elseif (in_array($singleVideo->file->mime_type, [
                        'application/vnd.ms-excel',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    ]))
                    <!-- Spreadsheet Icon for Video -->
                    <img src="/spreadsheet-icon.svg" class="w-12 h-12 mb-4" alt="Spreadsheet">
                @else
                    <!-- Default Video Icon -->
                    <img src="/default-Video-icon.svg" class="w-12 h-12 mb-4" alt="Video">
                @endif
            @endif

            <h2 class="text-2xl font-semibold mb-2">Description</h2>
            <p class="text-gray-700 mb-4">{{ $singleVideo->description }}</p>

            <div class="text-gray-500 mb-4">
                <p><strong>Published on:</strong> {{ $singleVideo->created_at->format('F j, Y') }}</p>
                <p><strong>Views:</strong> {{ $singleVideo->views }}</p>
                <p><strong>Likes:</strong> {{ $singleVideo->likes }}</p>
                @if ($singleVideo->file)
                    <p>
                        <strong>File Type:</strong> {{ $singleVideo->file->mime_type }}
                    </p>
                @endif
            </div>

            <div class="text-gray-500 mb-4">
                @if ($singleVideo->additional_metadata)
                    <h3 class="text-xl font-semibold mb-2">Additional Info</h3>
                    <p>{{ $singleVideo->additional_metadata }}</p>
                @endif
            </div>

            <div class="mt-4">
                <a href="{{ route('featured.index') }}" class="text-blue-500 hover:underline">Back to Featured Items</a>
            </div>
        </div>
    </div>
@endsection
