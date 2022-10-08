<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Create Application" />

    <AuthenticatedLayout>

        <template #header>
            <h5>Add New Application</h5>
        </template>

        <div class="box">
            <div class="box-header">
                <h5 class="box-title">Add Application</h5>
                <div class="action">
                    <Link :href="route('application.list')" class="btn btn-dark text-xs btn-sm p-3">Application List</Link>
                </div>
            </div>
            <form action="">
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" v-model="title" placeholder="Enter application title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="" placeholder="Application description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Firebase server key <span>*</span></label>
                                <textarea name="" placeholder="Application description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Application Icon</label><br>
                                <input type="file" name="" id="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer"></div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
