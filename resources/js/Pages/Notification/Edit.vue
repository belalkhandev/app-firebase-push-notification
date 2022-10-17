<template>
    <Head title="Edit notifications" />

    <AuthenticatedLayout>
        <template #header>
            <h5>Create Notifications</h5>
        </template>

        <div class="row">
            <div class="col-lg-7">
                <div class="box">
                    <div class="box-header">
                        <h5 class="box-title">Creaate Notifications</h5>
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
    import { Head } from '@inertiajs/inertia-vue3';
</script>
