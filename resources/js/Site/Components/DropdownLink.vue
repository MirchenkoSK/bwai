<template>
    <Link class="block w-full px-4 py-2 text-left text-sm leading-5 text-light-800 dark:text-dark-800 bg-white hover:bg-light dark:bg-black dark:hover:bg-dark focus:outline-none focus:bg-light-100 dark:focus:bg-dark-100 transition duration-150 ease-in-out">
        <slot />
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    }
}
</script>
