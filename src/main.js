import { createApp } from 'vue'
import App from './App.vue'

import './registerServiceWorker'
import router from './router'
// import store from './store'

import axios from "axios"
// import 'view-ui-plus/dist/styles/viewuiplus.css'
import "bootstrap/dist/css/bootstrap.css"

import "@/assets/style.scss"

const app = createApp(App)
// app.use(store)
app.use(router)
app.config.globalProperties.axios=axios
app.mount('#app')
