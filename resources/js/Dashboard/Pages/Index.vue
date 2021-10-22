<template>
    <Head title="Dashboard" />

    <DashboardLayout>

        <template #panel>
            <div class="flex flex-row justify-between items-center p-4 border-b border-gray-200">
                <div class="text-lg font-medium text-gray-600">{{ pages.length }} pages</div>
                <Link :href="route('dashboard.page.create')" class="bg-gray-200 p-3 rounded text-gray-500 hover:bg-gray-300 hover:text-gray-600 transition cursor-pointer">
                    <PlusIcon class="h-4 w-4"/>
                </Link>
            </div>

            <Link v-for="page in pages" :key="page.id" :href="route('dashboard.page.show', page.id)" :class="route().current('dashboard.page.show', page.id) ? 'bg-gray-100' : ''" class="flex flex-row p-4 border-b border-gray-200 group hover:bg-gray-100 transition cursor-pointer">
                <img class="h-14 w-14 rounded-full mr-4" :src="page.image.xs" alt="">
                <div class="flex flex-col">
                    <div class="text-lg font-medium text-gray-600 group-hover:text-gray-800 transition">{{ page.name }}</div>
                    <div class="text-md font-normal text-gray-400 group-hover:text-gray-600 transition">{{ page.alias }}</div>
                </div>
            </Link>
        </template>

        <slot />

    </DashboardLayout>

</template>

<script>
import DashboardLayout from '@/Dashboard/Layout.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import { HomeIcon, UserGroupIcon, AnnotationIcon, CogIcon,  PlusIcon, XIcon } from '@heroicons/vue/outline'

export default {
  components: {
      HomeIcon,
      UserGroupIcon,
      AnnotationIcon,
      CogIcon,
      PlusIcon,
      XIcon,
      DashboardLayout,
      Link,
      Head,
    },
    props: {
        pages: Array,
    },
}
</script>