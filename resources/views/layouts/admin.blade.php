<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@stack('title')</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}">
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/css/style.css'])
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <link rel="stylesheet" href="{{asset('viewResources/admin/admin.css')}}">
    @stack('css')
</head>

<body class="font-sans antialiased">
    <div x-data="{
        menuOpen: false,
        basicSignInModal: false,
        basicSignUpModal: false,
        advanceSignInModal: false,
        advanceSignUpModal: false,
        }" class="flex min-h-screen custom-scrollbar">
        <!-- start::Black overlay -->
        <div :class="menuOpen ? 'block' : 'hidden'" @click="menuOpen = false"
            class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden">
        </div>
        <!-- end::Black overlay -->
        {{-- ASIDE --}}
        <aside x-cloak :class="menuOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
            class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 bg-secondary overflow-y-auto lg:translate-x-0 lg:inset-0 custom-scrollbar">
            <!-- start::Logo -->
            <div class="flex items-center justify-center bg-black bg-opacity-30 h-16">
                <h1 class="text-gray-100 text-lg font-bold uppercase tracking-widest">
                    Template
                </h1>
            </div>
            <!-- end::Logo -->
            <!-- start::User Panel -->
            <div class="flex items-center justify-center h-16 border-y border-gray-600">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="">
                    </div>
                    <div class="ml-3">
                        <a class="text-md font-mono font-bold text-gray-300 hover:text-white" href="#">
                            <p class="leading-none">
                                {{ Str::limit(Auth::user()->name.' huanaco',17,'..') }}
                            </p>
                        </a>
                        <p class="text-xs font-bold leading-none text-teal-700 mt-auto">
                            En linea
                        </p>
                    </div>
                </div>
            </div>
            <!-- end::UserPanel -->
            <!-- start::Navigation -->
            <x-admin-partials.menu />
            <!-- end::Navigation -->
        </aside>
        {{-- END ASIDE --}}
        <div class="lg:pl-64 w-full flex flex-col">
            {{-- TOP NAVBAR --}}
            <x-admin-partials.header />
            {{-- END TOP NAVBAR --}}
            <!-- start:Page content -->
            <div class="h-full bg-zinc-200 p-8">
                {{ $slot }}
            </div>
            <!-- end:Page content -->
            
        </div>
    </div>
    <div id="modalLoading" style="display: none;">
        <div>
            <div>
                <div>
                    <img src="{{asset('img/loader.svg')}}" width="70%">
                </div>
            </div>
        </div>
    </div>
    @stack('modals')
    @livewireScripts
    @vite(['resources/js/app.js'])
    <script src="{{asset('viewResources/admin/admin.js?x='.env('CACHE_LAST_UPDATE'))}}"></script>
    @stack('js')
</body>

</html>
