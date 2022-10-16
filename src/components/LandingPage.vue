<template>
    <div class="landing_content background_flower">
        <div class="logo">
            <img src="../assets/images/headerLogo.png" alt="">
        </div>

        <div class="btn_contain">
            <img class="slide-top" src="../assets/images/enterHand1.png" alt="">
            <router-link to="/home">
                <button class="enter">前台</button>
            </router-link>
            <div class="space"></div>
            <router-link to="/manageLogin">
                <button class="enter ">後台</button>
            </router-link>
            <img class="slide-bottom" src="../assets/images/enterHand2.png" alt="">
        </div>
        
        <div class="copyright">
            <p>本網站為緯育TibaMe_前端設計工程師班第77期學員專題成果作品，本平台僅供學習、展示之用。若有抵觸有關著作權，或有第三人主張侵害智慧財產權等情事，均由學員負法律上責任，緯育公司概不負責。若有侵權疑慮，您可以私訊
            <a href="https://www.facebook.com/TibaMe/">[緯育TibaMe]</a>，後續會由專人協助處理。</p>
        </div>
    </div>
</template>




<style lang="scss" scoped>
    @import"@/assets/base/color.scss";
    @keyframes slide-top {
    0% {
        opacity: 1;
        transform: translateY(0);
    }
    50% {
        opacity: 1;
        transform: translateY(15px);
    }
    100% {
        opacity:1;
        transform: translateY(-15px);
                
                
    }
}
.slide-top{
    animation-name: slide-top; /* 套用的 keyframe */
    animation-duration: 4s;          /* 動畫持續時間 */
    animation-iteration-count: infinite; /* 動畫播放次數 */
    animation-timing-function: linear; /* 影片加速速率 */
    animation-direction: alternate; /* 動畫持續時間 */
}

    @keyframes slide-bottom {
    0% {
        opacity: 1;
        transform: translateY(0);
    }
    50% {
        opacity: 1;
        transform: translateY(-15px);
    }
    100% {
        opacity:1;
        transform: translateY(15px);
                
                
    }
}
.slide-bottom{
    animation-name: slide-bottom; /* 套用的 keyframe */
    animation-duration: 4s;          /* 動畫持續時間 */
    animation-iteration-count: infinite; /* 動畫播放次數 */
    animation-timing-function: linear; /* 影片加速速率 */
    animation-direction: alternate; /* 動畫持續時間 */
}


.landing_content{
    width: 100%;
    height: 100%;
    display: flex;
    flex-wrap: wrap;
    text-align: center;
    background-color: $baseWhite;
    margin: 0 auto;
    .logo{
        
        margin: 0 auto;
        padding: 20px 0;
        width: 100%;
        max-width: 1200px;
        img{
            width: 300px;
            
        }
    }
    .btn_contain{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 65vh;
        margin: 0 auto;
        max-width: 1200px;
        .space{
            width: 250px;
        }
        a{
            border-radius: 50%;
            border: 3px solid $blue;
            transition: all .3s;
            &:hover{
                background-color: $blue;
                transform: scale(1.1);
            }
            &:hover .enter{
                color:$white;
            }
            

            .enter{
            background-color: transparent;
            border: 0px;
            width: 180px;
            height: 180px;
            cursor: pointer;
            font-size: 36px;
            font-weight: 600;
            color: $blue;
            letter-spacing: 3px;
            }    
        }
    }
    
.copyright {
    margin: 0 auto;
    padding-top: 50px;
    width: 1200px;
    line-height: 1.5;
    p{
        color: rgb(119, 119, 119);
    }
}
}
/*====== 行動版 RWD | 320px ~ 768px ======*/
@media screen and (min-width: 320px) and (max-width: 767.98px){
    .landing_content{
        width: 90%;

        .btn_contain{
            display: flex;
            flex-wrap: wrap;
            height: 58vh;

            .slide-top{
                display: none;
            }
            .slide-bottom{
                display: none;
            }
        }
    }
    .copyright{
        width: 90%;
        display: flex;
        justify-content: center;
    }


}    
</style>