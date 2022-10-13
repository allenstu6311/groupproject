<template>
  <div class="resv_page">
    <main>
      <section class="msg container">
        <div class="topic">
          <div class="breadcrumb">
            <a href="/home">首頁</a> > <a href="/reservation">預約按摩</a> >
            <a class="this_page" href="/resvPage">全身穴道按摩</a>
          </div>
          <div class="content container">
            <div class="row">
              <div class="col col-12 col-md-5 col-xl-6">
                <div class="content_pic frame">
                  <div class="framei">
                    <img
                      src="../assets/images/resv1.jpg"
                      alt="全身穴道按摩照片"
                    />
                  </div>
                </div>
              </div>
              <div class="col col-12 col-md-7 col-xl-6">
                <div class="content_txt">
                  <h1 class="name bold">
                    <div class="circle">全</div>
                    <div class="circle">身</div>
                    <div class="circle">穴</div>
                    <div class="circle">道</div>
                    <div class="circle">按</div>
                    <div class="circle">摩</div>
                  </h1>
                  <!-- <form action="" method=""> -->
                    <p>請選擇按摩師傅</p>
                    <select
                      v-model="THERAPIST_ID"
                      name="therapist"
                      id="orderTherapist"
                      class="therapist"
                    >
                      <option value="" disabled>請選擇按摩師傅</option>
                      <option value="1">李駿燕 師傅</option>
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
                      <option disabled value="">請選擇時間長度</option>
                      <option value="2400" selected>
                        <span class="msg_timespan_1">120分鐘</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="msg_price_1">NT$2400</span>
                      </option>
                      <option value="1600">
                        <span class="msg_timespan_1">60分鐘</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="msg_price_1">NT$1600</span>
                      </option>
                    </select>
                    <DatePicker
                      v-model="valueTime"
                      type="datetime"
                      format="yyyy-MM-dd HH:mm"
                      placeholder="請選擇預約日期及時間"
                      :options="options1"
                      :time-picker-options="{steps: [1, 60, 10], disabledHours:[0,1,2,3,4,5,6,7,8,9,22,23]}"
                    />
                    <div class="content_footer">
                      <div class="price">NT$ {{ orderPrice }}</div>
                      <input
                        id="confirm"
                        class="btnLittle"
                        type="button"
                        @click="submit()"
                        value="確認預約"
                      />
                    </div>
                  <!-- </form> -->
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

          <div v-if="activeTab == 'A'" class="tab_container">
            專業的全身穴道筋絡按摩，釋放肌肉壓力，紓解筋絡酸痛，恰當的力道和熟練的手技讓您有全新的感受。<br />
            <br />
            適合對象 : 疲累、代謝循環差、睡眠品質不佳、精神不濟。<br />
            <br />
            中式穴道按摩強調經絡、穴道這類特定位置的加壓按摩，或是揉捏特定部位放鬆深層肌肉，指壓手法繁多，
            包括點、按、揉、撥等，除使用指腹進行操作，還常用到掌根、手背、手肘等部位。<br />
            按摩背部、四肢穴位時用力較大；按摩頭部、腹部穴位時則不會太用力。<br />
            通過刺激特定穴位，產生些許疼痛的感覺，達到通筋活絡、舒緩肌肉緊繃、調理養生的作用。<br />
            <br />
            按指穴運用放鬆及舒緩之獨門按摩手法，改變按摩的面向與力道來刺激神經、穴位，在輕重中轉換，
            讓您從「頭」到「腳」釋放壓力疲憊，回復身體最適能量，找回正平衡。<br />
          </div>
          <div v-else-if="activeTab == 'B'" class="tab_container">
            沒有特別的規定適合穴位按摩的時間，只要在個人方便的時候做即可。<br />
            <br />
            1. 穴位按摩可在飯前執行。<br />
            2.
            避免時機：劇烈運動後、飲酒後、剛沐浴後、剛用餐後、發燒超過38度、出血時、血壓明顯升高時，懷孕避免刺激腹部和脛部。<br />
            3.
            若按摩過程有任何不適，請隨時反應給按摩師，調節不同按摩部位的按摩力道。<br />
            4.
            您如有「發炎」、「腫瘤」、「經放射治療部位」、「皮膚病」及「骨頭及關節突出處」等症狀，請於按摩前提前告知，避免按摩師給予太大力道。
          </div>
          <div v-else-if="activeTab == 'C'" class="tab_container">
            1. 請問可以現場預約嗎？<br />
            &nbsp;&nbsp;&nbsp;建議您先線上預約服務的時間與指定的師傅，以避免來店久候，耽誤到您保貴的時間！<br />
            <br />
            2. 請問建議的按摩時間長度？<br />
            &nbsp;&nbsp;&nbsp;時間的長短，建議足部按摩60分鐘，其他服務120分鐘，這樣按摩師才有足夠時間做完整的服務。<br />
          </div>
        </div>
      </section>
      <section class="related">
        <div class="title_area">
          <h2 class="sure_title">
            <p class="title_font">相</p>
            <p class="title_font">關</p>
            <p class="title_font">按</p>
            <p class="title_font">摩</p>
          </h2>
          <small>• RELATED MASSAGE •</small>
        </div>
        <div class="items row">
          <div
            class="item col col-12 col-md-4 col-xl-4"
            v-for="(item, index) in msgCardList"
            :key="index"
          >
            <a href="" class="item_link">
              <div class="item_pic">
                <img
                  :src="require(`@/assets/images/${item.pic}`)"
                  :alt="item.pic_alt"
                />
              </div>
              <div class="item_txt">
                <span class="item_name">
                  {{ item.name }}
                </span>
                <span class="item_price_2"> NT$ {{ item.price_2 }} </span>
              </div>
            </a>
          </div>
        </div>
      </section>
    </main>
  </div>
</template>
<script>
import { DatePicker } from 'view-ui-plus';
// import 'view-ui-plus/dist/styles/viewuiplus.css'
import {BASE_URL} from '@/assets/js/common.js'
import lightBox from "@/components/lightBox.vue"
export default {
  props: {},
  components: {
    DatePicker,
    lightBox
  },
  data() {
    return {
      lightBoxShow:false,
      isActive: true, //預測剛開始是打開active
      isActive2: false,
      isActive3: false,
      orderList: [],
      orderMsg: "全身穴道按摩",
      THERAPIST_ID: "1",
      orderPrice: "1600",
      MSG_ID:"1",
      RESV_DATE: "",
      RESV_TIME_START: "",
      RESV_TIME_END: "",
      activeTab: "A",
      // msgCardList: [
      //   {
      //     name: "精油深層放鬆",
      //     intro:
      //       "提供珍貴漢方中藥草精油，在純手技按摩手法外，利用不同精油的植物特性加強放鬆。以中式推拿舒展筋骨，西式芳療順淋巴，從身體到情緒，把負面疲勞一一帶走，達到身心排毒的功效。",
      //     timespan_1: 120,
      //     price_1: 2400,
      //     rec_1: "適合平常沒有按摩習慣或身體很多部位都很緊繃者​",
      //     timespan_2: 60,
      //     price_2: 1600,
      //     rec_2: "適合平常有按摩習慣者​",
      //     pic: "resv2.jpg",
      //     pic_alt: "精油深層放鬆照片",
      //   },
      //   {
      //     name: "東方經絡指壓",
      //     intro:
      //       "找到引發痠痛的源頭部位，根據每個人的情況，靈活運用傳統東方指壓技法，推順氣結並深入經絡，精準的穴位指壓能快速緩解筋肉痠痛，真正順暢筋絡，達到放鬆舒緩，或更深度的修復。",
      //     timespan_1: 120,
      //     price_1: 2200,
      //     rec_1: "適合平常沒有按摩習慣或身體很多部位都很緊繃者​",
      //     timespan_2: 60,
      //     price_2: 1500,
      //     rec_2: "適合平常有按摩習慣者​",
      //     pic: "resv3.jpg",
      //     pic_alt: "東方經絡指壓照片",
      //   },
      //   {
      //     name: "足部舒壓按摩",
      //     intro:
      //       "按摩前先讓每位客人沐足，雙腳浸泡在加了薰衣草沐浴鹽的溫水裡。接著透過專業手法，舒緩您小腿肌肉的緊繃，並依照刺激穴道原理，刺激腳底各部位反射區來活絡循環，鬆解腿部疲勞感，有效去除小腿水腫。",
      //     timespan_1: 120,
      //     price_1: 1800,
      //     rec_1: "適合平常沒有按摩習慣或身體很多部位都很緊繃者​",
      //     timespan_2: 60,
      //     price_2: 1200,
      //     rec_2: "適合平常有按摩習慣者​",
      //     pic: "resv4.jpg",
      //     pic_alt: "足部舒壓按摩照片",
      //   },
      // ],
      valueTime: "", //datepicker取出來的值 
      timeResult: "", //轉換成想要的格式
      disableTimeArray: [
        ["2022-10-10 10:00:00", "2022-10-13 12:00:00"],
        // ["2022-09-29", "2022-10-07"],
        // { start: "2022-09-20", end: "2022-09-24" },
      ],
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
      console.log(this.timeResult);
   
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
    submit(){
      var xhr= new XMLHttpRequest();

      xhr.onload = function(){
        if (xhr.status == 200){
          console.log(xhr.responseText);
          // alert(xhr.responseText);
          // let resv = JSON.parse(xhr.responseText);
          if (xhr.responseText == 1){
            alert("預約成功"); //還要判斷該時段滿了沒 & 要跳轉到會員中心看訂單嗎？
          }
        }else{
          alert(xhr.status);
        }
      }


      let url = "http://localhost/CGD102_G2/public/api/resv.php";
      // let url = `${BASE_URL}/resv.php`; //上線用
      xhr.open("post", url, true);
      xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
//我從前台要送什麼資料去後端？
      // let resv_data = `RESV_DATE=${this.RESV_DATE}`;
      let resv_data = `THERAPIST_ID=${this.THERAPIST_ID}&MSG_ID=${this.MSG_ID}&RESV_DATE=${this.RESV_DATE}&RESV_TIME_START=${this.RESV_TIME_START}&RESV_TIME_END=${this.RESV_TIME_END}`;
      console.log(resv_data);
      xhr.send(resv_data);

                        // RESV_ID = 1 &
                        // MEM_ID = 1 &
                        // THERAPIST_ID= 4 &
                        // MSG_ID = 2 &
// MSG_ID=${this.$route.query.msg_id}&
    }
  },
  created() {
    // 拿到從php傳回來的msg的data, id= 1,2,3...
    this.getStorage();
    var url = `${BASE_URL}/msg.php` //上線用

    this.axios.get(url,{
      params:{
        msg_id:this.$route.query.msg_id
      }
    })
    // console.log(this.$route.query.msg_id)
    let members = sessionStorage.getItem("member");
    this.member = JSON.parse(members)
    if(!this.member){
        this.lightBoxShow=true
    }else{
        this.lightBoxShow=false
    }   
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
      this.timeResult = `${time.getFullYear()}-${time.getMonth() + 1}-${time.getDate()} ${time.getHours()}:${time.getMinutes()}:${time.getSeconds()}`;
      this.RESV_DATE = `${time.getFullYear()}-${time.getMonth() + 1}-${time.getDate()}`;
      // this.RESV_TIME_START = `${time.getHours()}:${time.getMinutes()}`;
      this.RESV_TIME_START = `${time.getHours()}`;
      this.RESV_TIME_END =`${time.getHours() + 1}`; //只有1小時的時段可選擇就直接+1
// 1hr=60min=3600s=3600000ms;
      console.log(this.valueTime);
      console.log(this.timeResult);
      console.log(this.RESV_DATE);
      console.log(this.RESV_TIME_START);
      console.log(this.RESV_TIME_END);

    }, 
  },
  computed: {
    options1() {
      let thus = this;
      return {
        disabledDate(date) {
          // return new Date(date).getMonth() + 1 == 9;
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