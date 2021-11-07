<template>

    <ChevronRightIcon v-if="!isFirst" class="w-4 h-4 mx-2 text-light-500 dark:text-dark-500" />
	<Link v-if="isLink" :href="url" class="text-light-500 dark:text-dark-500 hover:text-light-600 dark:hover:text-dark-600 transition">
		<slot />
	</Link>
	<div v-else class="text-light-700 dark:text-dark-700">
		<slot />
	</div>

</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import { ChevronRightIcon } from '@heroicons/vue/outline'

export default {
    components: {
    	Link,
    	ChevronRightIcon
    },
    props: {
    	url: {
            type: String,
            default: '',
        },
    },
    computed: {
    	isFirst() {
    		return this.url == route('dashboard.index')
    	},
    	isLink() {
    		return this.url != ''
    	}
    }
}
</script>