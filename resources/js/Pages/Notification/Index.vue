<template>
    <Head title="List of notifications" />

    <AuthenticatedLayout>
        <template #header>
            <h5>Notifications Lists</h5>
        </template>

        <div class="box">
            <div class="box-header">
                <h5 class="box-title">Table list</h5>
                <div class="action">
                    <Link :href="route('notification.create')" class="btn btn-sm btn-rounded btn-outline-primary"><i class="bx bx-bell-plus"></i></Link>
                </div>
            </div>
            <div class="box-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Application</th>
                        <th>Title</th>
                        <th>Message</th>
                        <th>Created At</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(notification, key) in notifications.data">
                        <td>{{ notifications.from+key }}</td>
                        <td>{{ notification.application.name }}</td>
                        <td>{{ notification.title }}</td>
                        <td>{{ notification.description }}</td>
                        <td>{{ notification.created_at }}</td>
                        <td>
                            <div class="action">
                                <ul>
                                    <li>
                                        <Link :href="route('notification.edit', notification.id)" class="btn btn-sm btn-rounded btn-outline-warning"><i class="bx bx-edit"></i></Link>
                                    </li>
                                    <li>
                                        <button @click="deleteAction(notification.id)" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <Pagination :data="notifications" />
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link , useForm} from '@inertiajs/inertia-vue3';

    import Pagination from "@/Components/Pagination.vue";

    const props = defineProps({
        notifications: {
            type: Object,
            default: () => ({})
        }
    });

    const form = useForm();

    function deleteAction(notificationId) {
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
                form.delete(route('notification.delete', notificationId))
            }
        })
    }
</script>