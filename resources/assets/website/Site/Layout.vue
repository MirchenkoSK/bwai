<template>
    <div>
        <div class="min-h-screen max-h-screen overflow-auto bg-light-100 dark:bg-dark-100">
            <nav class="bg-white dark:bg-black border-b border-light-100 dark:border-dark-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex-shrink-0 flex items-center">
                                <Link :href="route('site.index')">
                                    <BreezeApplicationLogo class="block h-9 w-auto" />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <BreezeNavLink v-if="user" :href="route('client.index')" :active="route().current('client.index')">
                                    Client
                                </BreezeNavLink>

                                <BreezeNavLink v-if="user" :href="route('manager.index')" :active="route().current('manager.index')">
                                    Manager
                                </BreezeNavLink>

                                <a :href="route('dashboard.index')" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-light-600 hover:text-light-800 hover:border-light-300 focus:text-light-800 focus:border-light-300 dark:text-dark-600 dark:hover:text-dark-800 dark:hover:border-dark-300 dark:focus:text-dark-800 dark:focus:border-dark-300 focus:outline-none transition duration-150 ease-in-out">
                                    Dashboard
                                </a>

                                <BreezeNavLink v-for="page in pages" :key="page.id" :href="route('site.page', page.alias)">
                                    {{ page.name }}
                                </BreezeNavLink>
                            </div>
                        </div>

                        <div v-if="user" class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <BreezeDropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-light-600 hover:text-light-800 bg-white dark:text-dark-600 dark:hover:text-dark-800 dark:bg-black focus:outline-none transition ease-in-out duration-150">
                                                {{ user.name }} ({{ user.role.name }})

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <BreezeDropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </BreezeDropdownLink>
                                    </template>
                                </BreezeDropdown>
                            </div>
                        </div>

                        <div v-else class="flex">
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <BreezeNavLink :href="route('login')" :active="route().current('login')">
                                    Login
                                </BreezeNavLink>

                                <BreezeNavLink :href="route('register')" :active="route().current('register')">
                                    Register
                                </BreezeNavLink>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-light-600 hover:text-light-800 hover:bg-light-100 focus:bg-light-100 focus:text-light-800 dark:text-dark-600 dark:hover:text-dark-800 dark:hover:bg-dark-100 dark:focus:bg-dark-100 dark:focus:text-dark-800 focus:outline-none transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <BreezeResponsiveNavLink v-if="user" :href="route('dashboard.index')" :active="route().current('dashboard.index')">
                            Dashboard
                        </BreezeResponsiveNavLink>

                        <BreezeResponsiveNavLink :href="route('site.index')" :active="route().current('site.index')">
                            Other page
                        </BreezeResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div v-if="user" class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">{{ user.name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <BreezeResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </BreezeResponsiveNavLink>
                        </div>
                    </div>

                    <div v-else class="pt-4 pb-1 border-t border-gray-200">
                        <div class="mt-3 space-y-1">
                            <BreezeResponsiveNavLink :href="route('login')" :active="route().current('login')">
                                Login
                            </BreezeResponsiveNavLink>

                            <BreezeResponsiveNavLink :href="route('register')" :active="route().current('register')">
                                Register
                            </BreezeResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white dark:bg-black shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <div v-if="message" class="bg-red text-white dark:text-black shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ message }}
                    </div>
                </div>

                <slot />
            </main>
        </div>
    </div>
</template>

<script>
import BreezeApplicationLogo from '@/Site/Components/ApplicationLogo.vue'
import BreezeDropdown from '@/Site/Components/Dropdown.vue'
import BreezeDropdownLink from '@/Site/Components/DropdownLink.vue'
import BreezeNavLink from '@/Site/Components/NavLink.vue'
import BreezeResponsiveNavLink from '@/Site/Components/ResponsiveNavLink.vue'
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeApplicationLogo,
        BreezeDropdown,
        BreezeDropdownLink,
        BreezeNavLink,
        BreezeResponsiveNavLink,
        Link,
    },

    props: {
        pages: Array,
    },

    data() {
        return {
            showingNavigationDropdown: false,
        }
    },

    computed: {
        user() {
            return this.$page.props.auth.user
        },
        message() {
            return this.$page.props.flash.message
        }
    },
}
</script>
