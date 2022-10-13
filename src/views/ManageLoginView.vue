<template>
    <div class="background_flower">
        <div class="manageLogin">
            <h2>管理員登入</h2>
            <div class="input_area">
                帳號: <input type="text" v-model="account">
                <br>
                密碼: <input type="password" v-model="password">
                <br>
            </div>
            <!-- 登入按鈕 -->
            <button class="btnAddCart" @click="login">登入</button>
        </div>
    </div>
</template>

<script>
import { BASE_URL } from '@/assets/js/common.js'
import { useRouter } from "vue-router";
export default {
    data() {
        return {
            account: '',
            password: '',
            session: '',
            loginStatus: '',
            router: useRouter(),
        }
    },
    methods: {
        login() {
            let account = this.account
            let password = this.password
            if (account == '' && password == '') {
                alert('請輸入帳號和密碼');
                return;
            }
            else if (account == '') {
                alert('請輸入帳號');
                return;
            } else if (password == '') {
                alert('請輸入密碼');
                return;
            }
            else {
                let xhr = new XMLHttpRequest();
                let thus = this
                xhr.onload = function () {
                    if (xhr.responseText == "0") {
                        alert("帳號密碼有誤");
                    } else {
                        this.session = JSON.parse(xhr.responseText);
                        sessionStorage.setItem("admin", JSON.stringify(this.session));
                        this.loginStatus = sessionStorage.getItem("admin")
                        if (this.loginStatus != '') {
                            thus.router.replace({ path: '/BackstageIndex' })
                        }
                    }
                }
                var url = `${BASE_URL}/manageLogin.php`//上線用
                // var url = "http://localhost/CGD102_G2/public/api/manageLogin.php"//開發用
                xhr.open("post", url, true);
                xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");

                let login_info = `account=${this.account}&password=${this.password}`;
                xhr.send(login_info);
            }
        }
    },
}
</script>
<style lang="scss" scoped>
.manageLogin {
    width: 100%;
    height: 100vh;
    text-align: center;

    h2 {
        font-size: 40px;
        font-weight: 600;
        padding: 100px 0 100px 0;
        letter-spacing: 1px;
        color: #163D82;
    }

    .input_area {
        padding: 0 0 20px 0;
        font-size: 20px;

        input {
            font-size: 20px;
            margin: 0 0 30px 0;
        }
    }

    .btnAddCart {
        margin: 10px 0 0 0;
    }
}
</style>
