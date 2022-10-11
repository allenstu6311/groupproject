<template>
  <div class="background-pic">
    <img src="../assets/images/bcgFlower.png" alt="" />
  </div>
  <ProductCart :getProduct="temporary" 
  @cart-message="cartInformation" 
  :newCartInfo ="newCart"/>
  <ShoppingCar 
  @product-info="productInfo" 
  :checkCar="carSend" 
  @addCartInfo ="addCartInfo"/>
</template>

<script>
import ShoppingCar from "@/components/ShoppingCar.vue";
import ProductCart from "@/components/ProductCart.vue";
// import {BASE_URL} from '@/assets/js/common.js';
// const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..'
export default {
  components: {
    ShoppingCar,
    ProductCart,
  },
  data() {
    return {
      temporary: [],
      carSend: [],
      newCart:[],
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
  },
  watch: {},
  updated() {
    // console.log("t",this.temporary)
  },
};
</script>
