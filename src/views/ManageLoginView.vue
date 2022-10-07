<template>
    <div class="background_flower">
        <div class="manageLogin">
            <h2>管理員登入</h2>
            <div class="input_area">
                帳號: <input type="text">
                <br>
                密碼: <input type="password">
                <br>
            </div>
            <!-- 登入按鈕 -->
            <router-link to="/backstageIndex"><button class="btnAddCart">登入</button></router-link>
        </div>
    </div>
</template>

<style lang="scss" scoped>

.manageLogin{
    width: 100%;
    height: 100vh;
    text-align: center;

    h2{
        font-size: 40px;
        font-weight: 600;
        padding: 100px 0 100px 0;
        letter-spacing: 1px;
        color:#163D82;
    }
    .input_area{
        padding: 0 0 20px 0;
        font-size: 20px;
        
        input{
            font-size: 20px;
            margin: 0 0 30px 0;
        }
    }
    .btnAddCart{
        margin: 10px 0 0 0 ;
    }
}
</style>
