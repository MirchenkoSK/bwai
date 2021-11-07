<template>
    <Head title="Dashboard" />

    <layout>

        <template #breadcrumbs>
            <breadcrumb :url="route('dashboard.page.index')">Pages</breadcrumb>
            <breadcrumb>Create</breadcrumb>
        </template>

        <template #buttons>
            <bw-button @click="$inertia.get(route('dashboard.page.index'))" color="gray">Back</bw-button>
            <bw-button @click="submit" class="ml-2" color="green">Save</bw-button>
        </template>

        <form class="flex flex-col w-full max-w-4xl mx-auto rounded-lg bg-light dark:bg-dark" @submit.prevent="submit">
            <div class="p-4 uppercase text-md font-bold text-light-700 dark:text-dark-700 border-b border-light-100 dark:border-dark-100">Create page</div>

            <div v-if="hasErrors" class="p-4 border-b border-light-100 dark:border-dark-100">
                <div class="font-medium text-lg text-red">Whoops! Something went wrong.</div>

                <ul class="mt-2 list-disc list-inside text-sm text-red">
                    <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
                </ul>
            </div>

            <div class="flex flex-col p-4">
                <div class="flex flex-col w-full mb-4">
                    <bw-label :error="errors.name" for="name">Name</bw-label>
                    <bw-input id="name" type="text" v-model="form.name" placeholder="Lorem ipsum" />
                </div>

                <div class="flex flex-col w-full mb-4">
                    <bw-label :error="errors.alias" for="alias">Alias</bw-label>
                    <bw-input id="alias" type="text" v-model="form.alias" placeholder="lorem-ipsum" />
                </div>

                <div class="flex flex-col w-full mb-4">
                    <bw-label :error="errors.title" for="title">Title</bw-label>
                    <bw-input id="title" type="text" v-model="form.title" placeholder="Lorem ipsum dolor" />
                </div>

                <div class="flex flex-col w-full mb-4">
                    <bw-label for="subtitle">Subtitle</bw-label>
                    <bw-input id="subtitle" type="text" v-model="form.subtitle" placeholder="Lorem ipsum dolor sit amet" />
                </div>

                <div class="flex flex-col w-full mb-4">
                    <bw-label :error="errors.text" for="text">Text</bw-label>
                    <bw-input id="text" type="text" v-model="form.text" placeholder="Lorem ipsum dolor sit amet" />
                </div>

                <div class="flex flex-col w-full mb-4">
                    <bw-label for="status">Status</bw-label>
                    <div class="flex flex-row">
                        <input id="status" type="checkbox" v-model="form.status" class="w-6 h-6 mr-2" />
                        <label for="status"> - включает или отключает отображение на сайте</label>
                    </div>
                </div>

                <label for="image" class="flex flex-row items-center justify-center w-full p-4 text-light-500 hover:text-light-600 dark:text-dark-500 dark:hover:text-dark-600 bg-light-200 dark:bg-dark-200 border-2 border-dashed border-light-400 dark:border-dark-400 rounded-lg transition cursor-pointer">
                    <template v-if="form.image">
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
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'
import { PlusIcon } from '@heroicons/vue/outline'
import layout from '@/bwadmin/layout.vue'
import bwInput from '@/bwadmin/components/input.vue'
import bwLabel from '@/bwadmin/components/label.vue'
import bwButton from '@/bwadmin/components/button.vue'
import breadcrumb from '@/bwadmin/components/breadcrumb.vue'

export default {
  components: {
      layout,
      Link,
      Head,
      PlusIcon,
      bwInput,
      bwLabel,
      bwButton,
      breadcrumb
    },
    props: {
        errors: Object,
    },
    data() {
        return {
            form: useForm({
            	'name': null,
            	'alias': null,
            	'image': null,
            	'title': null,
            	'subtitle': null,
            	'text': null,
            	'status': true,
                'seo': {
                    'st': null,
                    'sd': null,
                    'ogt': null,
                    'ogd': null,
                }
            })
        }
    },
    computed: {
        hasErrors() {
            return Object.keys(this.errors).length > 0
        },
        progress() {
            let p = this.form.progress ? this.form.progress.percentage : 0
            return 'width: ' + p + '%'
        }
    },
    methods: {
        submit() {
            this.form.post(route('dashboard.page.store'))
        }
    },
    created() {
        //
    }
}
</script>