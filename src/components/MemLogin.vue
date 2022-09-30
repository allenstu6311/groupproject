<template>
    <div class="memberLogin">
        <h2 class="h2">會員登入</h2>
        <div class="input_area">
            <div class="account">
                帳號:<input type="text">
            </div>
            <br>
            <div class="password">
                密碼:<input type="password">
            </div>
            <br>
            <div class="sign">
                <a href="/MemRegister">註冊</a>
                <a href="./backstage.html">忘記密碼</a>
            </div>
        </div>
        <!-- 登入按鈕 -->
        <button class="btnMinimum login_btn"><a href="/memCenter">登入</a> </button>
        <hr>
        <div>其他登入方式</div>
        <div class="another_login">
            <a href="https://www.google.com.tw" class="google">
                <img src="../assets/images/Google__G__Logo.svg.png">
            </a>
            <a href="https://www.facebook.com/" class="facebook">
                <img src="../assets/images/facebook.png">
            </a>
            <a href="https://line.me/zh-hant/" class="line">
                <img src="../assets/images/line.png">
            </a>
        </div>
    </div>
</template>