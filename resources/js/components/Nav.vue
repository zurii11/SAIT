<template>
    <header class="w-full h-16 bg-green-400 flex justify-center text-gray-100 relative">
        <div class="allContentInCenter xl:w-9/12 w-full grid xl:grid-cols-12 sm:grid-cols-2 grid-cols-3">
            <div class="butt sm:hidden col-span-1 flex justify-start items-center pl-2 order-1">
                <button class="mobile-menu-button" @click.prevent="toggleMenu">
                    <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    class="h-6 w-6" 
                    fill="none" 
                    viewBox="0 0 24 24" 
                    stroke="currentColor">
                    <path stroke-linecap="round" 
                    stroke-linejoin="round" 
                    stroke-width="2" 
                    d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <div class="brand xl:col-span-2 col-span-1 flex xl:justify-center sm:justify-end justify-center items-center order-2">
                <span class="text-2xl">logo</span>
            </div>
            <div class="menusWrapper sm:flex sm:justify-center xl:col-span-8 col-span-2 xl:block hidden relative xl:top-0 sm:w-full xl:bg-transparent sm:bg-green-500 xl:order-3 order-4">
                <div class="menus w-10/12">
                    <ul class="menuItems w-full h-16 grid xl:grid-cols-12 sm:grid-cols-5 text-center items-center">
                        <li class="xl:col-span-2 sm:col-span-1 h-16 cursor-pointer group flex justify-center items-center border-b-4 border-transparent hover:border-gray-100">
                            <span>Item</span>
                            <div class="drop-content absolute w-48 mt-56 rounded-lg pt-2 pb-2 bg-gray-100 text-black hidden group-hover:block">
                                <ul class="w-full">
                                    <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 1</li>
                                    <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 2</li>
                                    <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 3</li>
                                    <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 4</li>
                                </ul>
                            </div>
                        </li>
                        <li class="xl:col-span-2 sm:col-span-1 h-16 cursor-pointer group flex justify-center items-center border-b-4 border-transparent hover:border-gray-100">
                            <span>Item</span>
                            <div class="drop-content absolute w-48 mt-56 rounded-lg pt-2 pb-2 bg-gray-100 text-black hidden group-hover:block">
                                <ul class="w-full">
                                    <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 1</li>
                                    <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 2</li>
                                    <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 3</li>
                                    <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 4</li>
                                </ul>
                            </div>
                        </li>
                        <li class="xl:col-span-2 sm:col-span-1 h-16 cursor-pointer group flex justify-center items-center border-b-4 border-transparent hover:border-gray-100">
                            <span>Item</span>
                            <div class="drop-content absolute w-48 mt-56 rounded-lg pt-2 pb-2 bg-gray-100 text-black hidden group-hover:block">
                                <ul class="w-full">
                                    <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 1</li>
                                    <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 2</li>
                                    <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 3</li>
                                    <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 4</li>
                                </ul>
                            </div>
                        </li>
                        <li class="xl:col-span-2 sm:col-span-1 h-16 cursor-pointer group flex justify-center items-center border-b-4 border-transparent hover:border-gray-100">
                            <span>Item</span>
                            <div class="drop-content absolute w-48 mt-56 rounded-lg pt-2 pb-2 bg-gray-100 text-black hidden group-hover:block">
                                <ul class="w-full">
                                    <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 1</li>
                                    <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 2</li>
                                    <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 3</li>
                                    <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 4</li>
                                </ul>
                            </div>
                        </li>
                        <li class="xl:col-span-2 sm:col-span-1 h-16 cursor-pointer group flex justify-center items-center border-b-4 border-transparent hover:border-gray-100">
                            <span>Item</span>
                            <div class="drop-content absolute w-48 mt-56 rounded-lg pt-2 pb-2 bg-gray-100 text-black hidden group-hover:block">
                                <ul class="w-full">
                                    <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 1</li>
                                    <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 2</li>
                                    <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 3</li>
                                    <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 4</li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex xl:justify-center justify-end xl:col-span-2 col-span-1 items-center relative xl:pr-0 pr-2 xl:order-4 order-3">
                <ul class="p-2 flex h-16 text-center items-center">
                    <li class="col-span-1 h-16 cursor-pointer group flex justify-center items-center border-b-4 border-transparent hover:border-gray-100">
                        <span>Language</span>
                        <div class="drop-content absolute w-48 mt-56 rounded-lg pt-2 pb-2 bg-gray-100 text-black hidden group-hover:block">
                            <ul class="w-full">
                                <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 1</li>
                                <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 2</li>
                                <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 3</li>
                                <li class="p-1 cursor-pointer border-l-4 border-transparent hover:border-red-300">Item 4</li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <div class="seperator"></div>
                <svg 
                xmlns="http://www.w3.org/2000/svg" 
                class="h-6 w-6 ml-2 cursor-pointer" fill="none" 
                viewBox="0 0 24 24" 
                stroke="#F3F4F6">
                <path 
                stroke-linecap="round" 
                stroke-linejoin="round" 
                stroke-width="2" 
                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
        <div class="mobile-menu absolute w-52 h-screen sm:hidden block bg-gray-100 text-black left-0 top-16 transform -translate-x-full transition duration-200 ease-in-out">
            <ul class="pt-2">
                <li class="p-4 border-l-4 border-transparent hover:border-red-300">Item</li>
                <li class="p-4 border-l-4 border-transparent hover:border-red-300">Item</li>
                <li class="p-4 border-l-4 border-transparent hover:border-red-300">Item</li>
                <li class="p-4 border-l-4 border-transparent hover:border-red-300">Item</li>
                <li class="p-4 border-l-4 border-transparent hover:border-red-300">Item</li>
            </ul>
        </div>
    </header>
</template>
<script>
export default {
    methods: {
        toggleMenu() {
            const sidebar = document.querySelector(".mobile-menu");

            sidebar.classList.toggle("-translate-x-full");
        }
    }
}
</script>