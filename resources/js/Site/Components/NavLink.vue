<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    },

    props: ['href', 'active'],

    computed: {
        classes() {
            return this.active
                ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-light-900 dark:text-dark-900 focus:border-blue-light dark:focus:border-blue-dark focus:outline-none transition duration-150 ease-in-out'
                : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-light-600 hover:text-light-800 hover:border-light-300 focus:text-light-800 focus:border-light-300 dark:text-dark-600 dark:hover:text-dark-800 dark:hover:border-dark-300 dark:focus:text-dark-800 dark:focus:border-dark-300 focus:outline-none transition duration-150 ease-in-out'
        }
    }
}
</script>
