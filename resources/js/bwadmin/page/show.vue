<template>
    <Head title="Page" />

    <layout>

        <template #breadcrumbs>
            <breadcrumb :url="route('dashboard.page.index')">Pages</breadcrumb>
            <breadcrumb>Show</breadcrumb>
        </template>

        <template #buttons>
            <bw-button @click="$inertia.get(route('dashboard.page.index'))" color="gray">Back</bw-button>
            <bw-button @click="$inertia.get(route('dashboard.page.edit', page.id))" class="ml-2" color="blue">Edit</bw-button>
        </template>

        <div class="flex flex-col w-full max-w-4xl mx-auto rounded-lg bg-light dark:bg-dark">
            <div class="p-4 uppercase text-md font-bold text-light-700 dark:text-dark-700 border-b border-light-100 dark:border-dark-100">Page info</div>
            <div class="p-4">
            	
            	<item name="page name">{{ page.name }}</item>
            	<item name="url">
            		{{ route('site.index') }}/<span class="text-blue">{{ page.alias }}</span>
            	</item>
            	<item name="title">{{ page.title }}</item>
            	<item name="subtitle">{{ page.subtitle }}</item>
            	<item name="text">{{ page.text }}</item>
            	<item name="image">
            		<img :src="page.image.xs" alt="">
            	</item>
            	<item name="status">
            		{{ page.status ? 'Отображается' : 'Отключена' }}
            	</item>
            	<item name="created">{{ createdAt(page.created_at).locale('de').format('LLL') }}</item>
            	<item name="updated">{{ createdAt(page.updated_at).locale('de').format('LLL') }}</item>
            	<item name="seo title">{{ page.seo.st }}</item>
            	<item name="seo description">{{ page.seo.sd }}</item>
            	<item name="og title">{{ page.seo.ogt }}</item>
            	<item name="og description">{{ page.seo.ogd }}</item>

            </div>
        </div>

        <div class="flex flex-col items-center mt-4">
        	<div @click="deletePage" class="px-4 py-2 border border-transparent rounded-md font-semibold text-xs tracking-widest focus:outline-none uppercase text-sm font-bold text-light-700 dark:text-dark-700 hover:text-black dark:hover:text-white bg-transparent hover:bg-red-light dark:hover:bg-red-dark transition ease-in-out duration-150 cursor-pointer">
        		Delete page
        	</div>
        </div>

    </layout>

</template>

<script>
import moment from 'moment'
import layout from '@/bwadmin/layout.vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'
import { PlusIcon, CheckCircleIcon, ExclamationCircleIcon } from '@heroicons/vue/outline'
import breadcrumb from '@/bwadmin/components/breadcrumb.vue'
import bwButton from '@/bwadmin/components/button.vue'
import item from '@/bwadmin/components/item-list.vue'

export default {
  components: {
      layout,
      PlusIcon,
      CheckCircleIcon,
      ExclamationCircleIcon,
      Link,
      Head,
      breadcrumb,
      bwButton,
      item
    },
    props: {
        page: Object,
        errors: Object,
    },
    methods: {
        createdAt(created) {
            return moment(created)
        },
        deletePage() {
            let page = this.page
            page._method = 'delete'
            let form = useForm(page)
            form.post(route('dashboard.page.destroy', page.id))
        }
    }
}
</script>