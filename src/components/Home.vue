
<template>
     <div class="background_flower">
        <main>
            <section class="main_banner"><!------------------banner---------------->
                <video autoplay muted loop>
                    <source src="../assets/images/mainBanner_AdobeExpress.mp4 " type="video/mp4">
                </video>
                <div class="banner_circle first show-up"></div>
                <div class="banner_logo slide-top"><img src="../assets/images/bannerLogo.png" alt=""></div>
                <div class="banner_circle second show-up"></div>
                <div class="banner_hand slide-show"></div>
                <div class="banner_hand bottom slide-show" ></div>
            </section><!------banner end------>
                
            <section class="about_us"><!--------------------關於我們-------------------->
                <div class="about_us_intro">
                    <div class="title_area">
                        <div class="sure_title">
                            <h2 class="title_font">關</h2>
                            <h2 class="title_font">於</h2>
                            <h2 class="title_font">我</h2>
                            <h2 class="title_font">們</h2>
                        </div>
                        <small>• ABOUT US •</small>
                        <p>經過無數客人的指教與建議與多年的經驗，我們按摩師都有他獨特的手技，讓客人達到放鬆的效果。
                            店裡打造溫馨整潔讓客人一進門就覺得放鬆自在。
                            生活太緊繃想放鬆的你來嘗試看看，讓你們體驗完後，踏出去時心情與身體都樂樂!
                        </p>
                        <router-link to="/about"><div class="btnLittle">查看更多</div></router-link>
                    </div>
                </div>
                <div class="about_us_pic">
                    <div class="round_back rotate-center "></div>
                    <div class="round_front">
                        <img src="../assets/images/index_ab.jpg" alt="">
                    </div>
                </div>
            </section>
            <section class="massage_school"><!------------------按摩小學堂-------------------->
                <div class="title_area ">
                    <div class="sure_title">
                        <h2 class="title_font">按</h2>
                        <h2 class="title_font">摩</h2>
                        <h2 class="title_font">小</h2>
                        <h2 class="title_font">學</h2>
                        <h2 class="title_font">堂</h2>
                    </div>
                    <small>• MASSAGE SCHOOL •</small>
                </div>
                <div class="massage_school_content">
                    <div class="massage_school_intro">
                        <h3>&nbsp;玩遊戲認識穴道</h3>
                        <p>您知道身體有多少穴道嗎?您知道按哪個穴道可以讓身體紓壓嗎?花個時間玩場小遊戲，既能認識穴道又能領取折價券唷!
                        </p>
                        <router-link to="/MassageSchool"><div class="btnLittle">前往遊戲</div></router-link>
                    </div>
                    <swiper
                        :modules="modules"
                        :pagination="{ clickable: true }"
                        :loop="true"
                        :autoplay="{
                        delay: 2500,
                        disableOnInteraction: false
                        }"
                        @swiper="onSwiper"
                        @slideChange="onSlideChange"
                    >
                        <swiper-slide><img src="../assets/images/schoolhead.png" alt=""></swiper-slide>
                        <swiper-slide><img src="../assets/images/schoolhand.png" alt=""></swiper-slide>
                        <swiper-slide><img src="../assets/images/schoolbody.png" alt=""></swiper-slide>
                        <swiper-slide><img src="../assets/images/schoolfoot.png" alt=""></swiper-slide>
                    </swiper>
                </div>
                <div class="about_us_pic">
                    <div class="round_back rotate-center "></div>
                    <div class="round_front reveal fade-right"></div>
                </div>
            </section>
            <section class="product"><!--------------------商品專區------------------------>
                <div class="title_area">
                    <div class="sure_title">
                        <h2 class="title_font">商</h2>
                        <h2 class="title_font">品</h2>
                        <h2 class="title_font">專</h2>
                        <h2 class="title_font">區</h2>
                    </div>
                    <small>• PRODUCTS •</small>
                </div>
                <div class="product_content">
                    <div id="item" v-for="item in itemArray" :key="item">
                        <img :src="require(`../assets/images/${item.img}`)" alt="">
                        <!-- 有掛載東西一定加:號!!!! :class -->
                        <h4>{{item.name}}</h4>
                        <p>${{item.money}}</p>
                        <span>加入購物車</span>
                    </div>
                </div>
                <router-link to="/ProductList"><div class="btnLittle">更多商品</div></router-link>
            </section>
            <div class="reservation_bg"><!-------------------預約按摩-------------------->
                <section class="index_reservation">
                    <div class="reservation_intro">
                        <div class="title_area">
                            <div class="title">
                                <h2 class="title_font">預</h2>
                                <h2 class="title_font">約</h2>
                                <h2 class="title_font">按</h2>
                                <h2 class="title_font">摩</h2>
                            </div>
                            <small>• RESERVATION •</small>
                            <p>按指穴提供四種按摩服務項目，不管是久坐上班族，或是帶個兩小孩的全職媽媽，我們都有適合的按摩項目為您解決各種酸痛!</p>
                            <router-link to="/reservation"><div class="btnLittle">查看更多</div></router-link>
                        </div>
                    </div>
                    <div class="reservation_content">
                        <div class="item">
                            <div class="pic">
                                <img src="../assets/images/resv1.jpg" alt="">
                            </div>
                            <div class="item_bottom">
                                <div class="intro">
                                    <h4>全身穴道按摩</h4>
                                    <p class="pirce">120分鐘 / NT$2,400</p>
                                    <p>適合平常沒有按摩習慣或身體很多部位都很緊繃者</p>
                                    <p class="pirce">60分鐘 / NT$1,600</p>
                                    <p>適合平常有按摩習慣者</p>
                                </div>
                                <div class="intro_btn">
                                    <router-link to="/ResvPage"><div class="btnLittle">立即預約</div></router-link>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="pic">
                                <img src="../assets/images/resv2.jpg" alt="">
                            </div>
                            <div class="item_bottom">
                                <div class="intro">
                                    <h4>精油深層放鬆</h4>
                                    <p class="pirce">120分鐘 / NT$2,400</p>
                                    <p>適合平常沒有按摩習慣或身體很多部位都很緊繃者</p>
                                    <p class="pirce">60分鐘 / NT$1,600</p>
                                    <p>適合平常有按摩習慣者</p>
                                </div>
                                <div class="intro_btn">
                                    <router-link to="/ResvPage"><div class="btnLittle">立即預約</div></router-link>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="pic">
                                <img src="../assets/images/resv3.jpg" alt="">
                            </div>
                            <div class="item_bottom">
                                <div class="intro">
                                    <h4>東方經絡指壓</h4>
                                    <p class="pirce">120分鐘 / NT$2,400</p>
                                    <p>適合平常沒有按摩習慣或身體很多部位都很緊繃者</p>
                                    <p class="pirce">60分鐘 / NT$1,600</p>
                                    <p>適合平常有按摩習慣者</p>
                                </div>
                                <div class="intro_btn">
                                    <router-link to="/ResvPage"><div class="btnLittle">立即預約</div></router-link>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="pic">
                                <img src="../assets/images/resv4.jpg" alt="">
                            </div>
                            <div class="item_bottom">
                                <div class="intro">
                                    <h4>足部舒壓按摩</h4>
                                    <p class="pirce">120分鐘 / NT$1,800</p>
                                    <p>適合平常沒有按摩習慣或身體很多部位都很緊繃者</p>
                                    <p class="pirce">60分鐘 / NT$1,200</p>
                                    <p>適合平常有按摩習慣者</p>
                                </div>
                                <div class="intro_btn">
                                    <router-link to="/ResvPage"><div class="btnLittle">立即預約</div></router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
                <section class="index_review"><!-----------------客戶感想------------------->
                    <div class="title_area ">
                        <div class="sure_title">
                            <h2 class="title_font">客</h2>
                            <h2 class="title_font">戶</h2>
                            <h2 class="title_font">感</h2>
                            <h2 class="title_font">想</h2>
                        </div>
                        <small>• REVIEW •</small>
                    </div>
                    <swiper 
                    class="swiper"
                    :modules="modules"
                    :autoplay="{
                        delay: 2500,
                        disableOnInteraction: false
                    }"
                    :pagination="{ clickable: true }"
                    :breakpoints= "{
                    1: {
                        slidesPerView: 2,
                        centeredSlides: false,
                        spaceBetween: 150,
                    },
                    992: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                        centeredSlides: false,
                    },
                    }"
                    >
                        <swiper-slide class="slide"><img src="../assets/images/unhappyCat.png" alt=""></swiper-slide>
                        <swiper-slide class="slide"><img src="../assets/images/astronaut.png" alt=""></swiper-slide>
                        <swiper-slide class="slide"><img src="../assets/images/strongCat.png" alt=""></swiper-slide>
                        <swiper-slide class="slide"><img src="../assets/images/smellCat.png" alt=""></swiper-slide>
                        <swiper-slide class="slide"><img src="../assets/images/shockCat.png" alt=""></swiper-slide>
                        <swiper-slide class="slide"><img src="../assets/images/FrisbeeGog.png" alt=""></swiper-slide>
                    </swiper>
                </section>
                <section class="latest_news reveal fade-top"><!------------最新消息--------------->
                    <div class="title_area ">
                        <div class="sure_title">
                            <h2 class="title_font">最</h2>
                            <h2 class="title_font">新</h2>
                            <h2 class="title_font">消</h2>
                            <h2 class="title_font">息</h2>
                        </div>
                        <small>• LATEST NEWS •</small>
                    </div>
                    <hr>
                    <div class="news_content">
                        <!--建立迴圈，依資料數量去複製框架-->
                        <div class="news"
                        v-for="(newsContent,index) in newsCardList"
                        :key="index"
                        
                        >
                            <div class="pic">
                                <img :src="require(`../assets/images/${newsContent.NEWS_PIC}`)" alt="" id="NEWS_PIC">
                            </div>
                            <div class="news_intro">
                                <h3 class="news_title" id="NEWS_TITLE">{{newsContent.NEWS_TITLE}}</h3>
                                <div class="news_date" id="NEWS_DATE">{{newsContent.NEWS_DATE}}</div>
                                <div class="news_text" id="NEWS_TEXT" v-html="newsContent.NEWS_TEXT">
                                </div>
                                <div class="news_btn">
                                    <div class="btnLittle">查看更多</div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </section>
        </main>
    </div>
</template>

<script scoped >
    // import Swiper core and required modules
    import {Autoplay, Pagination} from 'swiper';
  
    // Import Swiper Vue.js components
    import { Swiper, SwiperSlide } from 'swiper/vue';
  
    // Import Swiper styles
    import 'swiper/css';
    import 'swiper/css/navigation';
    import 'swiper/css/pagination';
    import 'swiper/css/scrollbar';
  
    // Import Swiper styles
    export default {
      components: {
        Swiper,
        SwiperSlide,
      },
      setup() {
        const onSwiper = (swiper) => {
          console.log(swiper);
        };
        const onSlideChange = () => {
          console.log('slide change');
        };
        return {
          onSwiper,
          onSlideChange,
          modules: [Pagination,Autoplay],
          
        };
      },


//------------------------------------------------------------------
      props: {
            news: String
        },
        data() {
            return {
                newsCardList: [],//---------------最新消息------------------

                itemArray:[ //---------------商品專區-----------------------
                {name:'NEX Pro', money:1650 , img:"usb.png"},
                {name:'火星計畫', money:3000 , img:"fire.png"},
                {name:'日式按摩槍', money:1500 , img:"japan.png"},
                {name:'跟他講阿，卒仔', money:9000 , img:"knock1.png"},
            ]
            }
        },
        created(){
            this.getDataFromApi(); // 在建立 Vue.js 模板時順帶執行這個參數
        },
        methods:{
            async getDataFromApi() { //async是非同步
                var url = 'http://localhost/CGD102_G2/src/assets/phps/news.php'
                let getData = async(url) => {
                    let response = await fetch(url); // await 很重要
                    let JSON =  response.json();
                    this.newsCardList = await JSON; // php 抓取回來的資料存取在預設好的參數裡
                }
                await getData(url); // 觸發 getData 的匿名 function 內容 ==> 95 ~ 97 行的內容
                console.log(this.newsCardList);
            }
        },

 
    };


</script>