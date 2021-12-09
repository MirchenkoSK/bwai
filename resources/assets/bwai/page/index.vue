<template>
    <layout>

        <template #breadcrumbs>
            <bw-breadcrumb>Pages</bw-breadcrumb>
        </template>

        <template #buttons>
            <bw-button @click="$inertia.get(route('dashboard.page.create'))" color="aqua">Create</bw-button>
        </template>

        <div class="flex flex-col rounded-lg bg-light dark:bg-dark">

            <div class="flex flex-row border-b-2 border-light-100 dark:border-dark-100 text-center uppercase text-sm font-bold text-light-800 dark:text-dark-800">
                <div class="flex-1 p-4 border-r border-light-100 dark:border-dark-100">Name</div>
                <div class="flex-1 p-4 border-r border-light-100 dark:border-dark-100">Status</div>
                <div class="flex-1 p-4">Created</div>
            </div>

            <bw-link v-for="page in pages" :key="page.id" :href="route('dashboard.page.show', page.id)" class="flex flex-col sm:flex-row border-b border-light-100 dark:border-dark-100 hover:bg-white dark:hover:bg-black transition cursor-pointer">
                <div class="flex flex-col flex-1 items-center sm:items-start p-2 sm:p-4 border-r border-light-100 dark:border-dark-100">
                    <div class="text-lg text-blue">{{ page.name }}</div>
                    <div class="text-sm font-medium">{{ page.alias }}</div>
                </div>
                <div class="flex flex-1 justify-center items-center p-2 sm:p-4 border-r border-light-100 dark:border-dark-100">
                    <CheckCircleIcon v-if="page.status" class="w-6 h-6 text-green" />
                    <ExclamationCircleIcon v-else class="w-6 h-6 text-red" />
                </div>
                <div class="flex flex-1 justify-center items-center p-2 sm:p-4">{{ createdAt(page.created_at) }}</div>
            </bw-link>

        </div>

    </layout>
</template>

<script>
import layout from '@/layout.vue'
import { CheckCircleIcon, ExclamationCircleIcon } from '@heroicons/vue/outline'

export default {
  components: {
      CheckCircleIcon,
      ExclamationCircleIcon,
    },
    props: {
        pages: Array,
    },
    setup(props) {

        const createdAt = (date) => {
            return window.moment(date).locale('en').format('LL')
        }

        return {
            createdAt
        }
    }
}
</script>