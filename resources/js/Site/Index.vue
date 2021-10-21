<template>
    <Head title="Site" />

   <SiteLayout :pages="pages">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div v-for="page in pages" :key="page.id" class="p-6 bg-white border-b border-gray-200">
                        {{ page }}
                    </div>
                </div>
            </div>
        </div>
    </SiteLayout>
   
</template>

<script>
import SiteLayout from '@/Site/Layout.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        SiteLayout,
        Head,
        Link,
    },
    props: {
        pages: Array,
    }
}
</script>
