<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/inertia-vue3';
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import { Link }  from '@inertiajs/inertia-vue3';

const props = defineProps({
    timezone: {
        type: Object,
        default: () => ({})
    }
})

const form = useForm({
    name: props.timezone.name,
    timezone: props.timezone.timezone
});

const submit = () => {
    form.put(route('timezone.update', props.timezone.id), {
        preserveScroll: true,
        onSuccess: () => {
            Toast.fire({
                icon: 'success',
                title: 'Updated successfully'
            });
        }
    });
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
                            <h4>Timezones: Update</h4>
                        </div>
                        <div class="box-action">
                            <Link :href="route('timezone.list')" class="btn btn-sm btn-rounded btn-outline-primary"><i class="bx bx-list-ul"></i></Link>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <form @submit.prevent="submit">
                                    <div class="form-group">
                                        <InputLabel>Name</InputLabel>
                                        <TextInput type="text"  placeholder="e.g: Dhaka/Astana" v-model="form.name"/>
                                        <InputError class="mt-2" :message="form.errors.name" />
                                    </div>
                                    <div class="form-group">
                                        <InputLabel>Timezone</InputLabel>
                                        <TextInput type="text"  placeholder="e.g: UTC+6" v-model="form.timezone"/>
                                        <InputError class="mt-2" :message="form.errors.timezone" />
                                    </div>
                                    <div class="form-submit mt-4 text-right">
                                        <button type="submit" class="btn btn-primary py-2 px-4" :disabled="form.processing">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer"></div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
