<template>
    <Head title="Dashboard" />

    <PageLayout :pages="pages">

        <form class="flex flex-col flex-auto" @submit.prevent="submit">

            <BwaiInput type="text" for="name" label="Name" placeholder="Lorem Ipsum" :error="errors.name ? true : false" v-model="form.name" />

            <BwaiInput type="text" for="alias" label="Alias" placeholder="lorem-ipsum" :error="errors.alias ? true : false" v-model="form.alias" />

            <div class="flex flex-col w-full mb-4">
                <label for="image" class="text-gray-400 text-sm font-medium">Image</label>
                <input id="image" type="file" @input="form.image = $event.target.files[0]" />
                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                  {{ form.progress.percentage }}%
                </progress>
            </div>

            <BwaiInput type="text" for="title" label="Title" placeholder="Lorem ipsum dolor" :error="errors.title ? true : false" v-model="form.title" />

            <BwaiInput type="text" for="subtitle" label="Subtitle" placeholder="Lorem ipsum dolor sit amet" :error="errors.subtitle ? true : false" v-model="form.subtitle" />

            <BwaiInput type="textarea" for="text" label="Text" placeholder="Lorem ipsum dolor sit amet, consectetur..." :error="errors.text ? true : false" v-model="form.text" />

            <BwaiInput type="checkbox" for="status" label="Status" placeholder="" :error="errors.status ? true : false" v-model="form.status" />

            <div class="flex flex-col p-4 bg-gray-100 mb-4">
                <h4 class="text-gray-600 mb-2 text-lg">SEO</h4>

                <BwaiInput type="text" for="st" label="SEO Title" placeholder="Lorem ipsum dolor" :error="errors.st ? true : false" v-model="form.seo.st" />

                <BwaiInput type="text" for="st" label="SEO Description" placeholder="Lorem ipsum dolor" :error="errors.sd ? true : false" v-model="form.seo.sd" />
                
                <BwaiInput type="text" for="st" label="OG Title" placeholder="Lorem ipsum dolor" :error="errors.ogt ? true : false" v-model="form.seo.ogt" />

                <BwaiInput type="text" for="st" label="OG Description" placeholder="Lorem ipsum dolor" :error="errors.ogd ? true : false" v-model="form.seo.ogd" />
            </div>


            <div class="flex flex-row w-full mb-4">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition cursor-pointer">Save</button>
            </div>

        </form>

    </PageLayout>

</template>

<script>
import PageLayout from '@/Dashboard/Pages/Index.vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'
import { HomeIcon, UserGroupIcon, AnnotationIcon, CogIcon,  PlusIcon, XIcon } from '@heroicons/vue/outline'
import BwaiInput from '@/Dashboard/Components/BwaiInput'

export default {
  components: {
      HomeIcon,
      UserGroupIcon,
      AnnotationIcon,
      CogIcon,
      PlusIcon,
      XIcon,
      PageLayout,
      Link,
      Head,
      BwaiInput
    },
    props: {
        pages: Array,
        page: Object,
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