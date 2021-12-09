<template>

    <Link :href="href" :class="classItem">
        <component :is="icon" :class="classIcon"/>
        <div :class="classText">
            <slot />
        </div>
    </Link>

</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    },

    props: ['href', 'active', 'icon'],

    computed: {
        classItem() {
            return this.active
                ? 'flex flex-row items-center p-3 rounded-lg mb-1 group bg-light-100 dark:bg-dark-100'
                : 'flex flex-row items-center p-3 rounded-lg mb-1 group hover:bg-light dark:hover:bg-dark transition cursor-pointer'
        },
        classIcon() {
            return this.active
                ? 'h-8 w-8 mr-3 text-light-600 dark:text-dark-600'
                : 'h-8 w-8 mr-3 text-light-500 dark:text-dark-500 group-hover:text-light-700 dark:group-hover:text-dark-700 transition'
        },
        classText() {
            return this.active
                ? 'text-lg font-medium text-light-800 dark:text-dark-800'
                : 'text-lg font-medium text-light-500 dark:text-dark-500 group-hover:text-light-700 dark:group-hover:text-dark-700 transition'
        }
    }
}
</script>