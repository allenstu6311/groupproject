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
          <select
            name=""
            id=""
            class="sel"
            v-model="selFilter"
            @change="groupBy(selFilter)"
          >
            <option value="0" selected>隨機排續</option>
            <option value="1">價格由高至低</option>
            <option value="2">價格由低至高</option>
            <option value="3">評價由高至低</option>
            <option value="4">評價由低至高</option>
            <option value="5">日期由新至舊</option>
            <option value="6">日期由舊至新</option>
          </select>
          <button
            @click="toggle = true"
            :class="{ orderColor: toggle == true }"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-border-all"
              viewBox="0 0 16 16"
            >
              <path
                d="M0 0h16v16H0V0zm1 1v6.5h6.5V1H1zm7.5 0v6.5H15V1H8.5zM15 8.5H8.5V15H15V8.5zM7.5 15V8.5H1V15h6.5z"
              />
            </svg>
          </button>
          <button
            @click="toggle = false"
            :class="{ orderColor: toggle == false }"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-list-ul"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"
              />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <div class="commodity-total" v-if="commoditySale == 1">
      <div class="ifEmpty" v-if="empty == true">
        <h1>查無商品</h1>
      </div>

      <!-- =============================================橫排顯示 -->
      <div class="commodity-area col-12" v-if="toggle == false">
        <div
          class="commodity-obj"
          v-for="(item,index) in data"
          :key="item.PROD_ID"
        >
          <button @click="next(index, item.length)" class="slide-control">
            ＜
          </button>
          <div class="commodity-pic">
            <router-link to="/Detail">
              <div
                class="slide-pic"
                id="pic"
                :style="slidePic(index)"
                @click="addOrder(item.PROD_ID)"
              >
                <img :src="require(`../../public/api/pic/${item.PROD_PIC1}`)" />
                <img :src="require(`../../public/api/pic/${item.PROD_PIC2}`)" />
                <img :src="require(`../../public/api/pic/${item.PROD_PIC3}`)" />
              </div>
            </router-link>
          </div>
          <button @click="prev(index, item.length)" class="slide-control">
            ＞
          </button>
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
              <span v-if="star < 1">{{ block }}</span>
              <span v-if="star < 2">{{ block }}</span>
              <span v-if="star < 3">{{ block }}</span>
              <span v-if="star < 4">{{ block }}</span>
              <span v-if="star < 5">{{ block }}</span>
            </div>
          </div>
        </div>
      </div>

      <!-- =============================================卡片顯示 -->
      <div class="commodity-card" v-if="toggle == true">
        <div
          class="commodity-obj col-3"
          v-for="(item,index) in data"
          :key="item.PROD_ID"
        >
          <div class="commodity-pic">
            <button @click="next(index,item.length)" class="slide-control">＜</button>
            <router-link to="/Detail">
              <div
                class="slide-pic"
                ref="imgWidth"
                id="pic"
                @click="addOrder(item.PROD_ID)"
                :style="slidePic(index)"
              >
                <img :src="require(`../../public/api/pic/${item.PROD_PIC1}`)" />
                <img :src="require(`../../public/api/pic/${item.PROD_PIC2}`)" />
                <img :src="require(`../../public/api/pic/${item.PROD_PIC3}`)" />
              </div>
            </router-link>
            <button @click="prev(index,item.length)" class="slide-control">＞</button>
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
      <div class="commodity-page" v-show="disappear == false">
        <span @click="prevCurrPage">＜</span>
        <span
          v-for="(i, value) in 3"
          :key="i"
          @click="pagination(i, value)"
          :class="{ changePage: i == currPage }"
          >{{ i }}</span
        >
        <span @click="nextCurrPage">＞</span>
      </div>
    </div>
    <!-- =============================================特賣商品 -->

    <div class="special-offer" v-if="commoditySale == 2">
      <h1>目前無特價商品</h1>
    </div>
  </div>
</template>
<script>
import { BASE_URL } from "@/assets/js/common.js";
import lightBox from "@/components/lightBox.vue";
import { control } from "leaflet";
// const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..'
export default {
  components: {
    lightBox,
  },
  props: {
    price: Array,
    enter1: Number,
    enter2: Number,
    search: Array,
    search_empty: String,
    checkPrice: Array,
    checkTool: Array,
    checkList: Array,
  },
  data() {
    return {
      data: [],
      order: [],
      info: [],
      starNum: [],
      orderby: "",
      toggle: false,
      commoditySale: 1,
      empty: false,
      picWidth: "",
      photo: "",
      block: "☆",
      selFilter: 0,
      range_1: 0,
      range_2: 6,
      currPage: 1,
      disappear: false,
      member: [],
      lightBoxShow: false,
      slideNum: 0,
      slideImgActive: [],
      listData: [],
      cart: {},
    };
  },
  methods: {
    slidePic(index) {
      return { left: ` ${-100 * this.slideImgActive[index]}%` };
    },
    next(index) {
      if (this.slideImgActive[index] === 2) {
        this.slideImgActive[index] = 0;
      } else {
        this.slideImgActive[index] += 1;
      }
    },

    prev(index) {
      if (this.slideImgActive[index] === 0) {
        this.slideImgActive[index] = 2;
      } else {
        this.slideImgActive[index] -= 1;
    
      }
    },
    addOrder(id) {
   
      let count = this.data.findIndex((item) => item.PROD_ID === id);
      this.order = [
        {
          PROD_ID: this.data[count].PROD_ID,
          PROD_NAME: this.data[count].PROD_NAME,
          PROD_PRICE: this.data[count].PROD_PRICE,
          PROD_PIC1: this.data[count].PROD_PIC1,
          PROD_PIC2: this.data[count].PROD_PIC2,
          PROD_PIC3: this.data[count].PROD_PIC3,
          PROD_DATE: this.data[count].PROD_DATE,
          PROD_DESC1: this.data[count].PROD_DESC1,
          PROD_DESC2: this.data[count].PROD_DESC2,
          PROD_DESC3: this.data[count].PROD_DESC3,
          PROD_REVIEW: parseInt(this.data[count].PROD_REVIEW) + 1,
          PROD_TIMES: parseInt(this.data[count].PROD_TIMES) + 1,
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

      let members = sessionStorage.getItem("member");
      this.member = JSON.parse(members);
 
    },
    groupBy(value) {
      switch (value) {
        case "0":
          this.data.sort(function () {
            return 0.5 - Math.random();
          });
          break;

        case "1":
          this.data.sort(function (a, b) {
            return b.PROD_PRICE - a.PROD_PRICE;
          });
          break;

        case "2":
          this.data.sort(function (a, b) {
            return a.PROD_PRICE - b.PROD_PRICE;
          });
          break;

        case "3":
          this.data.sort(function (a, b) {
            return b.PROD_REVIEW - a.PROD_REVIEW;
          });
          break;

        case "4":
          this.data.sort(function (a, b) {
            return a.PROD_REVIEW - b.PROD_REVIEW;
          });
          break;

        case "5":
          this.data.sort(function (a, b) {
            return new Date(b.PROD_DATE) - new Date(a.PROD_DATE);
          });
          break;

        case "6":
          this.data.sort(function (a, b) {
            return new Date(a.PROD_DATE) - new Date(b.PROD_DATE);
          });
          break;
      }
    },

    clear() {
      this.order = [];
    },
    prevCurrPage() {
      this.currPage -= 1;
      this.pagination(this.currPage);
    },
    nextCurrPage() {
      this.currPage += 1;
      this.pagination(this.currPage);
    },
    pagination(i, value, currPage) {
      this.currPage = i;

      switch (i) {
        case 1:
          this.range_1 = 0;
          this.range_2 = 6;
          this.getCommodityInfo();

          break;
        case 2:
          this.range_1 = 6;
          this.range_2 = 6;
          this.getCommodityInfo();
          break;
        case 3:
          this.range_1 = 12;
          this.range_2 = 6;
          this.getCommodityInfo();
          break;
      }
    },
    getCommodityInfo() {
      var url = `${BASE_URL}/commoditylist.php`; //上線
      // var url = "http://localhost/CGD102_G2/public/api/commoditylist.php"
      this.axios
        .get(url, {
          params: {
            range_1: this.range_1,
            range_2: this.range_2,
          },
        })
        .then((res) => {
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
          this.$nextTick(() => {
            //等dom更新時會執行
            this.photo = document.getElementById("pic").clientWidth;
          });

          window.onresize = () => {
            let pic = document.getElementById("pic").clientWidth;
            this.photo = pic;
          };
        });
    },
  },

  created() {
    this.getCommodityInfo();
    this.clear();
    this.onlineStorage();

    var url = `${BASE_URL}/commoditylist.php`;
    this.axios
      .get(url, {
        params: {
          range_1: this.range_1,
          range_2: this.range_2,
        },
      })
      .then((res) => {
        if (res.data) {
          this.listData = res.data;
          this.listData.map((item) => {
            this.cart[item.PROD_ID] = {
              PROD_NAME: item.PROD_NAME,
              PROD_PRICE: item.PROD_PRICE,
              count: 0,
              slide: 0,
            };
            this.slideImgActive.push(0);
          });
        }
      });
  },
  mounted() {},
  watch: {
    toggle: {
      handler(newVal) {
        this.$nextTick(() => {
          if (newVal == false) {
            this.photo = document.getElementById("pic").clientWidth;

            // window.onresize = () => {
            // let pic = document.getElementById("pic").clientWidth;
            // this.photo = pic;

            // };
          } else {
            this.photo = document.getElementById("pic").clientWidth;
            // window.onresize = () => {
            //   let pic = document.getElementById("pic").clientWidth;
            //   this.photo = pic;
            // };
          }
        });
      },
    },
    price: {
      handler(newVal) {
        this.data = newVal;
        this.disappear = false;
      },
    },
    enter1: {
      handler(newVal) {
        console.log(newVal);
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
          this.disappear = true;
        }
      },
    },
    data: {
      handler(newVal) {
        if (newVal.length == 0) {
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
          this.disappear = false;
        }
      },
    },

    checkList: {
      handler(newVal) {
        this.data = newVal;
        if (this.data) {
          this.disappear = true;
        }
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
