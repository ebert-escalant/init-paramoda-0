@php
    $navs = [
        [
            'name' => 'Inicio',
            'route' => 'home',
            'active' => request()->routeIs('generic.index'),
        ],
        [
            'name'=>'Sobre Nosotros',
            'route' => 'about',
            'active' => request()->routeIs('about'),
        ],
        [
            'name'=>'Servicios',
            'route' => 'contact',
            'active' => request()->routeIs('contact'),
        ],
    ];
@endphp
<header class="bg-indigo-500 border-b border-gray-500 shadow-xl sticky top-0" style="z-index: 900;" x-data="dropdown()">
    <div class="container flex items-center h-16 justify-between md:justify-start">
        <a :class="{'text-blue-500 bg-opacity-100': open}"
            class="flex flex-col items-center justify-center order-last md:order-first px-6 md:px-4 bg-white bg-opacity-25 text-white cursor-pointer font-semibold h-full"
            x-on:click="show()">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="text-sm hidden md:block">Categorias</span>
        </a>
        <a href="/" class="mx-6">
            <x-jet-application-mark class="block h-9 w-auto" />
        </a>
        <ul class="hidden md:flex flex-1 items-center justify-end space-x-8">
            @foreach ($navs as $nav)
                <li class="px-1 pt-1 border-b-4 border-transparent text-sm font-bold leading-5 text-black hover:border-white focus:outline-none {{$nav['active'] ? '':'focus:'}}border-white transition">
                    <a href="{{$nav['route']}}" class="inline-flex items-center uppercase">
                        {{$nav['name']}}
                    </a>
                </li>  
            @endforeach
            <!-- Settings Dropdown -->
            <li class="mx-6 relative hidden md:block">
                @auth
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{-- {{ route('admin.index') }} --}}">
                                Panel de control
                            </x-jet-dropdown-link>

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                @else
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <i class="fas fa-duotone fa-circle-user text-3xl text-white cursor-pointer" ></i>
                        </x-slot>

                        <x-slot name="content">
                            <x-jet-dropdown-link href="{{ route('login') }}">
                                {{ __('Login') }}
                            </x-jet-dropdown-link>

                            <div class="border-t border-gray-100"></div>

                            <x-jet-dropdown-link href="{{ route('register') }}">
                                {{ __('Register') }}
                            </x-jet-dropdown-link>
                        </x-slot>
                    </x-jet-dropdown>
                @endauth
            </li>
        </ul>
    </div>
    <nav class="bg-blue-900 bg-opacity-25 navigation-menu w-full absolute hidden"
        :class="{'hidden': !open, 'block': open}"
        x-show="open">
        {{-- menu computer --}}
        <div class="container h-full hidden md:block">
            <div class="grid grid-cols-4 h-full relative" x-on:click.away="close()">
                <ul class="bg-white"> 
                    @foreach ($categories as $category)
                        <li class="navigation-link text-gray-500 hover:bg-indigo-300 hover:text-white">
                            <a href="" class="py-2 px-4 text-sm flex items-center">
                                <span class="flex justify-center w-9">
                                    {!! $category->icon !!}
                                </span>
                                {{ $category->name }}
                            </a>
                            <div class="navigation-submenu bg-sky-100 absolute w-3/4 h-full top-0 right-0 hidden px-60 pt-9">
                                <img class="h-64 w-full object-cover object-center" src="{{ Storage::url($category->image) }}" alt="">
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="col-span-3 bg-sky-100 px-60 pt-9">
                    <img class="h-64 w-full object-cover object-center" src="{{ Storage::url($categories->first()->image) }}" alt="">
                </div>
            </div>
        </div>
        {{-- menu mobile --}}
        <div class="bg-white h-full overflow-y-auto">
            <ul>
                <li class="text-trueGray-500 hover:bg-indigo-300 hover:text-white">
                    <a href="#" class="py-2 px-4 text-sm flex items-center">
                        <span class="flex justify-center w-9"></span>
                        Inicio
                    </a>
                </li>
                <li class="text-trueGray-500 hover:bg-indigo-300 hover:text-white">
                    <a href="#" class="py-2 px-4 text-sm flex items-center">
                        <span class="flex justify-center w-9"></span>
                        Sobre nosotros
                    </a>
                </li>
                <li class="text-trueGray-500 hover:bg-indigo-300 hover:text-white">
                    <a href="#" class="py-2 px-4 text-sm flex items-center">
                        <span class="flex justify-center w-9"></span>
                        Servicios
                    </a>
                </li>
                <li class="text-trueGray-500 hover:bg-indigo-300 hover:text-white">
                    <a href="#" class="py-2 px-4 text-sm flex items-center">
                        <span class="flex justify-center w-9"></span>
                        Contactanos
                    </a>
                </li>
            </ul>
            <p class="text-trueGray-500 font-bold font-serif px-6 my-2">Productos</p>
            <ul>
                @foreach ($categories as $category)
                    <li class="text-trueGray-500 hover:bg-indigo-300 hover:text-white">
                        <a href="#" class="py-2 px-4 text-sm flex items-center">
                            <span class="flex justify-center w-9">{!!$category->icon!!}</span>
                            {{$category->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
            <p class="text-trueGray-500 font-bold font-serif px-6 my-2">USUARIO</p>
            @auth
                <a href="{{ route('profile.show') }}" class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-indigo-300 hover:text-white">
                    <span class="flex justify-center w-9"><i class="fas fa-address-card"></i></span>
                    Perfil
                </a>
                <a href="" class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-indigo-300 hover:text-white">
                    <span class="flex justify-center w-9"><i class="fas fa-address-card"></i></span>
                    Mis pedidos
                </a>
                <a href="{{-- {{ route('admin.index') }} --}}" class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-indigo-300 hover:text-white">
                    <span class="flex justify-center w-9"><i class="fas fa-address-card"></i></span>
                    Panel de administración
                </a>
                <a href="" onclick="event.preventDefault(); document.getElementById('logout_form').submit();"
                    class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-indigo-300 hover:text-white ">
                    <span class="flex justify-center w-9"><i class="fas fa-sign-out-alt"></i></span>
                    Cerrar Sesión
                </a>
                <form id="logout_form" method="POST" action="{{ route('logout') }}" class="hidden">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}" class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-indigo-300 hover:text-white">
                    <span class="flex justify-center w-9"><i class="fa-solid fa-arrow-right-to-bracket"></i></span>
                    Iniciar Sesión
                </a>
                <a href="{{ route('register') }}" 
                    class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-indigo-300 hover:text-white ">
                    <span class="flex justify-center w-9"><i class="fas fa-fingerprint"></i></span>
                    Registrarse
                </a>
            @endauth
        </div>
    </nav>
</header>
