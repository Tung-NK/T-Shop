<template>
    <div class="mb-3">
        <h6>Categories</h6>
        <ul class="nav d-flex flex-column">
            <li class="nav-item mb-1" v-for="category in productsStore.categories" :key="category.id">
                <button class="btn btn-sm btn-link text-dark"
                @click="productsStore.filterProducts('category', category.slug)"
                >
                    {{ category.name }}
                </button>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { useProductStore } from '@/stores/useProductsStore';

const productsStore = useProductStore();

</script>

<style scoped></style>