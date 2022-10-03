<template>
    <Header />
    <div class="background-pic">
        <img src="../assets/images/bcgFlower.png" alt="">
    </div>
    <div class="Detail-container">
    <Product />
    <!-- <Review /> -->
    </div>
   
    <Footer />
</template>

<script>
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
import Product from"@/components/Product.vue"
import Review from "@/components/Review.vue"

    export default{
        components:{
            Product ,
            Review,
            Header,
            Footer,
            
        }
    }
</script>
<style scoped>
    .Detail-container{
        margin-top: 100px;
    }
</style>