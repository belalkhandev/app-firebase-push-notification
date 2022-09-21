import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

import 'bootstrap'
import 'boxicons'
import 'boxicons/css/boxicons.min.css'
import 'bootstrap/dist/css/bootstrap.min.css'
import '../css/app.css';
import './assets/style.css';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Notifier';

const cleanApp = () => {
    document.getElementById('app').removeAttribute('data-page')
}

document.addEventListener('inertia:finish', cleanApp)

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {

        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
}).then(cleanApp);

InertiaProgress.init({ color: '#4B5563' });
