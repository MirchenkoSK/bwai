<template>

	<div class="flex flex-col sm:flex-row mb-2 items-center">
	    <div class="w-full sm:w-1/5 text-left sm:text-right uppercase text-xs font-bold text-light-600 dark:text-dark-600">{{ name }}</div>
		<div class="w-full sm:w-4/5 pl-4 text-light-900 dark:text-dark-900">
			<slot />
		</div>
	</div>

</template>

<script>

export default {
    props: ['name'],
}
</script>