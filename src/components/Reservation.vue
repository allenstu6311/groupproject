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
            <div class="msg_card row"  >
              <div class="msg_card_txt col col-12 col-md-12 col-xl-8" >
                <h3 class="name item_title">
                  {{ msgCard.MSG_NAME }}
                </h3>
                <div class="intro">
                  {{ msgCard.MSG_INTRO }}
                </div>
                <div class="price_form">
                  <div class="long_time">
                    <div class="long_time_price">
                      <span class="timespan timespan_1">
                        {{ msgCard.MSG_TIMESPAN_1 }}分鐘 </span
                      >/
                      <span class="price price_1">
                        NT${{ msgCard.MSG_PRICE_1 }}
                      </span>
                    </div>
                    <p class="rec rec_1">
                      {{ msgCard.MSG_REC_1 }}
                    </p>
                  </div>
                  <div class="short_time">
                    <div class="short_time_price">
                      <span class="timespan timespan_2">
                        {{ msgCard.MSG_TIMESPAN_2 }}分鐘 </span
                      >/
                      <span class="price price_2">
                        NT${{ msgCard.MSG_PRICE_2 }}
                      </span>
                    </div>
                    <p class="rec rec_2">
                      {{ msgCard.MSG_REC_2 }}
                    </p>
                  </div>
                </div>
                <div class="resv_btn">
                  <router-link class="btnLarge" to="/resvPage">立即預約</router-link>
                </div>
              </div>
              <div class="pic_ctnr msg_card_pic col col-12 col-md-8 col-xl-4">
                <img
                  :src="require(`@/assets/images/${msgCard.MSG_PIC}`)"
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
  import {BASE_URL} from '@/assets/js/common.js'

  export default {
      props: {
          msg: String,
          msgCard: String,
      },
      data() {
          return {
              msgCardList: [],
          }
      },
      created(){
          this.getDataFromApi(); // 在建立 Vue.js 模板時順帶執行這個參數
      },
      methods:{        
          async getDataFromApi() {
              // var url = 'http://localhost/CGD102_G2/public/api/reservation.php' //開發用
              // var url = `${BASE_URL}/api/reservation.php` //上線用舊版需刪除/api
              var url = `${BASE_URL}/reservation.php` //上線用
              let getData = async(url) => {
                  // console.log(url);
                  let response = await fetch(url); // await: 這行的 await 執行完才會執行下一個 await
                  let JSON =  response.json();
                  this.msgCardList = await JSON; // php 抓取回來的資料存取在預設好的參數裡
              }
              await getData(url); // 觸發 getData 的匿名 function 內容 ==> 89 ~ 91 行的內容
              // console.log(this.msgCardList);
          }
      }
  }
</script>