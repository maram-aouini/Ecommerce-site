<script setup>
import { ref } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import GuestLayout from '@/Layouts/GuestLayout.vue'
import ProductModal from '@/Components/ProductModal.vue'

const props = defineProps({
  categories: Array
})

const page = usePage()
const selectedProduct = ref(null)

const openProductModal = (product) => {
  selectedProduct.value = product
}

const closeModal = () => {
  selectedProduct.value = null
}
</script>

<template>
  <component :is="page.props.auth?.user ? AuthenticatedLayout : GuestLayout">
    <div class="home-page">
      <section class="hero">
        <h1>Welcome to Our Store</h1>
        <p>Discover amazing products across different categories</p>
      </section>

      <div class="container">
        <section
          v-for="category in categories"
          :key="category.id"
          class="category-section"
        >
          <div class="section-header">
            <h2>{{ category.name }}</h2>
            <Link :href="route('category.show', category.slug)" class="view-all">
              View All →
            </Link>
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
              </div>
            </div>
          </div>
        </section>
      </div>

      <ProductModal
        v-if="selectedProduct"
        :product="selectedProduct"
        @close="closeModal"
      />
    </div>
  </component>
</template>
