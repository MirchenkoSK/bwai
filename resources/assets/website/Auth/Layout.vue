<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-light-100 dark:bg-dark-100">
        <div>
            <Link href="/">
                <BreezeApplicationLogo class="w-20 h-20" />
            </Link>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-black shadow-md overflow-hidden sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>

<script>
import BreezeApplicationLogo from '@/Auth/Components/ApplicationLogo.vue'
import { Link } from '@inertiajs/inertia-vue3'

export default {
    components: {
        BreezeApplicationLogo,
        Link,
    }
}
</script>
