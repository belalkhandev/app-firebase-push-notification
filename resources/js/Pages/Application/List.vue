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
                    <Link :href="route('application.create')" class="btn btn-sm btn-rounded btn-outline-primary"><i class="bx bx-plus"></i></Link>
                </div>
            </div>
            <div class="box-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Ref</th>
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Clients</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="application in applications.data">
                        <td>{{ application.ref }}</td>
                        <td><img :src="application.icon" class="w-12" alt=""></td>
                        <td>{{ application.name }}</td>
                        <td>{{ application.description }}</td>
                        <td>{{ application.clients_count }}</td>
                        <td>
                            <span v-if="application.is_active" class="btn btn-sm btn-success">Active</span>
                            <span v-else class="btn btn-sm btn-danger">Inactive</span>
                        </td>
                        <td>
                            <div class="action">
                                <ul>
                                    <li>
                                        <Link :href="route('application.edit', application.id)" class="btn btn-sm btn-rounded btn-outline-warning"><i class="bx bx-edit"></i></Link>
                                    </li>
                                    <li>
                                        <button @click="deleteAction(application.id)" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <Pagination :data="applications" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
    applications: {
        type: Object,
        default: () => ({})
    }
});

const form = useForm();

function deleteAction(applicationId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#6d28d9',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            form.delete(route('application.delete', applicationId), {
                preserveScroll: true,
                    onSuccess: () => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Deleted successfully'
                    });
                }
            })
        }
    })
}
</script>
