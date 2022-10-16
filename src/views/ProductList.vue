<template>

  <div class="background-pic">
    <img src="../assets/images/bcgFlower.png" alt="" />
  </div>
  <div class="banner">
            <img src="../assets/images/bannerProduct.png" alt="">
        </div>
        <div class="main_title">
            <img src="../assets/images/productTitle.png" alt="">
        </div>
          <div class="title_area">
                <h2 class="sure_title">
                    <p class="title_font">嚴</p>
                    <p class="title_font">選</p>
                    <p class="title_font">商</p>
                    <p class="title_font">品</p>
                </h2>
                <div class="commodity-post">
                    <small>• EXQUISITE PRODUCTS • </small>
                </div>
            </div>
  <div class="product-search">
    <input
      type="text"
      name=""
      v-model="search_obj"
      placeholder="請輸入商品名稱"
    />
    <button @click="searchStar" style="font-size:22px">
   <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>
    </button>
  </div>
  <div class="Product-container">
    <Commodity
      :price="priceInfo"
      :enter1="int_Num1"
      :enter2="int_Num2"
      :search="project_target"
      :search_empty="search_obj"
      :checkPrice="product_price"
      :checkTool="product_tool"
      :checkList="checkList"
    />
    <Filter
      @filter="filterRange"
      @int_1="intValue1"
      @int_2="intValue2"
      @checkMoney="productMoney"
      @tool="productTool"
    />
  </div>

</template>

<script>
import {BASE_URL} from '@/assets/js/common.js'
// const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..'
import Commodity from "@/components/Commodity.vue";
import Filter from "@/components/Filter.vue";
export default {
  components: {
  
    Commodity,
    Filter,
  },
  data() {
    return {
      priceInfo: [],
      int_Num1: 0,
      int_Num2: 0,
      search_obj: "",
      project_target: [],
      product_price: [],
      product_tool: [],
    };
  },
  methods: {
    filterRange(val) {
      this.priceInfo = val;
    },
    intValue1(val) {
      this.int_Num1 = val;
    },
    intValue2(val) {
      this.int_Num2 = val;
    },
    searchStar() {
        var url = `${BASE_URL}/search.php` //上線
      // var url = "http://localhost/CGD102_G2/public/api/search.php"
      this.axios
        .get(url, {
          params: {
            target: this.search_obj,
          },
        })
        .then((res) => {
          this.project_target = res.data;
        });
    },
    productMoney(val) {
      this.product_price = val;
    },
    productTool(val) {
      this.product_tool = val;
    },
  },
  watch: {
    search_obj: {
      handler(newVal) {},
    },
    product_price: {
      handler(newVal) {
        // console.log("watch-->", newVal);
      },
    },
  },
  computed: {
    checkList() {
      if (this.product_price.length == 0) return this.product_tool;
      if (this.product_tool.length == 0) return this.product_price;
      return this.product_tool.filter(
        (v) => this.product_price.findIndex((u) => v.PROD_ID == u.PROD_ID) > -1
      );
    },
  },
  created(){
      if(this.member){
          this.updateCart()
    }
  }
};
</script>
<style lang="scss" scoped>
* {
  box-sizing: border-box;
}
.product-search {
  width: 100%;
  max-width: 1200px;
  margin: auto;
  display: flex;
  padding: 50px 10px;
  justify-content: flex-end;

  input {
    width: 100%;
    max-width: 450px;
    padding: 10px;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
    border: none;
    box-shadow: 0px 0px 10px rgb(208, 208, 208);
  }
  button {
    width: 100px;
    font-size: 18px;
    font-weight: 800;
    padding: 5px 20px;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    border: none;
    background-color: #163d82;
    color: white;
    text-align: center;
  }
}
.Product-container {
  display: flex;
  margin: auto;
  justify-content: center;
}
</style>
