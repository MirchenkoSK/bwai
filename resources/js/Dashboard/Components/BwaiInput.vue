<template>

    <template v-if="type == 'text'">
    	<div class="flex flex-col w-full mb-4">
            <label :for="for" :class="{ 'text-red-600': error, 'text-gray-400': !error }" class="text-sm font-medium">{{ label }}</label>
            <input :id="for" type="text" :class="{ 'border-red-500 focus:ring-red-500': error, 'border-gray-300 focus:ring-gray-500': !error }" class="w-full border-2 border-gray-300 rounded focus:outline-none focus:ring-2 focus:border-transparent" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" :placeholder="placeholder">
        </div>
    </template>

    <template v-if="type == 'textarea'">
        <div class="flex flex-col w-full mb-4">
            <label :for="for" :class="{ 'text-red-600': error, 'text-gray-400': !error }" class="text-sm font-medium">{{ label }}</label>
            <textarea id="for" rows="6" :class="{ 'border-red-500 focus:ring-red-500': error, 'border-gray-300 focus:ring-gray-500': !error }" class="w-full border-2 border-gray-300 rounded focus:outline-none focus:ring-2 focus:border-transparent" @input="$emit('update:modelValue', $event.target.value)" :placeholder="placeholder">{{ modelValue }}</textarea>
        </div>
    </template>

    <template v-if="type == 'checkbox'">
        <div class="flex flex-row w-full mb-4">
            <input :id="for" type="checkbox" class="" :value="modelValue" :checked="modelValue" @change="$emit('update:modelValue', !modelValue)">
            <label :for="for" :class="{ 'text-red-600': error, 'text-gray-400': !error }" class="text-sm font-medium ml-2">{{ label }}</label>
        </div>
    </template>

</template>

<script>
export default {

    props: ['type', 'for', 'label', 'placeholder', 'error', 'modelValue'],

    emits: ['update:modelValue'],

    methods: {
        focus() {
            this.$refs.input.focus()
        }
    }

}
</script>