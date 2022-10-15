import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import Swal from 'sweetalert2'

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

window.Swal = Swal;
window.Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: false,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

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
