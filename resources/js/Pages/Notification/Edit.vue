<template>
    <Head title="Update notifications" />

    <AuthenticatedLayout>
        <template #header>
            <h5>Update Notifications</h5>
        </template>

        <div class="row">
            <div class="col-lg-7">
                <div class="box">
                    <div class="box-header">
                        <h5 class="box-title">Edit Notifications</h5>
                        <div class="action">
                            <Link :href="route('notification.list')" class="btn btn-sm btn-rounded btn-outline-success"><i class="bx bx-bell"></i></Link>
                        </div>
                    </div>
                    <form @submit.prevent="submit">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2">

                                    <div class="form-group">
                                        <label>Application</label>
                                        <select v-model="form.application_id" class="form-control">
                                            <option value="">Select</option>
                                            <option v-if="applications.length" v-for="application in applications" :value="application.id">{{ application.name }}</option>
                                        </select>
                                        <InputError class="mt-2" :message="form.errors.application_id" />
                                    </div>

                                    <div class="form-group">
                                        <label>Timezone</label>
                                        <select v-model="form.timezone_id" class="form-control">
                                            <option value="">Select</option>
                                            <option v-if="timezones.length" v-for="timezone in timezones" :value="timezone.id">{{ timezone.timezone }}</option>
                                        </select>
                                        <InputError class="mt-2" :message="form.errors.timezone_id" />
                                    </div>
                                    <div class="form-group">
                                        <label>Notification Title Name</label>
                                        <input type="text" v-model="form.title" placeholder="Enter application title" class="form-control">
                                        <InputError class="mt-2" :message="form.errors.title" />
                                    </div>

                                    <div class="form-group">
                                        <label>Notification Description</label>
                                        <textarea v-model="form.description" placeholder="Application description" class="form-control h-100"></textarea>
                                        <InputError class="mt-2" :message="form.errors.description" />
                                    </div>

                                    <div class="form-group mt-4">
                                        <label class="mb-2">Application Icon</label><br>
                                        <input type="file" @input="form.image = $event.target.files[0]">

                                        <div v-if="form.pre_icon" class="mt-4">
                                            <img :src="'/'+form.pre_icon" alt="" class="w-20">
                                        </div>
                                    </div>

                                    <div class="form-submit mt-4 text-right">
                                        <button type="submit" class="btn btn-primary py-2 px-4 mr-4">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </form>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import InputError from "@/Components/InputError.vue";

const form = useForm({
    application_id: props.notification.application_id,
    timezone_id: props.notification.timezone_id,
    title: props.notification.title,
    description: props.notification.description,
    image: '',
    pre_icon: props.notification.image
});

const props = defineProps({
    notification: {
        type: Object,
        default: () => ({})
    },

    applications: {
        type: Object,
        default: () => ({})
    },

    timezones: {
        type: Object,
        default: () => ({})
    }
});


const submit = () => {
    form.post(route('notification.update', props.notification.id), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            Toast.fire({
                icon: 'success',
                title: 'Notification update successfully'
            });
        }
    });
};
</script>
