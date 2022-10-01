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

    <div class="shopping-list-order" v-for="item in cart" :key="item" >
      <input type="checkbox" v-model="calculate" :value="item">
      <!-- {{calculate}} -->
      <div class="shopping-list-pic">
        <img :src="require(`../assets/phps/pic/${item.PROD_PIC1}`)" alt="" />
      </div>
      <div class="shopping-list-body">
        <div class="shopping-list-name">
          <h5>{{ item.PROD_NAME }}</h5>
          <br>
          <p>✅{{ item.PROD_DESC1 }}</p>
          <p>✅{{ item.PROD_DESC2 }}</p>
          <p>✅{{ item.PROD_DESC3 }}</p>
        </div>
 
        <div class="shopping-list-calculate">
          <h5>${{ item.PROD_PRICE }}</h5>
        </div>
        <div class="shopping-list-star">
            <p v-for="item in parseInt(
                  (item.PROD_REVIEW) / (item.PROD_TIMES)
                )" :key="item">★</p>
        </div>
        <div class="shopping-list-int">
          <button @click="reduceNum(item)">-</button
          ><input
            style="text-align: center"
            type="text" 
            :value="item.PROD_NUM"
            size="1"
          /><button @click="addNum(item)">+</button>
         
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
      <span><input type="checkbox" v-model="checkOut" />全選</span
      >
      <button class="btnLarge" @click="drop">刪除選取項目</button>
    </div>
    <div class="shopping-check">
      <div class="shopping-checkout">
        <p>商品金額:{{productPrice}}元</p>
        <p>折扣金額:{{totalPrice-productPrice }}</p>
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
import { nextTick } from '@vue/runtime-core';
export default {
  data() {
    return {
      cart: [],
      coupon: [],
      sel:"1",
      totalPrice:0,
      calculate:[],
      checkOut:true,
     
  
    };
  },
  methods: {
    reduceNum(item){
        item.PROD_NUM-=1
    
    },
    addNum(item){
        item.PROD_NUM+=1
        
    },
    reduceCar(id){
        let count = this.cart.findIndex(item=>item.PROD_ID===id)
       
        this.cart.splice(count,1)
        this.setLocal()
    
    },
    
 
    pay() {
      //     this.axios.get("http://localhost/CGD102_G2/src/assets/php/productOrder.php",{
      //     params:{
      //         MEM_ID:,
      //         PROD_ORDERS_STATUS:,
      //         PROD_ORDERS_DATE:,
      //         PROD_ORDERS_SUBTOTAL:,
      //         PROD_ORDERS_CPS_ID:,
      //         PROD_ORDERS_TOTAL:,
      //         PROD_ORDERS_ADDRESS:,
      //     }
      // })
    },
    setLocal(){
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

     

      this.score = (
        this.order[0].PROD_REVIEW / this.order[0].PROD_TIMES
      ).toFixed(1);
      this.star = parseInt(this.score);
    },
    selChange(sel){
   
        this.totalPrice =parseInt(this.productPrice*this.sel)   
    }
  

  
  },
    computed:{
        buyCar:function(){
            return JSON.parse(JSON.stringify(this.cart))
        },
        checkBox:function(){
            return JSON.parse(JSON.stringify(this.calculate))
        }
    },
  created() {
    this.axios
      .get("http://localhost/CGD102_G2/src/assets/phps/member.php")
      .then((res) => {
        this.coupon = res.data;
        console.log(this.coupon);
        
      });
      
          
   this.$nextTick(()=>{
  
        })
    this.getInfo();
    this.selChange();
  },
   
  watch:{
    //   buyCar:{
    //     handler(newVal,oldVal){
          
    //         console.log("-->",newVal)
    //         //  this.productPrice = ""
    //     //     for(let i=0;i<newVal.length;i++){
    //     //     this.productPrice = parseFloat(this.productPrice+newVal[i].PROD_PRICE*newVal[i].PROD_NUM)
    //     // } 
           
    //     }
           
    // },
    calculate:{
        handler(newVal){
            this.productPrice = ""
            for(let i=0;i<newVal.length;i++){
            this.productPrice = parseFloat(this.productPrice+newVal[i].PROD_PRICE*newVal[i].PROD_NUM)
        } 
            this.sel=1
            this.totalPrice = parseInt(this.productPrice*this.sel) 
            this.setLocal()

            console.log(newVal)
        }
    },
    checkOut:{
        handler(newVal){
            console.log(newVal)
            if(newVal==true){
                this.calculate = this.cart
            }else{
                this.calculate =[]
            }
        }
    },
    deep:true,
 
  },
  mounted() {
     
  },
  update() {
    //     this.totalPrice =Math.round(this.productPrice*this.sel) 
    // console.log(this.sel)

    //         this.productPrice = ""
    //         for(let i=0;i<this.cart.length;i++){
    //         this.productPrice = parseFloat(this.productPrice+this.cart[i].PROD_PRICE*this.cart[i].PROD_NUM)
    //     } 
  },
};
</script>
