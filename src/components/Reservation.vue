<template>
  <div class="wrapper reservation background_flower">
    <h1 class="sr_only">預約按摩</h1>
    <main>
      <section class="resv_banner">
        <div class="banner">
          <img src="../assets/images/resvBnr.png" alt="預約按摩照片" />
        </div>
        <div class="main_title">
          <img
            class=""
            src="../assets/images/resvBnrTitle.png"
            alt="預約按摩"
          />
        </div>
      </section>
      <section class="resv_content">
        <div class="title_area">
          <h2 class="sure_title">
            <p class="title_font">嚴</p>
            <p class="title_font">選</p>
            <p class="title_font">按</p>
            <p class="title_font">摩</p>
          </h2>
          <small>• EXQUISITE MASSAGE •</small>
        </div>
        <div id="view" class="msg_card_list">
          <!-- vue v-for -->
          <div
            class="msg_card_frame"
            v-for="(msgCard, index) in msgCardList"
            :key="index"
            :class="{ reverse: index % 2 === 1, btnLeft: index%2 !==1}"
          >
            <div class="msg_card row">
              <div class="msg_card_txt col col-12 col-md-12 col-xl-8">
                <h3 class="name item_title">
                  {{ msgCard.name }}
                </h3>
                <div class="intro">
                  {{ msgCard.intro }}
                </div>
                <div class="price_form">
                  <div class="long_time">
                    <div class="long_time_price">
                      <span class="timespan timespan_1">
                        {{ msgCard.timespan_1 }}分鐘 </span
                      >/
                      <span class="price price_1">
                        NT${{ msgCard.price_1 }}
                      </span>
                    </div>
                    <p class="rec rec_1">
                      {{ msgCard.rec_1 }}
                    </p>
                  </div>
                  <div class="short_time">
                    <div class="short_time_price">
                      <span class="timespan timespan_2">
                        {{ msgCard.timespan_2 }}分鐘 </span
                      >/
                      <span class="price price_2">
                        NT${{ msgCard.price_2 }}
                      </span>
                    </div>
                    <p class="rec rec_2">
                      {{ msgCard.rec_2 }}
                    </p>
                  </div>
                </div>
                <div class="btn">
                  <a class="btnLarge" href="/resvPage">立即預約</a>
                </div>
              </div>
              <div class="pic_ctnr msg_card_pic col col-12 col-md-8 col-xl-4">
                <img
                  :src="require(`@/assets/images/${msgCard.pic}`)"
                  :alt="msgCard.pic_alt"
                />
              </div>
            </div>
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
      msgCardList: [
        {
          name: "全身穴道按摩",
          intro:
            "經典穴道按摩課程，經過經絡及淋巴循環，釋放緊繃、痠痛的肌肉；深層紓壓舒緩身心，特別推薦給工作壓力大、肌肉僵硬容易痠痛者，例如久坐辦公室或放鬆運動過後的身體。",
          timespan_1: 120,
          price_1: 2400,
          rec_1: "適合平常沒有按摩習慣或身體很多部位都很緊繃者​",
          timespan_2: 60,
          price_2: 1600,
          rec_2: "適合平常有按摩習慣者​",
          pic: "resv1.jpg",
          pic_alt: "全身穴道按摩照片",
        },
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
};
</script>