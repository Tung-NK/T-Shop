<template>
    <div class="row">
        <ProductListItem v-for="product in productsStore.products" :key="product.id" :product="product">

        </ProductListItem>
    </div>
</template>

<script setup>
import ProductListItem from './ProductListItem.vue';
import { useProductStore } from '@/stores/useProductsStore';

const productsStore = useProductStore();
</script>

<style scoped></style>