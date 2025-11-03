<script setup>
import { useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    user: Object
});

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    phone: props.user.phone || '',
    address: props.user.address || ''
});

const submit = () => {
    form.put(route('profile.update'));
};
</script>

<template>
    <AuthenticatedLayout>
        <div class="profile-page">
            <div class="container">
                <h1>My Profile</h1>

                <form @submit.prevent="submit" class="profile-form">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input 
                            type="text" 
                            id="name" 
                            v-model="form.name" 
                            required
                        >
                        <span v-if="form.errors.name" class="error">{{ form.errors.name }}</span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input 
                            type="email" 
                            id="email" 
                            v-model="form.email" 
                            required
                        >
                        <span v-if="form.errors.email" class="error">{{ form.errors.email }}</span>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input 
                            type="text" 
                            id="phone" 
                            v-model="form.phone"
                        >
                        <span v-if="form.errors.phone" class="error">{{ form.errors.phone }}</span>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea 
                            id="address" 
                            v-model="form.address" 
                            rows="4"
                        ></textarea>
                        <span v-if="form.errors.address" class="error">{{ form.errors.address }}</span>
                    </div>

                    <button type="submit" class="btn btn-primary" :disabled="form.processing">
                        {{ form.processing ? 'Updating...' : 'Update Profile' }}
                    </button>

                    <div v-if="$page.props.flash.success" class="alert alert-success">
                        {{ $page.props.flash.success }}
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>