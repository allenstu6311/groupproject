<template>
    <header class="backstage_manage_header">
        <div class="backstage_manage_logo">
          <img src="../assets/images/backstageHeaderLogo.png">
          <div class="title">後台管理者系統</div>
        </div>
        <div class="user_name">
          {{name}} 您好
          <div class="logout" @click="logout">登出</div>
        </div>
      </header>
</template>

<script>
import { useRouter } from "vue-router";
export default {
    data() {
        return {
            router: useRouter(),
            name:''
        }
    },
    methods: {
        logout(){
            sessionStorage.removeItem("admin");
            this.router.push({ path: '/manageLogin' });
        },
        getAdminName(){
            let getname = JSON.parse(sessionStorage.getItem("admin"));
            this.name = getname.adminName;
        }
    },
    created() {
        this.getAdminName();
    },
}
</script>

<style lang="scss" scoped>
    // @import "bootstrap/scss/bootstrap";
    // @import "../assets/style.scss";
    @import "../assets/base/_color.scss"; //有變數要引用的sass
    .backstage_manage_header{
        background-color: $blue;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        padding: 20px 5%;
        color: #fff;
        font-weight: 600;
        margin-bottom: 30px;
        .backstage_manage_logo{
            display: flex;
            align-items: flex-end;
            div{
                padding: 0px 40px;
                font-size: 40px;
            }
        }
        .user_name{
            display: flex;
            .logout{
                padding: 0 20px;
                text-decoration: none;
                cursor: pointer;
            }
        }
    }
</style>