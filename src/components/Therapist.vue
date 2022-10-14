<template>
    <div class="background_flower switch">
        <div class="banner">
            <img src="../assets/images/banner_teamPic.jpg" alt="按摩師團隊">
        </div>
        <h1 class="sr_only">按摩師介紹</h1>
        <div class="main_title">
            <img src="../assets/images/aboutMassage.png" alt="按摩師介紹">
        </div>
        <section class="masseuse" id="view">
            <div class="title_area">
                <h2 class="sure_title">
                    <p class="title_font">按</p>
                    <p class="title_font">摩</p>
                    <p class="title_font">師</p>
                    <p class="title_font">傅</p>
                </h2>
                <small>• THERAPIST •</small>
            </div>
            <div 
                class="container container_one"
                v-for="(therapist, index) in therapistCardList"
                :key="index"
            >
                <div class="row">
                    <div class="col-xl-6 col-12">
                        <div class="frame frame_one" :class="'frame_'+[therapist.THERAPIST_ID]">
                            <div class="masseusePic">
                                <img
                                :src="require(`@/assets/images/${therapist.THERAPIST_PIC}`)"
                                :alt="therapist.THERAPIST_NAME"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-12 rwd_text">
                        <h4 class="third_title title_one">{{ therapist.THERAPIST_NAME }}  <span>師傅</span></h4>
                        <div class="text text_one" :class="'text_'+[therapist.THERAPIST_ID]">
                            <p>證照：</p>
                            <p class="text_content" v-text="therapist.THERAPIST_LICENSE_1"></p>
                            <p class="text_content" v-text="therapist.THERAPIST_LICENSE_2"></p>
                            <p class="text_content" v-text="therapist.THERAPIST_LICENSE_3"></p>
                            <p class="text_content" v-text="therapist.THERAPIST_LICENSE_4"></p>
                        </div>
                        <router-link to="/resvPage">
                            <div class="btnLittle btnLittle_one" :class="'btnLittle_'+[therapist.THERAPIST_ID]">立即預約</div>
                        </router-link>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
import {BASE_URL} from '@/assets/js/common.js';
// import gsap from "gsap";
// import ScrollTrigger from "gsap/ScrollTrigger";
// gsap.registerPlugin(ScrollTrigger);
// const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..';

export default {
    props: {
        therapist: String,
    },
    data() {
        return {
            therapistCardList: [],
            ppic: 'masseusePic2.jpg',
        }
    },
    created(){
        this.getDataFromApi(); // 在建立Vue.js模板時順帶執行這個參數
    },
    methods:{
        async getDataFromApi() {
            // var url = 'http://localhost/CGD102_G2/public/api/therapistContent.php' //開發用
            var url = `${BASE_URL}/therapistContent.php`; //上線用
            let getData = async(url) => {
                let response = await fetch(url);
                let JSON = response.json();
                this.therapistCardList = await JSON; // php抓取回來的資料存取在預設好的參數裡
            }
            await getData(url); // 觸發 getData 的匿名 function 內容
            console.log(this.therapistCardList);
        }

        // gsap.from(".frame_1",{
        // scrollTrigger: {
        //     trigger: ".frame_1",
        //     start: "30% center"
        // },
        // x: -300,
        // rotation: -45,
        // duration: 2,
        // opacity: 0,
        // ease: "back"
        // });
        // gsap.from(".text_1 p",{
        //     scrollTrigger: {
        //         trigger: ".text_1",
        //         start: "top center"
        //     },
        //     duration: 1,
        //     stagger: 0.2,
        //     delay: 0.2,
        //     x: 150,
        //     opacity: 0,
        //     ease: "back"
        // });
        // gsap.from(".btnLittle_1",{
        //     scrollTrigger: {
        //         trigger: ".text_1",
        //         start: "top center"
        //     },
        //     duration: 1,
        //     delay: 1.2,
        //     x: 100,
        //     opacity: 0,
        //     ease: "back"
        // });
        // gsap.from(".frame_2",{
        // scrollTrigger: {
        //     trigger: ".frame_2",
        //     start: "30% center"
        // },
        // x: -300,
        // rotation: -45,
        // duration: 2,
        // opacity: 0,
        // ease: "back"
        // });
        // gsap.from(".text_2 p",{
        //     scrollTrigger: {
        //         trigger: ".text_2",
        //         start: "top center"
        //     },
        //     duration: 1,
        //     stagger: 0.2,
        //     delay: 0.2,
        //     x: 150,
        //     opacity: 0,
        //     ease: "back"
        // });
        // gsap.from(".btnLittle_2",{
        //     scrollTrigger: {
        //         trigger: ".text_2",
        //         start: "top center"
        //     },
        //     duration: 1,
        //     delay: 1,
        //     x: 100,
        //     opacity: 0,
        //     ease: "back"
        // });
        // gsap.from(".frame_3",{
        // scrollTrigger: {
        //     trigger: ".frame_3",
        //     start: "30% center"
        // },
        // x: -300,
        // rotation: -45,
        // duration: 2,
        // opacity: 0,
        // ease: "back"
        // });
        // gsap.from(".text_3 p",{
        //     scrollTrigger: {
        //         trigger: ".text_3",
        //         start: "top center"
        //     },
        //     duration: 1,
        //     stagger: 0.2,
        //     delay: 0.2,
        //     x: 150,
        //     opacity: 0,
        //     ease: "back"
        // });
        // gsap.from(".btnLittle_3",{
        //     scrollTrigger: {
        //         trigger: ".text_3",
        //         start: "top center"
        //     },
        //     duration: 1,
        //     delay: 1,
        //     x: 100,
        //     opacity: 0,
        //     ease: "back"
        // });
        // gsap.from(".frame_4",{
        // scrollTrigger: {
        //     trigger: ".frame_4",
        //     start: "30% center"
        // },
        // x: -300,
        // rotation: -45,
        // duration: 2,
        // opacity: 0,
        // ease: "back"
        // });
        // gsap.from(".text_4 p",{
        //     scrollTrigger: {
        //         trigger: ".text_4",
        //         start: "top center"
        //     },
        //     duration: 1,
        //     stagger: 0.2,
        //     delay: 0.2,
        //     x: 150,
        //     opacity: 0,
        //     ease: "back"
        // });
        // gsap.from(".btnLittle_4",{
        //     scrollTrigger: {
        //         trigger: ".text_4",
        //         start: "top center"
        //     },
        //     duration: 1,
        //     delay: 1,
        //     x: 100,
        //     opacity: 0,
        //     ease: "back"
        // })
    },
}
</script>

