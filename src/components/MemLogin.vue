<template>
    <div class="memberLogin">
        <h2 class="h2">會員登入</h2>
        <div class="input_area">
            <div class="account">
                帳號:<input type="text" v-model="account">
            </div>
            <br>
            <div class="password">
                密碼:<input type="password" v-model="password">
            </div>
            <br>
            <div class="sign">
                <router-link to="/MemRegister">註冊</router-link>
                <a href="./backstage.html">忘記密碼</a>
            </div>
        </div>
        <!-- 登入按鈕 -->
        <button class="btnMinimum login_btn" @click="login">登入</button>
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
<script>
export default {
    data() {
        return {
            account: '',
            password: '',
            session:'',
            loginStatus:''
        }
    },
    methods: {
        login() {
            let account = this.account
            let password = this.password
            // 帳號密碼不能為空
            if (account == '') {
                alert('請輸入帳號');
                return;
            } else if (password == '') {
                alert('請輸入密碼');
                return;
            } else if (account == '' && password == '') {
                alert('請輸入帳號和密碼');
                return;
            } else {
                let xhr = new XMLHttpRequest();

                xhr.onload = function () {
                    if (xhr.responseText == "帳號密碼有誤") {
                        alert("帳號密碼有誤");
                    } else {
                        this.session=JSON.parse(xhr.responseText);
                        sessionStorage.setItem("memName",this.session.memName);
                        sessionStorage.setItem("memPhone",this.session.memPhone);
                        sessionStorage.setItem("memAddress",this.session.memAddress);
                        this.loginStatus = sessionStorage.getItem("memName");
                        if (this.loginStatus != '') {
                            // let prepage = document.referrer;
                            // if(prepage === ''){
                                location.replace("/MemCenter");
                            // }else{
                            //     location.replace(prepage);
                            // }
                        }
                    }

                }
                // const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..'
                // var url = ${BASE_URL}/api/login.php
                xhr.open("post", "http://localhost/CGD102_G2/public/api/login.php", true);
                xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");

                let login_info = `account=${this.account}&password=${this.password}`;
                xhr.send(login_info);
            }
        }
    },
    mounted(){
        let checkLogin = sessionStorage.getItem('memName');
        if(checkLogin){
            alert("請先登出");
            location.replace("/home");
        }
    }
}
</script>