<div class="w-full text-gray-600 bg-white shadow">
<div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
    <div class="flex flex-row items-center justify-between p-4">
        <a href="<?= route_to('shop_home') ?>"
            class="text-lg font-semibold tracking-widest text-gray-700 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">KDHF Shop</a>
        <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                <path x-show="!open" fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
                <path x-show="open" fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
    <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row">
        <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            href="<?= route_to('shop_home') ?>">Home</a>
<!--        <div @click.away="open = false" class="relative" x-data="{ open: false }">-->
<!--            <button @click="open = !open"-->
<!--                class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">-->
<!--                <span>Keranjang</span>-->
<!--                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"-->
<!--                    class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">-->
<!--                    <path fill-rule="evenodd"-->
<!--                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"-->
<!--                        clip-rule="evenodd"></path>-->
<!--                </svg>-->
<!--            </button>-->
<!--            <div x-show="open" x-transition:enter="transition ease-out duration-100"-->
<!--            x-transition:enter-start="transform opacity-0 scale-95"-->
<!--            x-transition:enter-end="transform opacity-100 scale-100"-->
<!--            x-transition:leave="transition ease-in duration-75"-->
<!--            x-transition:leave-start="transform opacity-100 scale-100"-->
<!--            x-transition:leave-end="transform opacity-0 scale-95"-->
<!--            class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-64 z-30">-->
<!--            <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-700">-->
<!--            <div class="p-2 flex bg-white hover:bg-gray-100 cursor-pointer border-b border-gray-100" style="">-->
<!--                    <div class="p-2 w-12"><img src="https://dummyimage.com/50x50/bababa/0011ff&amp;text=50x50" alt="img product"></div>-->
<!--                    <div class="flex-auto text-sm w-32">-->
<!--                        <div class="font-bold">Product 1</div>-->
<!--                        <div class="truncate">Product 1 description</div>-->
<!--                        <div class="text-gray-400">Qt: 2</div>-->
<!--                    </div>-->
<!--                    <div class="flex flex-col w-18 font-medium items-end">-->
<!--                        <div class="w-4 h-4 mb-6 hover:bg-red-200 rounded-full cursor-pointer text-red-700">-->
<!--                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 ">-->
<!--                                <polyline points="3 6 5 6 21 6"></polyline>-->
<!--                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>-->
<!--                                <line x1="10" y1="11" x2="10" y2="17"></line>-->
<!--                                <line x1="14" y1="11" x2="14" y2="17"></line>-->
<!--                            </svg>-->
<!--                        </div>-->
<!--                        $12.22</div>-->
<!--                </div>-->
<!--                <div class="p-2 flex bg-white hover:bg-gray-100 cursor-pointer border-b border-gray-100" style="">-->
<!--                    <div class="p-2 w-12"><img src="https://dummyimage.com/50x50/bababa/0011ff&amp;text=50x50" alt="img product"></div>-->
<!--                    <div class="flex-auto text-sm w-32">-->
<!--                        <div class="font-bold">Product 2</div>-->
<!--                        <div class="truncate">Product 2 long description</div>-->
<!--                        <div class="text-gray-400">Qt: 2</div>-->
<!--                    </div>-->
<!--                    <div class="flex flex-col w-18 font-medium items-end">-->
<!--                        <div class="w-4 h-4 mb-6 hover:bg-red-200 rounded-full cursor-pointer text-red-700">-->
<!--                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 ">-->
<!--                                <polyline points="3 6 5 6 21 6"></polyline>-->
<!--                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>-->
<!--                                <line x1="10" y1="11" x2="10" y2="17"></line>-->
<!--                                <line x1="14" y1="11" x2="14" y2="17"></line>-->
<!--                            </svg>-->
<!--                        </div>-->
<!--                        $12.22</div>-->
<!--                </div>-->
<!--                <div class="p-2 flex bg-white hover:bg-gray-100 cursor-pointer border-b border-gray-100" style="">-->
<!--                    <div class="p-2 w-12"><img src="https://dummyimage.com/50x50/bababa/0011ff&amp;text=50x50" alt="img product"></div>-->
<!--                    <div class="flex-auto text-sm w-32">-->
<!--                        <div class="font-bold">Product 3</div>-->
<!--                        <div class="truncate">Product 3 description</div>-->
<!--                        <div class="text-gray-400">Qt: 2</div>-->
<!--                    </div>-->
<!--                    <div class="flex flex-col w-18 font-medium items-end">-->
<!--                        <div class="w-4 h-4 mb-6 hover:bg-red-200 rounded-full cursor-pointer text-red-700">-->
<!--                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 ">-->
<!--                                <polyline points="3 6 5 6 21 6"></polyline>-->
<!--                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>-->
<!--                                <line x1="10" y1="11" x2="10" y2="17"></line>-->
<!--                                <line x1="14" y1="11" x2="14" y2="17"></line>-->
<!--                            </svg>-->
<!--                        </div>-->
<!--                        $12.22</div>-->
<!--                </div>-->
<!--                <div class="p-4 justify-center flex">-->
<!--                    <button class="text-base  undefined  hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer hover:bg-teal-700 hover:text-teal-100 bg-teal-100 text-teal-700 border duration-200 ease-in-out border-teal-600 transition">-->
<!--                        Checkout $36.66-->
<!--                    </button>-->
<!--                </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
           href="<?= route_to('cart_page') ?>">Keranjang</a>
<!--        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"-->
<!--            href="#">Login</a>-->
<!--        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"-->
<!--            href="#">Daftar</a>-->
        <!-- <div @click.away="open = false" class="relative" x-data="{ open: false }">
            <button @click="open = !open"
                class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <span>Grid Dropdown</span>
                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                    class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 w-full md:max-w-screen-sm md:w-screen mt-2 origin-top-right z-30">
                <div class="px-2 pt-2 pb-4 bg-white rounded-md shadow-lg dark-mode:bg-gray-700">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a class="flex row items-start rounded-lg bg-transparent p-2 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="#">
                            <div class="bg-teal-500 text-white rounded-lg p-3">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                    class="md:h-6 md:w-6 h-4 w-4">
                                    <path
                                        d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="font-semibold">Appearance</p>
                                <p class="text-sm">Easy customization</p>
                            </div>
                        </a>

                        <a class="flex row items-start rounded-lg bg-transparent p-2 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="#">
                            <div class="bg-teal-500 text-white rounded-lg p-3">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                    class="md:h-6 md:w-6 h-4 w-4">
                                    <path
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="font-semibold">Comments</p>
                                <p class="text-sm">Check your latest comments</p>
                            </div>
                        </a>

                        <a class="flex row items-start rounded-lg bg-transparent p-2 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="#">
                            <div class="bg-teal-500 text-white rounded-lg p-3">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                    class="md:h-6 md:w-6 h-4 w-4">
                                    <path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                    <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="font-semibold">Analytics</p>
                                <p class="text-sm">Take a look at your statistics</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div> -->
    </nav>
</div>
</div>