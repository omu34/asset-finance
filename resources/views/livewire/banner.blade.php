{{--  <div class="bg-gray-900">
    <header class="absolute inset-x-0 top-0 z-40">
        @livewire('header-navigation')
    </header>
    <div class="relative isolate overflow-hidden pt-14 lg:px-0 px-10">
        @php
            $banners = App\Models\Banner::orderBy('created_at', 'asc')->get();
        @endphp
        @foreach ($banners as $banner)
            <!-- Background Image with Overlay -->

            <div class="absolute inset-0">
                <img src="{{ asset('storage/' . $banner->image_path) }}"
                    srcset="" alt=""
                    class="h-full w-full object-cover">
                <div class="absolute inset-0 bg-black opacity-80"></div>
            </div>

            <!-- Content Container -->
            <div class="relative mx-auto max-w-5xl py-16 sm:py-24 lg:pt-44">
                <!-- Newsroom Heading -->
                <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-white">
                    <div class="-ml-4 flex items-center gap-x-2">
                        <svg viewBox="0 0 2 2" class="-ml-0.5 h-0.5 w-0.5 flex-none fill-white">
                            <circle cx="1" cy="1" r="1" />
                        </svg>
                        <div
                            class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-gray-300">
                        </div>
                    </div>
                </div>

                <h1 data-aos="fade-left" data-aos-duration="1500"
                    class="text-4xl my-6 font-bold text-white lg:py-0 py-5">
                    {{ $banner->banner_content }}
                </h1>
                <div class="flex items-center justify-start gap-x-12 mt-6"> </div>
            </div>
    </div>
    @endforeach
</div>  --}}


<div class="bg-gray-900">
    <header class="absolute inset-x-0 top-0 z-40">
        @livewire('header-navigation')
    </header>
    <div class="relative isolate overflow-hidden pt-14 lg:px-0 px-10">
        @php
            $banners = App\Models\Banner::orderBy('created_at', 'asc')->get();
        @endphp
        @foreach ($banners as $banner)
            <!-- Background Image with Overlay -->
            <div class="absolute inset-0">
                <img src="{{ Storage::url($banner->image_path) }}"  alt="" class="h-full w-full object-cover">
                <div class="absolute inset-0 bg-black opacity-80"></div>
            </div>

            <!-- Content Container -->
            <div class="relative mx-auto max-w-5xl py-16 sm:py-24 lg:pt-44">
                <!-- Newsroom Heading -->
                <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-white">
                    <div class="-ml-4 flex items-center gap-x-2">
                        <svg viewBox="0 0 2 2" class="-ml-0.5 h-0.5 w-0.5 flex-none fill-white">
                            <circle cx="1" cy="1" r="1" />
                        </svg>
                        <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-gray-300">
                            <!-- Content goes here if needed -->
                        </div>
                    </div>
                </div>

                <h1 data-aos="fade-left" data-aos-duration="1500" class="text-4xl my-6 font-bold text-white lg:py-0 py-5">
                    {{ $banner->banner_content }}
                </h1>
                <div class="flex items-center justify-start gap-x-12 mt-6">
                    <!-- Additional content can go here if needed -->
                </div>
            </div>
        @endforeach
    </div>
</div>
