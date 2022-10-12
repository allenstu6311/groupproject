<template>
    <div class="background_flower">
        <div class="memberLogin">
            <div class="title_area ">
                <div class="sure_title">
                    <h2 class="title_font">會</h2>
                    <h2 class="title_font">員</h2>
                    <h2 class="title_font">登</h2>
                    <h2 class="title_font">入</h2>
                </div>
                <small>• LOGIN •</small>
            </div>
            <div class="input_area">
                <div class="account">
                    帳號:<input type="text" v-model="account" style="font-size: 20px; margin-bottom: 5px;"  @keydown.enter="login">
                </div>
                <br>
                <div class="password">
                    密碼:<input type="password" v-model="password" style="font-size: 20px; margin-bottom: 5px;" @keydown.enter="login">
                </div>
                <br>
                <div class="sign">
                    <router-link to="/MemRegister">註冊</router-link>
                    <a href="./backstage.html">忘記密碼</a>
                </div>
            </div>
            <!-- 登入按鈕 -->
            <button class="btnAddCart login_btn" @click="login" >登入</button>
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
    </div>
</template>
<script>
import {BASE_URL} from '@/assets/js/common.js'
import { useRouter } from "vue-router";

export default {
    data() {
        return {
            account: '',
            password: '',
            session: '',
            loginStatus: [],
            router: useRouter(),
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
                let thus = this
                xhr.onload = function () {
                    if (xhr.responseText == "帳號密碼有誤") {
                        alert("帳號密碼有誤");
                    } else {
                        this.session = JSON.parse(xhr.responseText);
                        console.log(this.session)
                        sessionStorage.setItem("member", JSON.stringify(this.session));
                        this.loginStatus = sessionStorage.getItem("member")
                        if (this.loginStatus != '') {
                            // if (document.referrer === '') {
                                thus.router.replace({ path: '/MemCenter' })
                            // }
                            // else if(document.referrer === '/MemRegister'){
                            //     location.replace("/MemCenter");
                            // }
                            // else {
                            //     location.replace(document.referrer);
                            // }
                        }
                    }

                }
                // const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..'
                var url = `${BASE_URL}/login.php`
                // var url = "http://localhost/CGD102_G2/public/api/login.php"
                xhr.open("post",url, true);
                xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");

                let login_info = `account=${this.account}&password=${this.password}`;
                xhr.send(login_info);
            }
        },

    },
    mounted() {
        let checkLogin = sessionStorage.getItem('member');
        if (checkLogin) {
            alert("請先登出");
            this.router.push({ path: '/home' });
        }
    }
}
</script>