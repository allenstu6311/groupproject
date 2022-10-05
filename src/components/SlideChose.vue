<template>

  <ul class="list-group list-group-flush">

      <router-link 
      v-for="item in chose" 
      :key="item" 
      :to="item.path" 
      class="list-group-item pt-3 pb-3"  
    
      >
      {{item.name}}
      </router-link>

  </ul>

<router-view></router-view>

</template>
<style lang="scss" scoped>
@import "bootstrap/scss/bootstrap";

.list-group {
  width: 200px;
  background-color: rgb(201, 201, 201);
  margin:0 20px;
 
    a{
      display: block;
      text-decoration: none;
      background-color: #163d82;
      color:white;
      
    }
  }

</style>
<script>
import {routes} from "@/router/index.js"
export default {
  data() {
    return {
      value: 0,
      routes,

     chose: [
        {
          id: 0,
          name: "管理最新消息",
          path:"/BackShop",
        },
        {
          id: 1,
          name: "管理商品",
          path:"/BackShop",
        },
        {
          id: 2,
          name: "管理商品訂單",
          path:"/OrderItem",
        },
        {
          id: 3,
          name: "管理按摩項目",
            path:"/BackShop",
        },
        {
          id: 4,
          name: "管理按摩訂單",
          path:"/BackShop",
        },
        {
          id: 5,
          name: "管理按摩師",
          path:"/BackShop",
        },
        {
          id: 6,
          name: "管理會員帳號",
          path:"/BackShop",
        },
        {
          id: 7,
          name: "管理後台帳號",
          path:"/BackShop",
        },
        {
          id: 8,
          name: "管理常見問題",
          path:"/BackShop",
        },
        {
          id: 9,
          name: "管理折價券",
          path:"/BackShop",
        },
         {
          id: 10,
          name: "商品上架",
          path:"/ManageItems",
        },
      ],
    };
  },
  methods: {
    changeColor(id) {
      this.value = id;
    },
  },
  created() {},
};
</script>
