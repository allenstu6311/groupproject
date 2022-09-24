import { createApp } from 'vue'
import App from './App.vue'
// import Header from "@/components/Header.vue"
// import Footer from "@/components/Footer.vue"
import './registerServiceWorker'
import router from './router'
import store from './store'

createApp(App).use(store).use(router).mount('#app')
// .ues(Header).use(Footer)