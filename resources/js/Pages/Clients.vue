<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

const props = defineProps({
    clients: {
        type: Object,
        default: () => ({})
    }
})

</script>

<template>
    <Head title="Clients list" />

    <AuthenticatedLayout>

        <template #header>
            <h5>All Clients: {{ clients.total }}</h5>
        </template>

        <div class="box">
            <div class="box-header">
                <h5 class="box-title">Client list</h5>
            </div>
            <div class="box-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Application</th>
                        <th>UID</th>
                        <th>Timezone</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(client, key) in clients.data">
                        <td>{{ clients.from + key }}</td>
                        <td>{{ client.application.name }}</td>
                        <td>{{ client.uid }}</td>
                        <td>{{ client.timezone ? client.timezone.timezone : '-' }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-footer"></div>
        </div>
    </AuthenticatedLayout>
</template>
