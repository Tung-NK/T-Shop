import axios from 'axios'
import { defineStore } from 'pinia'

export const useProductStore = defineStore('products', {
    state: () => ({ //state định nghĩa các biến trạng thái mà store quản lý. Nó trả về một object với các thuộc tính
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
            this.isLoading = true //báo hiệu đang tải dữ liệu.
            try {
                const response = await axios.get('http://127.0.0.1:8000/api/products')
                this.products = response.data.data //Lưu danh sách sản phẩm từ response.data.data vào this.products.
                this.categories = response.data.categories
                this.colors = response.data.colors
                this.brands = response.data.brands
                this.sizes = response.data.sizes
                this.isLoading = false //Đặt isLoading = false khi hoàn tất.
            } catch (error) {
                this.isLoading = false
                console.log(error);
            }

        },

        async filterProducts(param, value, search = false) {
            this.isLoading = true //báo hiệu đang tải dữ liệu.
            try {
                const response = await axios.get(`http://127.0.0.1:8000/api/products/${value}/${param}`)
                this.products = response.data.data 
                this.categories = response.data.categories
                this.colors = response.data.colors
                this.brands = response.data.brands
                this.sizes = response.data.sizes
                if (search) {
                    this.filter = {
                        param: "term",
                        value
                    }
                } else {
                    this.filter = {
                        param,
                        value: response.data.filter
                    }
                }
                this.isLoading = false //Đặt isLoading = false khi hoàn tất.
            } catch (error) {
                this.isLoading = false
                console.log(error);
            }

        },
        
        clearFilters() {
            this.filter = null
            this.fetchAllProducts() //Gọi lại hàm fetchAllProducts để tải lại danh sách sản phẩm ban đầu.
        }
    }
})