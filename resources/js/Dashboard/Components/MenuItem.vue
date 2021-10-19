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
                ? 'flex flex-row items-center p-3 rounded-lg mb-1 group bg-gray-300'
                : 'flex flex-row items-center p-3 rounded-lg mb-1 group hover:bg-gray-300 transition cursor-pointer'
        },
        classIcon() {
            return this.active
                ? 'h-8 w-8 mr-3 text-gray-500'
                : 'h-8 w-8 mr-3 text-gray-400 group-hover:text-gray-500 transition'
        },
        classText() {
            return this.active
                ? 'text-lg font-medium text-gray-700'
                : 'text-lg font-medium text-gray-500 group-hover:text-gray-700 transition'
        }
    }
}
</script>