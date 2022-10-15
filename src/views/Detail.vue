<template>
  <div class="background-pic">
    <img src="../assets/images/bcgFlower.png" alt="" />
  </div>
  <div class="Detail-container">
    <Product  ref="getReview"  @update-cart="$emit('update-cart', $event)"
              />
    <Review  @update-review="updateReview"/>
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
              test:"",
              newReview:[]
            }
        },
        methods: {
            judge(val){
                this.test=val
               
            },
            updateReview(val){
              this.$refs.getReview.updateReview(val)
            }
        },
       
    }
</script>
<style scoped>
.Detail-container {
  padding-top: 100px;
}
</style>
