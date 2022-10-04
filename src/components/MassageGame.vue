<template>
    <div class="massage_game">

        <h1 class="sr_only">穴道小遊戲</h1>

        <div class="background_flower">

            <div class="title_area">
                <h2 class="sure_title">
                    <p class="title_font">知</p>
                    <p class="title_font">識</p>
                    <p class="title_font">問</p>
                    <p class="title_font">答</p>
                </h2>
                <small>• KNOWLEDGE QUIZ •</small>
            </div>

            <section class="game_container">
                <div class="quiz_container">
                    <div class="question_container">
                        <div class="question_frame">
                            <p class="question">
                                {{question}}
                            </p>
                        </div>
                    </div>
                    <div class="answer_container">
                        <div class="answer_frame">
                            <div class="answer" v-if="activeAcupoint == 'A'">{{acupoint[0]}}</div>
                            <div class="answer" v-else-if="activeAcupoint == 'B'">{{acupoint[1]}}</div>
                            <div class="answer" v-else-if="activeAcupoint == 'C'">{{acupoint[2]}}</div>
                            <div class="answer" v-else-if="activeAcupoint == 'D'">{{acupoint[3]}}</div>
                            <div class="answer" v-else-if="activeAcupoint == 'E'">{{acupoint[4]}}</div>
                            <div class="answer" v-else-if="activeAcupoint == 'F'">{{acupoint[5]}}</div>
                            <div class="answer" v-else-if="activeAcupoint == 'G'">{{acupoint[6]}}</div>
                            <div class="answer" v-else-if="activeAcupoint == 'H'">{{acupoint[7]}}</div>
                            <div class="answer" v-else-if="activeAcupoint == 'I'">{{acupoint[8]}}</div>
                            <div class="answer answer_click" v-else>{{acupoint[9]}}</div>
                        </div>
                    </div>
                    
                </div>

                <div class="hand_pic">
                    <img :src="require(`@/assets/images/${imgName}`)" alt="手部穴道圖">
                    <button :class="{fzhong_chong:zhongChong,zhong_chong:!zhongChong}"
                            @click="activeAcupointA"></button>

                    <button :class="{fshao_shang:shaoShang,shao_shang:!shaoShang}"
                            @click="activeAcupointB"></button>

                    <button :class="{fhe_gu:heGu,he_gu:!heGu}"
                            @click="activeAcupointC"></button>

                    <button :class="{fming_men:mingMen,ming_men:!mingMen}" 
                            @click="activeAcupointD"></button>

                    <button :class="{fshen_men:shenMen,shen_men:!shenMen}"
                            @click="activeAcupointE"></button>

                    <button :class="{flao_gong:laoGong,lao_gong:!laoGong}"
                            @click="activeAcupointF"></button>

                    <button :class="{fyu_ji:yuJi,yu_ji:!yuJi}"
                            @click="activeAcupointG"></button>

                    <button :class="{fshao_fu:shaoFu,shao_fu:!shaoFu}"
                            @click="activeAcupointH"></button>

                    <button :class="{ftai_yuan:taiYuan,tai_yuan:!taiYuan}" 
                            @click="activeAcupointI"></button>
                </div>

            </section>

            <div class="game_btn">
                <button class="btnLarge" v-if="isActive"  @click="changeBtn();changeImg();changeQ()">確認答案</button>
                <a class="btnLarge" v-else href="/GetCoupon">領取折價券</a>
            </div>

        </div>
    </div>
</template>
<script>
    export default {
        data () {
            return{
                activeAcupoint:'',
                isActive:true,
                zhongChong:false,
                shaoShang:false,
                heGu:false,
                mingMen:false,
                shenMen:false,
                laoGong:false,
                yuJi:false,
                shaoFu:false,
                taiYuan:false,

                acupoint:[
                    "中衝穴","少商穴","合谷穴","命門穴","神門穴","勞宮穴","魚際穴","少府穴","太淵穴","（請點擊穴道）"
                ],
                imgName:'game1.png',
                question:'天氣炎熱食慾不振，好像中暑了，這時該按哪一個穴道呢?'
            }
        },
        methods:{
            activeAcupointA(){
                this.activeAcupoint ="A";
                this.zhongChong = true;
                this.shaoShang = false;
                this.heGu = false;
                this.mingMen = false;
                this.shenMen = false;
                this.laoGong = false;
                this.yuJi = false;
                this.shaoFu = false;
                this.taiYuan = false;
            },
            activeAcupointB(){
                this.activeAcupoint ="B";
                this.zhongChong = false;
                this.shaoShang = true;
                this.heGu = false;
                this.mingMen = false;
                this.shenMen = false;
                this.laoGong = false;
                this.yuJi = false;
                this.shaoFu = false;
                this.taiYuan = false;
            },
            activeAcupointC(){
                this.activeAcupoint ="C"
                this.zhongChong = false;
                this.shaoShang = false;
                this.heGu = true;
                this.mingMen = false;
                this.shenMen = false;
                this.laoGong = false;
                this.yuJi = false;
                this.shaoFu = false;
                this.taiYuan = false;
            },
            activeAcupointD(){
                this.activeAcupoint ="D"
                this.zhongChong = false;
                this.shaoShang = false;
                this.heGu = false;
                this.mingMen = true;
                this.shenMen = false;
                this.laoGong = false;
                this.yuJi = false;
                this.shaoFu = false;
                this.taiYuan = false;
            },
            activeAcupointE(){
                this.activeAcupoint ="E"
                this.zhongChong = false;
                this.shaoShang = false;
                this.heGu = false;
                this.mingMen = false;
                this.shenMen = true;
                this.laoGong = false;
                this.yuJi = false;
                this.shaoFu = false;
                this.taiYuan = false;
            },
            activeAcupointF(){
                this.activeAcupoint ="F"
                this.zhongChong = false;
                this.shaoShang = false;
                this.heGu = false;
                this.mingMen = false;
                this.shenMen = false;
                this.laoGong = true;
                this.yuJi = false;
                this.shaoFu = false;
                this.taiYuan = false;
            },
            activeAcupointG(){
                this.activeAcupoint ="G"
                this.zhongChong = false;
                this.shaoShang = false;
                this.heGu = false;
                this.mingMen = false;
                this.shenMen = false;
                this.laoGong = false;
                this.yuJi = true;
                this.shaoFu = false;
                this.taiYuan = false;
            },
            activeAcupointH(){
                this.activeAcupoint ="H"
                this.zhongChong = false;
                this.shaoShang = false;
                this.heGu = false;
                this.mingMen = false;
                this.shenMen = false;
                this.laoGong = false;
                this.yuJi = false;
                this.shaoFu = true;
                this.taiYuan = false;
            },
            activeAcupointI(){
                this.activeAcupoint ="I"
                this.zhongChong = false;
                this.shaoShang = false;
                this.heGu = false;
                this.mingMen = false;
                this.shenMen = false;
                this.laoGong = false;
                this.yuJi = false;
                this.shaoFu = false;
                this.taiYuan = true;
            },
            changeBtn(){
                this.isActive = !this.isActive;

            },
            changeImg(){
                if(this.activeAcupoint =="A"){
                    this.imgName='game1Correct.png'
                }else{
                    this.imgName='game1Wrong.png'
                }
            },
            changeQ(){
                if(this.activeAcupoint =="A"){
                    this.question='正確答案!'
                }else{
                    this.question='錯誤答案!'
                }
            }

        }
    }
</script>