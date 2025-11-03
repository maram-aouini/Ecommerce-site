<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import ProductModal from '@/Components/ProductModal.vue';

const props = defineProps({
    category: Object
});

const page = usePage();
const selectedProduct = ref(null);

const openProductModal = (product) => {
    selectedProduct.value = product;
};

const closeModal = () => {
    selectedProduct.value = null;
};
</script>

<template>
    <component :is="page.props.auth.user ? AuthenticatedLayout : GuestLayout">
        <div class="category-page">
            <div class="container">
                <div class="page-header">
                    <h1>{{ category.name }}</h1>
                    <p v-if="category.description">{{ category.description }}</p>
                </div>

                <div class="products-grid">
                    <div 
                        v-for="product in category.products" 
                        :key="product.id"
                        class="product-card"
                        @click="openProductModal(product)"
                    >
                        <div class="product-image">
                            <img :src="product.image" :alt="product.name">
                        </div>
                        <div class="product-info">
                            <h3>{{ product.name }}</h3>
                            <p class="price">${{ product.price }}</p>
                            <span class="stock" :class="{ 'out-of-stock': product.stock === 0 }">
                                {{ product.stock > 0 ? `${product.stock} in stock` : 'Out of stock' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <ProductModal 
                v-if="selectedProduct" 
                :product="selectedProduct"
                @close="closeModal"
            />
        </div>
    </component>
</template>