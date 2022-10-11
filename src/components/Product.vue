<template>
  <div class="background-pic">
    <img src="../assets/images/bcgFlower.png " alt="" />
  </div>
  <!-- ========================================banner -->
  <div class="product-title" >

    <div class="product-detail">
        <div class="product-pic   magnifier" ref="magnifier" @mouseover="showZoomBox" @mouseout="hiddenZoomBox" @mousemove="moveCursor" >  
      <img
        :src="require(`../../public/api/pic/${order[0].PROD_PIC1}`)"
        v-if="page == 1"
        :class="{ light: page == 1 }"
        class="magnifier-thumbnail"
        
      />

      <img
        :src="require(`../../public/api/pic/${order[0].PROD_PIC2}`)"
        v-if="page == 2"
        :class="{ light: page == 2 }"
        class="magnifier-thumbnail"
      />
      <img
        :src="require(`../../public/api/pic/${order[0].PROD_PIC3}`)"
        v-if="page == 3"
        :class="{ light: page == 3 }"
        class="magnifier-thumbnail"
      />
<!-- =======================================放大鏡 -->

      <span class="magnifier-cursor" :style="cursorStyle" v-show="isShowCursor==true"></span>
        <div class="magnifier-font" v-show="isShowCursor">
          <p>放大鏡</p>  
        </div>
     <div class="magnifier-area" v-show="isShowCursor">
    
         <img
        :src="require(`../../public/api/pic/${order[0].PROD_PIC1}`)"
        v-if="page == 1"
        :class="{ light: page == 1 }"
        :style="magnifierAreaStyle"
      />
      <img
        :src="require(`../../public/api/pic/${order[0].PROD_PIC2}`)"
        v-if="page == 2"
        :class="{ light: page == 2 }"
        :style="magnifierAreaStyle"
      />
      <img
        :src="require(`../../public/api/pic/${order[0].PROD_PIC3}`)"
        v-if="page == 3"
        :class="{ light: page == 3 }"
        :style="magnifierAreaStyle"
      />

     </div>
    </div>
     <div class="pic-slide">
        <button @click="prev()">＜</button>
        <div class="pic-chose">
          <img
            :src="require(`../../public/api/pic/${order[0].PROD_PIC1}`)"
            :class="{ light: page == 1 }"
            @click="page = 1"
          />
          <img
            :src="require(`../../public/api/pic/${order[0].PROD_PIC2}`)"
            :class="{ light: page == 2 }"
            @click="page = 2"
          />
          <img
            :src="require(`../../public/api/pic/${order[0].PROD_PIC3}`)"
            :class="{ light: page == 3 }"
            @click="page = 3"
          />
        </div>

        <button @click="next()">＞</button>
      </div>

    </div>
  
  
    <div class="pic-control">
      <div
        class="pic-number"
        v-for="i in 3"
        :class="{ changeColor: page == i }"
        @click="changePic(i)"
        :key="i"
      >
        {{ i }}
      </div>
    </div>

    <div class="product-body">
      <div class="product-name">
        <h2>{{ order[0].PROD_NAME }}</h2>
      </div>
      <div class="product-star" style="z-index:-1">
        <p class="star-score">{{score}}</p>
        <p v-for="item in star" :key="item" >★</p>
        <p v-if="star < 1">{{ block }}</p>
        <p v-if="star < 2">{{ block }}</p>
        <p v-if="star < 3">{{ block }}</p>
        <p v-if="star < 4">{{ block }}</p>
        <p v-if="star < 5">{{ block }}</p>
      </div>

      <div class="product-price">
        <p>${{ order[0].PROD_PRICE }}元</p>
      </div>
      <div class="product-introduce">
        <div class="product-txt">
          <ul>
            <li>💓{{ order[0].PROD_DESC1 }}</li>
            <li>💓{{ order[0].PROD_DESC2 }}</li>
            <li>💓{{ order[0].PROD_DESC3 }}</li>
          </ul>
          <br />
        </div>
        <div class="product-number">
          <button @click="reduceNum(order)">–</button>
          <input type="text" v-model="product_num" />
          <button @click="addNum(order)">+</button>
        </div>
        <div class="product-addcar">
          <button class="btnLarge" @click="addCar(order[0].PROD_ID);">加入購物車</button>
            <router-link to="/Cart">
              <button class="btnLarge redBtn" @click="direct()">直接購買</button>
            </router-link>
        </div>
      </div>
    </div>
  </div>
  <transition name="fade" @after-enter="after">
    <div class="ball" v-show="fly==true">
         <img
        :src="require(`../../public/api/pic/${order[0].PROD_PIC1}`)"
        v-if="page == 1"
        :class="{ light: page == 1 }"
      />
           <img
        :src="require(`../../public/api/pic/${order[0].PROD_PIC2}`)"
        v-if="page == 2"
        :class="{ light: page == 2 }"
      />
      <img
        :src="require(`../../public/api/pic/${order[0].PROD_PIC3}`)"
        v-if="page == 3"
        :class="{ light: page == 3 }"
      />
    </div>
  </transition>
</template>
<style lang="scss" scoped>
img {
  opacity: 0.2;
}
.light {
  opacity: 1;
}
.review-star {
  display: flex;
  p {
    font-size: 35px;
    margin: 0 5px;
    font-weight: 800;
    color: #b52011;
  }
}
.ball{
  img{
      width: 50%;
  }

}
 .fade-enter-from,
    .fade-enter-to{
        width: 30%;
        opacity: 1;
        color: black;
        left: 50%;
        top:100%;
        display: none;
 
    }
    .fade-enter-active
    {
        transition:1.5s;
        position: absolute;
        opacity: 1;
        display: flex;
    }
    .fade-enter-to,
    .fade-leave-from{
        width: 0%;
        opacity: 0;
        color: red;
        left: 90%;  
        top: -10%; 
    }
     .magnifier {
    position: relative;
    width: 500px;
    height: 500px;
    margin: 0 auto;  
  }
  .magnifier-cursor {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
    display: inline-block;
    background-color: rgba(199, 199, 199, 0.5);
    width: 50px;
    height: 50px;
    cursor: crosshair;
  }
  .magnifier-area {
    width: 400px;
    height: 400px;
    position: absolute;
    top: 0;
    right: 0;
    transform: translateX(110%);
    background-color: #e8e8e8;
    overflow: hidden;
    img{
      width: 1000px;
      height: 1000px;
      position: absolute;
      z-index: 10;
    }
  }
  .magnifier-font{
    width: 400px;
    background-color: black;
    position: absolute;
    top: -7%;
    left: 108%;
   
    p{
         text-align:center;
         color: white;
         padding: 5px;
    }
  }
  



</style>

<script>
import {BASE_URL} from '@/assets/js/common.js'
// const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..'
export default {
  data() {
    return {
      order: [],
      page: 1,
      score: [],
      star: [],
      member: "",
      cart: [],
      calculate:[],
      block: "☆",
      product_num: 1,
      memory:[],
      fly:false,

      cursorWidth: 100, // 光标宽度 
      cursorHeight: 100, // 光标高度 
      cursorLeft: 0, // 光标圈相对放大区域左侧距离
      cursorTop: 0, // 光标圈相对放大区域顶部距离
      isShowCursor: false, // 是否显现光圈
      magnifierBoxLeft: 0, // 图片原始区域位置，用于移入时计算放大区域位置
      magnifierBoxTop: 0, // 图片原始区域位置，用于移入时计算放大区域位置
   
    };
  },
  mounted(){
    this.magnifierBoxLeft = this.$refs.magnifier.offsetLeft;
    this.magnifierBoxTop = this.$refs.magnifier.offsetTop;
  },
  computed:{
      cursorStyle() {
          return {
          width: this.cursorWidth + 'px',
          height: this.cursorHeight + 'px',
          left: this.cursorLeft + 'px',
          top: this.cursorTop + 'px'
        }
      },
       magnifierAreaStyle() {
        return {
          // width: this.cursorWidth + 'px',
          // height: this.cursorHeight + 'px',
          left: -this.cursorLeft * 1.5 + 'px', // 此处相对位置需要取负值，因为光标往下移动时，图片需要相对往上移才能显示对应的区域
          top: -this.cursorTop * 1.5+ 'px'
        }
      }
  },
  methods: {
      showZoomBox(event) {
        const halfCursor = this.cursorWidth/2;
        const left = event.clientX- this.magnifierBoxLeft-halfCursor;
        const top = event.clientY  - this.magnifierBoxTop-halfCursor;
        // 处理光标左侧
        if(left < 0) { // 防止左侧溢出
          this.cursorLeft = 0;
        }
        if(left >= 0 && left <= 500 - this.cursorWidth) {
          this.cursorLeft = left;
        }
        if(left > 500 - this.cursorWidth) { // 防止右侧溢出
          this.cursorLeft = 500 - this.cursorWidth;
        }
        // 处理光标顶部
        if(top < 0) { // 防止顶部溢出
          this.cursorTop = 0;
        }
        if(top >= 0 && top <= 500 - this.cursorWidth) {
          this.cursorTop = top;
        }
        if(top > 500 - this.cursorWidth) { // 防止底部溢出
          this.cursorTop = 500 - this.cursorWidth;
        }
        this.isShowCursor = true;
      },
      hiddenZoomBox() {
        this.isShowCursor = false;
        this.cursorLeft = 100;
        this.cursorTop = 100;
      },
      moveCursor(event) {
       
        const halfCursor = this.cursorWidth/2;
        const left = event.clientX - this.magnifierBoxLeft-200;
        const top = event.clientY - this.magnifierBoxTop-230;
        
        // 处理光标左侧
        if(left < 0) { // 防止左侧溢出
          this.cursorLeft = 0;
        }
        if(left >= 0 && left <= 500 - this.cursorWidth) {
          this.cursorLeft = left;
        }
        if(left > 500 - this.cursorWidth) { // 防止右侧溢出
          this.cursorLeft = 500 - this.cursorWidth;
        }
        // 处理光标顶部
        if(top < 0) { // 防止顶部溢出
          this.cursorTop = 0;
        }
        if(top >= 0 && top <= 500 - this.cursorWidth) {
          this.cursorTop = top;
        }
        if(top > 500 - this.cursorWidth) { // 防止底部溢出
          this.cursorTop = 500 - this.cursorWidth;
        }
        this.isShowCursor = true;
      },
     after(){
        this.fly=false
     },
    addNum() {
      this.product_num += 1;
    },
    reduceNum(item) {
      if (this.product_num > 0) {
        this.product_num -= 1;
      }
    },
    changePic(i) {
      this.page = i;
    },
    prev() {
      if (this.page > 1) {
        this.page -= 1;
      }
    },
    next() {
      if (this.page < 3) {
        this.page += 1;
      }
    },
    
    addCar(id) {
      let sameProduct = this.memory.find(item=>item.PROD_ID===id)
      // let index = this.cart.find(item=>item.PROD_ID===id)
      this.fly=true
    
       if(!sameProduct){
        alert("成功加入")
         this.IncreaseShoppingCart() 
      }else{
        alert("購物車已有相同物品")
      }
      // if(!index){
      //   alert("成功加入")
      //   this.cart.push({
      //   PROD_ID: this.order[0].PROD_ID,
      //   PROD_NAME: this.order[0].PROD_NAME,
      //   PROD_PRICE: this.order[0].PROD_PRICE,
      //   PROD_PIC1: this.order[0].PROD_PIC1,
      //   PROD_PIC2: this.order[0].PROD_PIC2,
      //   PROD_PIC3: this.order[0].PROD_PIC3,
      //   PROD_DATE: this.order[0].PROD_DATE,
      //   PROD_NUM: this.product_num,
      //   PROD_DESC1: this.order[0].PROD_DESC1,
      //   PROD_DESC2: this.order[0].PROD_DESC2,
      //   PROD_DESC3: this.order[0].PROD_DESC3,
      //   PROD_REVIEW: this.order[0].PROD_REVIEW + 1,
      //   PROD_TIMES: this.order[0].PROD_TIMES + 1,
      // });

      //   this.calculate.push({
      //   PROD_ID: this.order[0].PROD_ID,
      //   PROD_NAME: this.order[0].PROD_NAME,
      //   PROD_PRICE: this.order[0].PROD_PRICE,
      //   PROD_PIC1: this.order[0].PROD_PIC1,
      //   PROD_PIC2: this.order[0].PROD_PIC2,
      //   PROD_PIC3: this.order[0].PROD_PIC3,
      //   PROD_DATE: this.order[0].PROD_DATE,
      //   PROD_NUM: this.product_num,
      //   PROD_DESC1: this.order[0].PROD_DESC1,
      //   PROD_DESC2: this.order[0].PROD_DESC2,
      //   PROD_DESC3: this.order[0].PROD_DESC3,
      //   PROD_REVIEW: this.order[0].PROD_REVIEW + 1,
      //   PROD_TIMES: this.order[0].PROD_TIMES + 1,
      // });
      // }else{
      //   alert("購物車已有相同物品")
      // }
      

      // this.setStorage();
    },

      IncreaseShoppingCart() {
      this.axios.get(
        // "http://localhost/CGD102_G2/public/api/changeShoppingCart.php",
        `${BASE_URL}/changeShoppingCart.php`,
        {
          params: {
            judge: 1,
            mem_id: this.member.memId,
            prod_id:this.order[0].PROD_ID,
            prod_qty:this.product_num,
          },
        }
      );
    },
    // setStorage() {
    //   localStorage.setItem("cart", JSON.stringify(this.cart));
    //   localStorage.setItem("calculate", JSON.stringify(this.calculate));
    // },
    getStar() {
      let orders = localStorage.getItem("order");
      if (!orders) return;
      this.order = JSON.parse(orders);

      this.score = (
      this.order[0].PROD_REVIEW / this.order[0].PROD_TIMES
      ).toFixed(1);
      this.star = parseInt(this.score);

      // let carts = localStorage.getItem("cart");
      // if (!carts) return;
      // this.cart = JSON.parse(carts);

      // let calculates = localStorage.getItem("calculate");
      // if (!calculates) return;
      // this.calculate = JSON.parse(calculates);
    },
  },
  created() {
    this.getStar();

    let members = sessionStorage.getItem("member");
    this.member = JSON.parse(members)

    // if(!this.member){
        
    // }else{
       
    //       this.axios
    //   // .get("http://localhost/CGD102_G2/public/api/shoppingCart.php", {
    //   .get(`${BASE_URL}/shoppingCart.php`, {
    //     params: {
    //       mem_id: this.member.memId,
    //     },
    //   })
    //   .then((res) => {
    //     this.memory = res.data;
    //     // console.log("before",this.memory)
    //   });
    // }
  },
  mounted(){
  
  }
};
</script>

