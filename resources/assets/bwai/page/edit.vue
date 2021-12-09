<template>
    <layout>

        <template #breadcrumbs>
            <bw-breadcrumb :url="route('dashboard.page.index')">Pages</bw-breadcrumb>
            <bw-breadcrumb :url="route('dashboard.page.show', page.id)">{{ page.name }}</bw-breadcrumb>
            <bw-breadcrumb>Edit</bw-breadcrumb>
        </template>

        <template #buttons>
            <bw-button @click="$inertia.get(route('dashboard.page.show', page.id))" color="gray">Back</bw-button>
            <bw-button @click="submit" class="ml-2" color="green">Save</bw-button>
        </template>

        <form class="flex flex-col w-full max-w-4xl mx-auto rounded-lg bg-light dark:bg-dark" @submit.prevent="submit">
            <div class="p-4 uppercase text-md font-bold text-light-700 dark:text-dark-700 border-b border-light-100 dark:border-dark-100">Page edit</div>

            <div v-if="hasErrors" class="p-4 border-b border-light-100 dark:border-dark-100">
                <div class="font-medium text-lg text-red">Whoops! Something went wrong.</div>

                <ul class="mt-2 list-disc list-inside text-sm text-red">
                    <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
                </ul>
            </div>

            <div class="flex flex-col p-4">
                <div class="flex flex-col w-full mb-4">
                    <bw-label for="name">Name</bw-label>
                    <bw-input id="name" type="text" v-model="form.name" placeholder="Lorem ipsum" />
                </div>

                <div class="flex flex-col w-full mb-4">
                    <bw-label for="alias">Alias</bw-label>
                    <bw-input id="alias" type="text" v-model="form.alias" placeholder="lorem-ipsum" />
                </div>

                <div class="flex flex-col w-full mb-4">
                    <bw-label for="title">Title</bw-label>
                    <bw-input id="title" type="text" v-model="form.title" placeholder="Lorem ipsum dolor" />
                </div>

                <div class="flex flex-col w-full mb-4">
                    <bw-label for="subtitle">Subtitle</bw-label>
                    <bw-input id="subtitle" type="text" v-model="form.subtitle" placeholder="Lorem ipsum dolor sit amet" />
                </div>

                <div class="flex flex-col w-full mb-4">
                    <bw-label for="text">Text</bw-label>
                    <bw-input id="text" type="text" v-model="form.text" placeholder="Lorem ipsum dolor sit amet" />
                </div>

                <div class="flex flex-col w-full mb-4">
                    <bw-label for="status">Status</bw-label>
                    <div class="flex flex-row">
                        <Switch v-model="form.status" :class="form.status ? 'bg-aqua' : 'bg-gray'" class="relative inline-flex items-center h-6 rounded-full w-11 mr-2">
                            <span class="sr-only">Enable checkbox</span>
                            <span :class="form.status ? 'translate-x-6' : 'translate-x-1'" class="transition inline-block w-4 h-4 transform bg-white dark:bg-black rounded-full"/>
                        </Switch>
                        <label for="status" class="text-light-700 dark:text-dark-700"> - включает или отключает отображение на сайте</label>
                    </div>
                </div>

                <label for="image" class="flex flex-row items-center justify-center w-full p-4 text-light-500 hover:text-light-600 dark:text-dark-500 dark:hover:text-dark-600 bg-light-200 dark:bg-dark-200 border-2 border-dashed border-light-400 dark:border-dark-400 rounded-lg transition cursor-pointer">
                    <template v-if="form.image.name">
                        {{ form.image.name }}
                    </template>
                    <template v-else>
                        <PlusIcon class="w-6 h-6 mr-2" />
                        <div class="uppercase text-md font-medium">Add image</div>
                    </template>
                    <input id="image" class="hidden" type="file" @input="form.image = $event.target.files[0]" />
                </label>

                <div v-if="form.progress" class="w-full h-2 mt-4 bg-light-300 rounded">
                    <div class="h-2 mb-4 bg-aqua rounded" :style="progress"></div>
                </div>
            </div>

            <div class="p-4 uppercase text-md font-bold text-light-700 dark:text-dark-700 border-b border-t border-light-100 dark:border-dark-100">Seo</div>

            <div class="flex flex-col p-4">
                <div class="flex flex-col w-full mb-4">
                    <bw-label for="st">SEO Title</bw-label>
                    <bw-input id="st" type="text" v-model="form.seo.st" placeholder="Lorem ipsum dolor" />
                </div>

                <div class="flex flex-col w-full mb-4">
                    <bw-label for="sd">SEO Description</bw-label>
                    <bw-input id="sd" type="text" v-model="form.seo.sd" placeholder="Lorem ipsum dolor" />
                </div>

                <div class="flex flex-col w-full mb-4">
                    <bw-label for="ogt">OG Title</bw-label>
                    <bw-input id="ogt" type="text" v-model="form.seo.ogt" placeholder="Lorem ipsum dolor" />
                </div>

                <div class="flex flex-col w-full">
                    <bw-label for="ogd">OG Description</bw-label>
                    <bw-input id="ogd" type="text" v-model="form.seo.ogd" placeholder="Lorem ipsum dolor" />
                </div>
            </div>

        </form>

    </layout>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'
import { toRefs, computed, onMounted } from 'vue'
import { PlusIcon } from '@heroicons/vue/outline'
import { Switch } from '@headlessui/vue'

export default {
  components: { PlusIcon, Switch },
    props: {
        page: Object,
        errors: Object,
    },
    setup(props) {
        const { page } = toRefs(props)
        page.value._method = 'put'

        const form = useForm(page.value)
        form.status = form.status ? true : false

        const submit = () => form.post(route('dashboard.page.update', page.value.id))

        const { errors } = toRefs(props)
        const hasErrors = computed(() => {
            return Object.keys(errors.value).length > 0
        })

        const progress = computed(() => {
            let p = form.progress ? form.progress.percentage : 0
            return 'width: ' + p + '%'
        })

        return { form, submit, hasErrors, progress, page }
    }
}
</script>