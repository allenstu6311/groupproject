<template>
     <div class="wrapper reservation background_flower">
        <!-- <header> @@include('./layout/header.html')</header> -->
        <h1 class="sr_only">預約按摩</h1>

        <main>
            <section class="resv_banner">
                <div class="banner">
                    <!-- <img src="../assets/images/resvBanner.jpg" alt=""> -->
                    <img src="../assets/images/resvBnr.png" alt="預約按摩照片">
                </div>
                <div class="main_title">
                    <img class="" src="../assets/images/resvBnrTitle.png" alt="預約按摩">
                </div>
            </section>
            <section class="resv_content">
                <div class="title_area">
                    <h2 class="sure_title">
                        <p class="title_font">嚴</p>
                        <p class="title_font">選</p>
                        <p class="title_font">按</p>
                        <p class="title_font">摩</p>
                    </h2>
                    <small>• EXQUISITE MASSAGE •</small>
                </div>
                <div id="view" class="msg_card_list">
                    <!-- vue v-for -->
                    <div class="msg_card_frame" v-for="(msgCard, index) in msgCardList" :key="index"
                        :class="{reverse: index%2 === 1}">
                        <div class="msg_card row">
                            <div class="msg_card_txt col col-12 col-md-12 col-xl-8">
                                <h3 class="name item_title">
                                    {{msgCard.name}}
                                </h3>
                                <div class="intro">
                                    {{msgCard.intro}}
                                </div>
                                <div class="price_form">
                                    <div class="long_time">
                                        <div class="long_time_price">
                                            <span class="timespan timespan_1">
                                                {{msgCard.timespan_1}}分鐘
                                            </span>/
                                            <span class="price price_1">
                                                NT${{msgCard.price_1}}
                                            </span>
                                        </div>
                                        <p class="rec rec_1">
                                            {{msgCard.rec_1}}
                                        </p>
                                    </div>
                                    <div class="short_time">
                                        <div class="short_time_price">
                                            <span class="timespan timespan_2">
                                                {{msgCard.timespan_2}}分鐘
                                            </span>/
                                            <span class="price price_2">
                                                NT${{msgCard.price_2}}
                                            </span>
                                        </div>
                                        <p class="rec rec_2">
                                            {{msgCard.rec_2}}
                                        </p>
                                    </div>
                                </div>
                                <div class="btn">
                                    <a class="btnLarge" href="../assets/resvPage.html">立即預約</a>
                                </div>
                            </div>
                            <div class="pic_ctnr msg_card_pic col col-12 col-md-8 col-xl-4">
                                <img :src="msgCard.pic" :alt="msgCard.pic_alt">
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </main>
        <!-- <footer>@@include('./layout/footer.html')</footer> -->
    </div>
</template>
