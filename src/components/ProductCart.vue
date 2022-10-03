<template>
  <div class="shopping-cart">
    <div class="shopping-title">
      <div class="title-font">購</div>
      <div class="title-font">物</div>
      <div class="title-font">車</div>
    </div>
  </div>

  <div class="shopping-list col-10">
    <div
      class="shopping-cart-empty"
      v-if="detect == 0"
      style="text-align: center"
    >
      <h1>目前購物車是空的</h1>
    </div>

    <div class="shopping-list-order" v-for="item in cart" :key="item">
      <input type="checkbox" v-model="calculate" :value="item" />
      <!-- {{calculate}} -->
      <div class="shopping-list-pic">
        <img :src="require(`../assets/phps/pic/${item.PROD_PIC1}`)" alt="" />
      </div>
      <div class="shopping-list-body">
        <div class="shopping-list-name">
          <h5>{{ item.PROD_NAME }}</h5>
          <br />
          <p>✅{{ item.PROD_DESC1 }}</p>
          <p>✅{{ item.PROD_DESC2 }}</p>
          <p>✅{{ item.PROD_DESC3 }}</p>
        </div>

        <div class="shopping-list-calculate">
          <h5>${{ item.PROD_PRICE }}</h5>
        </div>
        <div class="shopping-list-star">
          <p v-for="item in parseInt(item.PROD_REVIEW / item.PROD_TIMES)" :key="item">★</p>
                <p v-if='star<1'>{{block}}</p>
                <p v-if='star<2'>{{block}}</p>
                <p v-if='star<3'>{{block}}</p>
                <p v-if='star<4'>{{block}}</p>
                <p v-if='star<5'>{{block}}</p>
        </div>
        <div class="shopping-list-int">
          <button @click="reduceNum(item,item.PROD_ID)">–</button
          ><input
            style="text-align: center"
            type="text"
            :value="item.PROD_NUM"
            size="1"
          /><button @click="addNum(item,item.PROD_ID)">+</button>
        </div>
      </div>
      <div class="shopping-list-btn">
        <button
          class="btnMinimum"
          style="padding: 7px"
          @click="reduceCar(item,item.PROD_ID)"
        >
          移出購物車
        </button>
      </div>
    </div>
  </div>

  <div class="shopping-discount col-10">
    <h5>選擇優惠券:</h5>
    <select name="" id="" v-model="sel" @change="selChange(sel)">
      <option value="1">請選擇</option>
      <option v-for="item in coupon" :key="item" :value="item.CPS_DIS">
        {{ item.CPS_NAME }}
      </option>
    </select>
  </div>

  <div class="shopping-price col-10">
    <div class="shopping-box">
      <span><input type="checkbox" v-model="checkOut" />全選</span>
      <button class="btnLarge" @click="drop">刪除選取項目</button>
    </div>
    <div class="shopping-check">
      <div class="shopping-checkout">
        <p>商品金額:{{ productPrice }}元</p>
        <p>折扣金額:{{ totalPrice - productPrice }}</p>
        <p>
          結帳金額:$<strong>{{ totalPrice }}</strong>
        </p>
        <router-link to="/Confirm"
          ><button class="btnLittle">前往結帳</button>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import { nextTick } from "@vue/runtime-core";
export default {
  data() {
    return {
      cart: [],
      coupon: [],
      sel: "1",
      totalPrice: 0,
      calculate: [],
      checkOut: true,
      block:"☆",
    };
  },
  methods: {
    reduceNum(item,id) {
       let carNum = this.calculate.find(item=>item.PROD_ID===id)
      item.PROD_NUM -= 1;
       carNum.PROD_NUM-=1
      this.setLocal();
    },
    addNum(item,id) {
      item.PROD_NUM += 1;
      let carNum = this.calculate.find(item=>item.PROD_ID===id)
      carNum.PROD_NUM+=1
      this.setLocal();
    },
    reduceCar(id) {
      let count = this.cart.findIndex((item) => item.PROD_ID === id);
      let index = this.calculate.findIndex(item=>item.PROD_ID===id)
      
      this.cart.splice(count, 1);
      this.calculate.splice(index,1)
      this.setLocal()
    },
    drop() {
      for (let i = this.cart.length - 1; i >= 0; i--) {
        let a = this.cart[i].PROD_ID;
        for (let j = this.calculate.length - 1; j >= 0; j--) {
        let  b = this.calculate[j].PROD_ID;
          if (a == b) {
            console.log("i-->",i)
            console.log("j-->",j)
            this.cart.splice(i, 1);
            this.calculate.splice(j, 1);
            break;
          }
        }
      }
      location.reload()
      
      this.setLocal();
    },

    countMoney() {
      localStorage.setItem("totalPrice", JSON.stringify(this.totalPrice));
    },
    setLocal() {
      localStorage.setItem("cart", JSON.stringify(this.cart));
      localStorage.setItem("calculate", JSON.stringify(this.calculate));
    },
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

      console.log(this.cart);

      let calculates = localStorage.getItem("calculate");
      if (!calculates) return;
      this.calculate = JSON.parse(calculates);

      let totalPrices = localStorage.getItem("totalPrice");
      if (!totalPrices) return;
      this.totalPrice = JSON.parse(totalPrices);

      this.score = (
        this.order[0].PROD_REVIEW / this.order[0].PROD_TIMES
      ).toFixed(1);
      this.star = parseInt(this.score);
    },
    selChange(sel) {
      this.totalPrice = parseInt(this.productPrice * this.sel);
      this.countMoney();
    },
  },
  computed: {
    buyCar: function () {
      return JSON.parse(JSON.stringify(this.cart));
    },
    checkBox: function () {
      return JSON.parse(JSON.stringify(this.calculate));
    },
  },
  created() {
    this.axios
      .get("http://localhost/CGD102_G2/src/assets/phps/member.php")
      .then((res) => {
        this.coupon = res.data;
      });
    this.getInfo();
    this.selChange();
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
        this.sel = 1;
        this.totalPrice = parseInt(this.productPrice * this.sel);
        this.setLocal()
        this.countMoney();

        console.log("cal-->", newVal);
      },
    },
    checkOut: {
      handler(newVal) {
        if (newVal == true) {
          this.calculate = this.cart;
        } else {
          this.calculate = [];
        }
      },
    },
    deep: true,
  },
  mounted() {},
  update() {
    this.sel = 1;
    this.totalPrice = parseInt(this.productPrice * this.sel);
    this.setLocal();
  },
};
</script>
