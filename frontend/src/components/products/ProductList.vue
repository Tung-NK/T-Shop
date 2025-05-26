<template>
    <div class="row">
        <div class="d-flex">
           <div class="mb-3" v-if="productsStore.products.length">
            Found 
            <span class="fw-bold">{{ productsStore.products.length }}</span>
            {{ productsStore.products.length > 1 ? 'products' : 'product' }}
           </div>
           <div class="ms-1" v-if="productsStore.filter">
               for <span class="fw-bold">
                   {{ productsStore.filter.param }}  {{ productsStore.filter.value }}
               </span>
           </div>
        </div>
        <ProductListItem v-for="product in productsStore.products.slice(0, data.productToShow)" :key="product.id"
            :product="product">

        </ProductListItem>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-sm btn-dark mt-3" v-if="data.productToShow < productsStore.products.length"
                @click="loadMoreProducts">
                <!--hiện nút load more khi số lượng sản phẩm hiện tại nhỏ hơn tổng số sản phẩm-->
                <i class="bi bi-arrow-clockwise me-2"></i>Load More
            </button>
        </div>
    </div>
</template>

<script setup>
import { reactive } from 'vue';
import ProductListItem from './ProductListItem.vue';
import { useProductStore } from '@/stores/useProductsStore';

const productsStore = useProductStore();

const data = reactive({ //hiện số lượng sản phẩm
    productToShow: 6
})

// hiển thị thêm số lượng sản phẩm khi nhấn
const loadMoreProducts = () => {
    if (data.productToShow < productsStore.products.length) {
        data.productToShow += 6;
    } else {
        return
    }
}
</script>

<style scoped></style>