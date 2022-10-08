<template>
  <div class="background-pic">
    <img src="../assets/images/bcgFlower.png" alt="" />
  </div>
  <ProductCart :getProduct="temporary" @cart-message="cartInformation" />
  <ShoppingCar @product-info="productInfo" :checkCar="carSend" />
</template>

<script>
import ShoppingCar from "@/components/ShoppingCar.vue";
import ProductCart from "@/components/ProductCart.vue";
const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..'
export default {
  components: {
    ShoppingCar,
    ProductCart,
  },
  data() {
    return {
      temporary: [],
      carSend: [],
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
