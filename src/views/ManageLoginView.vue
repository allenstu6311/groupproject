<template>
    <div>
        <header class="backstage_header">
            <img src="../assets/images/backstageHeaderLogo.png">
        </header>
        <div class="manageLogin">
            <h2 class="h2">管理員登入</h2>
            <div class="input_area">
                <div class="account">
                    帳號:<input type="text">
                </div>
                <br>
                <div class="password">
                    密碼:<input type="password">
                </div>
                <br>
            </div>
            <!-- 登入按鈕 -->
            <button class="btnMinimum login_btn"><a href="./backstageIndex">登入</a> </button>
        </div>
    </div>
</template>

<script>

// import "bootstrap/dist/css/bootstrap.css"

export default {
    
}
</script>
<style lang="scss" scoped>

    @import "~bootstrap/scss/bootstrap";

</style>
