<x-app-layout>
    @push('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/css/glide.core.min.css"
            integrity="sha512-tYKqO78H3mRRCHa75fms1gBvGlANz0JxjN6fVrMBvWL+vOOy200npwJ69OBl9XEsTu3yVUvZNrdWFIIrIf8FLg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/css/glide.theme.min.css"
            integrity="sha512-8vDOoSF7kZUYkn7BiQulRCTvpRoenljlkQDZhM6+IqDJi5jHDH9QEYH9NfMBB8LlqiYc7O17YGxbGx7dOxKrpw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .wrap {
                max-width: 900px;
                margin: 0 auto;
            }

            .glide__slide {
                border: 1px solid black;
                line-height: 100px;
                margin: 0;
                text-align: center;
            }

            .slider__arrow {
                background-color: #818999;
            }

            .slider__arrow:hover {
                background-color: #ed145b
            }

            .slider__arrow--next {
                right: 1.5rem
            }

            .slider__arrow--prev {
                left: 1.5rem
            }
        </style>
        <style>[x-cloak] { display: none !important; }</style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    @endpush

    <div class="relative w-full flex flex-shrink-0 overflow-hidden shadow-2xl" style="height: 35rem">
        <div class="glide heropeek">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <li class="glide__slide">
                        <img src="{{ asset('img/carousel-1.jpg') }}">
                    </li class="glide__slide">
                    <li>
                        <img src="{{ asset('img/carousel-2.jpg') }}">
                    </li>
                    <li class="glide__slide">
                        <img src="{{ asset('img/carousel-3.jpg') }}">
                    </li>
                </ul>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                    < </button>
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">></button>
            </div>
        </div>
    </div>
    <section class="container py-16 ">
        <h1 class="text-center font-bold text-gray-600 text-2xl mb-8">PRODUCTOS DESRACADOS</h1>
        <div x-data="{ swiper: null }" x-init="swiper = new Swiper('.swiper', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 0,
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 16,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 16,
                },
                1280: {
                    slidesPerView: 4,
                    spaceBetween: 16,
                },
            },
            grabCursor: true,
        
        })" class="flex flex-row relative">
            <div class="swiper swiper-initialized swiper-horizontal swiper-pointer-events w-full h-96">
                <ul class="swiper-wrapper"
                    style="cursor: grab; transition-duration: 0ms; transform: translate3d(-1443px, 0px, 0px);">
                    @foreach ($products as $product)
                        <li class="swiper-slide flex flex-col items-center justify-center space-y-3">
                            <div x-data="{ showBtn: false }" class="relative overflow-hidden"
                                @mouseenter="showBtn = true" @mouseleave="showBtn = false">
                                <img class="w-[250px] h-[320px] transition duration-500 object-cover object-center"
                                    :class="showBtn ? 'scale-125' : ''"
                                    src="{{ Storage::url($product->images->first()->url) }}" 
                                    alt="{{ $product->name }}">
                                <span class="absolute top-2 left-2 bg-teal-600 text-gray-100 text-xs font-bold px-3 py-1 uppercase">
                                    Destacado
                                </span>
                                <div x-show="showBtn" x-cloak x-transition.enter.duration.500ms x-transition.leave.duration.300ms
                                    class="absolute w-full h-full top-0 left-0 z-10 bg-black bg-opacity-40 flex items-end justify-center">
                                    <div class="mb-8 space-x-3">
                                        <button class="bg-gray-100 hover:bg-indigo-500 text-indigo-500 hover:text-gray-100 p-2.5 rounded-full transition duration-200" title="Add To Wishlist">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                        </button>
                                        <button class="bg-gray-100 hover:bg-indigo-500 text-indigo-500 hover:text-gray-100 p-2.5 rounded-full transition duration-200" title="Add To Cart">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col items-center justify-center space-y-1">
                                <a href="./productDetails.html" class="text-gray-900 hover:text-indigo-700">
                                    {{ $product->name }}
                                </a>
                                <div class="flex items-center space-x-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-yellow-500" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-yellow-500" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-yellow-500" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-yellow-500" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                </div>
                                <span class="text-xl text-blue-900 font-bold">S/. {{ $product->price }}</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
            <!-- If we need pagination -->
            <div class="absolute inset-y-0 left-0 z-10 flex items-center">
                <button @click="swiper.slidePrev()"
                    class="bg-white -ml-3 lg:-ml-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none text-blue-400">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-left w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <div class="absolute inset-y-0 right-0 z-10 flex items-center">
                <button @click="swiper.slideNext()"
                    class="bg-white -mr-3 lg:-mr-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none text-blue-400">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-right w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
        
    </section>

    @push('js')
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/2.0.8/glide.min.js"
            integrity="sha512-Qo1FJBacvb6PMhzC2eGVmjtVSFCZk8zg7ivRPS4rmniN6/lOvcqIYtBSv8T6csIq4qP0exvUSvVSVodxiVotBg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/glide.min.js"
            integrity="sha512-2sI5N95oT62ughlApCe/8zL9bQAXKsPPtZZI2KE3dznuZ8HpE2gTMHYzyVN7OoSPJCM1k9ZkhcCo3FvOirIr2A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            var glideHeroPeek = new Glide('.heropeek', {
                type: 'carousel',
                animationDuration: 1000,
                autoplay: 3000,
                focusAt: '1',
                startAt: 1,
                perView: 1,
                Controls: true
            });
            glideHeroPeek.mount();
        </script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
        <script>
            const swiper = new Swiper('.swipers', {
                // Optional parameters
                direction: 'horizontal',
                loop: true,
                slidesPerView: 1,
                spaceBetween: 0,
                centeredSlides: true,
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 0,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 16,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 16,
                    },
                    1280: {
                        slidesPerView: 4,
                        spaceBetween: 16,
                    },
                },
                grabCursor: true,
                // Navigation arrows
                /* navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                }, */
            });
            /* swiper = new Swiper($refs.container, {
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 0,
                    breakpoints: {
                        640: {
                            slidesPerView: 1,
                            spaceBetween: 0,
                        },
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 16,
                        },
                        1024: {
                            slidesPerView: 3,
                            spaceBetween: 16,
                        },
                        1280: {
                            slidesPerView: 4,
                            spaceBetween: 16,
                        },
                    },
                    grabCursor: true,
                    
                }) */
        </script>
    @endpush

</x-app-layout>
