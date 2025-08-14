<template>
    <div>
        <Spinner :store="productDetailsStore" />
        <!-- <div class="container mt-5" v-if="product">
            <div class="row">
               
                <div class="col-md-6 mb-4">
                    <img :src="mainImage" alt="Product" class="img-fluid rounded mb-3 product-image">
                    <div class="d-flex flex-wrap">
                        <img v-if="product.thumbnail" :src="product.thumbnail" alt="Thumbnail"
                            class="thumbnail rounded me-2" :class="{ active: mainImage === product.thumbnail }"
                            @click="changeImage(product.thumbnail)">
                        <img v-for="img in productImages" :key="img.id" :src="img.src" alt="Product Image"
                            class="thumbnail rounded me-2" :class="{ active: mainImage === img.src }"
                            @click="changeImage(img.src)">
                    </div>
                </div>

                
                <div class="col-md-6">
                    <h2 class="mb-3">{{ product.name }}</h2>
                    <p class="text-muted mb-2">SKU: {{ product.id }}</p>
                    <div class="mb-3">
                        <span class="h4 me-2">{{ formatPrice(product.price) }}</span>
                        <span class="text-muted" v-if="product.old_price">
                            <s>{{ formatPrice(product.old_price) }}</s>
                        </span>
                    </div>
                    <div class="mb-3">
                        <span class="badge bg-success me-2" v-if="product.status">Còn hàng</span>
                        <span class="badge bg-danger me-2" v-else>Hết hàng</span>
                        <span class="badge bg-secondary">Số lượng: {{ product.qty }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Thương hiệu:</strong>
                        <span class="ms-1">{{ product.brand?.name }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Danh mục:</strong>
                        <span class="ms-1">{{ product.category?.name }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Màu sắc:</strong>
                        <span v-for="color in product.colors" :key="color.id"
                            class="badge rounded-pill text-bg-primary me-1">
                            {{ color.name }}
                        </span>
                    </div>
                    <div class="mb-3">
                        <strong>Kích cỡ:</strong>
                        <span v-for="size in product.sizes" :key="size.id" class="badge rounded-pill text-bg-info me-1">
                            {{ size.name }}
                        </span>
                    </div>
                    <div class="mb-4">
                        <label for="quantity" class="form-label">Số lượng:</label>
                        <input type="number" class="form-control" id="quantity" v-model="quantity" min="1"
                            :max="product.qty" style="width: 80px;">
                    </div>
                    <button class="btn btn-primary btn-lg mb-3 me-2">
                        <i class="bi bi-cart-plus"></i> Thêm vào giỏ
                    </button>
                    <button class="btn btn-outline-secondary btn-lg mb-3">
                        <i class="bi bi-heart"></i> Yêu thích
                    </button>
                    <div class="mt-4">
                        <h5>Mô tả sản phẩm:</h5>
                        <div v-html="product.desc"></div>
                    </div>
                </div>
            </div>
        </div> -->


        <div class="row my-5">
            <div class="col-md-6">
                <div>
                    <!-- Product Image -->
                    <vue-image-zoomer img-class="img-fluid rounded" :regular="productDetailsStore.product?.thumbnail"
                        :zoom="productDetailsStore.product?.thumbnail" />
                </div>

                <div class="row my-2">
                    <div class="col-md-6"
                        v-for="productImage in productDetailsStore.productImages"
                        :key="productImage.id"
                    >
                        <vue-image-zoomer 
                            img-class="img-fluid rounded" 
                            :regular="productImage.src"
                            :zoom="productImage.src"
                        />
                    </div>
                </div>
            </div>
            <div class="col-md-5 mx-auto">
                <h5 class="my-3">
                    {{ productDetailsStore.product?.name }}
                </h5>
                <div class="d-inline-flex">
                    <span class="badge text-bg-light">
                        <i class="bi bi-tag"></i>
                        {{ productDetailsStore.product?.category.name }}
                    </span>
                    <span class="badge text-bg-light ms-3">
                        <i class="bi bi-c-circle"></i>
                        {{ productDetailsStore.product?.brand.name }}
                    </span>
                </div>

                <!-- Description -->
                <p class="my-3" v-dompurify-html="productDetailsStore.product?.desc"></p>

                <!-- Price -->
                <div class="mb-2">
                    <span class="h5">
                        {{ formatPrice(productDetailsStore.product?.price) }} VND
                    </span>
                </div>

                <!-- Color -->
                <div class="d-flex flex-wrap justify-content-start">
                    <div class="color-circle border border-light-subtle shadow-sm border-2 mb-1 me-1"
                        v-for="color in productDetailsStore.product?.colors" :key="color.id"
                        :style="{ backgroundColor: color.name }">
                    </div>
                </div>

                <!-- Size -->
                <div class="d-flex flex-wrap justify-content-start align-items-center my-3">

                    <button class="btn btn-sm btn-outline-secondary mb-3 mx-1"
                        v-for="size in productDetailsStore.product?.sizes" :key="size.id">
                        {{ size.name }}
                    </button>

                </div>

                <div class="my-3 d-inline-flex">
                    <div>
                        <input type="number" v-model="data.qty" min="1" :max="productDetailsStore.product?.qty"
                            class="form-control" style="width: 80px;">
                    </div>

                    <div class="ms-2">
                        <button class="btn btn-danger btn-block">
                            <i class="bi bi-cart-plus"></i>
                            Add to cart
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, reactive } from 'vue';
import { useProductDetailsStore } from '@/stores/useProductDetailsStore';
import { useRoute } from 'vue-router';
import Spinner from '../layouts/Spinner.vue';
import { VueImageZoomer } from 'vue-image-zoomer'


const productDetailsStore = useProductDetailsStore();

const route = useRoute();

const data = reactive({
    qty: 1
});

onMounted(() => productDetailsStore.fetchProduct(route.params.slug));


function formatPrice(price) {
    if (!price) return '';
    return Number(price).toLocaleString('vi-VN', { currency: 'VND' });
}
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