<template>
    <div class="mb-3">
        <h6>Colors</h6>
        <div class="d-flex flex-wrap justify-content-start">
            <div class="color-circle border border-light-subtle shadow-sm border-2 mb-1 me-1"
                v-for="color in productsStore.colors" :key="color.id"
                @click="productsStore.filterProducts('color', color.id)" 
                :style="{ backgroundColor: color.name }">
            </div>
        </div>
    </div>
</template>

<script setup>
import { useProductStore } from '@/stores/useProductsStore';

const productsStore = useProductStore();

</script>

<style scoped>
.color-circle {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    cursor: pointer;
    display: inline-block;
}
</style>