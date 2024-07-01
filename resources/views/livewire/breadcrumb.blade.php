<div class="bg-gray-50 border-b border-gray-300">
    <div class="mx-auto max-w-5xl">
        <nav class="flex md:justify-start justify-center py-5" aria-label="Breadcrumb">
            @foreach ($breadcrumbs as $breadcrumb)
                <ol role="list" class="flex items-center space-x-4 text-center">
                    <li data-aos="fade-left" data-aos-duration="1000">
                        <div>
                            <a href="{{ url('/') }}" class="ml-4 text-sm font-medium text-black hover:text-gray-700">
                                {{ $breadcrumb->breadcrumb1 }}
                            </a>

                        </div>

                    <li data-aos="fade-left" data-aos-duration="3000">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 flex-shrink-0 text-black" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                            <a href="{{ url('/') }}"
                                class="ml-4 text-sm font-medium text-black hover:text-gray-700">
                                {{ $breadcrumb->breadcrumb2 }}
                            </a>
                        </div>
                    </li>

                </ol>
            @endforeach
        </nav>
    </div>
</div>
