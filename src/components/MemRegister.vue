<template>
    <div class="register">
        <div class="title">
            註冊會員
        </div>
        <div class="register_information">
            <div class="input_title">
                輸入帳號:
                <br>
                輸入密碼:
                <br>
                再次輸入密碼:
                <br>
                輸入名稱:
                <br>
                輸入信箱:
                <br>
                輸入生日:
                <br>
                輸入手機:
                <br>
                輸入市話:
                <br>
                輸入地址:
            </div>
            <div class="input_area">
                <div>
                    <input type="text" maxlength="30" v-model="account">
                    <span :class="accountclass">{{accounttip}}</span>
                </div>
                <div>
                    <input type="password" maxlength="10" v-model="password" placeholder="最少為六碼，最大為十碼">
                    <span :class="pswclass">{{pswtip}}</span>
                </div>
                <div>
                    <input type="password" maxlength="15" v-model="passwordAgain">
                </div>
                <div>
                    <input type="text" maxlength="10" v-model="name" placeholder="最多十個字">
                    <span :class="nameclass">{{nametip}}</span>
                </div>
                
                <div>
                    <input type="email" maxlength="40" v-model="email">
                    <span :class="emailclass">{{emailtip}}</span>
                </div>
                <input type="date" v-model="birthday">
                <div>
                    <input type="text" maxlength="10" v-model="phone" placeholder="例:09****">
                    <span :class="phoneclass">{{phonetip}}</span>
                </div>
                <input type="text" maxlength="10" v-model="localphone" placeholder="例:03*******">
                <div>
                    <input type="text" maxlength="40" v-model="address" placeholder="例:桃園市...">
                    <span :class="addressclass">{{addresstip}}</span>
                </div>
            </div>
        </div>
        <div style="text-align:center"><button class="btnLittle" @click="submit">送出</button>
        </div>
    </div>
</template>
<script>
import {BASE_URL} from '@/assets/js/common.js';
import { useRouter } from "vue-router";
export default {
    name: 'register',
    data() {
        return {
            account: '',
            password: '',
            passwordAgain: '',
            name: '',
            email: '',
            birthday: '',
            phone: '',
            localphone: '',
            address: '',
            accounttip: "*",
            emailtip: "*",
            nametip: "*",
            pswtip: "*",
            phonetip: "*",
            addresstip: "*",
            accountclass: "error",
            emailclass: "error",
            nameclass: "error",
            pswclass: "error",
            phoneclass: "error",
            addressclass: "error",
            accountflag: false,
            emailflag: false,
            nameflag: false,
            pswflag: false,
            phoneflag: false,
            addressflag: false,
            router: useRouter(),
        }
    },
    methods: {
        submit() {
            if (this.passwordAgain != this.password) {
                alert("再次輸入密碼與密碼不符");
                return;
            } else if (this.accountflag&&this.pswflag && this.emailflag && this.phoneflag && this.addressflag && this.nameflag) {
                var xhr = new XMLHttpRequest();
                let thus = this
                xhr.onload = function () {
                    if (xhr.status == 200) {
                        if (xhr.responseText == "註冊成功") {
                            alert("註冊成功");
                            thus.router.push({ path: '/MemLogin' })
                        } else if (xhr.responseText == "此帳號已存在") {
                            alert("此帳號已存在");
                        }
                    }
                }
                var url = `${BASE_URL}/register.php`;
                // var url = "http://localhost/CGD102_G2/public/api/register.php";
                xhr.open("post",url, true);
                xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");

                let mem_deta = `account=${this.account}&password=${this.password}&name=${this.name}&email=${this.email}&birthday=${this.birthday}&phone=${this.phone}&localphone=${this.localphone}&address=${this.address}`
                xhr.send(mem_deta);

            } else {
                alert("註冊失敗 有欄位錯誤")
            }

        },

        checkContentByReg(reg, content, tip, classname) {
            if (reg.test(content)) {
                this[tip] = "V"
                this[classname] = "success"
                return true
            } else {
                this[tip] = "請檢查格式"
                this[classname] = "error"
                return false
            }
        }
    },
    watch: {
        account: function(content){
            var reg = /\S/;
            this.accountflag = this.checkContentByReg(reg, content, "accounttip", "accountclass");
        },
        email: function (content) {
            var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
            this.emailflag = this.checkContentByReg(reg, content, "emailtip", "emailclass");
        },
        password: function (content) {
            var reg = /^[0-9a-z]{6,10}$/;
            this.pswflag = this.checkContentByReg(reg, content, "pswtip", "pswclass");
        },
        phone: function (content) {
            var reg = /^[0][0-9]/;
            this.phoneflag = this.checkContentByReg(reg, content, "phonetip", "phoneclass");
        },
        address: function (content) {
            var reg = /\S/;
            this.addressflag = this.checkContentByReg(reg, content, "addresstip", "addressclass");
        },
        name: function (content) {
            var reg = /\S/;
            this.nameflag = this.checkContentByReg(reg, content, "nametip", "nameclass");
        }

    }
}
</script>
<style>
.error {
    color: red;
}

.success {
    color: green;
}
</style>