<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h5>Dashboard</h5>
        </template>

        <div class="app-widgets mb-4">
            <div class="row">
                <div class="col-lg-3">
                    <div class="app-widget">
                        <a href="#">
                            <img src="../assets/images/app-icon.png" alt="">
                            <h4 class="title">Test app name</h4>
                            <p>30 users</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="app-widget">
                        <a href="#">
                            <img src="../assets/images/app-icon.png" alt="">
                            <h4 class="title">Test app name</h4>
                            <p>30 users</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="app-widget">
                        <a href="#">
                            <img src="../assets/images/app-icon.png" alt="">
                            <h4 class="title">Test app name</h4>
                            <p>30 users</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="app-widget">
                        <a href="#">
                            <img src="../assets/images/app-icon.png" alt="">
                            <h4 class="title">Test app name</h4>
                            <p>30 users</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="box">
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
                        <th>Description</th>
                        <th>Created at</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in 6">
                        <td>
                            {{ item }}
                        </td>
                        <td>Test App</td>
                        <td>Lorem ipsum dolor sit amet.</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum, obcaecati.</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
