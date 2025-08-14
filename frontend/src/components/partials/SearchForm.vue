<template>
    <div class="search-box ms-lg-3 mt-2 mt-lg-0">
        <input type="text" v-model="data.term" class="search-input" placeholder="Search..." />
        <button class="search-button"
        @click="searchForProducts"
        :disabled="!data.term"
        >
            <i class="bi bi-search"></i>
        </button>
    </div>
</template>

<script setup>
import { useProductStore } from '@/stores/useProductsStore';
import { reactive } from 'vue';

const productsStore = useProductStore();

const data = reactive({
    term: ''
})

const searchForProducts = () => {
    productsStore.filterProducts("find", data.term), true;
    data.term = '';
}

</script>

<style scoped>
.search-box {
    display: flex;
    align-items: center;
    background-color: #fff;
    border-radius: 999px;
    padding: 3px 6px;
    border: 1px solid #ccc;
}

.search-input {
    border: none;
    outline: none;
    padding: 6px 10px;
    border-radius: 999px;
    font-size: 14px;
    width: 180px;
    max-width: 100%;
}

.search-button {
    background-color: #eee;
    border: none;
    border-radius: 50%;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    margin-left: 6px;
}

.search-button:hover {
    background-color: #ddd;
}

.search-button i {
    font-size: 16px;
    color: #555;
}

/* Responsive adjustments */
@media (max-width: 980px) {
    .search-box {
        width: 100%;
        margin-top: 10px;
    }

    .search-input {
        width: 100%;
        max-width: none;
    }

    .navbar-nav {
        flex-direction: column;
        align-items: center;
    }

    .nav-item {
        margin: 5px 0;
    }

    .d-flex.flex-column.flex-lg-row {
        flex-direction: column;
        align-items: center;
    }

    .icons-container {
        justify-content: center;
        width: 100%;
    }
}

@media (max-height: 513px) {
    .search-box {
        padding: 2px 4px;
    }

    .search-input {
        padding: 4px 8px;
        font-size: 12px;
    }

    .search-button {
        width: 28px;
        height: 28px;
    }

    .search-button i {
        font-size: 14px;
    }
}
</style>