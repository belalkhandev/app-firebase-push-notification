<template>
    <Head title="Notification Details" />

    <AuthenticatedLayout>
        <template #header>
            <h5>Notification Details</h5>
        </template>

        <div class="row">
            <div class="col-lg-6">
                <div class="box">
                    <div class="box-header">
                        <h5 class="box-title">Show Notification</h5>
                        <div class="action">
                            <Link :href="route('notification.list')" class="btn btn-sm btn-rounded btn-outline-success"><i class="bx bx-bell"></i></Link>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-borderless">
                            <tobdy>
                                <tr>
                                    <th>Title</th>
                                    <td>{{ notification.title }}</td>
                                </tr>
                                <tr>
                                    <th>Message</th>
                                    <td>{{ notification.description }}</td>
                                </tr>
                                <tr>
                                    <th>Activity</th>
                                    <td>{{ notification.activity ?? 'No activity' }}</td>
                                </tr>
                                <tr>
                                    <th>Application</th>
                                    <td>{{ notification.application.name }}</td>
                                </tr>
                                <tr>
                                    <th>Timezone</th>
                                    <td>{{ notification.timezone.timezone }}</td>
                                </tr>
                                <tr>
                                    <th>Users</th>
                                    <td>{{ notification.users }}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <img v-if="notification.image" :src="'/'+notification.image" alt="" class="img-thumbnail w-60">
                                    </td>
                                </tr>
                            </tobdy>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="box">
                    <div class="box-header">
                        <h5 class="box-title">Notification Report</h5>
                    </div>
                    <div class="box-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Users</th>
                                <th>Success</th>
                                <th>Failure</th>
                            </tr>
                            </thead>
                            <tbody v-if="notification.reports.length">
                            <tr v-for="report in notification.reports">
                                <td>{{ moment(report.created_at).format('DD-MM-YYYY')}}</td>
                                <td>{{ report.users }}</td>
                                <td>{{ report.success }}</td>
                                <td>{{ report.failure }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import moment from "moment";

    const props = defineProps({
        notification: {
            type: Object,
            default: () => ({})
        }
    });
</script>
