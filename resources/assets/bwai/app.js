require('./bootstrap')

import { createApp, h } from 'vue';
import { createInertiaApp, Link } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import { breadcrumb, button, color, input, label, select, textarea } from './ui'
import layout from './layout'

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'BWAI'

createInertiaApp({
    title: (title) => `${title}`,
    resolve: (name) => require(`./${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .component('layout', layout)
            .component('bw-link', Link)
            .component('bw-breadcrumb', breadcrumb)
            .component('bw-button', button)
            .component('bw-color', color)
            .component('bw-input', input)
            .component('bw-label', label)
            .component('bw-select', select)
            .component('bw-textarea', textarea)
            .mixin({ methods: { route } })
            .mixin(require('./translation'))
            .mount(el);
    },
})

InertiaProgress.init({
    color: '#0088cc'
})
