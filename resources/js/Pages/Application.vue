<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Applications" />

    <AuthenticatedLayout>

        <div class="applications">
            <div class="max-w-7xl mx-auto p-5 sm:px-6 lg:px-8">
                <div class="grid gap-4 sm:grid-cols-4 lg:grid-cols-5">
                    <div class="application bg-slate-50 p-4" v-for="item in 8">
                        <h5 class="font-bold  text-lg">Some content</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>

                    <div class="application">
                        <a href="" class="bg-purple-200 px-4 py-12 text-center flex flex-wrap justify-center items-center hover:bg-purple-600 hover:text-blue-50 text-lg font-bold">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
