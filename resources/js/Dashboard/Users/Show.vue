<template>
    <Head title="Dashboard" />

    <PageLayout :users="users">

    	<div class="w-full flex flex-col">
    		
	    	<div class="flex text-3xl font-bold text-gray-700 mb-8">{{ user.name }}</div>

			<table class="table-auto mb-8">
				<tbody>
					<tr>
						<td class="w-1/2 p-2 text-right border font-bold text-gray-500">Name</td>
						<td class="w-1/2 p-2 border">{{ user.name }}</td>
					</tr>
					<tr>
						<td class="w-1/2 p-2 text-right border font-bold text-gray-500">Email</td>
						<td class="w-1/2 p-2 border">{{ user.email }}</td>
					</tr>
					<tr>
						<td class="w-1/2 p-2 text-right border font-bold text-gray-500">Role</td>
						<td class="w-1/2 p-2 border">
							
							<form v-if="user.role.name != 'root' && user.role.name != 'admin'" class="flex flex-row flex-auto" @submit.prevent="submit">
								<select v-model="form.role" class="flex-grow border-2 border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent">
									<option v-for="role in roles" :key="role.id" :value="role">{{ role.display_name }}</option>
								</select>
								<button v-if="user.role.id != form.role.id" type="submit" class="bg-green-500 text-white ml-2 px-8 py-2 rounded hover:bg-green-600 transition cursor-pointer">Save</button>
							</form>

							<template v-else>{{ user.role.name }}</template>

						</td>
					</tr>
					<tr>
						<td class="w-1/2 p-2 text-right border font-bold text-gray-500">Created</td>
						<td class="w-1/2 p-2 border">{{ user.created_at }}</td>
					</tr>
				</tbody>
			</table>

    	</div>


    </PageLayout>

</template>

<script>
import PageLayout from '@/Dashboard/Users/Index.vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'
import BwaiInput from '@/Dashboard/Components/BwaiInput'

export default {
  components: {
      PageLayout,
      Link,
      Head,
      BwaiInput,
    },
    props: {
        roles: Array,
        users: Array,
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
    },
    created() {
        this.form.role = this.user.role
    }
}
</script>