<x-admin-layout>
    <div class="bg-white w-full px-3 py-4 shadow mb-4">
        <div class="sm:grid sm:grid-cols-5 md:grid-cols-7 items-center">
            <div class="mt-4 sm:mt-0 sm:col-span-1">
                <a href="{{ route('admin.categories.create') }}"
                    class="ml-auto px-4 py-2 bg-green-500 text-white rounded-md shadow-md hover:bg-green-600">NUEVO</a>
            </div>
            <div class="mt-4 sm:mt-0 sm:col-span-4 ">
                <form class="relative flex items-center">
                    <input type="search" name="input_search_without_btn" id="input_search_without_btn"
                        class="flex-1 py-1.5 pl-10 border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300"
                        placeholder="Información para búsqueda (Enter)">
                    <span class="absolute left-2 bg-transparent flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </span>
                </form>
            </div>
            <div class="mt-4 md:mt-0 sm:col-span-5 md:col-span-2 flex justify-end">
                {!! ViewHelper::renderPagination('admin/category', $quantityPage, $currentPage, 'search=' . $searchParameter) !!}
            </div>
        </div>
    </div>
    <div class="bg-white overflow-x-scroll custom-scrollbar shadow-md">
        <table class="w-full whitespace-nowrap">
            <thead class="bg-primary text-gray-100 font-bold">
                <tr>
                    <th class="p-3 text-left" width="45%">Nombre</th>
                    <th class="p-3 text-left" width="40%">slug</th>
                    <th class="p-3 text-left" width="5%">icono</th>
                    <th class="p-3 text-left" width="10%"></th>
                </tr>
            </thead>
            <tbody class="text-sm">
                @foreach ($data as $row => $category)
                    <tr
                        class="bg-gray-{{ $row % 2 == 0 ? '100' : '200' }} hover:bg-primary hover:bg-opacity-20 transition duration-200">
                        <td class="p-3">
                            {{ $category->name }}
                        </td>
                        <td class="p-3">
                            {{ $category->slug }}
                        </td>
                        <td class="p-3">
                            {!! $category->icon !!}
                        </td>
                        <td class="p-3 flex items-center space-x-2 justify-end">
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 text-primary hover:text-primary-dark" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 text-yellow-500 hover:text-yellow-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500 hover:text-red-600"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div x-data="modal()">
        <button x-on:click="open()" type="button"
            class="inline-block font-normal text-center px-3 py-2 leading-normal text-base cursor-pointer text-white bg-blue-600"
            data-toggle="modal" data-target="#exampleModalTwo">
            Launch modal
        </button>
        <!-- MODAL CONTAINER WITH BACKDROP -->
        <div x-show="isOpening()" x-cloak>

            <!-- MODAL -->
            <div :class="{ 'opacity-0': isOpening(), 'opacity-100': isOpen() }"
                class="fixed z-50 top-0 left-0 w-full h-full outline-none transition-opacity duration-200 linear"
                tabindex="-1" role="dialog">

                <!-- MODAL DIALOG -->
                <div :class="{ 'mt-4': isOpening(), 'mt-8': isOpen() }"
                    class="relative w-full pointer-events-none max-w-4xl mt-8 mx-auto transition-all duration-200 ease-out">
                    <!-- MODAL CONTAINER -->
                    <div
                        class="relative flex flex-col w-full pointer-events-auto bg-white border border-gray-300 shadow-xl"
                            x-on:click.away="close()">
                        <!-- MODAL HEADER -->
                        <div class="flex items-start justify-between p-4 border-b border-gray-300 rounded-t">
                            <h5 class="mb-0 text-lg leading-normal">Awesome Modal</h5>
                            <button type="button" class="close" x-on:click="close()">&times;</button>
                        </div>

                        <div class="relative flex p-4">
                            <form class="relative flex items-center w-full">
                                <input type="search" name="input_search_without_btn" id="input_search_without_btn" class="flex-1 py-1.5 pl-10 border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300" placeholder="Información para búsqueda (Enter)">
                                <span class="absolute left-2 bg-transparent flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </span>
                            </form>
                        </div>
                        <div class="flex items-center justify-end p-4 border-t border-gray-300">
                            <button x-on:click="close()" type="button"
                                class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-pointer text-white bg-gray-600 mr-2">Close</button>
                            <button type="button"
                                class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-pointer text-white bg-blue-600">Save
                                changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BACKDROP -->
            <div :class="{ 'opacity-40': isOpen() }"
                class="z-40 fixed top-0 left-0 bottom-0 right-0 bg-black opacity-0 transition-opacity duration-200 linear">
            </div>
        </div>
    </div>

    <script>
        function modal() {
            return {
                state: 'CLOSED', // [CLOSED, TRANSITION, OPEN]
                open() {
                    this.state = 'TRANSITION'
                    setTimeout(() => {
                        this.state = 'OPEN'
                    }, 50)
                },
                close() {
                    this.state = 'TRANSITION'
                    setTimeout(() => {
                        this.state = 'CLOSED'
                    }, 300)
                },
                isOpen() {
                    return this.state === 'OPEN'
                },
                isOpening() {
                    return this.state !== 'CLOSED'
                },
            }
        }
    </script>
</x-admin-layout>
