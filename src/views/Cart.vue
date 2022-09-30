<template>
    <Header />
    <ShoppingCar />
    <Footer />
</template>

<script>
import ShoppingCar from "@/components/ShoppingCar.vue"
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
 
export default {
    components:{
        ShoppingCar,
        Header,
        Footer

    }
}
</script>