<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Notification" />

    <AuthenticatedLayout>

        <template #header>
            <h1>Notification</h1>
        </template>

        <div class="applications">
            <div class="max-w-7xl mx-auto p-5 sm:px-6 lg:px-8">
                <div class="bg-white p-4">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>App</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in 10"  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 py-4">
                            <td>#</td>
                            <td>Test app</td>
                            <td>The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                            <td>Malcolm Lockyer</td>
                            <td>1961</td>
                            <td>
                                <div class="flex flex-row gap-3 justify-center items-center">
                                    <a href="" class="text-green-600">Send Notification</a>
                                    <a href="" class="text-red-600">Delete</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
