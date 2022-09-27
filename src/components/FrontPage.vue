<template>
    <header class="backstage_header">
        <img src="../assets/images/backstageHeaderLogo.png">
    </header>
    <div class="container text-center">
        <!-- <div class="choose_id">選擇登入</div> -->
        <div class="row justify-content-md-around my_set">
            <div class="col col-lg-2">
                    <a href="/home">
                        <button class="btnLarge enter">前台</button>
                    </a>
            </div>
            <div class="col col-lg-2">
                    <a href="backstage.html">
                        <button class="btnLarge enter">後台</button>
                    </a>
            </div>
        </div>
        <div class="copyright">
            本網站為緯育TibaMe_前端設計工程師班第77期學員專題成果作品，本平台僅供學習、展示之用。若有抵觸有關著作權，或有第三人主張侵害智慧財產權等情事，均由學員負法律上責任，緯育公司概不負責。若有侵權疑慮，您可以私訊
            <a href="https://www.facebook.com/TibaMe/">[緯育TibaMe]</a>，後續會由專人協助處理。
        </div>
    </div>
</template>


<script>
// import 'bootstrap'
</script>



<style lang="scss" scoped>
    // @import 'bootstrap/dist/css/bootstrap.min.css';
    @import 'bootstrap';
    @import"../assets/style.scss";
    .backstage_header{
        text-align: center;
        background-color: $blue;
        padding: 20px;
    }
    .enter{
        margin-top: 200px;
        border-radius: 50%;
        width: 200px;
        height: 200px;
        a{
            display: block;
        }
    }    
    .copyright {
        line-height: 1.5;
        margin-top: 100px;
    }
</style>