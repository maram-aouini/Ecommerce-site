<script setup>
import { ref } from 'vue';
import { router, usePage } from '@inertiajs/vue3';

const props = defineProps({
    product: {
        type: Object,
        required: true
    }
});

const emit = defineEmits(['close']);

const page = usePage();
const quantity = ref(1);
const isAnimating = ref(false);

const closeModal = () => {
    emit('close');
};

const increaseQuantity = () => {
    if (quantity.value < props.product.stock) {
        quantity.value++;
    }
};

const decreaseQuantity = () => {
    if (quantity.value > 1) {
        quantity.value--;
    }
};

const handleOrder = () => {
    if (!page.props.auth.user) {
        router.visit('/login');
        return;
    }

    if (isAnimating.value) return;

    isAnimating.value = true;

    router.post('/orders', {
        items: [{
            product_id: props.product.id,
            quantity: quantity.value
        }],
        shipping_address: page.props.auth.user.address || 'Default shipping address'
    }, {
        onSuccess: () => {
            setTimeout(() => {
                isAnimating.value = false;
                closeModal();
            }, 10000);
        },
        onError: () => {
            isAnimating.value = false;
        }
    });
};
</script>

<template>
    <div class="modal-overlay" @click="closeModal">
        <div class="modal-content" @click.stop>
            <button class="close-btn" @click="closeModal">×</button>
            
            <div class="modal-body">
                <div class="product-image-large">
                    <img :src="product.image" :alt="product.name">
                </div>
                
                <div class="product-details">
                    <h2>{{ product.name }}</h2>
                    <p class="price">${{ product.price }}</p>
                    <p class="description">{{ product.description }}</p>
                    
                    <div class="stock-info">
                        <span :class="{ 'out-of-stock': product.stock === 0 }">
                            {{ product.stock > 0 ? `${product.stock} available` : 'Out of stock' }}
                        </span>
                    </div>

                    <div class="quantity-selector" v-if="product.stock > 0">
                        <label>Quantity:</label>
                        <div class="quantity-controls">
                            <button @click="decreaseQuantity" :disabled="quantity <= 1">-</button>
                            <input type="number" v-model.number="quantity" min="1" :max="product.stock">
                            <button @click="increaseQuantity" :disabled="quantity >= product.stock">+</button>
                        </div>
                    </div>

                    <button 
                        class="order" 
                        :class="{ 'animate': isAnimating }"
                        @click="handleOrder"
                        :disabled="product.stock === 0 || isAnimating"
                    >
                        <span class="default">Complete Order</span>
                        <span class="success">
                            Order Placed
                            <svg viewBox="0 0 12 10">
                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                            </svg>
                        </span>
                        <div class="box"></div>
                        <div class="truck">
                            <div class="back"></div>
                            <div class="front">
                                <div class="window"></div>
                            </div>
                            <div class="light top"></div>
                            <div class="light bottom"></div>
                        </div>
                        <div class="lines"></div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>