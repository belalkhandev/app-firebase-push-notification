<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Notification" />

    <AuthenticatedLayout>
        <template #header>
            <h5>Notification</h5>
        </template>

        <div class="box">
            <div class="box-header">
                <h5 class="box-title">Table list</h5>
            </div>
            <div class="box-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>One</th>
                        <th>Two</th>
                        <th>Three</th>
                        <th>Four</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in 10">
                        <td>Data</td>
                        <td>Data</td>
                        <td>Data</td>
                        <td>Data</td>
                        <td>Data</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
