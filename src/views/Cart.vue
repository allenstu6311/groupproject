<template>
    <Header />
     <div class="background-pic">
        <img src="../assets/images/bcgFlower.png" alt="">
    </div>
    <ProductCart  :getProduct="temporary"
                    @cart-message="cartInformation"/>
    <ShoppingCar   @product-info="productInfo"
                    :checkCar ="carSend"/>
    <Footer />
</template>

<script>
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
import ShoppingCar from "@/components/ShoppingCar.vue"
import ProductCart from "@/components/ProductCart.vue"
 
export default {
    components:{
        Header,
        Footer, 
        ShoppingCar,
        ProductCart,
    },
    data(){
        return{
            temporary:[],
            carSend:[],
            
        }
    },
    methods:{
        productInfo(val){
            // console.log("val",val)
            this.temporary.push(val)
        },
        cartInformation(val){
            console.log("val",val)
            this.carSend = val
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