<template>
   
    <div class="background-pic">
        <img src="../assets/images/bcgFlower.png" alt="">
    </div>
    <div class="Detail-container">
    <Product />
    <Review />
    </div>

</template>

<script>

import Product from"@/components/Product.vue"
import Review from "@/components/Review.vue"

    export default{
        components:{
          
            Product,
            Review
        }
    }
</script>
<style scoped>
    .Detail-container{
        margin-top: 100px;
    }
</style>