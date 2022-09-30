<template>
    <Header />
    <Product />
    <!-- <Review /> -->
    <Footer />
</template>

<script>
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
import Product from"@/components/Product.vue"

    export default{
        components:{
            Product ,
            Header,
            Footer,
            // Review
        }
    }
</script>