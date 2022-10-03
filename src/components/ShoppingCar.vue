<template>
  <div class="background-pic">
    <img src="../assets/images/bcgFlower.png" alt="" />
  </div>

  <!-- ========================================banner -->

  <div class="purchase-area" style="padding:50px 0">
    <div class="purchase-area-title">
      <div class="title-font">加</div>
      <div class="title-font">購</div>
      <div class="title-font">區</div>
    </div>
  </div>

  <div class="add-on-container">
   
    <div class="add-on-product" v-for="item in data" :key="item.PROD_ID" :style="{left:150*index+'px',
    transition:0.4+'s'}">
      <div class="add-on-pic" @click="addShoppingCart(item.PROD_ID)">
        <img :src="require(`../assets/phps/pic/${item.PROD_PIC1}`)" alt="" />
      </div>
      <div class="add-on-price-name">
        {{item.PROD_NAME}}
      </div>
      <div class="add-on-price">
        <p>${{item.PROD_PRICE}}</p>
      </div>
    </div>
    
  </div>
  <div class="add-on-control">
        <span class="prev" @click="productPrev">◀</span>
        <span class="next" @click="productNext">▶</span>
    </div>
</template>

<script>
export default {
  props:{

  },
  
  data() {
    return {
      data: [],
      index:0,
      addOn:[],
      cart:[],
      calculate:[],
    };
  },
  methods:{
    productPrev(){
        if(this.index<0){
            this.index+=1
        }
    
    },
    productNext(){
        if(this.index>-7){
            this.index-=1
        }
        
    },
    addShoppingCart(id){
        
        let count = this.data.findIndex(item=>item.PROD_ID===id)
        // let num = this.addOn.find(item=>item.PROD_ID===id)
        let block = this.cart.find(item=>item.PROD_ID===id)
        // console.log("data",count)
      if(!block){
        alert("成功加入")
        this.cart.push({
        PROD_ID: this.data[count].PROD_ID,
        PROD_NAME: this.data[count].PROD_NAME,
        PROD_PRICE: this.data[count].PROD_PRICE,
        PROD_PIC1: this.data[count].PROD_PIC1,
        PROD_PIC2: this.data[count].PROD_PIC2,
        PROD_PIC3: this.data[count].PROD_PIC3,
        PROD_DATE: this.data[count].PROD_DATE,
        PROD_NUM: 1,
        PROD_DESC1: this.data[count].PROD_DESC1,
        PROD_DESC2: this.data[count].PROD_DESC2,
        PROD_DESC3: this.data[count].PROD_DESC3,
        PROD_REVIEW: this.data[count].PROD_REVIEW + 1,
        PROD_TIMES: this.data[count].PROD_TIMES + 1,

      });
    
      }else{
        alert("購物車已有相同物品")
      }
      this.updateStorage()
      // console.log("add",this.addOn)
      this.$emit("productInfo",this.addOn)
      
      // location.reload()
      
    },
    updateStorage() {
      localStorage.setItem("user", JSON.stringify(this.member));
      localStorage.setItem("cart", JSON.stringify(this.cart));
      localStorage.setItem("calculate", JSON.stringify(this.calculate));
    },
   
    cartInfo() {
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

      let totalPrices = localStorage.getItem("totalPrice");
      if (!totalPrices) return;
      this.totalPrice = JSON.parse(totalPrices);

      this.score = (
        this.order[0].PROD_REVIEW / this.order[0].PROD_TIMES
      ).toFixed(1);
      this.star = parseInt(this.score);
    },
  },
  created() {
    this.axios
      .get("http://localhost/CGD102_G2/src/assets/phps/addOn.php")
      .then((res) => {
        this.data = res.data;
        // console.log(this.data);
      });
      this.cartInfo()
    
  },
};
</script>
