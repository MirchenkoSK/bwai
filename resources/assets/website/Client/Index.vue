<template>
    <Head title="Client Dashboard" />

   <SiteLayout :pages="pages">
        <template #header>
            <h2 class="font-semibold text-xl text-light-900 dark:text-dark-900 leading-tight">
                Client Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-black overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-black text-light-800 dark:text-dark-800 border-b border-light-100 dark:border-dark-100">
                        Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Culpa, exercitationem.
                    </div>
                </div>
            </div>
        </div>
    </SiteLayout>
   
</template>

<script>
import SiteLayout from '@/Site/Layout.vue'
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        SiteLayout,
        Head
    },
    props: {
        pages: Array,
    }
}
</script>
