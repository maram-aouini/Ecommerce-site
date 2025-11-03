<script setup>
import { ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

const showingNavigationDropdown = ref(false);
const page = usePage();
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="navbar">
                <div class="container-nav">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <Link :href="route('home')" class="logo">
                            <h1>E-Store</h1>
                        </Link>
                    </div>

                    <!-- Navigation Links -->
                    <div class="nav-links">
                        <Link :href="route('home')" class="nav-link">
                            Home
                        </Link>
                    </div>

                    <!-- User Dropdown -->
                    <div class="user-section">
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <button class="user-trigger">
                                    <div class="user-info">
                                        <svg class="user-icon" viewBox="0 0 24 24" width="24" height="24">
                                            <path fill="currentColor" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                        </svg>
                                        <span>{{ $page.props.auth.user.name }}</span>
                                    </div>
                                    <svg class="arrow-icon" viewBox="0 0 20 20" width="16" height="16">
                                        <path fill="currentColor" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </template>

                            <template #content>
                                <DropdownLink :href="route('orders.index')">
                                    Order History
                                </DropdownLink>
                                <DropdownLink :href="route('profile.show')">
                                    Profile
                                </DropdownLink>
                                <DropdownLink :href="route('logout')" method="post" as="button">
                                    Log Out
                                </DropdownLink>
                            </template>
                        </Dropdown>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>