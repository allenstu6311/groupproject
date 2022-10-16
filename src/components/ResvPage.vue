<template>
  <div class="resv_page">
    <main>
      <section class="msg container">
        <div class="topic">
          <div class="breadcrumb">
            <router-link to="/home">首頁</router-link> > <router-link to="/reservation">預約按摩</router-link> >
            <p class="this_page">{{msgData[0].MSG_NAME}}</p>
          </div>
          <div class="content container">
            <div class="row">
              <div class="col col-12 col-md-5 col-xl-6">
                <div class="content_pic frame">
                  <div class="framei">
                    <img
                      :src="require(`@/assets/images/${msgData[0].MSG_PIC}`)"
                      alt="全身穴道按摩照片"
                    />
                  </div>
                </div>
              </div>
              <div class="col col-12 col-md-7 col-xl-6">
                <div class="content_txt">
                  <h1 class="name bold">
                    <div class="circle">{{ msgData[0].MSG_NAME[0] }}</div>
                    <div class="circle">{{ msgData[0].MSG_NAME[1] }}</div>
                    <div class="circle">{{ msgData[0].MSG_NAME[2] }}</div>
                    <div class="circle">{{ msgData[0].MSG_NAME[3] }}</div>
                    <div class="circle">{{ msgData[0].MSG_NAME[4] }}</div>
                    <div class="circle">{{ msgData[0].MSG_NAME[5] }}</div>
                  </h1>
                  <p>請選擇按摩師傅</p>
                  <select
                    v-model="THERAPIST_ID"
                    name="therapist"
                    id="orderTherapist"
                    class="therapist"
                  >
                    <!-- <option value="" disabled>請選擇按摩師傅</option> -->
                    <option value="1" selected>李駿燕 師傅</option>
                    <option value="2">言子倩 師傅</option>
                    <option value="3">康晉壕 師傅</option>
                    <option value="4">倪玉涓 師傅</option>
                  </select>
                  <p>請選擇時間長度</p>
                  <select
                    v-model="orderPrice"
                    name="price_timespan"
                    id="orderPrice"
                    class="timespan"
                  >
                    <!-- <option disabled value="">請選擇時間長度</option> -->
                    <!-- <option value="2400" >
                        <span class="msg_timespan_1">120分鐘</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="msg_price_1">NT$2400</span>
                      </option> -->
                    <option :value="msgData[0].MSG_TIMESPAN_2" selected>
                      <span class="msg_timespan_1">{{ msgData[0].MSG_TIMESPAN_2 }}分鐘</span>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <span class="msg_price_1"
                        >NT${{ msgData[0].MSG_PRICE_2 }}</span
                      >
                    </option>
                  </select>
                  <p>請選擇預約日期及時間</p>
                  <DatePicker
                    
                    v-model="valueTime"
                    type="datetime"
                    format="yyyy-MM-dd HH:mm"
                    placeholder="請選擇預約日期及時間"
                    :options="options1"
                    hide-disabled-options
                    :time-picker-options="{
                      hideDisabledOptions,
                      steps: [1, 60],
                      disabledHours: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 22, 23],
                    }"
                  />
                  <div class="content_footer">
                    <div class="price">NT$ {{ msgData[0].MSG_PRICE_2 }}</div>
                    <input
                      id="confirm"
                      class="btnLittle"
                      type="button"
                      @click="submit()"
                      value="確認預約"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="supplement">
          <div class="tabs row">
            <button
              class="tab col col-4 col-md-3 col-xl-3"
              :class="{ btnActive: isActive }"
              @click="tabA"
            >
              按摩描述
            </button>
            <button
              class="tab col col-4 col-md-3 col-xl-3"
              :class="{ btnActive: isActive2 }"
              @click="tabB"
            >
              注意事項
            </button>
            <button
              class="tab col col-4 col-md-3 col-xl-3"
              :class="{ btnActive: isActive3 }"
              @click="tabC"
            >
              常見問題
            </button>
          </div>

          <div v-if="activeTab == 'A'" class="tab_container" v-html="msgData[0].MSG_DESC">
          </div>
          <div v-else-if="activeTab == 'B'" class="tab_container"
          v-html="msgData[0].MSG_NOTICE">
          </div>
          <div v-else-if="activeTab == 'C'" class="tab_container"
          v-html="msgData[0].MSG_FAQ">
          </div>
        </div>
      </section>
    </main>
  </div>
  <lightBox  :lightBoxShow ="showBox" />

</template>
<script>
import { DatePicker } from "view-ui-plus";
// import 'view-ui-plus/dist/styles/viewuiplus.css'
import { BASE_URL } from "@/assets/js/common.js";
import { useRouter } from "vue-router";
import lightBox from "@/components/lightBox.vue";
export default {
  props: {},
  components: {
    DatePicker,
    lightBox,
  },
  data() {
    return {
      value1: '09:00:00',
      router: useRouter(),
      showBox:false,
      msgDataPic: "",
      msgData: [],
      lightBoxShow: false,
      isActive: true, //預測剛開始是打開active
      isActive2: false,
      isActive3: false,
      orderList: [],
      orderMsg: "全身穴道按摩",
      THERAPIST_ID: "1",
      orderPrice: "60",
      MSG_ID: "",
      RESV_DATE: "",
      RESV_TIME_START: "",
      RESV_TIME_END: "",
      activeTab: "A",
      valueTime: "10:00:00", //datepicker取出來的值
      timeResult: "", //轉換成想要的格式
      disableTimeArray: [["2022-10-10 10:00:00", "2022-10-13 12:00:00"]],
      optionTime: {
        disabledHours: "[1,5,10]",
        disabledMinutes: "[0,10,20]",
      },
    };
  },
  methods: {
    tabA() {
      this.activeTab = "A";
      this.isActive = true;
      this.isActive2 = false;
      this.isActive3 = false;
    },
    tabB() {
      this.activeTab = "B";
      this.isActive = false;
      this.isActive2 = true;
      this.isActive3 = false;
    },
    tabC() {
      this.activeTab = "C";
      this.isActive = false;
      this.isActive2 = false;
      this.isActive3 = true;
    },
    confirm() {
      this.orderList.push({
        orderMsg: "全身穴道按摩",
        THERAPIST_ID: THERAPIST_ID.value,
        orderPrice: orderPrice.value,
      });
      this.setStorage();
      // console.log(this.timeResult);
bmit()
      window.alert("預約嗎？");
    },
    setStorage() {
      localStorage.setItem("resvOrder", JSON.stringify(this.orderList));
    },
    getStorage() {
      var orderLists = localStorage.getItem("resvOrder");
      if (!orderLists) return;
      this.orderList = JSON.parse(orderLists);
    },
    submit() {
      if(!this.member){
         this.showBox = !this.showBox
      }else{
        if(this.RESV_TIME_START==0){
          alert("請選擇時間"); 
        }else{
          // xhr 寫法
          var xhr = new XMLHttpRequest();
          xhr.onload = function () {
            if (xhr.status == 200) {
              if (xhr.responseText == 1) {
                alert("預約成功");
                // window.location.replace("/reservation"); //開發用
                window.location.replace("/cgd102/g2/reservation"); //上線用
                // this.router.push({ path: '/reservation'});
              }
            } else {
              alert(xhr.status);
            }
          };

          // let urlInsert = "http://localhost/CGD102_G2/public/api/resv.php";
          let urlInsert = `${BASE_URL}/resv.php`; //上線用
          xhr.open("post", urlInsert, true);
          xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
          // let resv_data = `RESV_DATE=${this.RESV_DATE}`;
          this.MEM_ID=`${this.member.memId}`;
          // console.log('MEM_ID',this.MEM_ID);
          let resv_data = `MEM_ID=${this.MEM_ID}&THERAPIST_ID=${this.THERAPIST_ID}&MSG_ID=${this.MSG_ID}&RESV_DATE=${this.RESV_DATE}&RESV_TIME_START=${this.RESV_TIME_START}&RESV_TIME_END=${this.RESV_TIME_END}`;
          console.log(resv_data);
          xhr.send(resv_data);
        }
      }
   
    },
 
  },
  created() {
    let members = sessionStorage.getItem("member");
    this.member = JSON.parse(members);
    this.MSG_ID = this.$route.query.msg_id;
  
    // 拿到從php傳回來的msg的data, id= 1,2,3...
    this.getStorage();
    // let urlSelect = "http://localhost/CGD102_G2/public/api/msgPage.php"; //開發用
    let urlSelect = `${BASE_URL}/msgPage.php` //上線用

    this.axios
      .get(urlSelect, {
        params: {
          msg_id: this.$route.query.msg_id,
        },
      })
      .then((res) => {
        // console.log(res.data);
        // console.log(res.data[0]);
        // console.log(res.data[0].MSG_NAME);
        // console.log(res.data[0].MSG_NAME[0]);
        // console.log(res.data[0].MSG_PIC);
        this.msgData = res.data;
        this.msgDataPic=this.msgData[0].MSG_PIC;
      });

    // console.log(this.MSG_ID);
  },
  watch: {
    orderList: {
      handler(newVal, oldVal) {
        this.setStorage(newVal);
      },
      deep: true, //監聽陣列內容
    },
    valueTime(newVal) {
      let time = new Date(newVal);
      // 把datepicker取出來的值 轉換成想要的格式 2022-10-10 10:00:00

      this.timeResult = `${time.getFullYear()}-${
        time.getMonth() + 1
      }-${time.getDate()} ${time.getHours()}:${time.getMinutes()}:${time.getSeconds()}`;
      this.RESV_DATE = `${time.getFullYear()}-${time.getMonth() + 1 <10?'0':''}${time.getMonth() + 1}-${time.getDate()<10?'0':''}${time.getDate()}`;
      this.RESV_TIME_START = `${time.getHours()}`;
      this.RESV_TIME_END = `${time.getHours() + 1}`; //只有1小時的時段可選擇就直接+1
      // console.log(this.valueTime);
      // console.log(this.timeResult);
      // console.log(this.RESV_DATE);
      // console.log(this.RESV_TIME_START);
      // console.log(this.RESV_TIME_END);
      // console.log("dd",dd);
    },
  },
  computed: {
    options1() {
      let thus = this;
      return {
        disabledDate(date) {
          // return new Date(date).getMonth() + 1 == 9; //整個8月不能被預訂
          return thus.disableTimeArray.some((item) => {
            //some表示只要有包含在這段時間區間裡面 就return true, true就會被disable掉, date是選擇的日期
            return (
              (date.valueOf() >= Date.parse(item[0]) &&
                date.valueOf() <= Date.parse(item[1])) ||
              (date && date.valueOf() < Date.now() - 86400000)
            );
          });
        },
      };
    },
  },
};
</script>
<style lang="scss" scoped>
@import "view-ui-plus/dist/styles/viewuiplus.css";
</style>