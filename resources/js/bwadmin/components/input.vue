<template>
    <input
        :class="class"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input">
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
                'text-light-800',
                'dark:text-dark-800',
                'placeholder-light-500',
                'dark:placeholder-dark-500',
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
