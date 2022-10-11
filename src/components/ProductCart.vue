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
      v-if="detect == true"
      style="text-align: center; margin: 100px 0"
    >
      <h1>目前購物車是空的</h1>
    </div>

    <div class="shopping-list-order" v-for="item in memory" :key="item.PROD_ID">
      <input
        type="checkbox"
        v-model="calculate"
        :value="item"
        
      />
      <!-- {{calculate}} -->
      <div class="shopping-list-pic">
        <img :src="require(`../../public/api/pic/${item.PROD_PIC1}`)" />
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

        <div class="shopping-list-int">
          <button @click="reduceNum(item, item.PROD_ID)">–</button
          ><input
            style="text-align: center"
            type="text"
            :value="item.PROD_QTY"
            size="1"
          /><button @click="addNum(item, item.PROD_ID)">+</button>
        </div>
      </div>
      <div class="shopping-list-btn">
        <button
          class="btnMinimum"
          style="padding: 7px"
          @click="reduceCar(item.PROD_ID)"
        >
          移出購物車
        </button>
      </div>
    </div>
  </div>

  <div class="shopping-discount col-10">
    <small style="color: red" v-if="unused == true">(尚有優惠券未使用)</small>
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
          結帳金額:$:<strong style="font-size: 22px; color: red">{{
            totalPrice
          }}</strong>
        </p>
        <router-link @click="checkList()" to="/Confirm"
          ><button class="btnLittle">前往結帳</button>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import { nextTick } from "@vue/runtime-core";
import { BASE_URL } from "@/assets/js/common.js";
export default {
  props: {
    getProduct: Array,
    newCartInfo: Array,
  },
  data() {
    return {
      cart: [],
      coupon: [],
      sel: "1",
      calculate: [],
      checkOut: true,
      block: "☆",
      detect: false,
      order: [],
      member: [],
      unused: false,
      memory: [],
    };
  },
  methods: {
    reduceNum(item, id) {
      if(item.PROD_QTY){
         item.PROD_QTY -= 1;
      }
     
      // let carNum = this.calculate.find((item) => item.PROD_ID === id);
      // item.PROD_NUM -= 1;
      // carNum.PROD_NUM -= 1;
    },
    addNum(item, id) {
      // item.PROD_NUM += 1;
      item.PROD_QTY =parseInt(item.PROD_QTY)+1;

      // let carNum = this.calculate.find((item) => item.PROD_ID === id);
      // carNum.PROD_NUM += 1;
    },
    reduceCar(id) {
      this.updateCart();
      // let count = this.cart.findIndex((item) => item.PROD_ID === id);
      // let index = this.calculate.findIndex((item) => item.PROD_ID === id);
      let focus = this.memory.findIndex((item) => item.PROD_ID === id);
      this.reduceShoppingCart(focus);
      this.updateCart();

      // this.cart.splice(count, 1);
      // this.calculate.splice(index, 1);
      // this.$emit("cart-message", this.cart);
      // this.setLocal();
    },
    drop() {
      
      let sameProduct = this.calculate.filter(v =>this.memory.filter(u=>u.PROD_ID===v.PROD_ID))
      if(sameProduct){
        let newData = this.memory.splice(sameProduct,sameProduct.length)
        this.memory = newData

     
        this.updateCart(newData);
      }
   
    },
    updateCart(newData) {
      var url = `${BASE_URL}/shoppingCart.php`; //上線
      this.axios
        .get(url, {
          params: {
            mem_id: this.member.memId,
          },
        })
        .then((res) => {
          // this.memory = res.data;
          let oldVal = this.memory;
          let newVal = res.data;
          let isSame = newVal.length === oldVal.length;
          if (!isSame) {
            this.memory = res.data;
            return;
          }

          isSame = newVal.every((v) => oldVal.findIndex((u) => u.PROD_ID === v.PROD_ID && u.PROD_QTY == v.PROD_QTY) > -1
          );
          if (!isSame) {
            this.memory = res.data;
          }
          
          this.$emit("update-cart", res.data);
        });
    },
    // memberCart() {
    //   var url = `${BASE_URL}/shoppingCart.php`; //上線
    //   // var url = "http://localhost/CGD102_G2/public/api/shoppingCart.php"
    //   this.axios
    //     .get(url, {
    //       params: {
    //         mem_id: this.member.memId,
    //       },
    //     })
    //     .then((res) => {
    //       this.memory = res.data;
    //       this.$emit("update-cart", res.data);
    //     });
    // },

    countMoney() {
      localStorage.setItem("totalPrice", JSON.stringify(this.totalPrice));
    },
    // setLocal() {
    //   // localStorage.setItem("cart", JSON.stringify(this.cart));
    //   localStorage.setItem("calculate", JSON.stringify(this.calculate));
    // },
    getInfo() {
      let orders = localStorage.getItem("order");
      if (orders) this.order = JSON.parse(orders);

      // let carts = localStorage.getItem("cart");
      // if (carts) this.cart = JSON.parse(carts);

      let calculates = localStorage.getItem("calculate");
      if (calculates) this.calculate = JSON.parse(calculates);

      let totalPrices = localStorage.getItem("totalPrice");
      if (totalPrices) this.totalPrice = JSON.parse(totalPrices);

      let members = sessionStorage.getItem("member");
      this.member = JSON.parse(members);
    },
    selChange(sel) {
      this.totalPrice = parseInt(this.productPrice * this.sel);
      this.countMoney();
    },
    checkList() {
      localStorage.setItem("coupon", this.sel);
    },

    reduceShoppingCart(focus) {
      var url = `${BASE_URL}/changeShoppingCart.php`;
      // var url = "http://localhost/CGD102_G2/public/api/changeshoppingCart.php"
      this.axios.get(url, {
        params: {
          judge: 2,
          mem_id: this.member.memId,
          prod_id: this.memory[focus].PROD_ID,
          prod_qty: 1,
        },
      });
    },
  },
  computed: {
    buyCar: function () {
      return JSON.parse(JSON.stringify(this.cart));
    },
    checkBox: function () {
      return JSON.parse(JSON.stringify(this.calculate));
    },
    productPrice() {
      let sum = 0;
      for (let i = 0; i < this.memory.length; i++) {
        sum = parseFloat(
          sum + this.memory[i].PROD_PRICE * this.memory[i].PROD_QTY
        );
      }
      return sum;
    },
    totalPrice() {
      return parseInt(this.productPrice * this.sel);
    },
  },
  created() {
    this.getInfo();
    this.selChange();
    this.updateCart();
  },

  mounted() {
    var url = `${BASE_URL}/member.php`; //上線
    // var url = "http://localhost/CGD102_G2/public/api/member.php"
    if (this.member) {
      this.axios
        .get(url, {
          params: {
            MEM_NAME: this.member.memName,
          },
        })
        .then((res) => {
          this.coupon = res.data;
        });
    }
  },
  watch: {
    getProduct: {
      handler(newVal) {
        let num = this.memory.findIndex(
          (item) => item.PROD_ID === newVal[newVal.length - 1].PROD_ID
        );
        if (num >= 0) {
          alert("購物車已有相同物品");
          return;
        }

        alert("成功加入");

        const obj = {
          PROD_ID: newVal[newVal.length - 1].PROD_ID,
          PROD_NAME: newVal[newVal.length - 1].PROD_NAME,
          PROD_PRICE: newVal[newVal.length - 1].PROD_PRICE,
          PROD_PIC1: newVal[newVal.length - 1].PROD_PIC1,
          PROD_PIC2: newVal[newVal.length - 1].PROD_PIC2,
          PROD_PIC3: newVal[newVal.length - 1].PROD_PIC3,
          PROD_DATE: newVal[newVal.length - 1].PROD_DATE,
          PROD_NUM: 1,
          PROD_DESC1: newVal[newVal.length - 1].PROD_DESC1,
          PROD_DESC2: newVal[newVal.length - 1].PROD_DESC2,
          PROD_DESC3: newVal[newVal.length - 1].PROD_DESC3,
          PROD_REVIEW: newVal[newVal.length - 1].PROD_REVIEW,
          PROD_TIMES: newVal[newVal.length - 1].PROD_TIMES,
        };

        this.cart.push({ ...obj });
        this.calculate.push({ ...obj });
        this.detect = false;
        this.setLocal();
      },
      deep: true,
    },
    newCartInfo: {
      handler(newVal) {
        this.updateCart();
        // console.log("test",newVal)
        this.updateCart();
        // if(newVal){
        //   this.memory  =newVal
        // }
      },
    },
    memory: {
      handler(newVal) {
        if (newVal.length == 0) {
          this.detect = true;
        } else {
          this.detect = false;
        }
      },
    },
    checkBox: {
      handler(newVal) {
        console.log("calculate", newVal);
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
    coupon: {
      handler(newVal) {
        if (newVal.length != 0) {
          this.unused = true;
        } else {
          this.unused = false;
        }
      },
    },
    totalPrice: {
      handler(newVal) {
        this.countMoney();
      },
    },
    deep: true,
  },
};
</script>
