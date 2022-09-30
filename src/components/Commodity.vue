<template>
  <div class="commodity-total col-7">
    <div class="commodity-container col-12">
      <div class="commodity-order col-12">
        <div class="commodity-sale">
          <span
            class="bold"
            @click="commoditySale = 1"
            :class="{ saleColor: commoditySale == 1 }"
            >全部商品</span
          >
          <span
            class="bold"
            @click="commoditySale = 2"
            :class="{ saleColor: commoditySale == 2 }"
            >特價商品</span
          >
        </div>
        <div class="commodity-filter">
          <button @click="orderby = 1" :class="{ orderColor: orderby == 1 }">
            價格排序
          </button>
          <button @click="orderby = 2" :class="{ orderColor: orderby == 2 }">
            評價排序
          </button>
          <button @click="toggle = !toggle">{{ areaShow }}</button>
        </div>
      </div>
    </div>

    <div class="commodity-total" v-if="commoditySale == 1">
      <div class="ifEmpty" v-if="empty == true">
        <h1>查無商品</h1>
      </div>

      <!-- =============================================橫排顯示 -->
      <div class="commodity-area col-12" v-if="toggle == false">
        <div class="commodity-obj" v-for="item in data" :key="item.PROD_ID">
          <button @click="next(item)">＜</button>
          <div class="commodity-pic">
            <router-link to="/Detail">
              <div
                class="slide-pic"
                id="pic"
                :style="{
                  left: photo * item.SLIDE + 'px',
                  transition: 0.4 + 's',
                }"
                @click="addOrder(item.PROD_ID)"
              >
                <img :src="require(`../assets/phps/pic/${item.PROD_PIC1}`)" />
                <img :src="require(`../assets/phps/pic/${item.PROD_PIC2}`)" />
                <img :src="require(`../assets/phps/pic/${item.PROD_PIC3}`)" />
              </div>
            </router-link>
          </div>
          <button @click="prev(item)">＞</button>
          <div class="commodity-body">
            <div class="commodity-name">
              <h5 class="bold">{{ item.PROD_NAME }}</h5>
            </div>
            <div class="commodity-price">
              <p>
                $<strong>{{ item.PROD_PRICE }}</strong>
              </p>
            </div>
            <div class="commodity-evaluation">
              <span
                v-for="i in parseInt(
                  (item.PROD_REVIEW + 1) / (item.PROD_TIMES + 1)
                )"
                :key="i"
                >★</span
              >
            </div>
          </div>
        </div>
      </div>

      <!-- =============================================卡片顯示 -->
      <div class="commodity-card" v-if="toggle == true">
        <div
          class="commodity-obj col-3"
          v-for="item in data"
          :key="item.PROD_ID"
        >
          <div class="commodity-pic">
            <button @click="next(item)">＜</button>
            <router-link to="/Detail">
              <div
            
                class="slide-pic"
                  ref="imgWidth" id="pic"
                @click="addOrder(item.PROD_ID)"
                :style="{
                  left: photo * item.SLIDE + 'px',
                  transition: 0.4 + 's',
                }"
              >
                <img :src="require(`../assets/phps/pic/${item.PROD_PIC1}`)" />
                <img :src="require(`../assets/phps/pic/${item.PROD_PIC2}`)" />
                <img :src="require(`../assets/phps/pic/${item.PROD_PIC3}`)" />
              </div>
            </router-link>
            <button @click="prev(item)">＞</button>
          </div>

          <div class="commodity-body">
            <div class="commodity-name">
              <h4 class="bold">{{ item.PROD_NAME }}</h4>
            </div>
            <div class="commodity-price">
              <p>
                $<strong>{{ item.PROD_PRICE }}</strong>
              </p>
            </div>
            <div class="commodity-evaluation">
              <span
                v-for="i in parseInt(
                  (item.PROD_REVIEW + 1) / (item.PROD_TIMES + 1)
                )"
                :key="i"
                >★</span
              >
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- =============================================特賣商品 -->

    <div class="special-offer" v-if="commoditySale == 2">
      <h1>目前無特價商品</h1>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    price: Array,
    enter1: Number,
    enter2: Number,
    search: Array,
    search_empty: String,
    checkPrice: Array,
    checkTool: Array,
  },
  data() {
    return {
      data: [],
      order: [],
      info: [],
      starNum: [],
      orderby: 1,
      toggle: false,
      commoditySale: 1,
      areaShow: "卡片",
      empty: false,
      picWidth: "",
      photo: "",
    };
  },
  methods: {
    next(item) {
      if (item.SLIDE < 0) {
        item.SLIDE += 1;
      }
    },
    prev(item) {
      if (item.SLIDE > -2) {
        item.SLIDE -= 1;
      }
    },
    addOrder(id) {
      let index = this.data.findIndex((item) => item.PROD_ID === id);
      this.order = [
        {
          PROD_ID: this.data[index].PROD_ID,
          PROD_NAME: this.data[index].PROD_NAME,
          PROD_PRICE: this.data[index].PROD_PRICE,
          PROD_PIC1: this.data[index].PROD_PIC1,
          PROD_PIC2: this.data[index].PROD_PIC2,
          PROD_PIC3: this.data[index].PROD_PIC3,
          PROD_DATE: this.data[index].PROD_DATE,
          // PROD_NUM:this.data[index].PRODUCT_NUM,

          PROD_DESC1: this.data[index].PROD_DESC1,
          PROD_DESC2: this.data[index].PROD_DESC2,
          PROD_DESC3: this.data[index].PROD_DESC3,
          PROD_REVIEW: this.data[index].PROD_REVIEW + 1,
          PROD_TIMES: this.data[index].PROD_TIMES + 1,
        },
      ];
     
      this.setStorage();
    },
    setStorage() {
      localStorage.setItem("order", JSON.stringify(this.order));
    },
    onlineStorage() {
      let orders = localStorage.getItem("order");
      if (!orders) return;
      this.order = JSON.parse(orders);
    },
    clear() {
      this.order = [];  
    },
    
  },
  created() {
    this.axios.get("http://localhost/CGD102_G2/src/assets/phps/commoditylist.php")
      .then((res) => {
        // console.log(this.price)
        this.data = res.data;
        this.info = res.data;
             
        for (let i = 0; i < this.data.length; i++) {
          this.starNum.push(
            (
              (this.data[i].PROD_REVIEW + 1) /
              (this.data[i].PROD_TIMES + 1)
            ).toFixed(1)
          );
        }
           console.log(this.order)
      this.$nextTick(() => {
          //等dom更新時會執行
          this.photo = document.getElementById("pic").clientWidth;
          console.log(this.photo) 

        });
      
          window.onresize = () => {
            let pic = document.getElementById("pic").clientWidth;
            this.photo = pic;
         
          };
         
      });
       
       
    this.clear();
    this.onlineStorage();

  
    
  },
  mounted(){
      

  },

  watch: {
    toggle: {
      handler(newVal) {
        if (newVal == false) {
          this.areaShow = "橫排";
           this.photo = document.getElementById("pic").clientWidth-49;
          console.log(this.photo) 
        } else {
          this.areaShow = "卡片";
          this.photo = document.getElementById("pic").clientWidth+50;
          console.log(this.photo)
        
         
        }
      },
    },
    price: {
      handler(newVal) {
        console.log("price--?", newVal);
        this.data = newVal;
      },
    },
    enter1: {
      handler(newVal) {
        if (newVal == "") {
          this.data = this.info;
        }
      },
    },
    enter2: {
      handler(newVal) {
        if (newVal == "") {
          this.data = this.info;
        }
      },
    },
    search: {
      handler(newVal) {
        if (newVal != "") {
          this.data = newVal;
        }
      },
    },
    data: {
      handler(newVal) {
        if (newVal.length == null) {
          this.empty = true;
        } else {
          this.empty = false;
        }
      },
    },
    search_empty: {
      handler(newVal) {
        if (newVal == "") {
          this.data = this.info;
        }
      },
    },
    checkPrice: {
      handler(newVal) {
        console.log("check-->", newVal);
        this.data = newVal;
      },
    },
    checkTool: {
      handler(newVal) {
        console.log("new-->", newVal);
        this.data = newVal;
      },
    },
  },
};
</script>
<style lang="scss" scoped>
.commodity-total {
  display: flex;
  flex-direction: column;
}
.commodity-evaluation {
  margin: 10px 0;
  span {
    font-size: 20px;
    margin: 10px 0;
    font-weight: 800;
    color: #b52011;
  }
}
</style>
