<template>
    <Head title="Dashboard Index" />

    <DashboardLayout>
        <template #panel>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div>
            
        </div>
    </DashboardLayout>

</template>

<script>
import DashboardLayout from '@/Dashboard/Layout.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import { HomeIcon, UserGroupIcon, AnnotationIcon, CogIcon,  PlusIcon, XIcon } from '@heroicons/vue/outline'

export default {
  components: {
      HomeIcon,
      UserGroupIcon,
      AnnotationIcon,
      CogIcon,
      PlusIcon,
      XIcon,
      DashboardLayout,
      Link,
      Head,
    }
}
</script>