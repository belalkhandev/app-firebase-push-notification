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

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-slate-50 text-center pb-4 pt-4">
                    <h5>App Name</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-slate-50 text-center pb-4 pt-4">
                    <h5>App Name</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-slate-50 text-center pb-4 pt-4">
                    <h5>App Name</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-slate-50 text-center pb-4 pt-4">
                    <h5>App Name</h5>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="box-header">
                <div class="box-title">
                    <h4>Notification List</h4>
                </div>
                <div class="box-action">
                    <ul>
                        <li>
                            <a href="" class="btn btn-rounded btn-sm btn-outline-primary">
                                <i class="bx bx-search-alt"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="btn btn-rounded btn-sm btn-outline-warning">
                                <i class="bx bx-filter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="btn btn-rounded btn-sm btn-outline-info">
                                <i class="bx bx-cloud-download"></i>
                            </a>
                        </li>

                    </ul>
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
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in 10">
                        <td>
                            {{ item }}
                        </td>
                        <td>Test App</td>
                        <td>Lorem ipsum dolor sit amet.</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum, obcaecati.</td>
                        <td></td>
                        <td>
                            <div class="action">
                                <ul>
                                    <li>
                                        <a href="" class="btn btn-sm btn-rounded btn-outline-success"><i class="bx bx-show-alt"></i></a>
                                    </li>
                                    <li>
                                        <a href="" class="btn btn-sm btn-rounded btn-outline-warning"><i class="bx bx-edit"></i></a>
                                    </li>
                                    <li>
                                        <a href="" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
