<template>
    <label :class="{ 'text-red': error, 'text-light-700 dark:text-dark-700': !error }" class="text-sm font-medium">
    	<slot />
    </label>
</template>

<script>
export default {
    props: {
        error: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        focus() {
            this.$refs.input.focus()
        }
    }
}
</script>
