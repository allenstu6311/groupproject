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
                            <div class="answer" v-if="activeAcupoint === 'A'">{{acupoint[0]}}</div>
                            <div class="answer" v-else-if="activeAcupoint === 'B'">{{acupoint[1]}}</div>
                            <div class="answer" v-else-if="activeAcupoint === 'C'">{{acupoint[2]}}</div>
                            <div class="answer" v-else-if="activeAcupoint === 'D'">{{acupoint[3]}}</div>
                            <div class="answer" v-else-if="activeAcupoint === 'E'">{{acupoint[4]}}</div>
                            <div class="answer" v-else-if="activeAcupoint === 'F'">{{acupoint[5]}}</div>
                            <div class="answer" v-else-if="activeAcupoint === 'G'">{{acupoint[6]}}</div>
                            <div class="answer" v-else-if="activeAcupoint === 'H'">{{acupoint[7]}}</div>
                            <div class="answer" v-else-if="activeAcupoint === 'I'">{{acupoint[8]}}</div>
                            <div class="answer answer_click" v-else>{{acupoint[9]}}</div>
                        </div>
                    </div>
                    
                </div>

                <div class="hand_pic">
                    <img :src="require(`@/assets/images/${imgName}`)" alt="手部穴道圖">
                    <button class="acupoint" 
                            :class="{zhong_chong:zhongChong,zhong_chong_change:fzhongChong}"
                            @click="activeAcupoint = 'A';changeA()"></button>

                    <button class="acupoint"
                            :class="{shao_shang:shaoShang,shao_shang_change:fshaoShang}"
                            @click="activeAcupoint = 'B';changeB()"></button>

                    <button class="acupoint" 
                            :class="{he_gu:heGu,he_gu_change:fheGu}"
                            @click="activeAcupoint = 'C';changeC()"></button>

                    <button class="acupoint"
                            :class="{ming_men:mingMen,ming_men_change:fmingMen}" 
                            @click="activeAcupoint = 'D';changeD()"></button>

                    <button class="acupoint" 
                            :class="{shen_men:shenMen,shen_men_change:fshenMen}"
                            @click="activeAcupoint = 'E';changeE()"></button>

                    <button class="acupoint" 
                            :class="{lao_gong:laoGong,lao_gong_change:flaoGong}"
                            @click="activeAcupoint = 'F';changeF()"></button>

                    <button class="acupoint" 
                            :class="{yu_ji:yuJi,yu_ji_change:fyuJi}"
                            @click="activeAcupoint = 'G';changeG()"></button>

                    <button class="acupoint" 
                            :class="{shao_fu:shaoFu,shao_fu_change:fshaoFu}"
                            @click="activeAcupoint = 'H';changeH()"></button>

                    <button class="acupoint"
                            :class="{tai_yuan:taiYuan,tai_yuan_change:ftaiYuan}" 
                            @click="activeAcupoint = 'I';changeI()"></button>
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

                zhongChong:true,
                fzhongChong:'',

                shaoShang:true,
                fshaoShang:'',

                heGu:true,
                fheGu:false,

                mingMen:true,
                fmingMen:false,

                shenMen:true,
                fshenMen:false,

                laoGong:true,
                flaoGong:false,

                yuJi:true,
                fyuJi:false,

                shaoFu:true,
                fshaoFu:false,

                taiYuan:true,
                ftaiYuan:false,

                acupoint:[
                    "中衝穴","少商穴","合谷穴","命門穴","神門穴","勞宮穴","魚際穴","少府穴","太淵穴","（請點擊穴道）"
                ],
                imgName:'game1.png',
                question:'天氣炎熱食慾不振，好像中暑了，這時該按哪一個穴道呢?'
            }
        },
        methods:{
            changeA(){
                this.zhongChong = !this.zhongChong;
                
                if(this.zhongChong){
                    this.zhongChong= true
                    this.fzhongChong= false
                }else{
                    this.fzhongChong= true
                    this.shaoShang = true
                    this.fzhongChong = false
                }
            },
            changeB(){
                this.shaoShang = !this.shaoShang;
                
                if(this.shaoShang){
                    this.shaoShang = true
                    this.fshaoShang = false
                }else{
                    this.fshaoShang = true
                    this.zhongChong= true
                    this.fzhongChong= false
                }
            },
            changeC(){
                this.heGu = !this.heGu;
                this.fheGu = !this.fheGu;
            },
            changeD(){
                this.mingMen = !this.mingMen;
                this.fmingMen = !this.fmingMen;
            },
            changeE(){
                this.shenMen = !this.shenMen;
                this.fshenMen = !this.fshenMen;
            },
            changeF(){
                this.laoGong = !this.laoGong;
                this.flaoGong = !this.flaoGong;
            },
            changeG(){
                this.yuJi = !this.yuJi;
                this.fyuJi = !this.fyuJi;
            },
            changeH(){
                this.shaoFu = !this.shaoFu;
                this.fshaoFu = !this.fshaoFu;
            },
            changeI(){
                this.taiYuan = !this.taiYuan;
                this.ftaiYuan = !this.ftaiYuan;
            },
            changeBtn(){
                this.isActive = !this.isActive;

            },
            changeImg(){
                if(this.isActive){
                    this.imgName='game1Correct.png'
                }else{
                    this.imgName='game1Wrong.png'
                }
            },
            changeQ(){
                if(this.isActive){
                    this.question='正確答案!'
                }else{
                    this.question='錯誤答案!'
                }
            }

        }
    }
</script>