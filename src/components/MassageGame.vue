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
                            <div class="answer" v-if="activeAcupoint == 'A'">
                                {{acupoint[0]}}
                                <p class="answer_correct">{{Answer}}</p>
                            </div>
                            <div class="answer" v-else-if="activeAcupoint == 'B'">
                                {{acupoint[1]}}
                                <p class="answer_correct">{{Answer}}</p>
                            </div>
                            <div class="answer" v-else-if="activeAcupoint == 'C'">
                                {{acupoint[2]}}
                                <p class="answer_correct">{{Answer}}</p>
                            </div>
                            <div class="answer" v-else-if="activeAcupoint == 'D'">
                                {{acupoint[3]}}
                                <p class="answer_correct">{{Answer}}</p>
                            </div>
                            <div class="answer" v-else-if="activeAcupoint == 'E'">
                                {{acupoint[4]}}
                                <p class="answer_correct">{{Answer}}</p>
                            </div>
                            <div class="answer" v-else-if="activeAcupoint == 'F'">
                                {{acupoint[5]}}
                                <p class="answer_correct">{{Answer}}</p>
                            </div>
                            <div class="answer" v-else-if="activeAcupoint == 'G'">
                                {{acupoint[6]}}
                                <p class="answer_correct">{{Answer}}</p>
                            </div>
                            <div class="answer" v-else-if="activeAcupoint == 'H'">
                                {{acupoint[7]}}
                                <p class="answer_correct">{{Answer}}</p>
                            </div>
                            <div class="answer" v-else-if="activeAcupoint == 'I'">
                                {{acupoint[8]}}
                                <p class="answer_correct">{{Answer}}</p>
                            </div>
                            <div class="answer answer_click" v-else>
                                {{acupoint[9]}}
                            </div>
                        </div>
                    </div>
                    <div :class="{correct_container:correctBox}">
                        <div class="correct_frame">
                            <div class="correct">
                                <p class="answer_title">{{correctAnswerTitle}}</p>
                                {{correctAnswer}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hand_pic">
                    <img :src="require(`@/assets/images/${imgName}`)" alt="手部穴道圖">
                    <button :class="{fzhong_chong:zhongChong,zhong_chong:!zhongChong,none:dzhongChong}"
                            @click="activeAcupointA"></button>

                    <button :class="{fshao_shang:shaoShang,shao_shang:!shaoShang,none:dshaoShang}"
                            @click="activeAcupointB"></button>

                    <button :class="{fhe_gu:heGu,he_gu:!heGu,none:dheGu}"
                            @click="activeAcupointC"></button>

                    <button :class="{fming_men:mingMen,ming_men:!mingMen,none:dmingMen}" 
                            @click="activeAcupointD"></button>

                    <button :class="{fshen_men:shenMen,shen_men:!shenMen,none:dshenMen}"
                            @click="activeAcupointE"></button>

                    <button :class="{flao_gong:laoGong,lao_gong:!laoGong,none:dlaoGong}"
                            @click="activeAcupointF"></button>

                    <button :class="{fyu_ji:yuJi,yu_ji:!yuJi,none:dyuJi}"
                            @click="activeAcupointG"></button>

                    <button :class="{fshao_fu:shaoFu,shao_fu:!shaoFu,none:dshaoFu}"
                            @click="activeAcupointH"></button>

                    <button :class="{ftai_yuan:taiYuan,tai_yuan:!taiYuan,none:dtaiYuan}" 
                            @click="activeAcupointI"></button>
                </div>

            </section>

            <div class="game_btn">
                <button class="btnLarge" v-if="isActive"  @click="change()">確認答案</button>
                <router-link :to="{ path:'/GetCoupon',
                                    query:{ 
                                        count:this.count
                                    }}"
                                    class="btnLarge" v-else >領取折價券
                                    </router-link>
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
                Answer:'',

                dzhongChong:false,
                dshaoShang:false,
                dheGu:false,
                dmingMen:false,
                dshenMen:false,
                dlaoGong:false,
                dyuJi:false,
                dshaoFu:false,
                dtaiYuan:false,

                correctBox:false,
                correctAnswerTitle:'',
                correctAnswer:'',

                count:0,

                acupoint:[
                    "中衝穴","少商穴","合谷穴","命門穴","神門穴","勞宮穴","魚際穴","少府穴","太淵穴","（請點擊穴道）",
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
            change(answer){
                if(this.activeAcupoint==""){
                    alert('請點選穴道');
                    return;
                }else{
                    this.isActive = !this.isActive;
                    this.dzhongChong=true;
                    this.dshaoShang=true;
                    this.dheGu=true;
                    this.dmingMen=true;
                    this.dshenMen=true;
                    this.dlaoGong=true;
                    this.dyuJi=true;
                    this.dshaoFu=true;
                    this.dtaiYuan=true;
                    if(this.activeAcupoint =="A"){
                        this.imgName='game1Correct.png';
                        this.question='正確答案 !';
                        this.Answer='中衝穴位於雙手手指的中指指尖，主要功效是清熱、開竅、利喉舌、清心瀉熱，主治中暑、中風昏迷、頭痛、咽喉腫痛、高血壓、心絞痛等病症。';
                        this.count += 1;
                    }else if(this.activeAcupoint =="B"){
                        this.Answer='少商穴位於雙手拇指節側，內側指甲角旁１分處，主要功效是清熱、利咽、醒神，可以治療或緩解感冒、扁桃體炎、咽喉腫痛、咽喉炎，更是夏日退高燒、改善喉嚨痛的急救要穴。';
                        this.imgName='game1Wrong.png';
                        this.question='錯誤答案 !';
                        this.correctBox=true;
                        this.correctAnswerTitle='正確答案:中衝穴';
                        this.correctAnswer='中衝穴位於雙手手指的中指指尖，主要功效是清熱、開竅、利喉舌、清心瀉熱，主治中暑、中風昏迷、頭痛、咽喉腫痛、高血壓、心絞痛等病症。';
                    }else if(this.activeAcupoint =="C"){
                        this.Answer='合谷穴在第一、二掌骨之間，兩骨相合的地方，主治疾患有感冒發熱、面肌痙攣、齒神經痛、咽喉炎、支氣管炎、痛經、鼻炎、眼睛疲勞。';
                        this.imgName='game1Wrong.png';
                        this.question='錯誤答案 !';
                        this.correctBox=true;
                        this.correctAnswerTitle='正確答案:中衝穴';
                        this.correctAnswer='中衝穴位於雙手手指的中指指尖，主要功效是清熱、開竅、利喉舌、清心瀉熱，主治中暑、中風昏迷、頭痛、咽喉腫痛、高血壓、心絞痛等病症。';
                    }else if(this.activeAcupoint =="D"){
                        this.Answer='命門穴位置在腰部，當後正中線上，主治療陽萎、遺精、背痛、腰膝酸軟、腎虛，行走無力、四肢無力、腿部浮腫、耳部疾病等症。';
                        this.imgName='game1Wrong.png';
                        this.question='錯誤答案 !';
                        this.correctBox=true;
                        this.correctAnswerTitle='正確答案:中衝穴';
                        this.correctAnswer='中衝穴位於雙手手指的中指指尖，主要功效是清熱、開竅、利喉舌、清心瀉熱，主治中暑、中風昏迷、頭痛、咽喉腫痛、高血壓、心絞痛等病症。';
                    }else if(this.activeAcupoint =="E"){
                        this.Answer='神門穴位於腕部的腕掌橫紋上，小指一側的按壓凹陷處，主治神經衰弱、改善健忘、癡呆、緩和暈車症狀。';
                        this.imgName='game1Wrong.png';
                        this.question='錯誤答案 !';
                        this.correctBox=true;
                        this.correctAnswerTitle='正確答案:中衝穴';
                        this.correctAnswer='中衝穴位於雙手手指的中指指尖，主要功效是清熱、開竅、利喉舌、清心瀉熱，主治中暑、中風昏迷、頭痛、咽喉腫痛、高血壓、心絞痛等病症。';
                    }else if(this.activeAcupoint =="F"){
                        this.Answer='勞宮穴位於食指和中指之間，延長線與生命線交會處，可消除疲勞，恢復精神，因過勞而引起失眠、失去幹勁時，不妨隨時按壓勞宮穴。';
                        this.imgName='game1Wrong.png';
                        this.question='錯誤答案 !';
                        this.correctBox=true;
                        this.correctAnswerTitle='正確答案:中衝穴';
                        this.correctAnswer='中衝穴位於雙手手指的中指指尖，主要功效是清熱、開竅、利喉舌、清心瀉熱，主治中暑、中風昏迷、頭痛、咽喉腫痛、高血壓、心絞痛等病症。';
                    }else if(this.activeAcupoint =="G"){
                        this.Answer='魚際穴位於手掌拇指根部，握拳時有明顯凸起，可幫助消化、促進血液循環、增強抵抗力，也可舒緩心絞痛問題。';
                        this.imgName='game1Wrong.png';
                        this.question='錯誤答案 !';
                        this.correctBox=true;
                        this.correctAnswerTitle='正確答案:中衝穴';
                        this.correctAnswer='中衝穴位於雙手手指的中指指尖，主要功效是清熱、開竅、利喉舌、清心瀉熱，主治中暑、中風昏迷、頭痛、咽喉腫痛、高血壓、心絞痛等病症。';
                    }else if(this.activeAcupoint =="H"){
                        this.Answer='少府穴位於雙手握拳時，小拇指指尖指向的地方就是穴位，主要功效是能發散心火、緩解心悸、胸痛、心律不整，對於心火旺盛引起的失眠、口臭、痘痘等問題也有良好的改善效果。';
                        this.imgName='game1Wrong.png';
                        this.question='錯誤答案 !';
                        this.correctBox=true;
                        this.correctAnswerTitle='正確答案:中衝穴';
                        this.correctAnswer='中衝穴位於雙手手指的中指指尖，主要功效是清熱、開竅、利喉舌、清心瀉熱，主治中暑、中風昏迷、頭痛、咽喉腫痛、高血壓、心絞痛等病症。';
                    }else{
                        this.Answer='太淵穴位於手腕內側橫紋上，靠近拇指一側，橈動脈搏動的凹陷處，主要功效是宣肺平喘、清咽消腫，可以緩解感冒初期的咳嗽、咽喉腫痛、頭痛。';
                        this.imgName='game1Wrong.png';
                        this.question='錯誤答案 !';
                        this.correctBox=true;
                        this.correctAnswerTitle='正確答案:中衝穴';
                        this.correctAnswer='中衝穴位於雙手手指的中指指尖，主要功效是清熱、開竅、利喉舌、清心瀉熱，主治中暑、中風昏迷、頭痛、咽喉腫痛、高血壓、心絞痛等病症。';
                    }
                }
            },
        },
    }
</script>