<template>
    <label class="block font-medium text-sm text-light-700 dark:text-dark-700">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>

<script>
export default {
    props: ['value']
}
</script>
