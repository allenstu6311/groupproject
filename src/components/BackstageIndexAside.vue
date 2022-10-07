<template>
    <div class="list-group" id="list-tab" role="tablist">
        <router-link
        v-for="item in chose" 
        :key="item" 
        :to="item.path"
        class="list-group-item list-group-item-action myset_border myset_list_bac"
        id="list-home-list"
        data-bs-toggle="list"
        role="tab" 
        aria-controls="list-home"
        >
            {{ item.name }}
        </router-link>
    </div>
</template>

<script>
import {routes} from "@/router/index.js"
import "bootstrap/scss/bootstrap.scss";
export default {
    data(){
        return{
            value: 0,
            routes,
            chose: [
                {
                id: 0,
                name: "首頁",
                path:"/backstageIndex",
                },
                {
                id: 1,
                name: "管理最新消息",
                path:"/BackShop",
                },
                {
                id: 2,
                name: "管理商品",
                path:"/BackShop",
                },
                {
                id: 3,
                name: "管理商品訂單",
                path:"/OrderItem",
                },
                {
                id: 4,
                name: "管理按摩項目",
                path:"/BackShop",
                },
                {
                id: 5,
                name: "管理按摩訂單",
                path:"/BackShop",
                },
                {
                id: 6,
                name: "管理按摩師",
                path:"/BackTherapist",
                },
                {
                id: 7,
                name: "管理會員帳號",
                path:"/BackShop",
                },
                {
                id: 8,
                name: "管理後台帳號",
                path:"/BackShop",
                },
                {
                id: 9,
                name: "管理常見問題",
                path:"/BackShop",
                },
                {
                id: 10,
                name: "管理折價券",
                path:"/BackCoupon",
                },
                  {
                id: 11,
                name: "商品上架",
                path:"/ManageItems",
                },
            ]
        }
    },
    methods: {
        changeColor(id) {
            this.value = id;
        }
    }
}
</script>

<style lang="scss" scoped>
    // @import "bootstrap/scss/bootstrap"; 
    // @import "../assets/style.scss";
    @import "../assets/base/_color.scss"; //有變數要引用的sass

    #list-home-list{
        font-size: 16px;
        font-weight: 600;
        color: $blue;
        position: relative;
        right: 20px;
    }
</style>