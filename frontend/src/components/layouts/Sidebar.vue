<template>
    <div class="col-md-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5>Filters</h5>
            <button class="btn btn-link text-dark"
            @click="productsStore.clearFilters()"
            >Clear All</button>
        </div>
        <Categories />
        <Brands />
        <Sizes />
        <Colors />
    </div>
</template>

<script setup>
import { useProductStore } from '@/stores/useProductsStore';
import Brands from '../partials/Brands.vue';
import Categories from '../partials/Categories.vue';
import Colors from '../partials/Colors.vue';
import Sizes from '../partials/Sizes.vue';


const productsStore = useProductStore();
</script>

<style scoped></style>