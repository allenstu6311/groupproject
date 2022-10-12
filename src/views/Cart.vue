<template>
  <div class="background-pic">
    <img src="../assets/images/bcgFlower.png" alt="" />
  </div>
  <ProductCart :getProduct="temporary" 
  @cart-message="cartInformation"
  @update-cart="$emit('update-cart', $event)" 
  :newCartInfo ="newCart"/>
  <ShoppingCar 
  @product-info="productInfo" 
  :checkCar="carSend" 
  @addCartInfo ="addCartInfo"/>

  <lightBox  v-show="checkMember==true"/>
</template>

<script>
import ShoppingCar from "@/components/ShoppingCar.vue";
import ProductCart from "@/components/ProductCart.vue";
import lightBox from "@/components/lightBox.vue"
// import {BASE_URL} from '@/assets/js/common.js';
// const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..'
export default {
  components: {
    ShoppingCar,
    ProductCart,
    lightBox,
  },
  data() {
    return {
      temporary: [],
      carSend: [],
      newCart:[],
      checkMember:true
    };
  },
  methods: {
    productInfo(val) {
      // console.log("val",val)
      this.temporary.push(val);
    },
    cartInformation(val) {

      this.carSend = val;
    },
    addCartInfo(val){
      // console.log("val",val)
      this.newCart = val
    }
  },

  created() {
    this.productInfo();
    let members = sessionStorage.getItem("member");
    this.member = JSON.parse(members);

    if(!this.member){
      this.checkMember=true
    }else{
      this.checkMember=false
    }
  },
  watch: {},
  updated() {
    // console.log("t",this.temporary)
  },
};
</script>
