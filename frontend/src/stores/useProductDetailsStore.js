import { VUE_APP_API_URL } from '@/helpers/config'
import axios from 'axios'
import { defineStore } from 'pinia'
// import { errorMessages } from 'vue/compiler-sfc';

export const useProductDetailsStore = defineStore('product', {

    state: () => ({
        product: null,
        productThumbnail: '',
        productImages: [],
        isLoading: false,
        errorMessages: ''
    }),

    actions: {
        async fetchProduct(slug) {
            this.productImages = [] //Đặt mảng productImages thành rỗng trước khi tải sản phẩm mới.
            this.isLoading = true //báo hiệu đang tải dữ liệu.
            try {
                const response = await axios.get(`${VUE_APP_API_URL}/products/${slug}/show`) //Gửi yêu cầu GET đến API để lấy thông tin sản phẩm theo slug.
                this.product = response.data.data //Lưu danh sách sản phẩm từ response.data.data vào this.products.
                this.productThumbnail = response.data.data.thumbnail //Lưu ảnh thumbnail của sản phẩm.
                if (response.data.data.first_image) {
                    this.productImages.push({
                        id: 1,
                        src: response.data.data.first_image //Nếu có ảnh đầu tiên, thêm vào mảng productImages.
                    }) //Nếu có ảnh đầu tiên, thêm vào mảng productImages.

                }
                if (response.data.data.second_image) {
                    this.productImages.push({
                        id: 2,
                        src: response.data.data.second_image
                    })
                }
                if (response.data.data.third_image) {
                    this.productImages.push({
                        id: 3,
                        src: response.data.data.third_image
                    })
                }
                this.isLoading = false //Đặt isLoading = false khi hoàn tất.
            } catch (error) {
                this.isLoading = false
                console.log(error);
            }

        },

    }
});