<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-light-900 dark:bg-dark-900 border border-transparent rounded-md font-semibold text-xs text-white dark:text-black uppercase tracking-widest hover:bg-light-800 active:bg-light-800 focus:border-light-900 dark:hover:bg-dark-800 dark:active:bg-dark-900 dark:focus:border-dark-900 focus:outline-none focus:shadow-outline-gray transition ease-in-out duration-150">
        <slot />
    </button>
</template>

<script>
export default {
    props: {
        type: {
            type: String,
            default: 'submit',
        },
    }
}
</script>
