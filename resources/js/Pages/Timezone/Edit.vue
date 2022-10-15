<script setup>
import {useForm} from '@inertiajs/inertia-vue3';
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";

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
    form.post(route('timezone.update', props.timezone.id), {
        preserveScroll: true,
        onSuccess: () => {
            Toast.fire({
                icon: 'success',
                title: 'Stored successfully'
            });
        }
    });
};

</script>

<template>
    <div class="box">
        <div class="box-header py-4">
            <div class="box-title">
                <h4>Timezones: Update</h4>
            </div>
        </div>
        <div class="box-body">
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
        <div class="box-footer"></div>
    </div>
</template>
