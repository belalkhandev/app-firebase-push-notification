<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/inertia-vue3';
import Pagination from "@/Components/Pagination.vue";
import { Link }  from '@inertiajs/inertia-vue3';

const props = defineProps({
    timezones: {
        type: Object,
        default: () => ({})
    }
})

const form = useForm();

const submit = () => {
    form.post(route('timezone.store'), {
        preserveScroll: true,
        onSuccess: () => {
            Toast.fire({
                icon: 'success',
                title: 'Stored successfully'
            });
        }
    });
};

function deleteTimezone(timezoneId) {
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
            form.delete(route('timezone.delete', timezoneId))
        }
    })
}

</script>

<template>
    <Head title="Timezone" />
    <AuthenticatedLayout>
        <template #header>
            <h5>Timezones</h5>
        </template>

        <div class="row">
            <div class="col-lg-7">
                <div class="box">
                    <div class="box-header py-3">
                        <div class="box-title">
                            <h4>Timezones</h4>
                        </div>
                        <div class="box-action">
                            <Link :href="route('timezone.create')" class="btn btn-sm btn-rounded btn-outline-primary"><i class="bx bx-plus"></i></Link>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="timezones">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Timezone</th>
                                    <th>Name</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(timezone, key) in timezones.data">
                                    <td>{{ key+1 }}</td>
                                    <td>{{ timezone.timezone }}</td>
                                    <td>{{ timezone.name }}</td>
                                    <td>
                                        <div class="action">
                                            <ul>
                                                <li>
                                                    <Link :href="
                                                    route(
                                                        'timezone.edit',
                                                        timezone.id
                                                    )
                                                "
                                                        class="btn btn-sm btn-rounded btn-outline-warning"><i class="bx bx-edit"></i></Link>
                                                </li>
                                                <li>
                                                    <button @click="deleteTimezone(timezone.id)" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer">
                        <Pagination :data="timezones" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
