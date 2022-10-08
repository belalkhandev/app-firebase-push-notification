<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Applications" />

    <AuthenticatedLayout>

        <template #header>
            <h5>Application</h5>
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
                        <th>UID</th>
                        <th>Icon</th>
                        <th>Application</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in 5">
                        <td>{{ item }}</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                        <td>
                            <img src="../assets/images/app-icon.png" class="w-12" alt="">
                        </td>
                        <td>Test</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-footer"></div>
        </div>
    </AuthenticatedLayout>
</template>
