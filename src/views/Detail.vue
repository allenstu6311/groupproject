<template>
   
    <div class="background-pic">
        <img src="../assets/images/bcgFlower.png" alt="">
    </div>
    <div class="Detail-container">
    <Product />
    <Review />
    </div>
  <lightBox   v-if="lightBoxShow==true"/>
</template>

<script>
import lightBox from "@/components/lightBox.vue"
import Product from"@/components/Product.vue"
import Review from "@/components/Review.vue"

    export default{
        components:{
          
            Product,
            Review,
            lightBox
        },
        data(){
            return{
                lightBoxShow:false
            }
        },
        created(){
            let members = sessionStorage.getItem("member");
            this.member = JSON.parse(members)
            if(!this.member){
                this.lightBoxShow=true
            }else{
                this.lightBoxShow=false
            }       
        }

    }
</script>
<style scoped>
    .Detail-container{
        margin-top: 100px;
    }
</style>