<div x-data="{ isOpen: false, isSearchOpen: false }">
    @foreach ($headerNavigations as $header)
        <nav class="flex lg:hidden mx-auto max-w-5xl items-center bg-white px-6 py-2 justify-between "
            aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="/" class="-m-1.5 p-1.5">
                    <span class="sr-only">
                        {{ $header->title19 }}
                    </span>
                    <img class="h-16 w-auto" src="

                    {{ asset('storage/' . $header->image) }}"
                        alt="">
                </a>
            </div>
            <div class="flex lg:hidden gap-x-4">
                <button @click="isSearchOpen = !isSearchOpen"
                    class="flex items-center justify-center w-10 h-10 bg-[#163466] rounded-full hover:bg-gray-300 focus:outline-none focus:ring-6 focus:ring-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-[#F9CC0B]">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>

                <button @click="isOpen = !isOpen" type="button"
                    class="-m-6.5 inline-flex items-center justify-center rounded-md p-6.5 text-gray-400">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>

            </div>

            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <button
                    class="flex items-center justify-center w-10 h-10 bg-[#163466] rounded-full hover:bg-gray-300 focus:outline-none focus:ring-6 focus:ring-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-[#F9CC0B]">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>
            </div>
        </nav>

        <nav class="lg:flex hidden mx-auto max-w-5xl items-center rounded-md justify-between mt-12" aria-label="Global">
            <!-- loop category items -->
            <div class="flex gap-x-12 ml-auto">

                @foreach ($mainnavbars = \App\Models\MainNavbar::limit(4)->orderBy('created_at', 'desc')->get() as $index => $mainnavbar)
                    @if ($mainnavbar->link)
                        <a href="{{ $mainnavbar->link }}" target='_blank'
                            class="text-base dark:text-white hover:underline hover:underline-offset-4 font-normal text-white ">
                            {{ $mainnavbar->name }}
                        </a>
                    @endif
                @endforeach


                <div class="flex items-center w-6 h-6 rounded-full relative" x-data="{ showAccessibility: false }" x-ref="access"
                    @mouseenter="showAccessibility = true" @mouseleave="showAccessibility = false"
                    x-init="$watch('showAccessibility', value => { if (value) { $dispatch('close-other-popups', $refs.access) } })">
                    <svg class="w-6 h-6 stroke-current dark:text-slate-100 text-slate-200 cursor-pointer"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                        <path
                            d="M10 4.5V18c0 1.08-.44 2.07-1.14 2.79l-.04.04c-.09.09-.19.18-.28.25-.3.26-.64.46-.99.6-.11.05-.22.09-.33.13-.39.13-.81.19-1.22.19-.27 0-.54-.03-.8-.08-.13-.03-.26-.06-.39-.1-.16-.05-.31-.1-.46-.17 0-.01 0-.01-.01 0-.28-.14-.55-.3-.8-.49l-.01-.01c-.13-.1-.25-.2-.36-.32-.11-.12-.22-.24-.33-.37-.19-.25-.35-.52-.49-.8.01-.01.01-.01 0-.01 0 0 0-.01-.01-.02-.06-.14-.11-.29-.16-.44a5.58 5.58 0 0 1-.1-.39c-.05-.26-.08-.53-.08-.8V4.5C2 3 3 2 4.5 2h3C9 2 10 3 10 4.5Z"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M22 16.5v3c0 1.5-1 2.5-2.5 2.5H6c.41 0 .83-.06 1.22-.19.11-.04.22-.08.33-.13.35-.14.69-.34.99-.6.09-.07.19-.16.28-.25l.04-.04 6.8-6.79h3.84c1.5 0 2.5 1 2.5 2.5ZM4.81 21.82c-.6-.18-1.17-.51-1.64-.99-.48-.47-.81-1.04-.99-1.64a4.02 4.02 0 0 0 2.63 2.63Z"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M18.37 11.29 15.66 14l-6.8 6.79C9.56 20.07 10 19.08 10 18V8.34l2.71-2.71c1.06-1.06 2.48-1.06 3.54 0l2.12 2.12c1.06 1.06 1.06 2.48 0 3.54ZM6 19a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div x-transition:enter="transition ease-in duration-200"
                        x-transition:enter-start="opacity-0 -translate-x-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-x-1"
                        x-description="Flyout menu, show/hide based on flyout menu state" x-ref="panelAccess"
                        x-show="showAccessibility" aria-labelledby="modal-menuAccess" role="dialog" aria-modal="true"
                        x-cloak
                        class="absolute right-0 top-full z-30 w-screen max-w-52 overflow-hidden rounded-xl bg-white dark:bg-slate-900 shadow-lg">
                        <div class="p-4 flex flex-col gap-y-3 text-sm font-sans">
                            <div class="flex justify-between items-center">
                                <div class="flex 1 dark:text-slate-200">
                                    {{ $header->title8 }}
                                </div>
                                <div class="w-11 h-6 flex-shrink-0">
                                    <x-theme-toggle />
                                </div>
                            </div>

                            <div class="flex justify-between items-center cursor-pointer" @click="zoomLevel += 10">
                                <div class="flex 1 dark:text-slate-200">
                                    {{ $header->title9 }}
                                </div>
                                <div class="w-7 h-7 flex-shrink-0">
                                    <svg class="w-7 h-7 stroke-current dark:text-slate-100 text-slate-500 cursor-pointer"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="none">
                                        <path
                                            d="M8 12h8M12 16V8M9 22h6c5 0 7-2 7-7V9c0-5-2-7-7-7H9C4 2 2 4 2 9v6c0 5 2 7 7 7Z"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>

                            <div class="flex justify-between items-center cursor-pointer" @click="zoomLevel -= 10">
                                <div class="flex 1 dark:text-slate-200">
                                    {{ $header->title10 }}
                                </div>
                                <div class="w-7 h-7 flex-shrink-0">
                                    <svg class="w-7 h-7 stroke-current dark:text-slate-100 text-slate-500 cursor-pointer"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="none">
                                        <path d="M8 12h8M9 22h6c5 0 7-2 7-7V9c0-5-2-7-7-7H9C4 2 2 4 2 9v6c0 5 2 7 7 7Z"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>

                            <div class="flex justify-between items-center">
                                <label class="flex 1 dark:text-slate-200 cursor-pointer" for="toggleGrayscale">
                                    <p x-text="siteGrayscale ? 'Grayscale: On' : 'Grayscale: Off'"></p>
                                </label>
                                <div class="w-7 h-7 flex items-center flex-shrink-0 text-right justify-center">
                                    <input class="rounded text-primary cursor-pointer w-5 h-5" type="checkbox"
                                        id="toggleGrayscale" x-model="siteGrayscale">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>



            </div>
        </nav>

        <nav class="lg:flex hidden mx-auto max-w-5xl items-center bg-white px-6 py-2 rounded-md justify-between mt-6"
            aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">
                        {{ $header->title19 }}
                        Your Company
                    </span>
                    <img class="h-16 w-auto"
                        src="{{ asset('storage/' . $header->image) }}
                    {{--  /logo.svg  --}}
                    "
                        alt="">
                </a>
            </div>
            <div class="flex lg:hidden">
                <button @click="isOpen = !isOpen" type="button"
                    class="-m-6.5 inline-flex items-center justify-center rounded-md p-6.5 text-gray-400">
                    <span class="sr-only">{{ $header->title12 }}
                    </span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">

                @foreach ($topnavbars = \App\Models\TopNavbar::limit(4)->orderBy('created_at', 'desc')->get() as $index => $topnavbar)
                    @if ($topnavbar->link)
                        <a href="{{ $topnavbar->link }}" target='_blank'
                            class="flex text-base items-center text-gray-800 font-bold hover:text-gray-900 py-2 px-3">
                            {{ $topnavbar->name }}
                        </a>
                    @endif
                @endforeach
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <button @click="isSearchOpen = !isSearchOpen"
                    class="flex items-center justify-center w-10 h-10 bg-[#163466] rounded-full hover:bg-gray-900 focus:outline-none focus:ring-6 focus:ring-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-[#F9CC0B]">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>

            </div>
        </nav>


        <div x-cloak @keydown.escape.window="isSearchOpen = false" x-show="isSearchOpen"
            @click.away="isSearchOpen = false" class="relative z-10" role="dialog" aria-modal="true">
            <!--
      Background backdrop, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
            <div class="fixed inset-0 z-10 bg-black bg-opacity-80 transition-opacity"></div>

            <div class="fixed inset-0 z-50 overflow-y-auto p-4 sm:p-6 md:p-20">
                <!--
        Command palette, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0 scale-95"
          To: "opacity-100 scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 scale-100"
          To: "opacity-0 scale-95"
      -->
                <div
                    class="mx-auto max-w-2xl transform divide-y divide-gray-500 divide-opacity-10 overflow-hidden rounded-xl bg-white shadow-2xl ring-1 ring-black ring-opacity-5 backdrop-blur backdrop-filter transition-all">
                    <div class="relative">
                        <svg class="pointer-events-none absolute left-4 top-3.5 h-5 w-5 text-gray-900 text-opacity-40"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                clip-rule="evenodd" />
                        </svg>
                        <input type="text"
                            class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-gray-900 focus:ring-0 sm:text-sm"
                            placeholder="Search...">
                    </div>

                    <!-- Default state, show/hide based on command palette state. -->
                    <ul class="max-h-80 scroll-py-2 divide-y divide-gray-500 divide-opacity-10 overflow-y-auto">
                        <li class="p-2">
                            <h2 class="mb-2 mt-4 px-3 text-xs font-semibold text-gray-900">Search Results</h2>
                            <ul class="text-sm text-gray-700">
                                <!-- Active: "bg-gray-900 bg-opacity-5 text-gray-900" -->
                                <li class="group flex cursor-default select-none items-center rounded-md px-3 py-2">
                                    <!-- Not Active: "text-opacity-40" -->
                                    <svg class="h-6 w-6 flex-none text-gray-900 text-opacity-40" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                    <span class="ml-3 flex-auto truncate">Workflow Inc. / Website Redesign</span>
                                    <!-- Not Active: "hidden" -->
                                    <span class="ml-3 hidden flex-none text-gray-500">Jump to...</span>
                                </li>
                            </ul>
                        </li>

                    </ul>

                    <!-- Results, show/hide based on command palette state. -->
                    <ul class="max-h-96 overflow-y-auto p-2 text-sm text-gray-700">
                        <!-- Active: "bg-gray-900 bg-opacity-5 text-gray-900" -->
                        <li class="group flex cursor-default select-none items-center rounded-md px-3 py-2">
                            <!-- Not Active: "text-opacity-40" -->
                            <svg class="h-6 w-6 flex-none text-gray-900 text-opacity-40" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                            </svg>
                            <span class="ml-3 flex-auto truncate">Workflow Inc. / Website Redesign</span>
                            <!-- Not Active: "hidden" -->
                            <span class="ml-3 hidden flex-none text-gray-500">Jump to...</span>
                        </li>
                    </ul>

                    <!-- Empty state, show/hide based on command palette state. -->
                    <div class="px-6 py-14 text-center sm:px-14">
                        <svg class="mx-auto h-6 w-6 text-gray-900 text-opacity-40" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                        </svg>
                        <p class="mt-4 text-sm text-gray-900">We couldnt find any news with that term. Please try
                            again.
                        </p>

                        <svg @click="isSearchOpen = !isSearchOpen"
                            class="mx-auto h-6 w-6 mt-4 text-gray-900 text-opacity-40"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                    </div>
                </div>
            </div>
        </div>



        <!-- Mobile menu, show/hide based on menu open state. -->
        <div x-cloak x-show="isOpen" class="lg:hidden" role="dialog" aria-modal="true">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-50"></div>
            <div
                class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-gray-900 px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-white/10">
                <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                            alt="">
                    </a>
                    <button @click="isOpen = !isOpen" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-400">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/25">
                        <div class="space-y-2 py-6">
                            @foreach ($topnavbars = \App\Models\TopNavbar::limit(4)->orderBy('created_at', 'desc')->get() as $index => $topnavbar)
                                @if ($topnavbar->link)
                                    <a href="{{ $topnavbar->link }}" target='_blank'
                                        class="flex text-base items-center text-gray-800 font-bold hover:text-gray-900 py-2 px-3">
                                        {{ $topnavbar->name }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        <div class="py-6">
                            <a href="#"
                                class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-white hover:bg-gray-800">Log
                                in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
