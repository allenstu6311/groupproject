<template>
  <Header />
    <Reserve />
  <Footer />
    
</template>

<script>
import Reserve from "@/components/Reserve.vue"
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"

    export default{
        components:{
            Reserve,
            Header,
            Footer,
        }
    }
</script>