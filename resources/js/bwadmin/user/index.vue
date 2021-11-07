<template>
    <Head title="Users" />

    <layout>

        <template #breadcrumbs>
            <breadcrumb>Users</breadcrumb>
        </template>

        <template #buttons>
            <bw-button @click="$inertia.get(route('dashboard.user.create'))" color="aqua">Create</bw-button>
        </template>

        <div class="flex flex-col rounded-lg bg-light dark:bg-dark">

            <div class="p-4 uppercase text-md font-bold text-light-700 dark:text-dark-700 border-b border-light-100 dark:border-dark-100">Users</div>

            <div class="flex flex-row p-4 border-b border-light-100 dark:border-dark-100">
                <bw-input type="text" v-model="search" class="flex-auto" placeholder="Search..." />
                <div @click="filter = !filter" :class="{ 'bg-gray-400 text-gray-800': filter }" class="ml-2 bg-gray-200 p-3 rounded text-gray-500 hover:bg-gray-300 hover:text-gray-600 transition cursor-pointer">
                    <FilterIcon class="h-4 w-4"></FilterIcon>
                </div>
            </div>

            <div v-show="filter" class="flex flex-col p-4 border-b border-light-100 dark:border-dark-100">
                <div class="flex flex-row mb-4">
                    <label v-for="r in roles" :key="r.name" :for="r.name" :class="{ 'bg-blue dark:bg-blue text-white dark:text-black': role == r.name, 'bg-light-200 dark:bg-dark-200': role != r.name }" class="flex flex-auto p-2 justify-center transition cursor-pointer">
                        <input :id="r.name" type="radio" :value="r.name" v-model="role" class="hidden">
                        {{ r.display_name }}
                    </label>
                </div>
                <div class="flex flex-row">
                    <label for="email" :class="{ 'bg-blue dark:bg-blue text-white dark:text-black': email, 'bg-light-200 dark:bg-dark-200': !email }" class="flex flex-auto p-2 justify-center transition cursor-pointer">
                        <input id="email" type="radio" :value="true" v-model="email" class="hidden">
                        Email
                    </label>
                    <label for="name" :class="{ 'bg-blue dark:bg-blue text-white dark:text-black': !email, 'bg-light-200 dark:bg-dark-200': email }" class="flex flex-auto p-2 justify-center transition cursor-pointer">
                        <input id="name" type="radio" :value="false" v-model="email" class="hidden">
                        Name
                    </label>
                </div>
            </div>

            <div class="flex flex-row border-b-2 border-light-100 dark:border-dark-100 text-center uppercase text-sm font-bold text-light-800 dark:text-dark-800">
                <div class="flex-1 p-4 border-r border-light-100 dark:border-dark-100">Name</div>
                <div class="flex-1 p-4 border-r border-light-100 dark:border-dark-100">Role</div>
                <div class="flex-1 p-4">Created</div>
            </div>

            <Link v-for="user in filteredUsers" :key="user.id" :href="route('dashboard.user.show', user.id)" class="flex flex-col sm:flex-row border-b border-light-100 dark:border-dark-100 hover:bg-white dark:hover:bg-black transition cursor-pointer">
                <div class="flex flex-col flex-1 items-center sm:items-start p-2 sm:p-4 border-r border-light-100 dark:border-dark-100">
                    <div class="text-lg text-blue">{{ user.name }}</div>
                    <div class="text-sm font-medium text-light-800 dark:text-dark-800">{{ user.email }}</div>
                </div>
                <div class="flex flex-col flex-1 justify-center items-center p-2 sm:p-4 border-r border-light-100 dark:border-dark-100">
                    <div class="text-light-800 dark:text-dark-800 font-medium">{{ user.role.display_name }}</div>
                </div>
                <div class="flex flex-1 justify-center items-center p-2 sm:p-4">{{ createdAt(user.created_at).locale('ru').format('LL') }}</div>
            </Link>

        </div>

    </layout>

</template>

<script>
import moment from 'moment'
import layout from '@/bwadmin/layout.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import { PlusIcon, FilterIcon, CheckCircleIcon, ExclamationCircleIcon } from '@heroicons/vue/outline'
import breadcrumb from '@/bwadmin/components/breadcrumb.vue'
import bwButton from '@/bwadmin/components/button.vue'
import bwInput from '@/bwadmin/components/input.vue'

export default {
  components: {
      layout,
      Link,
      Head,
      PlusIcon,
      FilterIcon,
      CheckCircleIcon,
      ExclamationCircleIcon,
      breadcrumb,
      bwButton,
      bwInput,
    },
    props: {
        users: Array,
    },
    data() {
        return {
            search: '',
            filter: false,
            email: true,
            role: 'all',
            roles: [
                {
                    name: 'all',
                    display_name: 'All'
                },
                {
                    name: 'admin',
                    display_name: 'Admin'
                },
                {
                    name: 'moderator',
                    display_name: 'Moderator'
                },
                {
                    name: 'manager',
                    display_name: 'Manager'
                },
                {
                    name: 'client',
                    display_name: 'Kunde'
                }
            ],
        }
    },
    computed: {
    	fromRole() {
    		if (this.role == 'all') {
    			return this.users
    		} else {
    			return this.users.filter(user => user.role.name.toLowerCase().indexOf(this.role.toLowerCase()) > -1)
    		}
    	},
    	filteredUsers() {
    		if (this.email) {
    			return this.fromRole.filter(user => user.email.toLowerCase().indexOf(this.search.toLowerCase()) > -1)
    		} else {
    			return this.fromRole.filter(user => user.name.toLowerCase().indexOf(this.search.toLowerCase()) > -1)
    		}
    	},
    },
    methods: {
        createdAt(created) {
            return moment(created)
        }
    },
    created() {
        //
    }
}
</script>