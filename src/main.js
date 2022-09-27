import { createApp } from 'vue'
import App from './App.vue'
// import Header from "@/components/Header.vue"
// import Footer from "@/components/Footer.vue"
import './registerServiceWorker'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap'
import router from './router'
import store from './store'

// 套用 gsap
// import gsap from "gsap";
// import ScrollTrigger from "gsap/ScrollTrigger";

// gsap.registerPlugin(ScrollTrigger);

// Vue.mixin({
//   created: function () {
//     this.gsap = gsap;
//   }
// });

createApp(App).use(store).use(router).mount('#app')
// .ues(Header).use(Footer)