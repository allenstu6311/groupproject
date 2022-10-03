<template>
    <Header />
     <div class="background-pic">
        <img src="../assets/images/bcgFlower.png" alt="">
    </div>
    <ProductCart  :getProduct="temporary"/>
    <ShoppingCar   @productInfo="productInfo"/>
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

    },
    data(){
        return{
            temporary:[]
        }
    },
    methods:{
        productInfo(val){
            // console.log("val",val)
            this.temporary=val
        }
    },
    created(){
        // console.log("臨時",this.temporary)
        this.productInfo()
    },
    watch:{
       
    },
    updated() {
        // console.log("t",this.temporary)
    },
}
</script>