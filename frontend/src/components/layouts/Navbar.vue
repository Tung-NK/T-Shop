<script setup lang="ts">
import SearchForm from '../partials/SearchForm.vue';

</script>

<template>
    <nav class="navbar navbar-expand-lg navbar-light custom-navbar sticky-top">
        <div class="container-fluid">
            <!-- Logo -->
            <router-link class="navbar-brand" to="/">
                <img src="@/assets/logo.png" alt="T-Shop Logo" style="width: 65px; height: 65px;" />
            </router-link>

            <!-- Toggler (mobile) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Main content -->
            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                <!-- Menu + Search (center) -->
                <div class="d-flex flex-column flex-lg-row align-items-lg-center mx-auto">
                    <ul class="navbar-nav mb-2 mb-lg-0 d-flex flex-row flex-wrap justify-content-center">
                        <li class="nav-item mx-2">
                            <router-link class="nav-link" to="/">
                                <i class="bi bi-house-door-fill"></i> Home
                            </router-link>
                        </li>
                        <li class="nav-item mx-2">
                            <router-link class="nav-link" to="#">Shop</router-link>
                        </li>
                        <li class="nav-item mx-2">
                            <router-link class="nav-link" to="#">About</router-link>
                        </li>
                        <li class="nav-item mx-2">
                            <router-link class="nav-link" to="#">Contact</router-link>
                        </li>
                    </ul>

                    <!-- Search -->
                    <SearchForm />
                </div>

                <!-- Icons (right) -->
                <div class="d-flex align-items-center mt-3 mt-lg-0 icons-container">
                    <router-link to="/" class="icon-link me-3">
                        <i class="bi bi-heart"></i>
                    </router-link>
                    <router-link to="#" class="icon-link me-3 position-relative">
                        <i class="bi bi-cart"></i>
                        <span class="cart-badge">3</span>
                    </router-link>
                    <router-link to="/login" class="icon-link me-3" style="font-size: 1.5rem;">
                        <i class="bi bi-person"></i>
                    </router-link>
                </div>
            </div>
        </div>
    </nav>
</template>

<style scoped>
.custom-navbar {
    background-color: #fefefe;
    padding: 12px 24px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.nav-link {
    color: #333;
    font-weight: 500;
}

.icon-link {
    font-size: 20px;
    color: #333;
    position: relative;
}

.icon-link:hover {
    color: #007bff;
}

.cart-badge {
    position: absolute;
    top: -6px;
    right: -10px;
    background-color: #007bff;
    color: white;
    font-size: 11px;
    padding: 2px 6px;
    border-radius: 999px;
}
</style>