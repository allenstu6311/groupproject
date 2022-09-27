import { createApp } from 'vue'
import axios from "axios"
import VueAxios from 'vue-axios'

import App from './App.vue'
// import Header from "@/components/Header.vue"
// import Footer from "@/components/Footer.vue"
import './registerServiceWorker'
import router from './router'
import store from './store'


createApp(App).use(store).use(router).use(VueAxios,axios).mount('#app')
// .ues(Header).use(Footer)