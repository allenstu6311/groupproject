<template>
    <div class="container-fluid">
        <div class="row">
            <ul class="list-group list-group-flush">
                <li
                class="list-group-item pt-3 pb-3"
                v-for="item in chose"
                :key="item.name"
                @click="changeColor(item.id)"
                >
                    <a :href="item.path" id="url" style=" background-color: transparent !important;">
                        {{ item.name }}
                    </a>
                </li>
            </ul>
            <table class="table">
                <thead>
                    <tr>
                        <th>商品照片</th>
                        <th>標題</th>
                        <th>狀態</th>
                        <th>上架</th>
                        <th>下架</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</template>
<style lang="scss" scoped>
@import "bootstrap/scss/bootstrap";


.list-group-item {
  cursor: pointer;
  background-color: #163d82;
  color: white;
}
.list-group {
  width: 200px;
  background-color: rgb(201, 201, 201);
  margin:0 20px;
  li{
    width: 180px;
    text-align: center;
    font-size: 22px;
    margin: 10px auto;
    a{
      text-decoration: none;
    }
  }

}
</style>
<script>
export default {
  data() {
    return {
      value: 0,

      chose: [
        {
          id: 0,
          name: "管理最新消息",
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
        },
        {
          id: 4,
          name: "管理按摩訂單",
        },
        {
          id: 5,
          name: "管理按摩師",
          path: "/backTherapist"
        },
        {
          id: 6,
          name: "管理會員帳號",
        },
        {
          id: 7,
          name: "管理後台帳號",
        },
        {
          id: 8,
          name: "管理常見問題",
        },
        {
          id: 9,
          name: "管理折價券",
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
