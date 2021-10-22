<template>
    <Head title="Dashboard" />

    <DashboardLayout>

        <template #panel>
            <div class="flex flex-row justify-between items-center p-4 border-b border-gray-200">
                <input type="text" v-model="search" class="flex-grow border-2 border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent" placeholder="Bernhard Wilson">
                <div @click="filter = !filter" :class="{ 'bg-gray-400 text-gray-800': filter }" class="ml-2 bg-gray-200 p-3 rounded text-gray-500 hover:bg-gray-300 hover:text-gray-600 transition cursor-pointer">
                	<FilterIcon class="h-4 w-4"></FilterIcon>
                </div>
                <Link :href="route('dashboard.page.create')" class="ml-2 bg-gray-200 p-3 rounded text-gray-500 hover:bg-gray-300 hover:text-gray-600 transition cursor-pointer">
                    <PlusIcon class="h-4 w-4"/>
                </Link>
            </div>

			<div v-show="filter" class="flex flex-row p-4 border-b border-gray-200">
	            <div class="flex flex-col">
	            	<div class="flex flex-row">
	            		<input id="all" type="radio" value="all" v-model="role">
	            		<label for="all" class="ml-2">All</label>
	            	</div>
	            	<div class="flex flex-row">
	            		<input id="admin" type="radio" value="admin" v-model="role">
	            		<label for="admin" class="ml-2">Admin</label>
	            	</div>
	            	<div class="flex flex-row">
	            		<input id="moderator" type="radio" value="moderator" v-model="role">
	            		<label for="moderator" class="ml-2">Moderator</label>
	            	</div>
	            	<div class="flex flex-row">
	            		<input id="manager" type="radio" value="manager" v-model="role">
	            		<label for="manager" class="ml-2">Manager</label>
	            	</div>
	            	<div class="flex flex-row">
	            		<input id="client" type="radio" value="client" v-model="role">
	            		<label for="client" class="ml-2">Client</label>
	            	</div>
	            </div>
	            <div class="flex flex-col">
	            	<div class="flex flex-row">
	            		<input id="email" type="radio" :value="true" v-model="email">
	            		<label for="email" class="ml-2">Email</label>
	            	</div>
	            	<div class="flex flex-row">
	            		<input id="name" type="radio" :value="false" v-model="email">
	            		<label for="name" class="ml-2">Name</label>
	            	</div>
	            </div>
			</div>

            <Link v-for="user in filteredUsers" :key="user.id" :href="route('dashboard.user.show', user.id)" :class="route().current('dashboard.user.show', user.id) ? 'bg-gray-100' : ''" class="flex flex-row p-4 border-b border-gray-200 group hover:bg-gray-100 transition cursor-pointer">
                <img class="h-14 w-14 rounded-full mr-4" :src="user.image.xs" alt="">
                <div class="flex flex-col">
                    <div class="text-lg font-medium text-gray-600 group-hover:text-gray-800 transition">{{ user.name }}</div>
                    <div class="text-md font-normal text-gray-400 group-hover:text-gray-600 transition">{{ user.email }}</div>
                </div>
            </Link>
        </template>

        <slot />

    </DashboardLayout>

</template>

<script>
import DashboardLayout from '@/Dashboard/Layout.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import { PlusIcon, FilterIcon } from '@heroicons/vue/outline'

export default {
  components: {
      DashboardLayout,
      Link,
      Head,
      PlusIcon,
      FilterIcon
    },
    props: {
        users: Array,
    },
    data() {
        return {
            search: '',
            filter: false,
            role: 'all',
            email: true,
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
    	}
    },
    methods: {
        //
    },
    created() {
        //
    }
}
</script>