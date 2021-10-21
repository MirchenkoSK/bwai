<template>

    <div v-if="status" class="absolute top-4 right-6 bg-green-500 py-4 px-6 opacity-80 rounded-lg">
        <div class="text-white">{{ message }}</div>
    </div>

</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: { Link },
    props: [ 'message', 'status' ],
}
</script>