<template>
  <div class="background-pic">
    <img src="../assets/images/bcgFlower.png" alt="" />
  </div>

  <div class="confirm-container">
    <MemberInfo />
    <CheckCommodity @productPrice="productMoney" />
  </div>
  <div class="agree">
    <input type="checkbox" v-model="agree" />
    <span>我同意本網站的<span>服務條款</span>與<span>退換貨規則</span></span>
  </div>

  <div class="change-page">
    <button type="button" @click="send">上一頁</button>
    <button
      type="button"
      class="next-page"
      :class="{ checkAfter: agree }"
      @click="payInfo"
    >
      下一頁
    </button>
  </div>
</template>
<script>
import MemberInfo from "@/components/MemberInfo.vue";
import CheckCommodity from "@/components/CheckCommodity.vue";

const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..'
export default {
  components: {
    MemberInfo,
    CheckCommodity,
  },

  data() {
    return {
      agree: false,
      totalPrice: 0,
      order_id: "",
      productNote: "",
      member: [],
      memberCoups: [],
    };
  },
  methods: {
    Information() {
      let carts = localStorage.getItem("cart");
      if (!carts) return;
      this.cart = JSON.parse(carts);

      let calculates = localStorage.getItem("calculate");
      if (!calculates) return;
      this.calculate = JSON.parse(calculates);

      let totalPrices = localStorage.getItem("totalPrice");
      if (!totalPrices) return;
      this.totalPrice = JSON.parse(totalPrices);
    },
    payInfo() {
      //商品清單
      alert("結帳完成");
       var url = `${BASE_URL}/api/productlist.php` //上線
        // var url ="http://localhost/CGD102_G2/public/api/productlist.php"
      this.axios
        .get(url, {
          params: {
            mem_id: this.memberCoups.length>0?this.memberCoups[0].MEM_ID:2,
            productPrice: this.productNote,
            cps_id: this.memberCoups.length>0?this.memberCoups[0].CPS_ID:1,
            totalPrice: this.totalPrice,
            address: this.member.memAddress,
          },
        })
        .then((res) => {
          this.order_id = res.data;
          this.timerd = setTimeout(this.sendOrderItems, 1000);
        });
    },
    sendOrderItems() {
      //商品明細
        var url = `${BASE_URL}/api/productOrder.php` //上線
        // var url ="http://localhost/CGD102_G2/public/api/productOrder.php"
      for (let i = 0; i < this.cart.length; i++) {
        this.axios
          .get(url, {
            params: {
              order_id: this.order_id,
              prod_id: this.cart[i].PROD_ID,
              prod_price: this.cart[i].PROD_PRICE,
              prod_num: this.cart[i].PROD_NUM,
            },
          })
          .then((res) => {});
      }
    },
    productMoney(val) {
      this.productNote = val;
    },
  },

  created() {
            var url = `${BASE_URL}/api/member.php` //上線
        // var url ="http://localhost/CGD102_G2/public/api/member.php"
    let members = sessionStorage.getItem("member");
    this.member = JSON.parse(members);

    console.log("mem", this.member);
    this.axios
      .get(url, {
        params: {
          MEM_NAME: this.member.memName,
        },
      })
      .then((res) => {
        this.memberCoups = res.data;

        console.log("c", this.memberCoups);
      });
    this.Information();
    this.productMoney();
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
};
</script>
<style lang="scss" scope>
.background-pic {
  position: fixed;
  margin: auto;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
}
.confirm-container {
  width: 100%;
  max-width: 1200px;
  margin: auto;
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  padding: 50px 10px;
}
.next-page {
  width: 120px;
  text-align: center;
  border-radius: 100px;
  padding: 10px;
  font-size: 16px;
  font-weight: 800;
}
.change-page {
  display: flex;
  justify-content: space-evenly;
  margin: 10px 0;

  :first-child {
    width: 120px;
    text-align: center;
    border-radius: 100px;
    padding: 10px;
    font-size: 16px;
    font-weight: 800;
    background-color: #163d82;
    color: #ffffff;
    border: none;
    position: relative;
    z-index: 10;
    letter-spacing: 2px;
    cursor: pointer;
    &:hover {
      //&是連結父層
      background-color: #b52011;
      transform: translateY(-3px);
      box-shadow: 2px 4px 0px #000000;
      transition: all 0.3s;
    }
    &:active {
      transform: translateY(-3px) scale(0.97);
      box-shadow: 1px 2px 0px #000000;
      transition: all 0.1s;
    }
  }
}
.agree {
  text-align: center;
  margin-bottom: 40px;
  span {
    font-size: 20px;
    font-weight: 800;
    span {
      color: #b52011;
    }
  }
}

@media screen and (min-width: 768px) {
  .confirm-container {
    width: 100%;
    max-width: 1200px;
    margin: auto;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    padding: 80px 10px;
  }
  .change-page {
    display: flex;
    justify-content: center;
    margin: 10px 0;

    button {
      margin: 0 10px;
    }
  }
}
.checkAfter {
  width: 120px;
  text-align: center;
  border-radius: 100px;
  padding: 10px;
  font-size: 16px;
  font-weight: 800;
  background-color: #163d82;
  color: #ffffff;
  border: none;
  position: relative;
  z-index: 10;
  letter-spacing: 2px;
  cursor: pointer;
  &:hover {
    //&是連結父層
    background-color: #b52011;
    transform: translateY(-3px);
    box-shadow: 2px 4px 0px #000000;
    transition: all 0.3s;
  }
  &:active {
    transform: translateY(-3px) scale(0.97);
    box-shadow: 1px 2px 0px #000000;
    transition: all 0.1s;
  }
}
</style>
