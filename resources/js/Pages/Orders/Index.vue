<script setup>
import { Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({
    orders: Array
});

const formatDate = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
};
</script>

<template>
    <AuthenticatedLayout>
        <div class="orders-page">
            <div class="container">
                <h1>Order History</h1>

                <div v-if="orders.length === 0" class="empty-state">
                    <p>You haven't placed any orders yet.</p>
                    <Link :href="route('home')" class="btn">Start Shopping</Link>
                </div>

                <div v-else class="orders-list">
                    <div v-for="order in orders" :key="order.id" class="order-card">
                        <div class="order-header">
                            <div>
                                <h3>Order #{{ order.id }}</h3>
                                <p class="order-date">{{ formatDate(order.created_at) }}</p>
                            </div>
                            <div class="order-total">
                                <span class="total-label">Total:</span>
                                <span class="total-amount">${{ order.total }}</span>
                            </div>
                        </div>

                        <div class="order-status">
                            <span class="status-badge" :class="`status-${order.status}`">
                                {{ order.status }}
                            </span>
                        </div>

                        <div class="order-items">
                            <div v-for="item in order.order_items" :key="item.id" class="order-item">
                                <img :src="item.product.image" :alt="item.product.name" class="item-image">
                                <div class="item-details">
                                    <h4>{{ item.product.name }}</h4>
                                    <p>Quantity: {{ item.quantity }} × ${{ item.price }}</p>
                                </div>
                                <div class="item-total">
                                    ${{ (item.quantity * item.price).toFixed(2) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>