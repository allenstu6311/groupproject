<template>
  <div class="commodity-list col-4">
    <div class="commodity-title">
      <h4 class="bold">購物明細</h4>
    </div>
    <div class="commodity-show">
      <ul>
        <li v-for="item in calculate" :key="item">
          <div class="commodity-pic">
            <img :src="require(`../assets/phps/pic/${item.PROD_PIC1}`)" />
          </div>
          <div class="commodity-price">${{ item.PROD_PRICE }}</div>
          <div class="commodity-price-num">X{{ item.PROD_NUM }}</div>
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
export default {
  data() {
    return {
      calculate: [],
      productPrice: 0,
      totalPrice: "",
    };
  },
  methods: {
  
    getInfo() {
      let orders = localStorage.getItem("order");
      if (!orders) return;
      this.order = JSON.parse(orders);

      let members = localStorage.getItem("user");
      if (!members) return;
      this.member = JSON.parse(members);

      let carts = localStorage.getItem("cart");
      if (!carts) return;
      this.cart = JSON.parse(carts);

      let calculates = localStorage.getItem("calculate");
      if (!calculates) return;
      this.calculate = JSON.parse(calculates);

    //   console.log("商品-->",this.calculate)

      let totalPrices = localStorage.getItem("totalPrice");
      if (!totalPrices) return;
      this.totalPrice = JSON.parse(totalPrices);

      this.score = (
        this.order[0].PROD_REVIEW / this.order[0].PROD_TIMES
      ).toFixed(1);
      this.star = parseInt(this.score);
    },
  },
  watch: {
    calculate: {
      handler(newVal) {
        this.productPrice = "";
        for (let i = 0; i < newVal.length; i++) {
          this.productPrice = parseFloat(
            this.productPrice + newVal[i].PROD_PRICE * newVal[i].PROD_NUM
          );
        }
      },
    },

  },
  created() {
    this.getInfo();
   
  },
};
</script>
