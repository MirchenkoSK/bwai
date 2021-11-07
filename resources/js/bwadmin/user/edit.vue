<template>
    <Head title="Create" />

    <layout>

        <template #breadcrumbs>
            <breadcrumb :url="route('dashboard.user.index')">Users</breadcrumb>
            <breadcrumb :url="route('dashboard.user.show', user.id)">{{ user.name }}</breadcrumb>
            <breadcrumb>Edit</breadcrumb>
        </template>

        <template #buttons>
            <bw-button @click="$inertia.get(route('dashboard.user.show', user.id))" color="gray">Back</bw-button>
            <bw-button @click="submit" class="ml-2" color="green">Save</bw-button>
        </template>

        <form class="flex flex-col w-full max-w-4xl mx-auto rounded-lg bg-light dark:bg-dark" @submit.prevent="submit">
            <div class="p-4 uppercase text-md font-bold text-light-700 dark:text-dark-700 border-b border-light-100 dark:border-dark-100">Edit user</div>

            <div v-if="hasErrors" class="p-4">
                <div class="font-medium text-lg text-red">Whoops! Something went wrong.</div>

                <ul class="mt-2 list-disc list-inside text-sm text-red">
                    <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
                </ul>
            </div>

            <div class="flex flex-col p-4">
                <div class="flex flex-col w-full mb-4">
                    <bw-label for="name">Name</bw-label>
                    <bw-input id="name" type="text" v-model="form.name" placeholder="Bernhard Wilson" />
                </div>

                <div class="flex flex-col w-full mb-4">
                    <bw-label for="email">Email</bw-label>
                    <bw-input id="email" type="text" v-model="form.email" class="border-red" placeholder="example@site.com" />
                </div>

                <div class="flex flex-col w-full mb-4">
                    <bw-label for="password">Password</bw-label>
                    <bw-input id="password" type="password" v-model="form.password" placeholder="********" />
                </div>

                <div class="flex flex-col w-full mb-4">
                    <bw-label for="password_confirmation">Password Confirmed</bw-label>
                    <bw-input id="password_confirmation" type="password" v-model="form.password_confirmation" placeholder="********" />
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
    	user: Object,
        errors: Object,
    },
    data() {
        return {
            form: null
        }
    },
    computed: {
    	hasErrors() {
            return Object.keys(this.errors).length > 0
        },
    },
    methods: {
        submit() {
            this.form.put(route('dashboard.user.update', this.user.id))
        }
    },
    created() {
        this.user._method = 'put'
        this.form = useForm(this.user)
    }
}
</script>