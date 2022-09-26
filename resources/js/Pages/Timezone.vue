<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/inertia-vue3';
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: ''
});

const submit = () => {
    form.post(route('update.password'));
};
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
                    <div class="box-header py-4">
                        <div class="box-title">
                            <h4>Timezones</h4>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="timezones">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Timezone</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="item in 12">
                                    <td>{{ item }}</td>
                                    <td>Test {{ item }}</td>
                                    <td>UTC+{{ item }}</td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer"></div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="box">
                    <div class="box-header py-4">
                        <div class="box-title">
                            <h4>Timezones</h4>
                        </div>
                    </div>
                    <div class="box-body">
                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <InputLabel>Name</InputLabel>
                                <TextInput type="text"  placeholder="********" v-model="form.current_password"/>
                                <InputError class="mt-2" :message="form.errors.current_password" />
                            </div>
                            <div class="form-group">
                                <InputLabel>Timezone</InputLabel>
                                <TextInput type="text"  placeholder="********" v-model="form.current_password"/>
                                <InputError class="mt-2" :message="form.errors.current_password" />
                            </div>
                            <div class="form-submit mt-4 text-right">
                                <button type="submit" class="btn btn-primary py-2 px-4" :disabled="form.processing">Save</button>
                            </div>
                        </form>
                    </div>
                    <div class="box-footer"></div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
