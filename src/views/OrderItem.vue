<template>
   <BackstageIndexHeader />
  <div class="container">
    <div class="row">
        <div class="col-2">
          <BackstageIndexAside />
      </div>
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
                <th>會員姓名</th>
                <th>訂單成立時間</th>
                <th>狀態</th>
                <th>詳細資訊</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in data" :key="item">
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

  <div class="modal" tabindex="1" :class="{lightBoxShow:show==true}">
  <div class="modal-dialog">
    <div class="modal-content p-3">
        <h6 class="bold">訂單{{prodId}}</h6>
      <div class="modal-header"  v-for="item in detail" :key="item">
        <img :src="require(`../../public/api/pic/${item.prod_pic1}`)" alt="">
        <h5 class="modal-title bold w-25 d-flex justify-content-center">{{item.prod_name}}</h5>
        <p class="w-25 d-flex justify-content-center">{{item.prod_price}}</p>
         <p class="w-25 d-flex justify-content-center">X{{item.ORDER_ITEMS_QTY}}</p>
      </div>
      
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click="show=false">Close</button >
      </div>
    </div>
  </div>
</div>
  <BackTherapistAdd />
</template>
<style lang="scss" scoped>
// @import "~bootstrap/scss/bootstrap";
// @import "../assets/style.scss";
    @import "../assets/base/_color.scss"; //有變數要引用的sass
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
 
}
.lightBoxShow{
  display: block !important;
  position: fixed;
  margin: auto;
  bottom: 0;
  left: 0;
  top: 0;
  right: 0;
  background-color: rgba(0,0,0,0.5);
   .modal-dialog{
    display: flex;
    align-items: center;
    height: 100vh;
   }
  .modal-header{
    display: flex;
    justify-content: flex-start;
    img{
      width: 20%;
    }
   
  }
}
.modal-header{
  justify-content: space-around !important;
}
// =========================選單設定
*{
    position: relative;
}
.show{
    position: relative;
}
.active{
    background-color: transparent;
}
.container{
    line-height: 2;
}
table {
  width: 80% !important;
  table-layout:fixed;
  text-align: center;
  thead {
    background-color: $blue;
    th {
      background-color: $blue;
      font-size: 20px;
      font-weight: 600;
      color: white;
    }
  }
  tbody {
    tr {
      td {
        vertical-align: middle;
        background-color: $white;
        font-weight:600;
        img {
          vertical-align: middle;
          width: 30%;
        }
      }
    
    }
  
  }
}
</style>

<script>
import BackstageIndexAside from '@/components/BackstageIndexAside.vue'
import BackstageIndexHeader from '@/components/BackstageIndexHeader.vue'
import BackTherapist from '@/components/BackTherapist.vue'

const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..'
export default {
  components: {
  BackstageIndexHeader,
  BackstageIndexAside,
  BackTherapist
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
        // var url = `${BASE_URL}/api/orderItemProduct.php` //上線
      var url = "http://localhost/CGD102_G2/public/api/orderItemProduct.php"
      this.axios.get(url,{
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
    
      //  var url = `${BASE_URL}/api/backOrderItems.php` //上線
    var url = "http://localhost/CGD102_G2/public/api/backOrderItems.php"
    this.axios.get(url)
    .then((res)=>{
        this.data=res.data
        console.log(this.data)
      
    })
  }
};
</script>
