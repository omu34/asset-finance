<div class="bg-gray-900">
    <header class="absolute inset-x-0 top-0 z-50">
        @livewire('header-navigation')
    </header>
    @foreach ($basic_banners as $banner)

        <div class="relative isolate overflow-hidden pt-14 lg:px-0 px-10">
            <!-- Background Image with Overlay -->
            <div class="absolute inset-0">
                <img src=" {{ Storage::url($banner->file_path) }}" srcset="" alt=""
                    class="h-full w-full object-cover">
                    {{--  <img src="{{ Storage::disk('public')->url($banner->image_path) }}" alt="{{ $banner->title }}" class="h-full w-full object-cover">  --}}

                <div class="absolute inset-0 bg-black opacity-60"></div>
            </div>

            <!-- Content Container -->
            <div class="relative mx-auto max-w-5xl py-16 sm:py-24 lg:pt-44">

                <h1 data-aos="fade-down" data-aos-duration="2000"
                    class="text-4xl my-6 font-bold text-white lg:py-0 py-5">
                    {{ $banner->banner_content }}
                </h1>
            </div>
        </div>
        @endforeach
</div>
