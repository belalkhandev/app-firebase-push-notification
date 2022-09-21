<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Login" />

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
    </div>

    <!-- login wrapper -->
    <div id="login-wrap">
        <div class="login-box">
            <div class="login-header">
                <div class="logo">
                    <h2>Notifier</h2>
                    <h3 class="fw-400">Welcome back! login</h3>
                </div>
            </div>
            <div class="login-body">
                <form @submit.prevent="submit">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="bx bx-user"></i>
                            </div>
                            <TextInput id="email" type="email" class="form-control" v-model="form.email" required autofocus autocomplete="username" placeholder="test@example.com" />
                        </div>
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="bx bxs-key"></i>
                            </div>
                            <TextInput id="password" type="password" class="form-control" v-model="form.password" placeholder="*******" required autocomplete="current-password" />
                        </div>
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>
                    <div class="form-rem-pass">
                        <label>
                            <Checkbox name="remember" v-model:checked="form.remember" />
                            <span class="ml-2">Remember Me</span>
                        </label>
                    </div>
                    <div class="form-submit">
                        <button class="btn btn-primary w-100 text-center" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Log in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

