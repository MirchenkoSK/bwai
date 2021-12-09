<template>
    <input
    	:id="id"
        :class="color"
        :value="modelValue"
        type="color"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input">
    <input
        :class="class"
        :value="modelValue"
        :id="placeholder"
        :type="type"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input">
</template>

<script>
export default {
    props: ['id','modelValue','type','placeholder'],
    emits: ['update:modelValue'],
    data() {
        return {
            color: [
            	'w-12',
            	'h-12',
            	'p-1',
                'bg-light-200',
                'border-2',
                'border-light-200',
                'hover:border-transparent',
                'dark:hover:border-dark-600',
                'focus:border-transparent',
                'focus:ring',
                'focus:ring-transparent',
                'rounded-l-lg'
            ],
            class: [
            	'w-20',
            	'h-12',
            	'p-0',
            	'mr-4',
                'bg-light-200',
                'border-2',
                'border-light-200',
                'hover:border-transparent',
                'dark:hover:border-dark-600',
                'focus:border-transparent',
                'focus:ring',
                'focus:ring-transparent',
                'rounded-r-lg'
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
