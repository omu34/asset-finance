<div class="py-6">
    <div class="mx-auto max-w-lg px-4">
        <div class="flex items-center border border-blue-100 rounded-lg overflow-hidden">
            <div class="flex items-center px-3 py-2">
                <svg class="h-6 w-6 text-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35m1.8-5.15a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                </svg>
            </div>

            @if ($allResults->isEmpty())
                <p>No results found.</p>
            @else
                <ul>
                    @foreach ($allResults as $result)
                        <li>
                            <a href="#">{{ $result->title ?? ($result->name ?? 'No Title') }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
            <input type="text" class="w-full text-lg py-2 px-1 text-gray-700 focus:outline-none"
                placeholder="Search">
        </div>
    </div>
</div>
