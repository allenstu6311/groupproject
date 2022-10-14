
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
                    <div id="item" v-for="item in product" :key="item">
                        <router-link to="/Detail">
                            <img :src="require(`../../public/api/pic/${item.PROD_PIC1}`)" @click="joinDetail(item.PROD_ID)"  alt="">
                        <!-- 有掛載東西一定加:號!!!! :class -->
                        <h4>{{item.PROD_NAME}}</h4>
                        <p>${{item.PROD_PRICE}}</p>
                        <span>查看此商品>></span>
                        </router-link>
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
                        <div class="item" v-for="msgs in msgList" :key="msgs">
                            <div class="pic">
                                <img :src="require(`../assets/images/${msgs.MSG_PIC}`)" alt="">
                            </div>
                            <div class="item_bottom">
                                <div class="intro">
                                    <h4>{{msgs.MSG_NAME}}</h4>
                                    <!-- <p class="pirce">{{msgs.MSG_TIMESPAN_1}}分鐘 / ${{msgs.MSG_PRICE_1}}</p>
                                    <p>{{msgs.MSG_REC_1}}</p> -->
                                    <p class="pirce">{{msgs.MSG_TIMESPAN_2}}分鐘 / ${{msgs.MSG_PRICE_2}}</p>
                                    <p>{{msgs.MSG_REC_2}}</p>
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

<script>
import {BASE_URL} from '@/assets/js/common.js'
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
        //   console.log(swiper);
        };
        const onSlideChange = () => {
        //   console.log('slide change');
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
                product:[],//---------------商品專區-----------------------
                order:[],
                msgList:[],//---------------預約按摩------------------
                cart: [],
                calculate:[],
            }
        },
        created(){
            //一進網頁就直接執行的~
            this.axios.get( `${BASE_URL}/homeMsg.php`)
            .then((msg1)=>{ //msg1 可以自己取名,存取上面的路徑
                this.msgList=msg1.data //把路徑中的資料(php)丟到上面的陣列中  .data是類似資料型別,也有殼能不是data
               // console.log("MSG~~~--->",this.msgList)  檢查有沒有抓資料近來
                
            })

            this.axios.get( `${BASE_URL}/homeProduct.php`)//上線用!!!
            .then((res)=>{
                this.product=res.data
            })


            this.getDataFromApi(); // 在建立 Vue.js 模板時順帶執行這個參數
        },
        methods:{
            async getDataFromApi() { //async是非同步
                const url =  `${BASE_URL}/news.php`
                let getData = async(url) => {
                    let response = await fetch(url); // await 很重要
                    let JSON =  response.json();
                    this.newsCardList = await JSON; // php 抓取回來的資料存取在預設好的參數裡
                }
                await getData(url); // 觸發 getData 的匿名 function 內容 ==> 95 ~ 97 行的內容
                // console.log(this.newsCardList);
            },
            joinDetail(id){
                let index  = this.product.findIndex(item=>{
                    
                    return item.PROD_ID===id
                })
            
                this.order=[
                {
                PROD_ID: this.product[index].PROD_ID,
                PROD_NAME: this.product[index].PROD_NAME,
                PROD_PRICE: this.product[index].PROD_PRICE,
                PROD_PIC1: this.product[index].PROD_PIC1,
                PROD_PIC2: this.product[index].PROD_PIC2,
                PROD_PIC3: this.product[index].PROD_PIC3,
                PROD_DATE: this.product[index].PROD_DATE,
                PROD_DESC1: this.product[index].PROD_DESC1,
                PROD_DESC2: this.product[index].PROD_DESC2,
                PROD_DESC3: this.product[index].PROD_DESC3,
                PROD_REVIEW: this.product[index].PROD_REVIEW + 1,
                PROD_TIMES: this.product[index].PROD_TIMES + 1,
                },
            ]
                this.joinLocalStorage()
            },
            joinLocalStorage(){
                localStorage.setItem("order",JSON.stringify(this.order)) ;
            },
            addCar(id) {
            },
        
        },
};


</script>
