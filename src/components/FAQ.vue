<template>
    <main class="background_flower switch">
        <h1 class="sr_only">常見問題</h1>
        <div class="banner">
            <img src="../assets/images/FAQBanner.png" alt="常見問題Banner">
        </div>
        <div class="main_title">
            <img src="../assets/images/FAQTitle.png" alt="常見問題">
        </div>
        <section class="FAQ">
            <div class="title_area">
                <h2 class="sure_title">
                    <p class="title_font">常</p>
                    <p class="title_font">見</p>
                    <p class="title_font">問</p>
                    <p class="title_font">題</p>
                </h2>
                <small>• FAQ •</small>
            </div>
            <div class="frame">
                <div class="item" v-for="(faq, index) in faqCardList" :key="index">
                    <input type="checkbox" name="" :id="'a'+[faq.FAQ_ID]" style="display: none;">
                    <label :for="'a'+[faq.FAQ_ID]">
                        <div class="question">
                            <p class="QTitle">Q {{faq.FAQ_TITLE}}</p>
                            <div class="plus">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </label>
                    <div class="answer">
                        <p><span class="big" v-text="faq.FAQ_TEXT"></span></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="online_consultation">
                    <div class="col-12 col-lg-6 imgRow">
                        <img src="../assets/images/FAQLINEPIC.png" alt="">
                    </div>
                    <div class="col-12 col-lg-6 textColumn">
                        <div class="title_area">
                            <h2 class="sure_title">
                                <p class="title_font">線</p>
                                <p class="title_font">上</p>
                                <p class="title_font">諮</p>
                                <p class="title_font">詢</p>
                            </h2>
                            <small>• ONLINE CONSULTATION •</small>
                        </div>
                        <p class="text">
                            如果您有其他疑問，可以加入我們官方LINE帳號，按指穴官方帳號提供您即時線上客服、
                            第一手最新消息，以及不定時優惠折扣！
                        </p>
                    </div>
        </section>
    </main>
</template>

<script>
    import {BASE_URL} from '@/assets/js/common.js'
    // const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..';

    export default {
        props: {
            faq: String
        },
        data() {
            return {
                faqCardList: [],
            }
        },
        created(){
            this.getDataFromApi(); // 在建立 Vue.js 模板時順帶執行這個參數
        },
        methods:{
            async getDataFromApi() {
                // var url = 'http://localhost/CGD102_G2/public/api/FAQContent.php' //開發用
                var url = `${BASE_URL}/FAQContent.php` //上線用
                let getData = async(url) => {
                    let response = await fetch(url); // await: 這行的 await 執行完才會執行下一個 await
                    let JSON =  response.json();
                    this.faqCardList = await JSON; // php 抓取回來的資料存取在預設好的參數裡
                }
                await getData(url); // 觸發 getData 的匿名 function 內容 ==> 89 ~ 91 行的內容
                console.log(this.faqCardList);
            }
        }
    }
</script>
