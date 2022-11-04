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
                <h5 class="box-title">Application list</h5>
                <div class="action">
                    <a href="" class="btn btn-primary btn-sm p-4">Add Application</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Icon</th>
                        <th>Server Key</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in 5">
                        <td>{{ item }}</td>
                        <td>Test app name</td>
                        <td>
                            <img src="../assets/images/app-icon.png" class="w-20" alt="">
                        </td>
                        <td>Loremipsumdolorsitamet,consecteturadipisicingelit.Doloreesseeum,harum impedit iste iusto </td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-footer"></div>
        </div>
    </AuthenticatedLayout>
</template>
