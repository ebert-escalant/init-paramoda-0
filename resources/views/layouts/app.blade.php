<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@stack('title')</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">     
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.min.css')}}">
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/css/style.css'])
        @stack('css')
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />
        <div class="min-h-screen bg-gray-100">
            <div class="bg-red-200">
                asdfasdsa
            </div>
            @livewire('navigation')
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @stack('modals')
        @livewireScripts
        @vite(['resources/js/app.js'])
        <script>
            function dropdown() {
                return {
                    open: false,
                    show() {
                        if (this.open) {
                            //se cierra menu
                            this.open = false;
                            document.getElementsByTagName('html')[0].style.overflow = "auto"
                        } else {
                            //se abre menu
                            this.open = true;
                            document.getElementsByTagName('html')[0].style.overflow = "hidden"
                        }
                    },
                    close() {
        
                        this.open = false;
                        document.getElementsByTagName('html')[0].style.overflow = "auto"
                    }
                }
        
            }
        </script>
        @stack('js')
    </body>
</html>
