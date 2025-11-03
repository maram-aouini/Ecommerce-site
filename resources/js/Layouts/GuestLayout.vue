<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <div>
    <nav class="navbar">
      <div class="container-nav">
        <Link :href="route('home')" class="logo">
          <h1>E-Store</h1>
        </Link>

        <div class="nav-links">
          <Link :href="route('home')" class="nav-link">Home</Link>
        </div>

        <div class="auth-links">
          <Link :href="route('login')" class="btn-link">Login</Link>
          <Link :href="route('register')" class="btn-link">Register</Link>
        </div>
      </div>
    </nav>

    <main>
      <slot />
    </main>
  </div>
</template>
