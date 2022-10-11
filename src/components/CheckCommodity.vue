<template>
  <div class="commodity-list col-4">
    <div class="commodity-title">
      <h4 class="bold">購物明細</h4>
    </div>
    <div class="commodity-show">
      <ul>
        <li v-for="item in memory" :key="item">
          <div class="commodity-pic">
           <img :src="require(`../../public/api/pic/${item.PROD_PIC1}`)" />
          </div>
          <div class="commodity-price">${{ item.PROD_PRICE }}</div>
          <div class="commodity-price-num">X{{ item.PROD_QTY }}</div>
        </li>
      </ul>
    </div>
    <div class="commodity-detail">
      <div class="commodity-money">
        <span class="bold">商品金額</span>
        <span class="bold">{{ productPrice }}元</span>
      </div>
      <div class="commodity-money">
        <span class="bold">折扣金額</span>
        <span class="bold">{{ totalPrice - productPrice }}元</span>
      </div>
      <div class="commodity-money">
        <span class="bold">最後金額</span>
        <span class="bold">{{ totalPrice }}元</span>
      </div>
    </div>
  </div>
</template>

<script>
import {BASE_URL} from '@/assets/js/common.js'
export default {
  
  data() {
    return {
      calculate: [],
      totalPrice: "",
      productPrice:0,
      memory:[],
      member:[]
    };
  },
  methods: {
  
    getInfo() {
      
      let members = sessionStorage.getItem("member");
      this.member = JSON.parse(members);

      // let carts = localStorage.getItem("cart");
      // if (!carts) return;
      // this.cart = JSON.parse(carts);

      // let calculates = localStorage.getItem("calculate");
      // if (!calculates) return;
      // this.calculate = JSON.parse(calculates);

    //   console.log("商品-->",this.calculate)

      let totalPrices = localStorage.getItem("totalPrice");
      if (!totalPrices) return;
      this.totalPrice = JSON.parse(totalPrices);   
    },
     updateCart() {
            var url = `${BASE_URL}/api/shoppingCart`; //上線
    // var url = "http://localhost/CGD102_G2/public/api/shoppingCart.php"
      this.axios
        .get(url, {
          params: {
            mem_id: this.member.memId,
          },
        })
        .then((res) => {
          this.memory = res.data;
          // console.log("before",this.memory)
        });
    },
  },

  created() {
    this.getInfo();
    this.updateCart()
  },
    watch: {
    memory: {
      handler(newVal) {
        this.productPrice = "";
        for (let i = 0; i < newVal.length; i++) {
          this.productPrice = parseFloat(
            this.productPrice + newVal[i].PROD_PRICE * newVal[i].PROD_QTY
          );
              this.$emit("productPrice",this.productPrice)
        }
      },
    },

  },
};
</script>
