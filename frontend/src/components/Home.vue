<template>
    <div class="row my-5">
        <Spinner :store="productsStore" />
        <Sidebar />
        <div class="col-md-8">
            <ProductList />
        </div>
    </div>
</template>

<script setup>
import { useProductStore } from '@/stores/useProductsStore';
import { onMounted } from 'vue';
import ProductList from '@/components/products/ProductList.vue';
import Spinner from '@/components/layouts/Spinner.vue';
import Sidebar from './layouts/Sidebar.vue';


const productsStore = useProductStore();

onMounted(() => productsStore.fetchAllProducts()); // gắn onMounted vào để tự động gọi hàm fetchAllProducts khi component hiển thị
</script>

<style scoped></style>