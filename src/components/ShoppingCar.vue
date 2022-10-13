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
  <div class="add-on-control">
    <span class="prev" @click="productPrev"
      ><i class="fa-solid fa-arrow-left"></i
    ></span>
    <span class="next" @click="productNext"
      ><i class="fa-solid fa-arrow-right"></i
    ></span>
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
          console.log("mm",this.memory)
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
          // console.log(this.memory)
          this.$emit("addCartInfo", this.memory);
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
    // console.log("mem", this.member.memId);

    this.cartInfo();
  },
  watch: {
    cart: {
      handler(newVal) {
        let members = sessionStorage.getItem("member");
        this.member = JSON.parse(members);
        // console.log("mem", this.member.memId);

        // for (let i = 0; i < newVal.length; i++) {
        //   this.axios
        //     .get(
        //       "http://localhost/CGD102_G2/public/api/insertShoppingCart.php",
        //       {
        //         params: {
        //           judge:
        //           mem_id: this.member.memId,
        //           prod_id: this.cart[i].PROD_ID,
        //           prod_qty: this.cart[i].PROD_NUM,
        //         },
        //       }
        //     )
        //     .then((res) => {
        //       console.log("購物車內部", res);
        //     });
        // }
      },
    },
    deep: true,
  },
};
</script>
