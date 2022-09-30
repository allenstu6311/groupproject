<template>
    <div class="background_flower switch" action="../assets/php/therapistContent.php">
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
                <div class="row ">
                    <div class="col-xl-6 col-12">
                        <div class="frame frame_one">
                            <div class="masseusePic">
                                <img
                                :src="require(`@/assets/images/${therapist.pic}`)"
                                :alt="therapist.pic_alt"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-12 rwd_text">
                        <h4 class="third_title title_one">{{ therapist.name }}  <span>師傅</span></h4>
                        <div class="text text_one">
                            <p>證照：</p>
                            <p 
                                class="text_content"
                                v-for="( introcontent , introindex ) in therapist.intro"
                                :key= introindex
                            >
                            {{  introcontent  }}
                            </p>
                        </div>
                        <a href="/reserve">
                            <div class="btnLittle btnLittle_one">立即預約</div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export default {
    props: {
        therapist: String,
    },
    data() {
        return {
            
            therapistCardList: [
                {
                    pic: "masseusePic1.jpg",
                    pic_alt: "李駿燕師傅",
                    name: "李駿燕",
                    intro:[
                        '英國 IPHM 國際經絡芳療師證照',
                        '英國 ITEC 國際高階芳療師證照',
                        '美國 NAHA 國際芳療保健師證照',
                        '印度 Himalaya Yoga 喜瑪拉雅瑜伽學院證照'
                    ],
                },
                {
                    pic: "masseusePic2.jpg",
                    pic_alt: "言子倩師傅",
                    name: "言子倩",
                    intro:[
                        '英國 IPHM 國際經絡芳療師證照',
                        '英國 ITEC 國際高階芳療師證照',
                        '美國 NAHA 國際芳療保健師證照',
                        '印度 Himalaya Yoga 喜瑪拉雅瑜伽學院證照'
                    ]
                },
                {
                    pic: "masseusePic3.jpg",
                    pic_alt: "康晉壕師傅",
                    name: "康晉壕",
                    intro:[
                        '英國 IPHM 國際經絡芳療師證照',
                        '英國 ITEC 國際高階芳療師證照',
                        '美國 NAHA 國際芳療保健師證照',
                        '印度 Himalaya Yoga 喜瑪拉雅瑜伽學院證照'
                    ]
                },
                {
                    pic: "masseusePic4.jpg",
                    pic_alt: "倪玉涓師傅",
                    name: "倪玉涓",
                    intro:[
                        '英國 IPHM 國際經絡芳療師證照',
                        '英國 ITEC 國際高階芳療師證照',
                        '美國 NAHA 國際芳療保健師證照'
                    ]
                }
            ]
        }
    },
    mounted(){
        gsap.from(".frame_one",{
            scrollTrigger: {
                trigger: ".frame_one",
                start: "30% center"
            },
            x: -300,
            rotation: -45,
            duration: 2,
            opacity: 0,
            ease: "back"
        });
        gsap.from(".text_one p",{
            scrollTrigger: {
                trigger: ".text_one",
                start: "top center"
            },
            duration: 1,
            stagger: 0.2,
            delay: 0.2,
            x: 150,
            opacity: 0,
            ease: "back"
        });
        gsap.from(".btnLittle_one",{
            scrollTrigger: {
                trigger: ".text_one",
                start: "top center"
            },
            duration: 1,
            delay: 1.2,
            x: 100,
            opacity: 0,
            ease: "back"
        });
    }
}
</script>

<style lang="scss">
    @import"../assets/style.scss";
</style>