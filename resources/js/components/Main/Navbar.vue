<template>
    <header class="w-full h-16 bg-green-400 flex justify-center text-gray-100 relative">
        <div class="allContentInCenter xl:w-9/12 w-full grid xl:grid-cols-12 sm:grid-cols-2 grid-cols-3">
            <div class="butt sm:hidden col-span-1 flex justify-start items-center pl-2 order-1">
                <button class="mobile-menu-button" @click.prevent="toggleMenu('mobile')">
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
                <div class="seperator">|</div>
                <!-- <span v-if="loggedIn">{{ user.email }}</span> -->
                <button v-if="loggedIn" @click="logout()">{{ user.email }}</button>
                <svg 
                v-else
                @click.prevent="toggleMenu('login')"
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
        <div class="mobile-menu fixed z-50 w-52 h-screen sm:hidden block bg-gray-100 text-black left-0 top-16 transform -translate-x-full transition duration-200 ease-in-out">
            <ul class="pt-2">
                <li class="p-4 border-l-4 border-transparent hover:border-red-300">Item</li>
                <li class="p-4 border-l-4 border-transparent hover:border-red-300">Item</li>
                <li class="p-4 border-l-4 border-transparent hover:border-red-300">Item</li>
                <li class="p-4 border-l-4 border-transparent hover:border-red-300">Item</li>
                <li class="p-4 border-l-4 border-transparent hover:border-red-300">Item</li>
            </ul>
        </div>
        <div class="login-menu fixed z-50 w-64 h-screen block bg-gray-100 text-black right-0 top-16 transform translate-x-full transition duration-200 ease-in-out">
            <div class="lr w-full h-12 bg-gray-800 flex">
                <div class="login w-1/2 h-full bg-red-800 flex justify-center items-center">
                    <span class="cursor-pointer" @click="loginOrRegister = true">Login</span>
                </div>
                <div class="register w-1/2 h-full bg-yellow-600 flex justify-center items-center">
                    <span class="cursor-pointer" @click="loginOrRegister = false">Register</span>
                </div>
            </div>
            <div class="loginForm flex flex-wrap" v-if="loginOrRegister">
                <div class="email p-2 w-full">
                    <label for="email">Email</label>
                    <input class="w-full bg-gray-100 rounded border border-gray-400 focus:ouline-none focus:border-indigo-500 text-base px-4 py-2" placeholder="Email" type="text" name="email" v-model="loginForm.email">
                </div>
                <div class="password p-2 w-full">
                    <label for="password">Password</label>
                    <input class="w-full bg-gray-100 rounded border border-gray-400 focus:ouline-none focus:border-indigo-500 text-base px-4 py-2" placeholder="Password" type="password" name="password" v-model="loginForm.password">
                </div>
                <div class="butt p-2 w-full flex flex-wrap justify-center">
                    <button @click.prevent="login" type="submit" class="flex text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">Login</button>
                </div>
            </div>
            <div class="registerForm flex flex-wrap" v-else>
                <div class="name p-2 w-full">
                    <label for="name">Name</label>
                    <input class="w-full bg-gray-100 rounded border border-gray-400 focus:ouline-none focus:border-indigo-500 text-base px-4 py-2" placeholder="Name" type="text" name="name" v-model="registerForm.name">
                </div>
                <div class="surname p-2 w-full">
                    <label for="surname">Surname</label>
                    <input class="w-full bg-gray-100 rounded border border-gray-400 focus:ouline-none focus:border-indigo-500 text-base px-4 py-2" placeholder="Surname" type="text" name="surname" v-model="registerForm.surname">
                </div>
                <div class="email p-2 w-full">
                    <label for="email">Email</label>
                    <input class="w-full bg-gray-100 rounded border border-gray-400 focus:ouline-none focus:border-indigo-500 text-base px-4 py-2" placeholder="Email" type="email" name="email" v-model="registerForm.email">
                </div>
                <div class="password p-2 w-full">
                    <label for="password">Password</label>
                    <input class="w-full bg-gray-100 rounded border border-gray-400 focus:ouline-none focus:border-indigo-500 text-base px-4 py-2" placeholder="Password" type="password" name="password" v-model="registerForm.password">
                </div>
                <div class="confirmPassword p-2 w-full">
                    <label for="password_confirmation">Confirm Password</label>
                    <input class="w-full bg-gray-100 rounded border border-gray-400 focus:ouline-none focus:border-indigo-500 text-base px-4 py-2" placeholder="Password" type="password" name="password_confirmation" v-model="registerForm.password_confirmation">
                </div>
                <div class="butt p-2 w-full flex flex-wrap justify-center">
                    <button @click.prevent="register" type="submit" class="flex text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">Register</button>
                </div>
            </div>
        </div>
    </header>
</template>
<script>
export default {
    data() {
        return {
            loggedIn: false,
            loginOrRegister: true,

            loginForm: {
                email: '',
                password: ''
            },

            registerForm: {
                name: '',
                surname: '',
                email: '',
                password: '',
                password_confirmation: ''
            },

            user: null
        }
    },

    methods: {
        register() {
            axios.post('/api/register', this.registerForm).then(() => {
                console.log('Registered!');
            }).catch((error) => {
                console.log(error);
            })
        },

        login() {
            axios.post('/api/login', this.loginForm).then(() => {
                console.log('Logged in!');
            }).catch((error) => {
                console.log(error);
            })
        },

        logout() {
            axios.post('/api/logout').then(() => {
                this.loggedIn = false;
                this.user = null;
            });
        },

        checkLogin() {
            axios.get('/api/user').then(res => {
                console.log("I'm Logged in!");
                console.log(res);
                this.loggedIn = true;
                this.user = res.data;
            }).catch(() => {
                console.log("I'm Logged out!");
                this.loggedIn = false;
            })
        },

        toggleMenu(menu) {
            const sidebar = document.querySelector(`.${menu}-menu`);

            sidebar.classList.toggle(((menu == "mobile") ? "-" : "") + "translate-x-full");
        }
    },

    mounted() {
        this.checkLogin();
    }
}
</script>