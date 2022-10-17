<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

const props = defineProps({
    applications: {
        type: Object,
        default: () => ({})
    },

    notifications: {
        type: Object,
        default: () => ({})
    },
});

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h5>Dashboard</h5>
        </template>

        <div class="app-widgets mb-4" v-if="applications.length">
            <div class="row">
                <div class="col-lg-3" v-for="application in applications">
                    <div class="app-widget">
                        <a href="#">
                            <img v-if="application.icon" :src="'/'+application.icon" alt="">
                            <img v-else src="../assets/images/app-icon.png" alt="">
                            <h4 class="title">{{ application.name }}</h4>
                            <p>{{ application.clients_count }} users</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="box" v-if="notifications.length">
            <div class="box-header">
                <div class="box-title">
                    <h4>Recent Sent Notification</h4>
                </div>
            </div>
            <div class="box-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Application</th>
                        <th>Title</th>
                        <th>Message</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(notification, key) in notifications">
                        <td>{{ key+1 }}</td>
                        <td>{{ notification.application.name }}</td>
                        <td>{{ notification.title }}</td>
                        <td>{{ notification.description }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
