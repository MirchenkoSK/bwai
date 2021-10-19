<template>

    <div class="w-full h-screen flex flex-row">

        <!-- First Panel -->
        <div class="w-80 min-w-80 flex flex-col p-4 bg-gray-200">

            <Link :href="route('site.index')" class="mb-4 flex justify-center">
                <!-- <ApplicationLogo class="block h-12 w-auto" /> -->
                <div class="py-4 text-4xl font-bold tracking-tighter text-gray-700">bwadmin</div>
            </Link>

            <div class="flex flex-col flex-auto mb-4">

                <MenuItem v-for="(menuItem, k) in menuItems" :key="k" :href="menuItem.url" :active="menuItem.active" :icon="menuItem.icon">{{ menuItem.name }}</MenuItem>

            </div>

            <div class="flex flex-row border-t border-gray-300 p-4 -m-4 hover:bg-gray-300 transition cursor-pointer">
                <img class="h-14 w-14 rounded-full mr-4" src="http://localhost/img/avatar.png" alt="">
                <div class="flex flex-col">
                    <div class="text-lg font-medium text-gray-700">Bernhard Wilson</div>
                    <div class="text-md font-normal text-gray-500">View profile</div>
                </div>
            </div>

        </div>

        <!-- Two Panel -->
        <div class="w-120 min-w-120 flex flex-col border-r border-gray-200" v-if="$slots.panel">
            <slot name="panel" />
        </div>

        <!-- Content Panel -->
        <div class="w-auto flex flex-row flex-wrap flex-auto content-start p-4">

            <div v-if="$page.props.flash.message" class="w-full flex flex-row justify-between items-center bg-green-500 mb-4 p-4 rounded-lg">
                <div class="text-white">{{ $page.props.flash.message }}</div>
            </div>

            <slot />
        </div>

    </div>

</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import { HomeIcon, UserGroupIcon, AnnotationIcon, CogIcon, PlusIcon, XIcon } from '@heroicons/vue/outline'
import MenuItem from '@/Dashboard/Components/MenuItem.vue'

export default {
  components: {
      HomeIcon,
      UserGroupIcon,
      AnnotationIcon,
      CogIcon,
      PlusIcon,
      XIcon,
      Link,
      MenuItem,
    },
    data() {
        return {
            menuItems: [
                {
                    name: 'Dashboard',
                    url: route('dashboard.index'),
                    active: route().current('dashboard.index'),
                    icon: HomeIcon,
                },
                {
                    name: 'Pages',
                    url: route('dashboard.page.index'),
                    active: route().current('dashboard.page.index'),
                    icon: AnnotationIcon,
                },
                {
                    name: 'Users',
                    url: '#!',
                    active: false,
                    icon: UserGroupIcon,
                },
                {
                    name: 'Settings',
                    url: '#!',
                    active: false,
                    icon: CogIcon,
                },
            ],
        }
    },
}
</script>