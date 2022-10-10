<template>
    <div class="background_flower switch">
        <div class="banner">
            <img src="../assets/images/employeeBanner.png" alt="室內環境">
        </div>
        <h1 class="sr_only">按摩師介紹</h1>
        <div class="main_title">
            <img src="../assets/images/employee.png" alt="環境介紹">
        </div>
        <section class="employee">
            <div class="title_area">
                <h2 class="sure_title">
                    <p class="title_font">店</p>
                    <p class="title_font">鋪</p>
                    <p class="title_font">環</p>
                    <p class="title_font">境</p>
                </h2>
                <small>• STORE ENVIRONMENT •</small>
            </div>
            <div class="container">
                <div class="row row_hall">
                    <div class=" col-xl-6 col-12">
                        <h4 class="third_title title_hall">
                            <img src="../assets/images/title_Hall.png" alt="接待大廳標題">
                        </h4>
                        <div class="text text_hall">
                            <p>大廳佈置使用大理石檯面及簡約木質風</p>
                            <p>呈現視覺上的舒適感</p>
                            <p>讓顧客進入按指穴就有一種回家的放鬆感</p>
                        </div>
                    </div>
                    <div class=" col-xl-6 col-12 imgMove">
                        <div class="Dframe Dframe_left">
                            <div class="imgFrame">
                                <img src="../assets/images/counter.jpg" alt="接待大廳">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row row_round">
                    <div class=" col-xl-6 col-12">
                        <div class="Rframe"></div>
                        <div class="RimgFrame">
                            <img src="../assets/images/massageRoom.png" alt="按摩空間">
                        </div>
                    </div>
                    <div class=" col-xl-6 col-12">
                        <h4 class="third_title title_room textMove">
                            <img src="../assets/images/title_Room.png" alt="按摩空間標題">
                        </h4>
                        <div class="text textMove text_room">
                            <p>按摩室皆為單人包間</p>
                            <p>讓顧客享受高級的奢華感</p>
                            <p>同時不被旁人所影響或打擾</p>
                            <p>且內部採用簡約木質風，讓人有回到家的感覺</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row row_bath">
                    <div class=" col-xl-6 col-12">
                        <h4 class="third_title title_bath">
                            <img src="../assets/images/title_Wash.png" alt="盥洗設備標題">
                        </h4>
                        <div class="text text_bath">
                            <p>盥洗室屬於公共設備</p>
                            <p>本館共有 6 間盥洗室</p>
                            <p>在按摩前及按摩後皆可使用</p>
                            <p>每人使用盥洗室的時間一次不可超過 40 分鐘</p>
                        </div>
                    </div>
                    <div class=" col-xl-6 col-12 imgMove">
                        <div class="Dframe Dframe_right">
                            <div class="imgFrame">
                                <img src="../assets/images/bathroom.jpg" alt="盥洗設備">
                            </div>
                        </div>
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
    mounted(){
        gsap.from(".RimgFrame",{
            scrollTrigger: {
                trigger: ".row_round",
                start: "top center",
            },
            x: -800,
            rotation: -120,
            duration: 2,
            opacity: 0,
            ease: "back"
        });
        gsap.from(".Rframe",{
            scrollTrigger: {
                trigger: ".row_round",
            },
            rotation: 360,
            duration: 28,
            repeat: Infinity,
            ease: "linear"
        });
        gsap.from(".title_hall",{
            scrollTrigger: {
                trigger: ".row_hall",
                start: "20% center"
            },
            x: 250,
            duration: 1.5,
            opacity: 0,
            ease: "back"
        });
        gsap.from(".title_room",{
            scrollTrigger: {
                trigger: ".row_round",
                start: "top center"
            },
            x: 250,
            duration: 1.5,
            delay: 0.8,
            opacity: 0,
            ease: "back"
        });
        gsap.from(".title_bath",{
            scrollTrigger: {
                trigger: ".row_bath",
                start: "20% center"
            },
            x: 250,
            duration: 1.5,
            opacity: 0,
            ease: "back"
        });
        gsap.from(".text_hall p",{
            scrollTrigger: {
                trigger: ".row_hall",
                start: "20% center"
            },
            x: 250,
            stagger: 0.2,
            duration: 1.5,
            delay: 0.2,
            opacity: 0,
            ease: "back"
        });
        gsap.from(".text_room p",{
            scrollTrigger: {
                trigger: ".row_round",
                start: "top center"
            },
            x: 250,
            stagger: 0.2,
            duration: 1.5,
            delay: 1,
            opacity: 0,
            ease: "back"
        });
        gsap.from(".text_bath p",{
            scrollTrigger: {
                trigger: ".row_bath",
                start: "20% center"
            },
            x: 250,
            stagger: 0.2,
            duration: 1.5,
            delay: 0.2,
            opacity: 0,
            ease: "back"
        });        
    }
}
</script>
<style lang="scss">
    // @import"../assets/style.scss";
</style>