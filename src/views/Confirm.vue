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
    <router-link to="Cart" type="button"> 上一頁 </router-link>
    <button
      type="button"
      class="next-page"
      :class="{ checkAfter: agree }"
      @click="payInfo"
    >
      確認付款
    </button>
  </div>
</template>
<script>
import MemberInfo from "@/components/MemberInfo.vue";
import CheckCommodity from "@/components/CheckCommodity.vue";
import {BASE_URL} from '@/assets/js/common.js'

// const BASE_URL = process.env.NODE_ENV === "production" ? "/cgd102/g2" : "..";

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
      memory: [],
      coupons: "",
      cpsId: "",
    };
  },
  methods: {
  
    Information() {
    let members = sessionStorage.getItem("member");
    this.member = JSON.parse(members);

      let totalPrices = localStorage.getItem("totalPrice");
      if (!totalPrices) return;
      this.totalPrice = JSON.parse(totalPrices);
    },
    payInfo() {
      //商品清單

       var url = `${BASE_URL}/productlist.php`; //上線
      // var url = "http://localhost/CGD102_G2/public/api/productlist.php";
      this.axios
        .get(url, {
          params: {
            mem_id: this.member.memId,
            productPrice: this.productNote,
            cps_id: this.cpsId,
            totalPrice: this.totalPrice,
            address: this.member.memAddress,
          },
        })
        .then((res) => {
          this.order_id = res.data;
          this.changeCupons();
          this.timerd = setTimeout(this.sendOrderItems, 1000);
        });
    },
    sendOrderItems() {
      //商品明細
      var url = `${BASE_URL}/productOrder.php`; //上線
      // var url = "http://localhost/CGD102_G2/public/api/productOrder.php";
      for (let i = 0; i < this.memory.length; i++) {
        this.axios
          .get(url, {
            params: {
              order_id: this.order_id,
              prod_id: this.memory[i].PROD_ID,
              prod_price: this.memory[i].PROD_PRICE,
              prod_num: this.memory[i].PROD_QTY,
            },
          })
          .then((res) => {
               
          });
      }
          alert("結帳完成!請至會員中心查看");
          this.clearCart();
          this.$router.push("/MemCenter")
    },
    clearCart(){
      var url = `${BASE_URL}/clearCart.php`;
      
      this.axios.get(url,{
        params:{
          mem_id:this.member.memId
        }
        
      })
      .then((res)=>{
        console.log(res)
      })
    },
    productMoney(val) {
      this.productNote = val;
    },
    getCouponInfo() {
      this.coupons = localStorage.getItem("coupon");
      
      switch (this.coupons) {
        case "0.90":
          this.cpsId = 1;
          break;
        case "0.80":
          this.cpsId = 2;
          break;
        case "0.70":
          this.cpsId = 3;
          break;
        case "0.60":
          this.cpsId = 4;
          break;
        default:
          this.cpsId = 5;
          break;
      }
     
    },
      changeCupons(){
      var url = `${BASE_URL}/deleteCoupons.php`; //上線
      this.axios.get(url,{
        params:{
          mem_id:this.member.memId,
          cps_id:this.cpsId
        }
      })
      .then((res)=>{
        console.log(res)
      })
    },
  },
  

  created() {
    this.Information();
    this.productMoney();
    this.getCouponInfo();

    if (!this.member) {
      alert("請先登入");
      this.$router.push("/MemLogin");
    } else {
      var url = `${BASE_URL}/shoppingCart.php`; //上線
    // var url = "http://localhost/CGD102_G2/public/api/shoppingCart.php"
      this.axios
        .get(url, {
          params: {
            mem_id: this.member.memId,
          },
        })
        .then((res) => {
          this.memory = res.data;
        });

      var url = `${BASE_URL}/member.php`; //上線
      // var url = "http://localhost/CGD102_G2/public/api/member.php";
      this.axios
        .get(url, {
          params: {
            MEM_ID: this.member.memId,
          },
        })
        .then((res) => {
          this.memberCoups = res.data;

        });
    }
  },
  

}
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
  align-items: flex-start;
  padding-top: 100px;
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

@media screen and (min-width: 768px)  {
  .confirm-container {
    width: 100%;
    max-width: 1200px;
    margin: auto;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    padding-top: 180px;
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
