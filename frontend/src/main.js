import './assets/main.css'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'
import 'bootstrap-icons/font/bootstrap-icons.min.css'
import 'vue-loading-overlay/dist/css/index.css'
import 'vue-image-zoomer/dist/style.css'
import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import { createPinia } from 'pinia'
import VueDOMPurifyHTML from 'vue-dompurify-html';
import VueImageZoomer from 'vue-image-zoomer'

const pinia = createPinia()
createApp(App).use(router).use(VueDOMPurifyHTML).use(VueImageZoomer).use(pinia).mount('#app')
