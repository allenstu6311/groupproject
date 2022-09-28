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
                  <form action="" method="get">
                    <p>請選擇按摩師傅</p>
                    <select
                      v-model="orderTherapist"
                      name=""
                      id="orderTherapist"
                      class="therapist"
                    >
                      <option value="" disabled>請選擇按摩師傅</option>
                      <option value="李駿燕">李駿燕 師傅</option>
                      <option value="言子倩">言子倩 師傅</option>
                      <option value="康晉壕">康晉壕 師傅</option>
                      <option value="倪玉涓">倪玉涓 師傅</option>
                    </select>
                    <p>請選擇時間長度</p>
                    <select
                      v-model="orderPrice"
                      name=""
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
                    <div class="calendar">
                      <input
                        id="datetimepicker"
                        class="xdsoft_datetimepicker"
                        type="text"
                      />
                    </div>

                    <div class="content_footer">
                      <div class="price">NT$ {{ orderPrice }}</div>
                      <input
                        id="confirm"
                        class="btnLittle"
                        type="button"
                        @click="confirm"
                        value="確認預約"
                      />
                    </div>
                  </form>
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
          <!-- <div v-else="activeTab == 'C'" class="tab_container">
            1. 請問可以現場預約嗎？<br />
            &nbsp;&nbsp;&nbsp;建議您先線上預約服務的時間與指定的師傅，以避免來店久候，耽誤到您保貴的時間！<br />
            <br />
            2. 請問建議的按摩時間長度？<br />
            &nbsp;&nbsp;&nbsp;時間的長短，建議足部按摩60分鐘，其他服務120分鐘，這樣按摩師才有足夠時間做完整的服務。<br />
          </div> -->
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
export default {
  props: {},
  data() {
    return {
      isActive: true, //預測剛開始是打開active
      isActive2: false,
      isActive3: false,
      orderList: [],
      orderMsg: "全身穴道按摩",
      orderTherapist: "李駿燕",
      orderPrice: "1600",
      orderDate: "",
      timeStart: "",
      timeEnd: "",
      activeTab: "A",
      msgCardList: [
        {
          name: "精油深層放鬆",
          intro:
            "提供珍貴漢方中藥草精油，在純手技按摩手法外，利用不同精油的植物特性加強放鬆。以中式推拿舒展筋骨，西式芳療順淋巴，從身體到情緒，把負面疲勞一一帶走，達到身心排毒的功效。",
          timespan_1: 120,
          price_1: 2400,
          rec_1: "適合平常沒有按摩習慣或身體很多部位都很緊繃者​",
          timespan_2: 60,
          price_2: 1600,
          rec_2: "適合平常有按摩習慣者​",
          pic: "resv2.jpg",
          pic_alt: "精油深層放鬆照片",
        },
        {
          name: "東方經絡指壓",
          intro:
            "找到引發痠痛的源頭部位，根據每個人的情況，靈活運用傳統東方指壓技法，推順氣結並深入經絡，精準的穴位指壓能快速緩解筋肉痠痛，真正順暢筋絡，達到放鬆舒緩，或更深度的修復。",
          timespan_1: 120,
          price_1: 2200,
          rec_1: "適合平常沒有按摩習慣或身體很多部位都很緊繃者​",
          timespan_2: 60,
          price_2: 1500,
          rec_2: "適合平常有按摩習慣者​",
          pic: "resv3.jpg",
          pic_alt: "東方經絡指壓照片",
        },
        {
          name: "足部舒壓按摩",
          intro:
            "按摩前先讓每位客人沐足，雙腳浸泡在加了薰衣草沐浴鹽的溫水裡。接著透過專業手法，舒緩您小腿肌肉的緊繃，並依照刺激穴道原理，刺激腳底各部位反射區來活絡循環，鬆解腿部疲勞感，有效去除小腿水腫。",
          timespan_1: 120,
          price_1: 1800,
          rec_1: "適合平常沒有按摩習慣或身體很多部位都很緊繃者​",
          timespan_2: 60,
          price_2: 1200,
          rec_2: "適合平常有按摩習慣者​",
          pic: "resv4.jpg",
          pic_alt: "足部舒壓按摩照片",
        },
      ],
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
        orderTherapist: orderTherapist.value,
        orderPrice: orderPrice.value,
      });
      this.setStorage();
      window.alert("預約成功");
    },
    setStorage() {
      localStorage.setItem("resvOrder", JSON.stringify(this.orderList));
    },
    getStorage() {
      var orderLists = localStorage.getItem("resvOrder");
      if (!orderLists) return;
      this.orderList = JSON.parse(orderLists);
    },
  },
  created() {
    this.getStorage();
  },
  watch: {
    orderList: {
      handler(newVal, oldVal) {
        this.setStorage(newVal);
      },
      deep: true, //監聽陣列內容
    },
  },
};
</script>