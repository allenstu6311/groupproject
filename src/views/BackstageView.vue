<template>
    <div>
        <header class="backstage_header">
            <img src="../assets/images/backstageHeaderLogo.png">
        </header>
        <div class="container text-center">
            <div class="choose_id">選擇登入身分</div>
            <div class="row justify-content-md-around my_set">
                <div class="col col-lg-2 manageLogin_hover">
                    <a href="./manageLogin">
                        <div class="manage_icon">
                            <img src="../assets/images/manageIcon.png">
                        </div>
                        <button class="btnLittle">
                            管理員登入
                        </button>
                    </a>
                </div>
                <div class="col col-lg-2 masseurLogin_hover">
                    <div class="masseur_icon">
                        <img src="../assets/images/masseurIcon.png">
                    </div>
                    <button class="btnLittle">
                        <a href="#">按摩師登入</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>

  @import "~bootstrap/scss/bootstrap";

</style>