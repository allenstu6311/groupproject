<template>
    <router-view/>
</template>

<script>
// import Header from "@/components/Header.vue"
// import Footer from "@/components/Footer.vue"
import {routes} from "@/router/index.js"

export default {
    data(){
      return{
        routes,
      }
    },
    // components:{
    //     Header,
    //     Footer,
    // }
}
</script>
