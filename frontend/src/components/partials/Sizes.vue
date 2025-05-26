<template>
    <div class="mb-3">
        <h6>Sizes</h6>
        <div class="d-flex flex-wrap justify-content-start align-items-center mb-4">

            <button class="btn btn-sm btn-outline-secondary mb-3 mx-1" v-for="size in productsStore.sizes"
                :key="size.id" @click="productsStore.filterProducts('size', size.id)">
                {{ size.name }}
            </button>

        </div>
    </div>
</template>

<script setup>
import { useProductStore } from '@/stores/useProductsStore';

const productsStore = useProductStore();

</script>

<style scoped></style>