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
                                天氣炎熱食慾不振，好像中暑了，這時該按哪一個穴道呢?
                            </p>
                        </div>
                    </div>
                    <div class="answer_container">
                        <div class="answer_frame">
                            我知道!是
                            <div class="answer" v-if="activeAcupoint === 'A'">中衝穴</div>
                            <div class="answer" v-else-if="activeAcupoint === 'B'">少商穴</div>
                            <div class="answer" v-else-if="activeAcupoint === 'C'">合谷穴</div>
                            <div class="answer" v-else-if="activeAcupoint === 'D'">命門穴</div>
                            <div class="answer" v-else-if="activeAcupoint === 'E'">神門穴</div>
                            <div class="answer" v-else-if="activeAcupoint === 'F'">勞宮穴</div>
                            <div class="answer" v-else-if="activeAcupoint === 'G'">魚際穴</div>
                            <div class="answer" v-else-if="activeAcupoint === 'H'">少府穴</div>
                            <div class="answer" v-else-if="activeAcupoint === 'I'">太淵穴</div>
                            <div class="answer active" v-else>（請點擊穴道）</div>
                        </div>
                    </div>
                    
                </div>

                <div class="hand_pic">
                    <img :src="require(`@/assets/images/${imgName}`)" alt="手部穴道圖">
                    <button class="acupoint zhong_chong" @click="activeAcupoint = 'A'"></button>
                    <button class="acupoint shao_shang" @click="activeAcupoint = 'B'"></button>
                    <button class="acupoint he_gu" @click="activeAcupoint = 'C'"></button>
                    <button class="acupoint ming_men" @click="activeAcupoint = 'D'"></button>
                    <button class="acupoint shen_men" @click="activeAcupoint = 'E'"></button>
                    <button class="acupoint lao_gong" @click="activeAcupoint = 'F'"></button>
                    <button class="acupoint yu_ji" @click="activeAcupoint = 'G'"></button>
                    <button class="acupoint shao_fu" @click="activeAcupoint = 'H'"></button>
                    <button class="acupoint tai_yuan" @click="activeAcupoint = 'I'"></button>
                </div>

                
            </section>

            <div class="game_btn">
                <button class="btnLarge" v-if="isActive"  @click="changeBtn();changeImg()">確認答案</button>
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
                imgName:'game1.png'
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
            }

        }
    }
</script>