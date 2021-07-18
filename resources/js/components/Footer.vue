<template>
    <div class="footerWrapper w-full h-auto">
        <div class="footerInfo w-full h-auto flex justify-center flex-wrap">
            <div class="item xl:w-2/12 sm:w-1/2 w-11/12 sm:h-56 sm:border-0 border-b border-gray-300 flex justify-start flex-wrap p-4" @click.prevent="toggleMenu('l1')">
                <h1 class="text-xl font-semibold w-full">Title 1</h1>
                <ul class="mt-2 hidden" id="l1">
                    <li class="mt-2">Item 1</li>
                    <li class="mt-2">Item 2</li>
                    <li class="mt-2">Item 3</li>
                    <li class="mt-2">Item 4</li>
                    <li class="mt-2">Item 5</li>
                </ul>
            </div>
            <div class="item xl:w-2/12 sm:w-1/2 w-11/12 sm:h-56 sm:border-0 border-t border-b border-gray-300 flex justify-start flex-wrap p-4" @click.prevent="toggleMenu('l2')">
                <h1 class="text-xl font-semibold w-full">Title 2</h1>
                <ul class="mt-2 sm:block hidden" id="l2">
                    <li class="mt-2">Item 1</li>
                    <li class="mt-2">Item 2</li>
                    <li class="mt-2">Item 3</li>
                    <li class="mt-2">Item 4</li>
                    <li class="mt-2">Item 5</li>
                </ul>
            </div>
            <div class="item xl:w-2/12 sm:w-1/2 w-11/12 sm:h-56 sm:border-0 border-t border-b border-gray-300 flex justify-start flex-wrap p-4" @click.prevent="toggleMenu('l3')">
                <h1 class="text-xl font-semibold w-full"> Title 3</h1>
                <ul class="mt-2 sm:block hidden" id="l3">
                    <li class="mt-2">Item 1</li>
                    <li class="mt-2">Item 2</li>
                    <li class="mt-2">Item 3</li>
                    <li class="mt-2">Item 4</li>
                    <li class="mt-2">Item 5</li>
                </ul>
            </div>
            <div class="item xl:w-2/12 sm:w-1/2 w-11/12 sm:h-56 sm:border-0 border-t border-b border-gray-300 flex justify-start flex-wrap p-4" @click.prevent="toggleMenu('l4')">
                <h1 class="text-xl font-semibold w-full"> Title 4</h1>
                <ul class="mt-2 sm:block hidden" id="l4">
                    <li class="mt-2">Item 1</li>
                    <li class="mt-2">Item 2</li>
                    <li class="mt-2">Item 3</li>
                    <li class="mt-2">Item 4</li>
                    <li class="mt-2">Item 5</li>
                </ul>
            </div>
        </div>
        <div class="footerSocials w-full h-auto flex p-2 justify-center">
            <div class="wrapper xl:w-11/12 sm:w-full sm:p-2 h-auto flex flex-wrap sm:justify-between justify-center ">
                <div class="appStores xl:w-1/6 w-full flex flex-wrap sm:justify-start justify-center sm:text-left text-center min-w-max">
                    <h1 class="text-lg w-full font-semibold">Title</h1>
                    <img src="https://cdn-cf.cms.flixbus.com/drupal-assets/footer/googleplay.svg" class="w-28 h-auto" alt="">
                    <img src="https://cdn-cf.cms.flixbus.com/drupal-assets/footer/appstore.svg" class="w-28 h-auto ml-2" alt="">
                </div>
                <div class="socials xl:w-1/6 w-full flex sm:justify-start justify-center sm:text-left text-center flex-wrap min-w-max sm:mt-0 mt-4">
                    <h1 class="text-lg w-full font-semibold">Title</h1>
                    <img src="https://cdn-cf.cms.flixbus.com/drupal-assets/footer/facebook.svg" class="w-7 h-auto sm:-mt-4" alt="">
                    <img src="https://cdn-cf.cms.flixbus.com/drupal-assets/footer/insta.svg" class="w-7 h-auto sm:-mt-4 ml-1" alt="">
                    <img src="https://cdn-cf.cms.flixbus.com/drupal-assets/footer/twitter.svg" class="w-7 h-auto sm:-mt-4 ml-1" alt="">
                </div>
            </div>
        </div>
        <div class="footerCities w-full h-20 flex justify-center">
            <div class="cities text-center flex items-center border-t border-b border-gray-300  ">
                <span>All Cities: </span>
                <span class="ml-2">A</span>
                <span class="ml-2">B</span>
                <span class="ml-2">C</span>
                <span class="ml-2">D</span>
                <span class="ml-2">E</span>
                <span class="ml-2">F</span>
                <span class="ml-2">G</span>
                <span class="ml-2">H</span>
                <span class="ml-2">I</span>
                <span class="ml-2">J</span>
                <span class="ml-2">K</span>
                <span class="ml-2">L</span>
                <span class="ml-2">M</span>
                <span class="ml-2">N</span>
                <span class="ml-2">O</span>
                <span class="ml-2">P</span>
                <span class="ml-2">Q</span>
                <span class="ml-2">R</span>
                <span class="ml-2">S</span>
                <span class="ml-2">T</span>
                <span class="ml-2">U</span>
                <span class="ml-2">V</span>
                <span class="ml-2">W</span>
                <span class="ml-2">X</span>
                <span class="ml-2">Y</span>
                <span class="ml-2">Z</span>
            </div>
        </div>
        <div class="footerPolicies w-full h-20 flex justify-center">
            <div class="wrapper xl:w-11/12 w-full flex flex-wrap justify-between">
                <div class="logos xl:w-1/6 w-full flex items-center h-full justify-evenly">
                    <img src="https://cdn-cf.cms.flixbus.com/drupal-assets/flix-logo-color.svg" class="w-10" alt="">
                    <img src="https://cdn-cf.cms.flixbus.com/drupal-assets/flix-logo-color.svg" class="w-10" alt="">
                    <img src="https://cdn-cf.cms.flixbus.com/drupal-assets/flix-logo-color.svg" class="w-10" alt="">
                </div>
                <div class="policies xl:w-1/6 w-full text-sm flex items-center justify-evenly h-full">
                    <span>Policy 1</span>
                    <span>Policy 1</span>
                    <span>Policy 1</span>
                    <span>Copyright</span>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    methods: {
        toggleMenu(id) {
            const list = document.querySelector(`#${id}`);

            list.classList.toggle('hidden');
        }
    }
}
</script>