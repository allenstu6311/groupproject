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
                <input type="text" maxlength="30" v-model="account">
                <div>
                    <input type="password" maxlength="10" v-model="password" placeholder="最少為六碼，最大為十碼">
                    <span :class="pswclass">{{pswtip}}</span>
                </div>
                <div>
                    <input type="password" maxlength="15" v-model="passwordAgain">
                    <span :class="pswAclass">{{pswAtip}}</span>
                </div>
                <input type="text" maxlength="10" v-model="name">
                <div>
                    <input type="email" maxlength="40" v-model="email">
                    <span :class="emailclass">{{emailtip}}</span>
                </div>
                <input type="date" v-model="birthday">
                <input type="text" maxlength="10" v-model="phone">
                <input type="text" maxlength="10" v-model="localphone">
                <input type="text" maxlength="40" v-model="address">
            </div>
        </div>
        <div style="text-align:center"><button  class="btnLittle" @click="submit">送出</button></div>
    </div>
</template>
<script>
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
            emailtip: "*",
            pswtip: "*",
            pswAtip: "*",
            emailclass: "error",
            pswclass: "error",
            pswAclass: "error",
            emailflag: false,
            pswflag: false,
            pswAflag: false,
        }
    },
    methods: {
        submit() {
            if (this.passwordAgain != this.password) {
                alert("兩次密碼不相符");
                return;
            }else if(this.pswflag&&this.emailflag){
                var xhr = new XMLHttpRequest();
                // var url = `http://localhost/CGD102_G2/src/assets/phps/register.php?account=${this.account}&password=${this.password}&name=${this.name}&email=${this.email}&birthday=${this.birthday}&phone=${this.phone}&localphone=${this.localphone}&address=${this.address}`
                // xhr.open("get",url,true);
                xhr.onload = function(){
                    alert(xhr.responseText);
                }
                xhr.open("post","http://localhost/CGD102_G2/src/assets/phps/register.php",true);
                xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");

                let mem_deta = `account=${this.account}&password=${this.password}&name=${this.name}&email=${this.email}&birthday=${this.birthday}&phone=${this.phone}&localphone=${this.localphone}&address=${this.address}`
                xhr.send(mem_deta);
                
            }else{
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
        email: function (content) {
            var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
            this.emailflag = this.checkContentByReg(reg, content, "emailtip", "emailclass")
        },
        password: function (content) {
            var reg = /^[0-9a-z]{6,10}$/;
            this.pswflag = this.checkContentByReg(reg, content, "pswtip", "pswclass")
        },
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