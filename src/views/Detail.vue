<template>
  <div class="background-pic">
    <img src="../assets/images/bcgFlower.png" alt="" />
  </div>
  <div class="Detail-container">
    <Product @update-cart="$emit('update-cart', $event)" />
    <Review />
  </div>

<lightBox  @boo="judge"/>
</template>

<script>
import lightBox from "@/components/lightBox.vue"
import Product from"@/components/Product.vue"
import Review from "@/components/Review.vue"
import { Checkbox } from 'view-ui-plus'

    export default{
        components:{

            Product,
            Review,
            lightBox
        },
        data(){
            return{
              test:""
            }
        },
        methods: {
            judge(val){
                this.test=val
                console.log(val)
            }
        },
       
    }
</script>
<style scoped>
.Detail-container {
  padding-top: 100px;
}
</style>
