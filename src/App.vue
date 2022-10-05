<template>
    <Header />
 
    <router-view/>
    <Footer />

</template>

<script>
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
import Home from "@/components/Home.vue"

import {routes} from "@/router/index.js"


export default {
    data(){
      return{
        routes,
      }
    },
    comments:{
        Header,
        Footer,
 
    }
}
</script>

<style lang="scss">

</style>
