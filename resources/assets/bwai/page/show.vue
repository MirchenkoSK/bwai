<template>
    <layout>

        <template #breadcrumbs>
            <bw-breadcrumb :url="route('dashboard.page.index')">Pages</bw-breadcrumb>
            <bw-breadcrumb>Show</bw-breadcrumb>
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
            		<img class="w-24" :src="page.image.xs" alt="">
            	</item>
            	<item name="status">
            		{{ page.status ? 'Отображается' : 'Отключена' }}
            	</item>
            	<item name="created">{{ createdAt(page.created_at) }}</item>
            	<item name="updated">{{ createdAt(page.updated_at) }}</item>
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
import { useForm } from '@inertiajs/inertia-vue3'
import { toRefs} from 'vue'
import item from '@/components/item-list.vue'

export default {
  components: { item },
    props: {
        page: Object,
    },
    setup(props) {

        const createdAt = (date) => {
            return window.moment(date).locale('en').format('LLLL')
        }

        const { page } = toRefs(props)
        page.value._method = 'delete'

        const deletePage = () => {
            let form = useForm(page.value)
            form.post(route('dashboard.page.destroy', page.value.id))
        }

        return { createdAt, deletePage }
    }
}
</script>