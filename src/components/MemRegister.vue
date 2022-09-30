<template>
    <div class="register">
        <div class="title">
            註冊會員
        </div>
        <form action="post">
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
                    <input type="password" maxlength="15" v-model="password">
                    <input type="password" maxlength="15" v-model="passwordAgain">
                    <input type="text" maxlength="10" v-model="name">
                    <input type="email" maxlength="40" v-model="email">
                    <input type="date" v-model="birthday">
                    <input type="text" maxlength="10" v-model="phone">
                    <input type="text" maxlength="10" v-model="localphone">
                    <input type="text" maxlength="40" v-model="address">
                </div>
            </div>
            <div  style="text-align:center"><input type="submit" value="送出" class="btnLittle" @click="submit"></div>
        </form>
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
            memdata: [],
            Format: /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/
        }
    },
    methods: {
        addinmemdata() {
            this.memdata.push
        },
        submit() {
            //驗證密碼
            if (this.password != this.passwordAgain) {
                alert("密碼兩次輸入不同")
                return
            } else if (this.password.length < 6) {
                alert("密碼長度太短")
                return
            }
            //驗證信箱
            if (this.email.search(this.Format) != -1) {
                console.log(1)
            } else {
                alert("email格式錯誤")
                return
            }
        },
    },
}
</script>