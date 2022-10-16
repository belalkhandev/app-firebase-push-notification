<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3';
import InputError from "@/Components/InputError.vue";

const props = defineProps({
    application: {
        type: Object,
        default: () => ({})
    }
})

const form = useForm({
    name: props.application.name,
    description: props.application.description,
    firebase_server_key: props.application.firebase_server_key,
    app_icon: '',
    pre_icon: props.application.icon
});

const submit = () => {
    form.post(route('application.update', props.application.id), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            Toast.fire({
                icon: 'success',
                title: 'Application has been stored successfully'
            });
        }
    });
};

</script>

<template>
    <Head title="Edit Application" ></Head>

    <AuthenticatedLayout>

        <template #header>
            <h5>Edit Application</h5>
        </template>

        <div class="row">
            <div class="col-lg-7">
                <div class="box">
                    <div class="box-header">
                        <h5 class="box-title">Edit Application</h5>
                        <div class="action">
                            <Link :href="route('application.list')" class="btn btn-sm btn-rounded btn-outline-success"><i class="bx bx-list-ul"></i></Link>
                        </div>
                    </div>
                    <form @submit.prevent="submit">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2">
                                    <div class="form-group">
                                        <label for="">Application Name</label>
                                        <input type="text" v-model="form.name" placeholder="Enter application name" class="form-control">
                                        <InputError class="mt-2" :message="form.errors.name" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea v-model="form.description" placeholder="Application description" class="form-control h-100"></textarea>
                                        <InputError class="mt-2" :message="form.errors.description" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Firebase server key <span>*</span></label>
                                        <textarea v-model="form.firebase_server_key" placeholder="Firebase server key" class="form-control" style="height: 120px"></textarea>
                                        <InputError class="mt-2" :message="form.errors.firebase_server_key" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Application Icon</label><br>
                                        <input type="file" @input="form.app_icon = $event.target.files[0]">

                                        <div v-if="form.pre_icon" class="mt-4">
                                            <img :src="'/'+form.pre_icon" alt="" class="w-20">
                                        </div>
                                    </div>
                                    <div class="form-submit mt-4 text-right">
                                        <button type="submit" class="btn btn-primary py-2 px-4">Save</button>
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
