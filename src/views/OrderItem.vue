<template>
  <div class="container-fluid">
    <div class="row">
      <SlideChose />
      <div class="orderBox">
        <div class="order-search  m-3">
          <select class="form-select w-25" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>

          <div class="input-group mx-3  w-25">
            <input
              type="text"
              class="form-control"
              placeholder="Recipient's username"
              aria-label="Recipient's username"
              aria-describedby="button-addon2"
            />
            <button
              class="btn btn-outline-secondary"
              type="button"
              id="button-addon2"
            >
              Button
            </button>
          </div>
        </div>

        <table class="table">
          <thead>
            <tr>
                <th>訂單編號</th>
                <th>會員編號</th>
                <th>訂單成立時間</th>
                <th>訂單小計</th>
                <th>狀態</th>
                <th>詳細資訊</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in data" :key="item.MEM_ID">
                <th>{{item.PROD_ORDERS_ID}}</th>
                <th>{{item.MEM_ID}}</th>
                <th>{{item.PROD_ORDERS_DATE}}</th>
                <th>{{item.PROD_ORDERS_SUBTOTAL}}</th>
                <th v-if="item.PROD_ORDERS_STATUS==0">未出貨</th>
                <th v-if="item.PROD_ORDERS_STATUS=-1">已出貨</th>
                <th v-if="item.PROD_ORDERS_STATUS==2">取消</th>
                <th v-if="item.PROD_ORDERS_STATUS==3">已送達</th>
                <th><button class="btnLittle">詳細資訊</button></th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<style lang="scss" scoped>
@import "~bootstrap/scss/bootstrap";
@import "../assets/style.scss";
.container-fluid {
  width: 100%;
  box-sizing: border-box;
}
.row {
  flex-wrap: nowrap;
}
.orderBox {
  width: 100%;
  max-width: 1200px;
  display: flex;
  flex-direction: column !important;

  .order-search{
    display: flex;
    align-items: center;
  }
  table {
    width: 80%;

    thead {
      background-color: $blue;
      color: white;
    }
    tr{
        th{
            border-bottom: 1px solid $blue
        }
 
    }
  }
}

.list-group {
  width: 15%;
  :nth-child(3) {
    background-color: red;
  }
}
</style>

<script>
import SlideChose from "@/components/SlideChose.vue";
export default {
  components: {
    SlideChose,
  },
  data(){
    return{
        data:[],
    }
  },
  methods:{

  },
  created(){
    this.axios.get("http://localhost/CGD102_G2/src/assets/phps/backOrderItems.php")
    .then((res)=>{
        this.data=res.data
        console.log(this.data)
    })
  }
};
</script>
