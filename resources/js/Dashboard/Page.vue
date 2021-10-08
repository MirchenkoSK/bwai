<template>
    <Head title="Dashboard" />

    <DashboardLayout>
        <template #panel>
            <div class="flex flex-row justify-between items-center p-4 border-b border-gray-200">
                <div class="text-lg font-medium text-gray-600">{{ pages.length }} pages</div>
                <div class="bg-gray-200 p-3 rounded text-gray-500 hover:bg-gray-300 hover:text-gray-600 transition cursor-pointer">
                    <PlusIcon class="h-4 w-4"/>
                </div>
            </div>

            <div v-for="page in pages" :key="page.id" class="flex flex-row p-4 border-b border-gray-200 group hover:bg-gray-100 transition cursor-pointer">
                <img class="h-14 w-14 rounded-full mr-4" :src="'/'+page.image" alt="">
                <div class="flex flex-col">
                    <div class="text-lg font-medium text-gray-600 group-hover:text-gray-800 transition">{{ page.name }}</div>
                    <div class="text-md font-normal text-gray-400 group-hover:text-gray-600 transition">{{ page.alias }}</div>
                </div>
            </div>
        </template>

        <div class="w-full flex flex-row justify-between items-center bg-green-500 mb-4 p-4 rounded-lg">
            <div class="text-white">{{ activePage }}</div>
            <XIcon class="h-4 w-4 text-white"/>
        </div>

        <div class="flex flex-col w-1/3 pr-4 mb-4">
            <label for="" class="text-sm font-normal text-gray-500">Name</label>
            <input type="text" class="w-full border-2 border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent" v-model="activePage.name" placeholder="Home">
        </div>

        <div class="flex flex-col w-1/3 pr-4 mb-4">
            <label for="" class="text-sm font-normal text-gray-500">Alias</label>
            <input type="text" class="w-full border-2 border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent" v-model="activePage.alias" placeholder="home">
        </div>

        <div class="flex flex-col w-1/3 mb-4">
            <label for="" class="text-sm font-normal text-gray-500">Image</label>
            <input type="text" class="w-full border-2 border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent" v-model="activePage.image" placeholder="abracadabra.jpg">
        </div>

        <div class="flex flex-row w-full justify-end mb-4">
            <div class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition cursor-pointer">Save</div>
        </div>
    </DashboardLayout>

</template>

<script>
import DashboardLayout from '@/Layouts/Dashboard.vue'
import { Link } from '@inertiajs/inertia-vue3';
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
    },
    props: {
        pages: Array,
    },
    data() {
        return {
            selectedPage: null
        }
    },
    computed: {
        activePage() {
            if (this.selectedPage == null) {
                return this.pages.length > 0 ? this.pages[0] : null
            }
        }
    }
}
</script>