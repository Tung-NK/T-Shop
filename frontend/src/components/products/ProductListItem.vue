<template>
    <div class="col-12 col-sm-6 col-md-4 mb-4">
       <div class="card product-card shadow-sm h-100" style="max-width: 320px; margin: 0 auto">
            <img :src="product.thumbnail" class="card-img-top" :alt="product.name" height="260">
            <div class="card-body">
                <h5 class="card-title">{{ product.name }}</h5>
                <p class="card-text" v-dompurify-html="product.desc.substr(0, 50)"></p>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="h5 mb-0">{{ formatPrice(product.price) }} VND</span>
                    <div>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-half text-warning"></i>
                        <small class="text-muted">(4.5)</small>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-danger">
                        <i class="bi bi-cart-plus me-2"></i>Add to Cart
                    </button>
                    <button class="btn btn-outline-secondary">
                        <i class="bi bi-heart me-2"></i>Add to Wishlist
                    </button>
                </div>
            </div>
            <div class="card-footer bg-white">
                <div class="d-flex justify-content-between text-muted small">
                    <span><i class="fas fa-truck me-2"></i>Free Shipping</span>
                    <span><i class="fas fa-undo me-2"></i>30 Days Return</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    product: {
        type: Object,
        required: true
    }
});

const formatPrice = (price) => {
    return price.toLocaleString('vi-VN', {
        currency: 'VND'
    });
}
</script>

<style scoped>
.product-card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
    transition: transform 0.3s ease-in-out;
}

.product-card:hover {
    transform: translateY(-5px);
}

.card-body {
    flex-grow: 1;
    /* Đảm bảo phần nội dung chính chiếm không gian còn lại */
}

.card-footer {
    margin-top: auto;
    /* Đẩy footer xuống cuối card */
}

.card-img-top {
    height: 260px; /* Đặt chiều cao cố định */
    object-fit: cover; /* Đảm bảo hình ảnh không bị méo */
}
</style>