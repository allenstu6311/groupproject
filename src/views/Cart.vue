<template>
    <Header />
    <ProductCart />
    <ShoppingCar />
    <Footer />
</template>

<script>
import ShoppingCar from "@/components/ShoppingCar.vue"
import ProductCart from "@/components/ProductCart.vue"
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
 
export default {
    components:{
        ShoppingCar,
        ProductCart,
        Header,
        Footer

    }
}
</script>