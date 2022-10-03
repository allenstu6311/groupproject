<template>
  <ul class="list-group list-group-flush">
    <li
      class="list-group-item pt-3 pb-3"
      v-for="item in chose"
      :key="item.name"
      :class="{ target: value == item.id }"
      @click="changeColor(item.id)"
    >
      {{ item.name }}
    </li>
  </ul>
</template>
<style lang="scss" scoped>
@import "bootstrap/scss/bootstrap";
.list-group-item {
  cursor: pointer;
  background-color: #163d82;
  color: white;

  
}
.target {
  background-color: #B52011;
  font-weight: 800;
}
.list-group {
  width: 200px;
  background-color: rgb(201, 201, 201);
  margin:0 20px;
  li{
    width: 180px;
    margin: 10px 0;
    text-align: center;
    font-size: 22px;
    margin: auto;
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
        },
        {
          id: 2,
          name: "管理商品訂單",
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
