<template>
    <layout>

        <div class="p-4">
            <bw-link :href="route('language', 'en')" :class="{ 'bg-green': locale == 'en', 'bg-light-200 dark:bg-dark-200': locale != 'en' }" class="p-4 mr-4">EN</bw-link>
            <bw-link :href="route('language', 'ru')" :class="{ 'bg-green': locale == 'ru', 'bg-light-200 dark:bg-dark-200': locale != 'ru' }" class="p-4">RU</bw-link>
        </div>

        <div class="w-full max-w-6xl mx-auto h-full flex flex-col justify-center items-center">
            <div class="text-light-600 dark:text-dark-600 text-4xl font-thin mb-4">{{ __('bwai.dashboard.title') }}</div>
            <div class="flex flex-row flex-wrap justify-center">

                <div class="w-80 flex flex-row justify-between bg-light-200 dark:bg-dark-200 p-4 m-2 rounded-lg">
                    <div class="text-lg font-bold text-light-600 dark:text-dark-600 uppercase">{{ __('bwai.dashboard.orders') }}</div>
                    <div class="text-lg font-bold text-green uppercase">1</div>
                </div>
                <div class="w-80 flex flex-row justify-between bg-light-200 dark:bg-dark-200 p-4 m-2 rounded-lg">
                    <div class="text-lg font-bold text-light-600 dark:text-dark-600 uppercase">{{ __('bwai.dashboard.clients') }}</div>
                    <div class="text-lg font-bold text-aqua uppercase">2</div>
                </div>
                <div class="w-80 flex flex-row justify-between bg-light-200 dark:bg-dark-200 p-4 m-2 rounded-lg">
                    <div class="text-lg font-bold text-light-600 dark:text-dark-600 uppercase">{{ __('bwai.dashboard.mailings') }}</div>
                    <div class="text-lg font-bold text-blue uppercase">3</div>
                </div>
                <div class="w-80 flex flex-row justify-between bg-light-200 dark:bg-dark-200 p-4 m-2 rounded-lg">
                    <div class="text-lg font-bold text-light-600 dark:text-dark-600 uppercase">{{ __('bwai.dashboard.email') }}</div>
                    <div class="text-lg font-bold text-purple uppercase">4</div>
                </div>
                <div class="w-80 flex flex-row justify-between bg-light-200 dark:bg-dark-200 p-4 m-2 rounded-lg">
                    <div class="text-lg font-bold text-light-600 dark:text-dark-600 uppercase">{{ __('bwai.dashboard.balance') }}</div>
                    <div class="text-lg font-bold text-red uppercase">5</div>
                </div>
                <div class="w-80 flex flex-row justify-between bg-light-200 dark:bg-dark-200 p-4 m-2 rounded-lg">
                    <div class="text-lg font-bold text-light-600 dark:text-dark-600 uppercase">{{ __('bwai.dashboard.accounts') }}</div>
                    <div class="text-lg font-bold text-orange uppercase">6</div>
                </div>

            </div>
        </div>
        
    </layout>
</template>

<script>
import { computed } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'

export default {
    setup() {
        const locale = computed(() => usePage().props.value.locale)
        const language = computed(() => usePage().props.value.language)
        return { locale, language }
    }
}
</script>