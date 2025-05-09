import axios from 'axios'
import { defineStore } from 'pinia'

export const useProductStore = defineStore('products', {
    state: () => ({
        products: [],
        categories: [],
        colors: [],
        brands: [],
        sizes: [],
        isLoading: false,
        filter: null
    }),
    actions: {
        async fetchAllProducts() {
            this.isLoading = true
            try {
                const response = await axios.get('http://127.0.0.1:8000/api/products')
                this.products = response.data.data
                this.categories = response.data.categories
                this.colors = response.data.colors
                this.brands = response.data.brands
                this.sizes = response.data.sizes
                this.isLoading = false
            } catch (error) {
                this.isLoading = false
                console.log(error);
            }

        }
    },
})