<template>

     <div class="background-pic">
        <img src="../assets/images/bcgFlower.png" alt="">
    </div>
    <ProductCart  :getProduct="temporary"
                    @cart-message="cartInformation"/>
    <ShoppingCar   @product-info="productInfo"
                    :checkCar ="carSend"/>

</template>

<script>
import ShoppingCar from "@/components/ShoppingCar.vue"
import ProductCart from "@/components/ProductCart.vue"
 
export default {
    components:{
      
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