<template>
<Header />
  <div class="background-pic">
        <img src="../assets/images/bcgFlower.png" alt="">
    </div>
<div class="confirm-container">
    <MemberInfo />
    <CheckCommodity />
</div>
<div class="agree">
    <input type="checkbox">
    <span>我同意本網站的<span>服務條款</span>與<span>退換貨規則</span></span>
</div>
<div class="change-page">
    <button>上一頁</button>
    <button>下一頁</button>
</div>


<Footer />

</template>
<style lang="scss" scope>
.background-pic{
    position: fixed;
    margin: auto;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}
    .confirm-container{
        width: 100%;
        max-width: 1200px;
        margin: auto;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        padding: 50px 10px;
    }
    .change-page{
        display: flex;
        justify-content: space-evenly;
        margin: 10px 0;

        button{
            width: 120px;
            text-align: center;
            border-radius: 100px;
            padding: 10px;
            font-size: 16px;
            font-weight: 800;
            background-color: #163D82;
            color: #FFFFFF;
            border: none;
            position: relative;
            z-index: 10;
            letter-spacing: 2px;
            cursor: pointer;
            &:hover{//&是連結父層
                background-color:#B52011;
                transform: translateY(-3px);
                box-shadow: 2px 4px 0px #000000;
                transition: all 0.3s 
        }
            &:active{
                transform: translateY(-3px) scale(.97);
                box-shadow: 1px 2px 0px #000000;
                transition: all 0.1s 
        }
    }
    }
    .agree{
        text-align: center;
        margin-bottom: 40px;
        span{
            font-size: 20px;
            font-weight: 800;
            span{
                color: #B52011;
            }
        }
    }
    @media screen and (min-width:768px){
            .confirm-container{
                width: 100%;
                max-width: 1200px;
                margin: auto;
                display: flex;
                flex-direction: row;
                justify-content: space-around;
                padding: 80px 10px;
            }
            .change-page{
                    display: flex;
                    justify-content:center;
                    margin: 10px 0;

                    button{
                        margin: 0 10px;
                    }
            }
    }
</style>

<script>
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
import MemberInfo from "@/components/MemberInfo.vue"
import CheckCommodity from "@/components/CheckCommodity.vue"
export default {
    components:{
        Header,
        Footer,
        MemberInfo,
        CheckCommodity
    }
}
</script>