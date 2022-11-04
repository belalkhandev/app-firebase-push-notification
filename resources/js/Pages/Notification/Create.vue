<template>
    <Head title="Create new notifications" />

    <AuthenticatedLayout>
        <template #header>
            <h5>Send New Notifications</h5>
        </template>

        <div class="row">
            <div class="col-lg-7">
                <div class="box">
                    <div class="box-header">
                        <h5 class="box-title">New Notifications</h5>
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
                                        <select v-model="form.application_id" class="form-control" @change.prevent="notificationUsers">
                                            <option value="">Select</option>
                                            <option v-if="applications.length" v-for="application in applications" :value="application.id">{{ application.name }}</option>
                                        </select>
                                        <InputError class="mt-2" :message="form.errors.application_id" />
                                    </div>

                                    <div class="form-group">
                                        <label>Timezone</label>
                                        <select v-model="form.timezone_id" class="form-control"  @change.prevent="notificationUsers">
                                            <option value="">Select</option>
                                            <option v-if="timezones.length" v-for="timezone in timezones" :value="timezone.id">{{ timezone.timezone }}</option>
                                        </select>
                                        <InputError class="mt-2" :message="form.errors.timezone_id" />
                                    </div>

                                    <div class="form-group">
                                        <label>Activity</label>
                                        <input type="number" min="0" v-model="form.activity" placeholder="Notification activity" class="form-control">
                                        <InputError class="mt-2" :message="form.errors.activity" />
                                    </div>

                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" v-model="form.title" placeholder="Notification title" class="form-control">
                                        <InputError class="mt-2" :message="form.errors.title" />
                                    </div>

                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea v-model="form.description" placeholder="Notification message" class="form-control" style="height: 100px"></textarea>
                                        <InputError class="mt-2" :message="form.errors.description" />
                                    </div>

                                    <div class="form-group">
                                        <label class="mb-2">Image/Icon</label><br>
                                        <input type="file" @input="form.image = $event.target.files[0]">
                                    </div>

                                    <div class="form-group  mt-4">
                                        <label>
                                            <input type="checkbox" v-model="form.is_send" class="form-check-input mt-0 mr-2">
                                            <span class="text-gray-600 cursor-pointer" :class="form.is_send ? 'text-violet-700': ''">Send notification now</span>
                                        </label>
                                    </div>

                                    <div class="form-submit mt-4 text-right">
                                        <button type="submit" class="btn btn-primary py-2 px-4 mr-4">Save Notification</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="box">
                    <div class="box-header">
                        <h5 class="box-title">Total Users</h5>
                    </div>
                    <div class="box-body">
                        <div class="items">
                            <div class="item pb-4">
                                <div class="item-body mt-4 text-center">
                                    <h1 class="text-violet-700">{{ userData.users }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
    import InputError from "@/Components/InputError.vue";
    import axios from "axios";

    const form = useForm({
        application_id: '',
        timezone_id: '',
        title: '',
        description: '',
        image: '',
        is_send: 0,
        activity: null
    });

    const userData = useForm({
        users: 0
    });

    const props = defineProps({
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
        form.post(route('notification.store'), {
            preserveScroll: true,
            onSuccess: () => {
                form.reset();
                Toast.fire({
                    icon: 'success',
                    title: 'Notification stored successfully'
                });
            }
        });
    };

    const notificationUsers = () => {
        axios.get(route('notification.users'), {
            params: {
                application_id: form.application_id,
                timezone_id: form.timezone_id
            }
        }).then(res => {
                userData.users = res.data.users ? res.data.users : 0;
        }).catch(error => {
            console.log(error)
            userData.users = 0
        })
    }
</script>
