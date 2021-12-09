<template>

    <!-- base container -->
    <div class="w-full h-screen max-h-screen overflow-auto sm:overflow-hidden flex flex-col">

        <!-- top panel -->
        <div class="w-full flex flex-row justify-between border-b border-light-200 dark:border-dark-200 bg-white dark:bg-black">

            <bw-link :href="route('dashboard.index')" class="w-auto sm:w-64 md:w-80 p-4 text-center text-3xl font-bold tracking-tighter border-r-0 sm:border-r border-light-200 dark:border-dark-200 text-light-700 dark:text-dark-700">
                bwadmin
            </bw-link>

            <div class="p-4">
                <flash-message v-if="$page.props.flash.message" :message="$page.props.flash.message" :status="flashStatus" />
            </div>

            <div class="flex flex-row p-4">
                <div @click="toggleMode" class="p-2 bg-light-100 hover:bg-light-200 dark:bg-dark-100 dark:hover:bg-dark-200 rounded-full transition cursor-pointer">
                    <SunIcon v-if="dark" class="w-6 h-6 text-light-700 dark:text-dark-700"></SunIcon>
                    <MoonIcon v-if="!dark" class="w-6 h-6 text-light-700 dark:text-dark-700"></MoonIcon>
                </div>
                <div @click="menu = !menu" class="flex sm:hidden p-2 ml-4 bg-light-100 hover:bg-light-200 dark:bg-dark-100 dark:hover:bg-dark-200 rounded-full transition cursor-pointer">
                    <MenuIcon v-if="!menu" class="w-6 h-6 text-light-700 dark:text-dark-700"></MenuIcon>
                    <XIcon v-if="menu" class="w-6 h-6 text-light-700 dark:text-dark-700"></XIcon>
                </div>
            </div>

        </div>

        <!-- main case -->
        <div class="max-h-full sm:max-h-case flex flex-col sm:flex-row flex-auto">

            <!-- left panel -->
            <div :class="{ hidden: !menu }" class="w-full sm:w-64 sm:min-w-64 md:w-80 md:min-w-80 sm:flex flex-col p-4 border-r border-light-200 dark:border-dark-200 bg-white dark:bg-black">

                <div class="flex flex-col flex-auto mb-4 overflow-auto">
                    <sidebar-item v-for="(menuItem, k) in menuItems" :key="k" :href="menuItem.url" :active="menuItem.active" :icon="menuItem.icon">{{ menuItem.name }}</sidebar-item>

                    <a :href="route('site.index')" class="flex flex-row items-center p-3 rounded-lg mb-1 group hover:bg-light dark:hover:bg-dark transition cursor-pointer">
                        <LoginIcon class="h-8 w-8 mr-3 text-light-500 dark:text-dark-500 group-hover:text-light-700 dark:group-hover:text-dark-700 transition" />
                        <div class="text-lg font-medium text-light-500 dark:text-dark-500 group-hover:text-light-700 dark:group-hover:text-dark-700 transition">
                            Back to site
                        </div>
                    </a>
                </div>


                <div class="flex flex-row border-t border-b border-light-200 dark:border-dark-200 p-4 -m-4 group hover:bg-light dark:hover:bg-dark transition cursor-pointer">
                    <img class="h-14 w-14 rounded-full mr-4" src="/assets/bwai/img/avatar.png" alt="">
                    <div class="flex flex-col">
                        <div class="text-lg font-medium text-light-700 group-hover:text-light-900 dark:text-dark-700 dark:group-hover:text-dark-900 transition">{{ user.name }}</div>
                        <div class="text-md font-normal text-light-500 group-hover:text-light-600 dark:text-dark-500 dark:group-hover:text-dark-600 transition">View profile</div>
                    </div>
                </div>

            </div>

            <!-- container -->
            <div class="flex flex-col flex-auto content-start">

                <!-- breadcrumbs and menu -->
                <div class="flex flex-col sm:flex-row flex-wrap justify-between border-b border-light-200 dark:border-dark-200 bg-white dark:bg-black text-light-800 dark:text-dark-800">
                    
                    <div class="flex flex-row items-center text-sm font-medium uppercase p-4">
                        <bw-breadcrumb :url="route('dashboard.index')">Dashboard</bw-breadcrumb>
                        <slot name="breadcrumbs" />
                    </div>
                    
                    <div class="flex flex-row items-center p-2 pr-4 border-t border-light-200 dark:border-dark-200 sm:border-t-0">
                        <slot name="buttons" />
                    </div>

                </div>

                <!-- content -->
                <div class="max-h-full sm:max-h-content flex flex-col flex-auto bg-light-100 dark:bg-dark-100 shadow-inner">
                    <div class="flex flex-col flex-auto p-4 overflow-auto overscroll-contain">
                        <slot />
                    </div>
                </div>

            </div>

        </div>

    </div>

    <transition name="fade">
        <div v-if="loader" class="fixed top-0 right-0 bottom-0 left-0 flex flex-row justify-center items-center bg-white dark:bg-black bg-opacity-50 dark:bg-opacity-50 transition ease-out duration-300">
            <div class="text-black dark:text-white animate-spin">
                <CogIcon class="w-12 h-12" />
            </div>
        </div>
    </transition>

</template>

<script>
import { HomeIcon, UserGroupIcon, AnnotationIcon, CogIcon, LoginIcon, MoonIcon, SunIcon, MenuIcon, XIcon } from '@heroicons/vue/outline'
import sidebarItem from '@/components/sidebar-item.vue'
import flashMessage from '@/components/flash-message.vue'

import { Inertia } from '@inertiajs/inertia'

export default {
  components: {
        MoonIcon,
        SunIcon,
        MenuIcon,
        XIcon,
        HomeIcon,
        UserGroupIcon,
        AnnotationIcon,
        CogIcon,
        LoginIcon,
        sidebarItem,
        flashMessage,
    },
    data() {
        return {
            dark: false,
            menu: false,
            loader: false,
            menuItems: [
                {
                    name: 'Dashboard',
                    url: route('dashboard.index'),
                    active: route().current('dashboard.index'),
                    icon: HomeIcon,
                },
                {
                    name: 'Pages',
                    url: route('dashboard.page.index'),
                    active: route().current('dashboard.page.*'),
                    icon: AnnotationIcon,
                },
                {
                    name: 'Users',
                    url: route('dashboard.user.index'),
                    active: route().current('dashboard.user.*'),
                    icon: UserGroupIcon,
                },
                {
                    name: 'Settings',
                    url: '#!',
                    active: false,
                    icon: CogIcon,
                },
            ],
            flashStatus: false
        }
    },
    watch: {
        '$page.props.flash.message': {
            handler() {
                this.flashStatus = true
                setTimeout(this.showMessage, 5000)
            },
            deep: true,
        }
    },
    computed: {
        user() {
            return this.$page.props.auth.user
        }
    },
    methods: {
        toggleMode() {
            if (localStorage.theme === 'dark') {
                this.dark = false
                localStorage.theme = 'light'
                document.documentElement.classList.remove('dark')
            } else {
                this.dark = true
                localStorage.theme = 'dark'
                document.documentElement.classList.add('dark')
            }
        },
        showMessage() {
            this.flashStatus = false
        }
    },
    created() {
        if (localStorage.theme === 'dark') {
            this.dark = true
        } else {
            this.dark = false
        }
        if (this.$page.props.flash.message) {
            this.flashStatus = true
            setTimeout(this.showMessage, 5000)
        }

        let timeout = null

        Inertia.on('start', () => {
            timeout = setTimeout(() => { this.loader = true }, 250)
        })

        Inertia.on('finish', (event) => {
            clearTimeout(timeout)
            this.loader = false
        })

    }
}
</script>


<style>
    .fade-enter-active,
    .fade-leave-active {
        transition: opacity 0.5s cubic-bezier(0, 0, 0.2, 1);
    }

    .fade-enter-from,
    .fade-leave-to {
        opacity: 0;
    }
</style>