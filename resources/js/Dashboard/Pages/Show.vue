<template>
    <Head title="Dashboard" />

    <PageLayout :pages="pages">

        <form class="flex flex-col flex-auto" @submit.prevent="submit">

            <BwaiInput for="name" label="Name" placeholder="Lorem Ipsum" :error="errors.name ? true : false" v-model="form.name" />

            <BwaiInput for="alias" label="Alias" placeholder="lorem-ipsum" :error="errors.alias ? true : false" v-model="form.alias" />

            <input type="file" @input="form.image = $event.target.files[0]" />
            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
              {{ form.progress.percentage }}%
            </progress>

            <BwaiInput for="title" label="Title" placeholder="Lorem ipsum dolor..." :error="errors.title ? true : false" v-model="form.title" />

            <BwaiInput for="subtitle" label="Subtitle" placeholder="lorem-ipsum" :error="errors.subtitle ? true : false" v-model="form.subtitle" />

            <BwaiInput for="text" label="Text" placeholder="lorem-ipsum" :error="errors.text ? true : false" v-model="form.text" />

            <BwaiInput for="status" label="Status" placeholder="lorem-ipsum" :error="errors.status ? true : false" v-model="form.status" />

            <!-- <BwaiInput for="st" label="SEO Title" placeholder="lorem-ipsum" :error="errors.st ? true : false" v-model="form.seo.st" /> -->

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
            form: null
        }
    },
    methods: {
        submit() {
            this.form.post(route('dashboard.page.update', this.form.id))
        }
    },
    created() {
        this.page._method = 'put'
        this.form = useForm(this.page)
    }
}
</script>