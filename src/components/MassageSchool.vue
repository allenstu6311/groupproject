<template>
    <div class="massage_school_page">
        <h1 class="sr_only">按摩小學堂</h1>

        <div class="background_flower">

            <section>
                <div class="banner">
                    <img src="../assets/images/schoolBanner.png" alt="按摩小學堂banner">
                </div>
                <div class="main_title">
                    <img src="../assets/images/schoolTitle.png" alt="按摩小學堂招牌">
                </div>
            </section>

            <div class="title_area">
                <h2 class="sure_title">
                    <p class="title_font">按</p>
                    <p class="title_font">摩</p>
                    <p class="title_font">知</p>
                    <p class="title_font">識</p>
                </h2>
                <small>• ACUPOINT KNOWLEDGE •</small>
            </div>

            <section class="knowledge_container">
                <h3 class="knowledge_title ">頭部</h3>
                <swiper class="knowledge_swiper"
                        :modules="modules"
                        :pagination="{ clickable: true }"
                        :navigation="true"
                        :loop="true"
                        @swiper="onSwiper"
                        @slideChange="onSlideChange">
                    <swiper-slide class="knowledge_list"
                        v-for="(head, index) in headList"
                        :key="index"
                    >
                        <li class="knowledge_card" >
                            <div class="knowledge_pic">
                                <img
                                    :src="require(`@/assets/images/${head.pic}`)"
                                    :alt="head.name"
                                >
                            </div>
                            <div class="knowledge_txt">
                                <h3 class="knowledge_name">{{head.name}}</h3>
                                <p class="knowledge_introduce">
                                    {{head.txt}}
                                </p>
                                <p class="knowledge_effect">
                                    功效 : <br>
                                    {{head.effect1}}<br>
                                    {{head.effect2}}<br>
                                    {{head.effect3}}<br>
                                    {{head.effect4}}
                                </p>
                            </div>
                        </li>
                    </swiper-slide>
                    <div class="swiper-pagination" solt="pagination"></div>
                </swiper>
            </section>

            <section class="knowledge_container title_right">
                <h3 class="knowledge_title">手部</h3>
                <swiper class="knowledge_swiper"
                        :modules="modules"
                        :pagination="{ clickable: true }"
                        :navigation="true"
                        :loop="true"
                        @swiper="onSwiper"
                        @slideChange="onSlideChange">
                    <swiper-slide class="knowledge_list"
                        v-for="(hand, index) in handList"
                        :key="index"
                    >
                        <li class="knowledge_card" >
                            <div class="knowledge_pic">
                                <img
                                    :src="require(`@/assets/images/${hand.pic}`)"
                                    :alt="hand.name"
                                >
                            </div>
                            <div class="knowledge_txt">
                                <h3 class="knowledge_name">{{hand.name}}</h3>
                                <p class="knowledge_introduce">
                                    {{hand.txt}}
                                </p>
                                <p class="knowledge_effect">
                                    功效 : <br>
                                    {{hand.effect1}}<br>
                                    {{hand.effect2}}<br>
                                    {{hand.effect3}}<br>
                                    {{hand.effect4}}
                                </p>
                            </div>
                        </li>
                    </swiper-slide>
                    <div class="swiper-pagination" solt="pagination"></div>
                </swiper>
            </section>

            <section class="knowledge_container">
                <h3 class="knowledge_title">身體</h3>
                <swiper class="knowledge_swiper"
                        :modules="modules"
                        :pagination="{ clickable: true }"
                        :navigation="true"
                        :loop="true"
                        @swiper="onSwiper"
                        @slideChange="onSlideChange">
                    <swiper-slide class="knowledge_list"
                        v-for="(body, index) in bodyList"
                        :key="index"
                    >
                        <li class="knowledge_card" >
                            <div class="knowledge_pic">
                                <img
                                    :src="require(`@/assets/images/${body.pic}`)"
                                    :alt="body.name"
                                >
                            </div>
                            <div class="knowledge_txt">
                                <h3 class="knowledge_name">{{body.name}}</h3>
                                <p class="knowledge_introduce">
                                    {{body.txt}}
                                </p>
                                <p class="knowledge_effect">
                                    功效 : <br>
                                    {{body.effect1}}<br>
                                    {{body.effect2}}<br>
                                    {{body.effect3}}<br>
                                    {{body.effect4}}
                                </p>
                            </div>
                        </li>
                    </swiper-slide>
                    <div class="swiper-pagination" solt="pagination"></div>
                </swiper>
            </section>

            <section class="knowledge_container title_right">
                <h3 class="knowledge_title">腳部</h3>
                <swiper class="knowledge_swiper"
                        :modules="modules"
                        :pagination="{ clickable: true }"
                        :navigation="true"
                        :loop="true"
                        @swiper="onSwiper"
                        @slideChange="onSlideChange">
                    <swiper-slide class="knowledge_list"
                        v-for="(foot, index) in footList"
                        :key="index"
                    >
                        <li class="knowledge_card" >
                            <div class="knowledge_pic">
                                <img
                                    :src="require(`@/assets/images/${foot.pic}`)"
                                    :alt="foot.name"
                                >
                            </div>
                            <div class="knowledge_txt">
                                <h3 class="knowledge_name">{{foot.name}}</h3>
                                <p class="knowledge_introduce">
                                    {{foot.txt}}
                                </p>
                                <p class="knowledge_effect">
                                    功效 : <br>
                                    {{foot.effect1}}<br>
                                    {{foot.effect2}}<br>
                                    {{foot.effect3}}<br>
                                    {{foot.effect4}}
                                </p>
                            </div>
                        </li>
                    </swiper-slide>
                    <div class="swiper-pagination" solt="pagination"></div>
                </swiper>
            </section>

            <div class="msgshl_btn ">
                <a href="#" class="btnLarge" @click.prevent="gameStart()">開始遊戲吧 !</a>
            </div>

        </div>
    </div>
    <lightBox  :lightBoxShow="showBox"/>
</template>
<script>
    import lightBox from "@/components/lightBox.vue"
    import {Pagination ,Navigation} from 'swiper';

  // Import Swiper Vue.js components
    import { Swiper, SwiperSlide } from 'swiper/vue';

  // Import Swiper styles
    import 'swiper/css';
    import 'swiper/css/navigation';
    import 'swiper/css/pagination';
    import 'swiper/css/scrollbar';
    
    export default {
        components: {
        Swiper,
        SwiperSlide,
        lightBox
        },
        data () {
            return{
                showBox:false,
                headList:[
                    {
                        pic:'head-01.png',
                        name:"迎香穴",
                        txt:"迎香穴位於鼻翼外緣與法令紋相交之處，按摩時，以雙手食指指尖，按壓穴道5秒鐘，休息5秒鐘，後再左右按揉各5分鐘，每日早、晚各一次。​",
                        effect1:"• 有效緩解鼻塞",
                        effect2:"• 促進面部鼻三角循環",
                        effect3:"• 有助提升氣色、淡化黑眼圈",
                        effect4:"• 宣肺氣，對肺部有不錯保健功效"
                    },
                    {
                        pic:'head-02.png',
                        name:"風池穴",
                        txt:"風池穴位於後頭部，微低頭在枕骨下方，兩條大筋之間的明顯凹陷處，大拇指、中指自然放在枕骨兩邊，輕輕滑動，枕部有明顯的兩個凹陷。",
                        effect1:"• 緩解頭痛、肩頸痠痛",
                        effect2:"• 促進血液循環",
                        effect3:"• 改善眼睛疲勞",
                    },
                    {
                        pic:'head-03.png',
                        name:"百會穴",
                        txt:"百會位於頭頂正中央，從兩耳到頭頂畫一條線，再從兩眉中央往頭頂畫一條線，兩條線的交接點。",
                        effect1:"• 調整自律神經",
                        effect2:"• 助眠",
                        effect3:"• 改善更年期症狀",
                        effect4:"• 預防腦中風"
                    },
                    {
                        pic:'head-04.png',
                        name:"翳風穴",
                        txt:"翳風穴位於耳後乳突前下方，平耳垂後下緣的凹陷處，平時可用指腹緩緩按摩穴位，直到穴位有痠脹感。",
                        effect1:"• 改善頭痛、緩解耳朵不適",
                        effect2:"• 促進血液循環、消除壓力",
                        effect3:"• 緩解耳鳴並消除臉頰浮腫",
                        effect4:"• 疏肝理氣、改善失眠"
                    },
                    {
                        pic:'head-05.png',
                        name:"後頂穴",
                        txt:"後頂穴位於頭頂正中線後髮際上5.5寸和，當百會後1.5寸，下距腦戶3寸。",
                        effect1:"• 改善頭痛、肩頸痠痛",
                        effect2:"• 緩解失眠症狀",
                    }
                ],
                handList:[
                    {
                        pic:'hand-01.png',
                        name:"合谷穴",
                        txt:"合谷穴位於手部虎口，大拇指與食指掌骨間靠近食指處，合谷穴應該朝著食指方向按壓而不是朝掌心按，按壓時會有痠脹的感覺。用大拇指揉按對側手的合谷穴，每次揉按3至5秒，按壓10到15下，交替按壓另一隻手。​",
                        effect1:"• 主治頭痛、眼睛痠痛",
                        effect2:"• 有助於緩解經痛、腹痛、肩臂疼痛",
                        effect3:"• 通血路、降血壓、防中風",
                        effect4:""
                    },
                    {
                        pic:'hand-02.png',
                        name:"中衝穴",
                        txt:"中衝穴位於手中指未節尖端中央處為中衝穴位所在之處。",
                        effect1:"• 主要功效為清熱、開竅、利喉舌、清心瀉熱",
                        effect2:"• 主治中暑、中風昏迷、頭痛",
                        effect3:"• 治咽喉腫痛、高血壓、心絞痛等",
                        effect4:"• 身體養生保健、消除暑熱"
                    },
                    {
                        pic:'hand-03.png',
                        name:"商陽穴",
                        txt:"商陽穴位於人體的手食指末節繞側，距指甲角0.1寸，抬起手，在食指靠拇指的那一側，在指甲角正后方2毫米的地方。",
                        effect1:"• 主治咽喉腫痛、齒痛、腮腫、耳鳴耳聾",
                        effect2:"• 治熱病汗不出、胸中熱滿、咳喘",
                        effect3:"• 治晕厥、中風昏迷",
                        effect4:"• 治牙痛、咽炎、喉炎、扁桃體炎"
                    },
                    {
                        pic:'hand-04.png',
                        name:"少商穴",
                        txt:"少商穴位於手掌微握拳，拇側向上，以拇指指甲內上角與第一節橫紋頭做一直線，復將爪甲底延長，當兩線之交叉點，以手尋之微呈凹陷處，按之痠脹是穴。",
                        effect1:"• 主要功效為清熱、利咽、醒神",
                        effect2:"• 可治扁桃體炎、咽喉腫痛、咽喉炎",
                        effect3:"• 緩解感冒、退高燒、改善喉嚨痛",
                        effect4:""
                    },
                    {
                        pic:'hand-05.png',
                        name:"關衝穴",
                        txt:"關衝穴位於雙手無名指上，靠近小指的的指側，指甲根旁邊的大約0.2公分的地方。",
                        effect1:"• 主要功效為清熱、利喉舌",
                        effect2:"• 緩解扁桃體炎、喉炎、頭痛、暈眩",
                        effect3:"• 緩解急性中暑症狀",
                        effect4:"• 快速解酒醒腦或預防酒醉"
                    }
                ],
                bodyList:[
                    {
                        pic:'body-01.png',
                        name:"命門穴",
                        txt:"命門穴位於腰部，當後正中線上，第2腰椎棘突下凹陷中處為命門穴位所在之處。",
                        effect1:"• 強腎固本，溫腎壯陽",
                        effect2:"• 強腰膝固腎氣，延緩人體衰老",
                        effect3:"• 治療陽萎、遺精、背痛、腰膝酸軟、腎虛",
                        effect4:"• 治四肢無力、腿部浮腫、耳部疾病"
                    },
                    {
                        pic:'body-02.png',
                        name:"中府穴",
                        txt:"中府穴位於前胸膛的外上方，距離前正中位線6寸處，平於第1肋骨間隙，雲門穴下1寸處為中府穴位所在之處。",
                        effect1:"• 主治咳嗽、氣喘、肺脹滿、胸痛、肩背",
                        effect2:"• 通經活絡、疏散風熱、肅降肺氣、止咳平喘",
                        effect3:"• 治療氣管炎、支氣管哮喘、肺炎"
                    },
                    {
                        pic:'body-03.png',
                        name:"腰眼穴",
                        txt:"腰眼穴位於腰部第四腰椎棘突下，往兩側3.5寸的凹陷處，大約四指寬多一點，穴位正好在腰部的薄弱點，又名鬼眼穴。",
                        effect1:"• 主治腰痛痠軟、消渴",
                        effect2:"• 治婦科疾病、腎虛、頻尿",
                        effect3:"• 治療肺結核",
                        effect4:"• 可補腎調經"
                    },
                    {
                        pic:'body-04.png',
                        name:"天溪穴",
                        txt:"天溪穴位於胸外側部，當第4肋間隙，距前正中線6寸處為天溪穴位所在之處。",
                        effect1:"• 主治胸痛，咳嗽，氣喘，支氣管炎",
                        effect2:"• 治哮喘，胸膜炎，肋間神經痛",
                        effect3:"• 理氣止咳、寬胸通乳",
                        effect4:"• 治乳腫癰潰、胸中滿痛"
                    },
                    {
                        pic:'body-05.png',
                        name:"肩井穴",
                        txt:"肩井穴位於大椎穴，低頭時頸後凸起下方凹陷處，與肩峰端連線的中點處。​",
                        effect1:"• 舒緩肩頸肌肉",
                        effect2:"• 促進周邊的血液循環",
                        effect3:"• 通經絡、促進氣血",
                        effect4:"• 舒緩壓力、改善落枕"
                    }
                ],
                footList:[
                    {
                        pic:'foot-01.png',
                        name:"太衝穴",
                        txt:"太衝穴位於雙腳腳背，大拇趾和第二趾的指縫之間，大約往內兩寸，約一拇指寬的凹陷處。​​",
                        effect1:"• 主要功效為平息肝火、清熱、明目",
                        effect2:"• 改善頭痛、暈眩",
                        effect3:"• 調理高血壓、月經不調、急性腰痛",
                        effect4:"• 治療青春痘、咽喉炎、更年期症候群"
                    },
                    {
                        pic:'foot-02.png',
                        name:"足心穴",
                        txt:"足心穴位於足跖部，第二趾尖端至足跟後緣連線之中點處。",
                        effect1:"• 平肝息風、通絡止痛、促進血液循環",
                        effect2:"• 治頭痛、眩暈、癲癇",
                        effect3:"• 治小兒驚癇、昏迷急救、抽搐",
                        effect4:"• 治下肢痙攣、足底痛、婦女血崩"
                    },
                    {
                        pic:'foot-03.png',
                        name:"公孫穴",
                        txt:"公孫穴位於足大趾本節後一寸，內踝前凹陷中。足背最高點是第一蹠骨與第一楔狀骨接合處，從最高點向內踝移下，取骨邊凹陷處。",
                        effect1:"• 治腳氣、治痛經、失眠",
                        effect2:"• 治急性腸炎、腹水腸鳴",
                        effect3:"• 治胸滿鞕痛、痰多壅胸膈",
                        effect4:"• 治急性胃炎、胃痛"
                    },
                    {
                        pic:'foot-04.png',
                        name:"三陰交穴",
                        txt:"三陰交穴位在腳踝內側上三寸，在脛骨後凹陷處，或用四指橫按內踝骨上，正內踝中心直上處。",
                        effect1:"• 治腳氣、失眠、便祕",
                        effect2:"• 發燒退熱、退化性關節炎",
                        effect3:"• 治月經問題、婦科疾病",
                        effect4:"• 治更年期症侯群"
                    },
                    {
                        pic:'foot-05.png',
                        name:"湧泉穴",
                        txt:"湧泉穴位於腳底的第二與第三腳趾之間，在第二腳趾底部與腳後跟的中間約三分之一處，當腳趾往下彎曲時，腳底的凹陷處就是湧泉穴。",
                        effect1:"• 治療頭痛、高血壓、腹瀉和失眠",
                        effect2:"• 增強體力、改善精氣神",
                        effect3:"• 改善喉嚨痛、腰部痠脹",
                        effect4:"• 治水腫、虛寒、消除疲勞"
                    }
                ],
            }
        },
        setup() {
            const onSwiper = (swiper) => {
                
            };
            const onSlideChange = () => {

            };
            return {
                onSwiper,
                onSlideChange,
                modules: [Pagination,Navigation],
            };
        },
        created() {
            this.getMember();
        },
        methods: {
            getMember() {
                let members = sessionStorage.getItem("member");
                this.member = JSON.parse(members);
            },
            gameStart(){
                if(!this.member){
                    this.showBox=!this.showBox
                }else{
                    this.$router.push('/MassageGame')
                }

            }
        },
    }
</script>
<style lang="scss" scoped>
    a:hover{
        color: #fff;
    } 
</style>



