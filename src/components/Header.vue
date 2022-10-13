<template>
  <header class="page_header">
    <nav>
      <input type="checkbox" id="check" v-model="navCheck"/>
      <label for="check" class="hamburger">
        <span class="line1"></span>
        <span class="line2"></span>
        <span class="line3"></span>
      </label>
      <router-link to="/home" class="header_logo"
        ><img src="../assets/images/headerLogo.png" alt=""
      /></router-link>

      <ul class="navList">
        <li><router-link to="/about">關於我們</router-link></li>
        <li><router-link to="/reservation">預約按摩</router-link></li>
        <li><router-link to="/ProductList">商品專區</router-link></li>
        <li><router-link to="/MassageSchool">按摩小學堂</router-link></li>
        <li><router-link to="/message">常見問題</router-link></li>
      </ul>
      <div class="header_icon">
        <!--這是已登入的大頭--->
        <input type="checkbox" id="check2" />
        <label for="check2">
          <span class="header_loginMember" :style="memlogged" v-if="!show"
            ><img src="../assets/images/loginHead.png" alt=""
          /></span>
        </label>
        
        <!--這是大頭下拉選單--->
        <ul class="headerLogin" v-if="!show">
          <li :style="memlogged">
            <router-link to="/MemCenter">會員中心</router-link>
          </li>
          <li :style="memlogged" @click="logout">
            <router-link to="">登出</router-link>
          </li>
        </ul>

        <!--這是未登入的大頭--->
        <span class="header_member" :style="memIconShow"  v-if="show"
          ><router-link to="/MemLogin"
            ><img src="../assets/images/headerMember.png" alt=""/></router-link
        ></span>

        <!--這是購物車--->
        <span class="header_shopping_cart"
          ><router-link to="/cart"
            ><img src="../assets/images/headerShoppinCart.png" alt="" />
            <div class="cart-number" v-if="!show">{{cartLength}}</div></router-link
          ></span
        >
      </div>
    </nav>
  </header>
</template>
<script>
import {BASE_URL} from '@/assets/js/common.js'
import { useRouter } from "vue-router";
export default {
  props:{
   
  },
  data() {
    return {
      iconShow: true,
      selectShow: false,
      CartLength:false,
      memory:[],
      router: useRouter(),
      member:[],
      memberInfo:[],
      show:true
    };
  },
  watch:{
    memberInfo:{
      handler(newVal){
        if(newVal){
          this.show=false
        }
      }
    }
  },
  computed: {
    memIconShow() {
      return {
        display: this.iconShow ? "" : "",
      };
    },
    memlogged() {
      return {
        display: this.selectShow ? "block" : "",
      };
    },
    cartLength:function(){
  
        return  this.memory.length
    },
   
  },
  
  methods:{
    logout() {
      sessionStorage.removeItem("member");
      
      this.router.push({ path: '/home' });
      this.show=true
    },
    updateCartFromCartPage(list) {
      this.memory = list;
    },
    updateMember(info) {
        this.show=false
        this.CartLength=true
        this.memberInfo= info
        this.getCartNumber()
    },
    updateCart() {
        var url = `${BASE_URL}/shoppingCart.php`; //上線
    // var url = "http://localhost/CGD102_G2/public/api/shoppingCart.php"
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
          if(!isSame){
            this.memory = res.data;
            return;
          }
          isSame = newVal.every(v => oldVal.findIndex(u => u.PROD_ID === v.PROD_ID && u.PROD_QTY == v.PROD_QTY) > -1)//?
        
          if(!isSame){
            this.memory = res.data;
          }
        });
    },
    getCartNumber(){
     
      if (this.member) {
             var url = `${BASE_URL}/shoppingCart.php`; //上線
      this.axios
        .get(url, {
          params: {
            mem_id: this.member.memId,
          },
        })
        .then((res) => {
          this.memory = res.data;
          if(this.memory.length>0){
            this.showCartLength=true
          }
        });
    }
    }
  },
  mounted() {
    let checkLogin = sessionStorage.getItem("member");
    if (checkLogin) {
      // (this.iconShow = false), (this.selectShow = true);
      this.show=false
    }
  },
  created() {
      let members = sessionStorage.getItem("member");
      this.member = JSON.parse(members);
      this.getCartNumber()
  },
 
};
</script>

<style lang="scss">
// @import "../assets/style.scss";
</style>
