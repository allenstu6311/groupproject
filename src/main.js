import { createApp } from 'vue'
import axios from "axios"
import VueAxios from 'vue-axios'
// import ViewUIPlus from 'view-ui-plus'
import App from './App.vue'
// import Header from "@/components/Header.vue"
// import Footer from "@/components/Footer.vue"
import './registerServiceWorker'
import router from './router'
import store from './store'
// import 'view-ui-plus/dist/styles/viewuiplus.css'
// import "bootstrap/dist/css/bootstrap.css"
import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'


createApp(App).use(store)
                .use(router)
                .use(VueAxios,axios)
                // .use(ViewUIPlus)
                .mount('#app')
// .ues(Header).use(Footer)