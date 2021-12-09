<template>
    <layout>

        <template #breadcrumbs>
            <bw-breadcrumb :url="route('dashboard.user.index')">Users</bw-breadcrumb>
            <bw-breadcrumb>{{ user.name }}</bw-breadcrumb>
        </template>

        <template #buttons>
            <bw-button @click="$inertia.get(route('dashboard.user.index'))" color="gray">Back</bw-button>
            <bw-button @click="$inertia.get(route('dashboard.user.edit', user.id))" class="ml-2" color="blue">Edit</bw-button>
        </template>

        <div class="flex flex-col md:flex-row">
            <div class="flex flex-col w-full md:w-3/4 rounded-lg bg-light dark:bg-dark">
                <div class="p-4 uppercase text-md font-bold text-light-700 dark:text-dark-700 border-b border-light-100 dark:border-dark-100">User info</div>
                <div class="p-4">

                    <item name="name">{{ user.name }}</item>
                    <item name="email">{{ user.email }}</item>
                    <item name="role">{{ user.role.display_name }}</item>
                    <item name="image">
                        <img :src="user.image.xs" alt="">
                    </item>
                    <item name="created">{{ createdAt(user.created_at).locale('de').format('LLL') }}</item>
                    <item name="updated">{{ createdAt(user.updated_at).locale('de').format('LLL') }}</item>

                </div>
            </div>
            <div class="flex flex-col w-full md:w-1/4 mt-4 md:mt-0 ml-0 md:ml-4">
                
                <div class="flex flex-col mb-4 rounded-lg bg-light dark:bg-dark">
                    <div class="p-4 uppercase text-md font-bold text-light-700 dark:text-dark-700 border-b border-light-100 dark:border-dark-100">Edit role</div>
                    <div class="p-4">
                        <form v-if="user.role.name != 'root' && user.role.name != 'admin'" class="flex flex-col" @submit.prevent="submit">
                            <bw-select v-model="form.role" class="flex-grow border-2 border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                                <option v-for="role in roles" :key="role.id" :value="role.id">{{ role.display_name }}</option>
                            </bw-select>
                            <bw-button v-if="user.role.id != form.role" color="green" type="submit" class="mt-2 justify-center">Save</bw-button>
                        </form>

                        <template v-else>Вы не можете изменить роль пользователю с ролью - {{ user.role.display_name }}.</template>
                    </div>
                </div>

            </div>
        </div>

        <div class="flex flex-col items-center mt-4">
            <div @click="deleteUser" class="px-4 py-2 border border-transparent rounded-md font-semibold text-xs tracking-widest focus:outline-none uppercase text-sm font-bold text-light-700 dark:text-dark-700 hover:text-black dark:hover:text-white bg-transparent hover:bg-red-light dark:hover:bg-red-dark transition ease-in-out duration-150 cursor-pointer">
                Delete user
            </div>
        </div>

    </layout>

</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'
import item from '@/components/item-list.vue'

export default {
  components: { item },
    props: {
        roles: Array,
        user: Object,
        errors: Object,
    },
    data() {
        return {
            form: useForm({
                'role': null,
            }),
        }
    },
    computed: {
        //
    },
    methods: {
        submit() {
            this.form.post(route('dashboard.user.role', this.user.id))
        },
        createdAt(created) {
            return moment(created)
        },
        deleteUser() {
            let user = this.user
            user._method = 'delete'
            let form = useForm(user)
            form.post(route('dashboard.user.destroy', user.id))
        }
    },
    created() {
        this.form.role = this.user.role.id
    }
}
</script>