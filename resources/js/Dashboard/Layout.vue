<template>

    <div class="w-full h-screen flex flex-row">

        <!-- First Panel -->
        <div class="w-80 min-w-80 flex flex-col p-4 bg-gray-200">

            <Link :href="route('dashboard.index')" class="mb-4 flex justify-center">
                <div class="py-4 text-4xl font-bold tracking-tighter text-gray-700">bwadmin</div>
            </Link>

            <div class="flex flex-col flex-auto mb-4">

                <MenuItem v-for="(menuItem, k) in menuItems" :key="k" :href="menuItem.url" :active="menuItem.active" :icon="menuItem.icon">{{ menuItem.name }}</MenuItem>

            </div>

            <div class="flex flex-row border-t border-gray-300 p-4 -m-4 hover:bg-gray-300 transition cursor-pointer">
                <img class="h-14 w-14 rounded-full mr-4" src="http://localhost/img/avatar.png" alt="">
                <div class="flex flex-col">
                    <div class="text-lg font-medium text-gray-700">{{ user.name }}</div>
                    <div class="text-md font-normal text-gray-500">View profile</div>
                </div>
            </div>

        </div>

        <!-- Two Panel -->
        <div class="w-120 min-w-120 flex flex-col border-r border-gray-200 overflow-auto" v-if="$slots.panel">
            <slot name="panel" />
        </div>

        <!-- Content Panel -->
        <div class="w-auto flex flex-row flex-wrap flex-auto content-start p-4 overflow-auto">
            <slot />
        </div>

    </div>

    <FlashMessage v-if="$page.props.flash.message" :message="$page.props.flash.message" :status="flashStatus" />

</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import { HomeIcon, UserGroupIcon, AnnotationIcon, CogIcon, LoginIcon } from '@heroicons/vue/outline'
import MenuItem from '@/Dashboard/Components/MenuItem.vue'
import FlashMessage from '@/Dashboard/Components/FlashMessage.vue'

export default {
  components: {
      HomeIcon,
      UserGroupIcon,
      AnnotationIcon,
      CogIcon,
      LoginIcon,
      Link,
      MenuItem,
      FlashMessage,
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
                    active: route().current('dashboard.page.index') || route().current('dashboard.page.show') || route().current('dashboard.page.create'),
                    icon: AnnotationIcon,
                },
                {
                    name: 'Users',
                    url: route('dashboard.user.index'),
                    active: route().current('dashboard.user.index') || route().current('dashboard.user.show'),
                    icon: UserGroupIcon,
                },
                {
                    name: 'Settings',
                    url: '#!',
                    active: false,
                    icon: CogIcon,
                },
                {
                    name: 'Back To Site',
                    url: route('site.index'),
                    active: false,
                    icon: LoginIcon,
                },
            ],
            flashStatus: false
        }
    },
    watch: {
        '$page.props.flash.message': {
            handler() {
                this.flashStatus = true
                setTimeout(this.showMessage, 5000)
            },
            deep: true,
        }
    },
    computed: {
        user() {
            return this.$page.props.auth.user
        }
    },
    methods: {
        showMessage() {
            this.flashStatus = false
        }
    },
    created() {
        if (this.$page.props.flash.message) {
            this.flashStatus = true
            setTimeout(this.showMessage, 5000)
        }
    }
}
</script>