<template>
    <Head title="Dashboard Index" />

    <DashboardLayout>
        

        <p class="text-groovbox-red-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, provident ex? Sapiente illum odit unde? Quibusdam, possimus. Magni obcaecati explicabo sapiente quo, aperiam, eaque vero, fuga hic atque facilis expedita.</p>
        <p class="text-groovbox-red">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, provident ex? Sapiente illum odit unde? Quibusdam, possimus. Magni obcaecati explicabo sapiente quo, aperiam, eaque vero, fuga hic atque facilis expedita.</p>
        <p class="text-groovbox-red-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, provident ex? Sapiente illum odit unde? Quibusdam, possimus. Magni obcaecati explicabo sapiente quo, aperiam, eaque vero, fuga hic atque facilis expedita.</p>
        
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