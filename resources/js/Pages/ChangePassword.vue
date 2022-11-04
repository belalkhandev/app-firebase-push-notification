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
    form.post(route('update.password'),{
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            Toast.fire({
                icon: 'success',
                title: 'Password updated successfully'
            });
        }
    });
};
</script>

<template>
    <Head title="Password Change" />

    <AuthenticatedLayout>
        <template #header>
            <h5>Change password</h5>
        </template>

        <div class="row">
            <div class="col-lg-5">
                <div class="box">
                    <div class="box-header py-4">
                        <div class="box-title">
                            <h4>Change Password</h4>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <form @submit.prevent="submit">
                                <div class="form-group">
                                    <InputLabel>Current Password</InputLabel>
                                    <TextInput type="password" aria-placeholder="Current Password" placeholder="********" v-model="form.current_password"/>
                                    <InputError class="mt-2" :message="form.errors.current_password" />
                                </div>
                                <div class="form-group">
                                    <InputLabel >New Password</InputLabel>
                                    <TextInput type="password" aria-placeholder="New Password" placeholder="********" v-model="form.password"/>
                                    <InputError class="mt-2" :message="form.errors.password" />
                                </div>
                                <div class="form-group">
                                    <InputLabel >Confirm Password</InputLabel>
                                    <TextInput type="password" aria-placeholder="Confirm Password" placeholder="********" v-model="form.password_confirmation"/>
                                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                                </div>
                                <div class="form-submit mt-4 text-right">
                                    <button type="submit" class="btn btn-primary py-2 px-4" :disabled="form.processing">Update Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="box-footer"></div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
