<template>
  <div class="background-pic">
    <img src="../assets/images/bcgFlower.png" alt="" />
  </div>

  <!-- ========================================banner -->

  <div class="purchase-area" style="padding: 50px 0">
    <div class="purchase-area-title">
      <div class="title-font">加</div>
      <div class="title-font">購</div>
      <div class="title-font">區</div>
    </div>
  </div>

  <div class="add-on-container">
    <div
      class="add-on-product"
      v-for="item in data"
      :key="item.PROD_ID"
      :style="{ left: 150 * index + 'px', transition: 0.4 + 's' }"
    >
      <div class="add-on-pic" @click="addShoppingCart(item.PROD_ID)">
        <img :src="require(`../../public/api/pic/${item.PROD_PIC1}`)" alt="" />
      </div>
      <div class="add-on-price-name">
        {{ item.PROD_NAME }}
      </div>
      <div class="add-on-price">
        <p>${{ item.PROD_PRICE }}</p>
      </div>
    </div>
  </div>
  <div class="add-on-control" style="padding:10px 0px;">
    <span class="prev" @click="productPrev"
      ><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg></span>
    <span class="next" @click="productNext"
      ><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
</svg></span>
  </div>
  <lightBox :lightBoxShow="showBox"/>
</template>

<script>
import {BASE_URL} from '@/assets/js/common.js'
import lightBox from "@/components/lightBox.vue"
export default {
  props: {
    checkCar: Array,
  },
  components:{
      lightBox,
  },
  data() {
    return {
      data: [],
      index: 0,
      addOn: [],
      cart: [],
      calculate: [],
      member: [],
      memory: [],
      showBox:false
    };
  },
  methods: {
    productPrev() {
      if (this.index < 0) {
        this.index += 1;
      }
    },
    productNext() {
      if (this.index > -7) {
        this.index -= 1;
      }
    },
    addShoppingCart(id) {
    if (!this.member) {
        this.showBox=true
    }else {
          this.updateCart();
      let count = this.data.findIndex((item) => item.PROD_ID === id);
      let sameProduct = this.memory.find((item) => item.PROD_ID === id);
      
      // let index = this.cart.find(item=>item.PROD_ID===id)
      if (!sameProduct) {
        alert("成功加入");
        this.IncreaseShoppingCart(count);
        this.updateCart();
      } else {
        alert("購物車已有相同物品");
      }
  
    }
  
    },
    IncreaseShoppingCart(count) {
       var url = `${BASE_URL}/changeShoppingCart.php`;
      // var url = "http://localhost/CGD102_G2/public/api/changeShoppingCart.php"
      this.axios
        .get(url, {
          params: {
            judge: 1,
            mem_id: this.member.memId,
            prod_id: this.data[count].PROD_ID,
            prod_qty: 1,
          },
        })
        .then((res) => {
          this.memory = res.data
        });
    },
    updateCart() {
      var url = `${BASE_URL}/shoppingCart.php`; //上線
      this.axios
        .get(url, {
          params: {
            mem_id: this.member.memId,
          },
        })
        .then((res) => {
          this.memory = res.data;
          // this.memory = res.data;
          let oldVal = this.memory;
          let newVal = res.data;
          let isSame = newVal.length === oldVal.length;
          if (!isSame) {
            this.memory = res.data;
            return;
          }

          isSame = newVal.every(
            (v) =>
              oldVal.findIndex(
                (u) => u.PROD_ID === v.PROD_ID && u.PROD_QTY == v.PROD_QTY
              ) > -1
          );
          if (!isSame) {
            this.memory = res.data;
          }
          this.$emit("addCartInfo", this.memory);
          this.$emit("update-cart", res.data);
        });
    },

    cartInfo() {

      let calculates = localStorage.getItem("calculate");
      if (!calculates) return;
      this.calculate = JSON.parse(calculates);

      let totalPrices = localStorage.getItem("totalPrice");
      if (!totalPrices) return;
      this.totalPrice = JSON.parse(totalPrices);
    },
  },
  created() {
     var url = `${BASE_URL}/addOn.php` //上線
    // var url = "http://localhost/CGD102_G2/public/api/addOn.php";
    this.axios.get(url).then((res) => {
      this.data = res.data;
    });
    let members = sessionStorage.getItem("member");
    this.member = JSON.parse(members);
    if(this.member){
        this.updateCart();
    }
  
    this.cartInfo();
  },
 
};
</script>
