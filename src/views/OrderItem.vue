<template>
  <div class="container-fluid">
    <div class="row">
      <SlideChose />
      <div class="orderBox">
        <div class="order-search  m-3">
          <select class="form-select w-25" aria-label="Default select example">
            <option selected>排序方式</option>
          </select>

          <div class="input-group mx-3  w-25">
            <input
              type="text"
              class="form-control"
              placeholder="請輸入訂單名稱"
              aria-label="Recipient's username"
              aria-describedby="button-addon2"
            />
            <button
              class="btn btn-outline-secondary"
              type="button"
              id="button-addon2"
            >
             <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </div>
        </div>

        <table class="table">
          <thead>
            <tr>
                <th>訂單編號</th>
                <th>訂單項目編號</th>
                <th>會員姓名</th>
                <th>訂單成立時間</th>
                <th>狀態</th>
                <th>詳細資訊</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in data" :key="item">
                <th>{{item.order_items_id}}</th>
                <th>{{item.prod_orders_id}}</th>
                <th>{{item.mem_name}}</th>
                <th>{{item.prod_orders_date}}</th>
              
                <th v-if="item.prod_orders_cps_id==0">未出貨</th>
                <th v-if="item.prod_orders_cps_id=1">已出貨</th>
                <th v-if="item.prod_orders_cps_id==2">取消</th>
                <th v-if="item.prod_orders_cps_id==3">已送達</th>
                <th><button class="btnLittle" @click="orderDetail(item.prod_orders_id)">詳細資訊</button></th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- ========================燈箱 -->
  <!-- <div class="light-box" v-if="show==true">
    <div class="product-box" v-for="item in detail" :key="item">
      <img :src="require(`../assets/phps/pic/${item.PROD_PIC1}`)" alt="">
    </div>
  </div> -->

  <div class="modal" tabindex="1" :class="{lightBoxShow:show==true}">
  <div class="modal-dialog">
    <div class="modal-content">
        <h4>訂單{{prodId}}</h4>
      <div class="modal-header"  v-for="item in detail" :key="item">
        <img :src="require(`../assets/phps/pic/${item.prod_pic1}`)" alt="">
        <h5 class="modal-title">{{item.prod_name}}</h5>
        <h3>{{item.prod_price}}</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click="show=false">Close</button >
      </div>
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
.lightBoxShow{
  display: block !important;
  .modal-header{
    display: flex;
    justify-content: flex-start;
    img{
      width: 20%;
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
        detail:[],
        show:false,
    }
  },
  methods:{
    orderDetail(id){
      this.axios.get("http://localhost/CGD102_G2/src/assets/phps/orderItemProduct.php",{
        params:{
          order_id:id
        }
      })
      .then((res)=>{
         this.show=true
        this.detail = res.data
         console.log(this.detail)
        this.prodId=id
      })
    },
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
