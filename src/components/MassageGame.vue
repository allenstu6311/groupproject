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
                            我知道!是
                            <div class="answer" v-if="activeAcupoint === 'A'">{{acupoint[0]}}</div>
                            <div class="answer" v-else-if="activeAcupoint === 'B'">{{acupoint[1]}}</div>
                            <div class="answer" v-else-if="activeAcupoint === 'C'">{{acupoint[2]}}</div>
                            <div class="answer" v-else-if="activeAcupoint === 'D'">{{acupoint[3]}}</div>
                            <div class="answer" v-else-if="activeAcupoint === 'E'">{{acupoint[4]}}</div>
                            <div class="answer" v-else-if="activeAcupoint === 'F'">{{acupoint[5]}}</div>
                            <div class="answer" v-else-if="activeAcupoint === 'G'">{{acupoint[6]}}</div>
                            <div class="answer" v-else-if="activeAcupoint === 'H'">{{acupoint[7]}}</div>
                            <div class="answer" v-else-if="activeAcupoint === 'I'">{{acupoint[8]}}</div>
                            <div class="answer answer_click" v-else>（請點擊穴道）</div>
                        </div>
                    </div>
                    
                </div>

                <div class="hand_pic">
                    <img :src="require(`@/assets/images/${imgName}`)" alt="手部穴道圖">
                    <button class="acupoint" 
                            :class="{zhong_chong:isActive}"
                            @click="activeAcupoint = 'A';"></button>

                    <button class="acupoint"
                            :class="{shao_shang:isActive}"
                            @click="activeAcupoint = 'B'"></button>

                    <button class="acupoint" 
                            :class="{he_gu:isActive}"
                            @click="activeAcupoint = 'C'"></button>

                    <button class="acupoint"
                            :class="{ming_men:isActive}" 
                            @click="activeAcupoint = 'D'"></button>

                    <button class="acupoint" 
                            :class="{shen_men:isActive}"
                            @click="activeAcupoint = 'E'"></button>

                    <button class="acupoint" 
                            :class="{lao_gong:isActive}"
                            @click="activeAcupoint = 'F'"></button>

                    <button class="acupoint" 
                            :class="{yu_ji:isActive}"
                            @click="activeAcupoint = 'G'"></button>

                    <button class="acupoint" 
                            :class="{shao_fu:isActive}"
                            @click="activeAcupoint = 'H'"></button>

                    <button class="acupoint"
                            :class="{tai_yuan:isActive}" 
                            @click="activeAcupoint = 'I'"></button>
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
                acupoint:[
                    "中衝穴","少商穴","合谷穴","命門穴","神門穴","勞宮穴","魚際穴","少府穴","太淵穴"
                ],
                imgName:'game1.png',
                question:'天氣炎熱食慾不振，好像中暑了，這時該按哪一個穴道呢?'
            }
        },
        methods:{
            changeBtn(){
                this.isActive = !this.isActive;
            },
            changeImg(){
                if(this.isActive){
                    this.imgName='game1.png'
                }else{
                    this.imgName='game1Correct.png'
                }
            },
            changeQ(){
                if(this.acupoint=this.acupoint[0]){
                    this.question='正確答案!'
                }else{
                    this.question='錯誤答案!'
                }
            }

        }
    }
</script>