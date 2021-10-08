<template>
    <Head title="Dashboard" />

    <div class="w-full h-screen flex flex-row">

        <!-- First Panel -->
        <div class="w-1/5 flex flex-col p-4 bg-gray-200">

            <Link :href="route('site.index')" class="mb-4 flex justify-center">
                <!-- <ApplicationLogo class="block h-12 w-auto" /> -->
                <div class="py-4 text-4xl font-bold tracking-tighter text-gray-700">bwadmin</div>
            </Link>

            <div class="flex flex-col flex-auto mb-4">

                <Link :href="route('dashboard.index')" :class="route().current('dashboard.index') ? 'bg-gray-300' : 'hover:bg-gray-300 transition cursor-pointer'" class="flex flex-row items-center p-3 rounded-lg mb-1 group">
                    <HomeIcon :class="route().current('dashboard.index') ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500 transition'" class="h-8 w-8 mr-3"/>
                    <div :class="route().current('dashboard.index') ? 'text-gray-700' : 'text-gray-500 group-hover:text-gray-700 transition'" class="text-lg font-medium">Dashboard</div>
                </Link>

                <Link :href="route('dashboard.page.index')" :class="route().current('dashboard.page.index') ? 'bg-gray-300' : 'hover:bg-gray-300 transition cursor-pointer'" class="flex flex-row items-center p-3 rounded-lg mb-1 group">
                    <AnnotationIcon :class="route().current('dashboard.page.index') ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500 transition'" class="h-8 w-8 mr-3"/>
                    <div :class="route().current('dashboard.page.index') ? 'text-gray-700' : 'text-gray-500 group-hover:text-gray-700 transition'" class="text-lg font-medium">Pages</div>
                </Link>

                <Link href="#!" :class="false ? 'bg-gray-300' : 'hover:bg-gray-300 transition cursor-pointer'" class="flex flex-row items-center p-3 rounded-lg mb-1 group">
                    <UserGroupIcon :class="false ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500 transition'" class="h-8 w-8 mr-3"/>
                    <div :class="false ? 'text-gray-700' : 'text-gray-500 group-hover:text-gray-700 transition'" class="text-lg font-medium">Users</div>
                </Link>

                <Link href="#!" :class="false ? 'bg-gray-300' : 'hover:bg-gray-300 transition cursor-pointer'" class="flex flex-row items-center p-3 rounded-lg mb-1 group">
                    <CogIcon :class="false ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500 transition'" class="h-8 w-8 mr-3"/>
                    <div :class="false ? 'text-gray-700' : 'text-gray-500 group-hover:text-gray-700 transition'" class="text-lg font-medium">Settings</div>
                </Link>

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
        <div class="w-1/5 flex flex-col border-r border-gray-200" v-if="$slots.panel">

            <!-- <div class="flex flex-row justify-between items-center p-4 border-b border-gray-200">
                <div class="text-lg font-medium text-gray-600">3 users</div>
                <div class="bg-gray-200 p-3 rounded text-gray-500 hover:bg-gray-300 hover:text-gray-600 transition cursor-pointer">
                    <PlusIcon class="h-4 w-4"/>
                </div>
            </div>

            <div class="flex flex-row p-4 border-b border-gray-200 group hover:bg-gray-100 transition cursor-pointer">
                <img class="h-14 w-14 rounded-full mr-4" src="http://localhost/img/avatar.png" alt="">
                <div class="flex flex-col">
                    <div class="text-lg font-medium text-gray-600 group-hover:text-gray-800 transition">The Shrike</div>
                    <div class="text-md font-normal text-gray-400 group-hover:text-gray-600 transition">the.shrike@wolframium.net</div>
                </div>
            </div>

            <div class="flex flex-row p-4 border-b border-gray-200 bg-gray-100 cursor-pointer">
                <img class="h-14 w-14 rounded-full mr-4" src="http://localhost/img/avatar.png" alt="">
                <div class="flex flex-col">
                    <div class="text-lg font-medium text-gray-800">The Shrike</div>
                    <div class="text-md font-normal text-gray-600">the.shrike@wolframium.net</div>
                </div>
            </div>

            <div class="flex flex-row p-4 border-b border-gray-200 group hover:bg-gray-100 transition cursor-pointer">
                <img class="h-14 w-14 rounded-full mr-4" src="http://localhost/img/avatar.png" alt="">
                <div class="flex flex-col">
                    <div class="text-lg font-medium text-gray-600 group-hover:text-gray-800 transition">The Shrike</div>
                    <div class="text-md font-normal text-gray-400 group-hover:text-gray-600 transition">the.shrike@wolframium.net</div>
                </div>
            </div> -->

            <slot name="panel" />

        </div>

        <!-- Content Panel -->
        <div class="w-3/5 flex flex-row flex-wrap content-start p-4">

            <!-- <div class="w-full flex flex-row justify-between items-center bg-green-500 mb-4 p-4 rounded-lg">
                <div class="text-white">Magnam ratione sequi impedit veritatis expedita aliquam?</div>
                <XIcon class="h-4 w-4 text-white"/>
            </div>

            <div class="flex flex-col w-1/3 pr-4 mb-4">
                <label for="" class="text-sm font-normal text-gray-500">First Name</label>
                <input type="text" class="w-full border-2 border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent" placeholder="Bernhard">
            </div>

            <div class="flex flex-col w-1/3 pr-4 mb-4">
                <label for="" class="text-sm font-normal text-gray-500">Last Name</label>
                <input type="text" class="w-full border-2 border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent" placeholder="Wilson">
            </div>

            <div class="flex flex-col w-1/3 mb-4">
                <label for="" class="text-sm font-normal text-gray-500">Email</label>
                <input type="text" class="w-full border-2 border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent" placeholder="example@gmail.com">
            </div>

            <div class="flex flex-row w-full justify-end mb-4">
                <div class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition cursor-pointer">Save</div>
            </div> -->

            <slot />

        </div>

    </div>



</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import { HomeIcon, UserGroupIcon, AnnotationIcon, CogIcon,  PlusIcon, XIcon } from '@heroicons/vue/outline'

export default {
  components: {
      HomeIcon,
      UserGroupIcon,
      AnnotationIcon,
      CogIcon,
      PlusIcon,
      XIcon,
      Link,
    }
}
</script>