<template>
  <header class="page_header">
    <nav>
      <input type="checkbox" id="check" />
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
          <span class="header_loginMember" :style="memlogged"
            ><img src="../assets/images/loginHead.png" alt=""
          /></span>
        </label>

        <!--這是大頭下拉選單--->
        <ul class="headerLogin">
          <li :style="memlogged">
            <router-link to="/MemCenter">會員中心</router-link>
          </li>
          <li :style="memlogged" @click="logout">
            <router-link to="">登出</router-link>
          </li>
        </ul>

        <!--這是未登入的大頭--->
        <span class="header_member" :style="memIconShow"
          ><router-link to="/MemLogin"
            ><img src="../assets/images/headerMember.png" alt="" /></router-link
        ></span>

        <!--這是購物車--->
        <span class="header_shopping_cart"
          ><router-link to="/cart"
            ><img src="../assets/images/headerShoppinCart.png" alt="" />
            <div class="cart-number" v-if="showCartLength==true">{{cartLength}}</div></router-link
          ></span
        >
      </div>
    </nav>
  </header>
</template>
<script>
export default {
  data() {
    return {
      iconShow: true,
      selectShow: false,
      showCartLength:false,
      memory:[],
    };
  },
  computed: {
    memIconShow() {
      return {
        display: this.iconShow ? "" : "none",
      };
    },
    memlogged() {
      return {
        display: this.selectShow ? "block" : "none",
      };
    },
    cartLength:function(){
      return  this.memory.length
    },
    cartTotal:function(){
      return JSON.parse(JSON.stringify(this.memory))
    }
  },
  watch:{
     memory:{
      handler(newVal,oldVal){
        for(let i=0;i<newVal.length;i++){
           if(newVal!=oldVal){
    
        }
        }
       
        
      }
     },
     deep:true,
  },

  methods: {
    logout() {
      sessionStorage.removeItem("member");
      location.reload();
    },
    updateCart() {
            // var url = `${BASE_URL}/api/shoppingCart`; //上線
    var url = "http://localhost/CGD102_G2/public/api/shoppingCart.php"
      this.axios
        .get(url, {
          params: {
            mem_id: this.member.memId,
          },
        })
        .then((res) => {
          this.memory = res.data;
        });
    },
      getCartNumber(){
      if (this.member) {
      this.axios
        .get("http://localhost/CGD102_G2/public/api/shoppingCart.php", {
          params: {
            mem_id: this.member.memId,
          },
        })
        .then((res) => {
          this.memory = res.data;
          if(this.memory.length>0){
            this.showCartLength=true
          }
          // console.log("before",this.memory)
        });
    }
    }
  },
  mounted() {
    let checkLogin = sessionStorage.getItem("member");
    if (checkLogin) {
      (this.iconShow = false), (this.selectShow = true);
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
@import "../assets/style.scss";
</style>
