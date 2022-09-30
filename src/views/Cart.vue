<template>
    <Header />
    <CartList />
    <ShoppingCar />
    <Footer />
</template>

<script>
import ShoppingCar from "@/components/ShoppingCar.vue"
import CartList from "@/components/CartList.vue"
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
 
export default {
    components:{
        ShoppingCar,
        CartList,
        Header,
        Footer

    }
}
</script>