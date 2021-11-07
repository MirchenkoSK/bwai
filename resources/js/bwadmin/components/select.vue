<template>
    <select
        :class="class"
        :value="modelValue"
        @change="$emit('update:modelValue', $event.target.value)"
        ref="input">
        	<slot />
    </select>
</template>

<script>
export default {
    props: ['modelValue'],
    emits: ['update:modelValue'],
    data() {
        return {
            class: [
                'bg-light-200',
                'dark:bg-dark-200',
                'border-t-0',
                'border-r-0',
                'border-l-0',
                'border-b-2',
                'border-light-400',
                'dark:border-dark-400',
                'hover:border-light-600',
                'dark:hover:border-dark-600',
                'focus:border-blue',
                'dark:focus:border-blue',
                'focus:ring',
                'focus:ring-transparent',
                'rounded-md',
                'shadow-sm',
                'transition',
            ]
        }
    },
    computed: {},
    methods: {
        focus() {
            this.$refs.input.focus()
        }
    }
}
</script>
