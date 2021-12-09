<template>

    <div v-if="status" class="bg-green py-2 px-6 font-bold rounded-full">
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