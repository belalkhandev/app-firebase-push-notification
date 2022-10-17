<template>
    <Head title="Create new notifications" />

    <AuthenticatedLayout>
        <template #header>
            <h5>Create Notifications</h5>
        </template>

        <div class="row">
            <div class="col-lg-7">
                <div class="box">
                    <div class="box-header">
                        <h5 class="box-title">Create Notifications</h5>
                        <div class="action">
                            <Link :href="route('notification.list')" class="btn btn-sm btn-rounded btn-outline-success"><i class="bx bx-bell"></i></Link>
                        </div>
                    </div>
                    <div class="box-body">

                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link } from '@inertiajs/inertia-vue3';
</script>
