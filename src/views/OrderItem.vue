<template>
  <BackstageIndexHeader />
  <div class="container">
    <div class="row">
      <div class="col-2">
        <BackstageIndexAside />
      </div>
      <div class="orderBox">
        <div class="order-search m-3">
          <select
            class="form-select w-25"
            aria-label="Default select example"
            v-model="orderSel"
            @change="filterOrder"
          >
          <option value="1">由舊至新</option>
          <option value="2">由新至舊</option>
           
          </select>

          <div class="input-group mx-3 w-25">
            <input
              type="text"
              class="form-control"
              placeholder="請輸入訂單名稱"
              aria-label="Recipient's username"
              aria-describedby="button-addon2"
              v-model="orderName"
              @keydown.enter="searchORDER()"
            />
            <button
              class="btn btn-outline-secondary"
              type="button"
              id="button-addon2"
              
              @click="searchORDER()"
            >
           <svg xmlns="http://www.w3.org/2000/svg"  width="25"
                height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>
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
              <th>{{ item.PROD_ORDERS_ID }}</th>
              <th>{{ item.MEM_NAME }}</th>
              <th>{{ item.PROD_ORDERS_DATE }}</th>

              <th v-if="item.prod_orders_cps_id == 0">未出貨</th>
              <th v-if="(item.prod_orders_cps_id = 1)">已出貨</th>
              <th v-if="item.prod_orders_cps_id == 2">取消</th>
              <th v-if="item.prod_orders_cps_id == 3">已送達</th>
              <th>
                <button
                  class="btnLittle"
                  @click="orderDetail(item.PROD_ORDERS_ID)"
                >
                  詳細資訊
                </button>
              </th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- ========================燈箱 -->

  <div class="modal" tabindex="1" :class="{ lightBoxShow: show == true }">
    <div class="modal-dialog">
      <div class="modal-content p-3">
        <h6 class="bold">訂單{{ prodId }}</h6>
        <div class="modal-header" v-for="item in detail" :key="item">
          <img
            :src="require(`../../public/api/pic/${item.PROD_PIC1}`)"
            alt=""
          />
          <h5 class="modal-title bold w-25 d-flex justify-content-center">
            {{ item.PROD_NAME }}
          </h5>
          <p class="w-25 d-flex justify-content-center">
            X{{ item.ORDER_ITEMS_QTY }}
          </p>
          <p class="w-25 d-flex justify-content-center">
            {{ item.PROD_PRICE }}
          </p>
        </div>
        <div class="modal-body bold">
          <span>折價券:</span>
          <span v-if="coupon == 5">無</span>
          <span v-if="coupon == 1">九折優惠券</span>
          <span v-if="coupon == 2">八折優惠券</span>
          <span v-if="coupon == 3">七折優惠券</span>
          <span v-if="coupon == 4">六折優惠券</span>
        </div>
        <div class="modal-body bold">
          <span>小計:</span>
          <span>{{ subtotal }}</span>
        </div>
        <div class="modal-body bold">
          <span>折抵金額:</span>
          <span>{{ totalPrice - subtotal }}</span>
        </div>
        <div class="modal-body bold">
          <span>銷售總額:</span>
          <span>{{ totalPrice }}</span>
        </div>

        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
            @click="show = false"
          >
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
  <nav aria-label="...">
    <ul
      class="pagination justify-content-center mt-3 mb-3"
      v-if="changePageButton == true"
    >
      <li
        class="page-item"
        aria-current="page"
        :class="{ active: pageColor == 1 }"
      >
        <span
          class="page-link"
          @click="
            changePage(1);
            pageColor = 1;
          "
          >1</span
        >
      </li>
      <li
        class="page-item"
        aria-current="page"
        :class="{ active: pageColor == 2 }"
      >
        <span
          class="page-link"
          @click="
            changePage(2);
            pageColor = 2;
          "
          >2</span
        >
      </li>
       <li
        class="page-item"
        aria-current="page"
        :class="{ active: pageColor == 3 }"
      >
        <span
          class="page-link"
          @click="
            changePage(3);
            pageColor = 3;
          "
          >3</span
        >
      </li>
    </ul>
  </nav>
  <BackTherapistAdd />
</template>
<style lang="scss" scoped>
@import "../assets/base/_color.scss"; //有變數要引用的sass
.row {
  flex-wrap: nowrap;
}
.orderBox {
  width: 100%;
  max-width: 1200px;
  display: flex;
  flex-direction: column !important;

  .order-search {
    display: flex;
    align-items: center;
  }
}
.lightBoxShow {
  display: block !important;
  position: fixed;
  margin: auto;
  bottom: 0;
  left: 0;
  top: 0;
  right: 0;
  background-color: rgba(0, 0, 0, 0.5);
  .modal-dialog {
    display: flex;
    align-items: center;
    height: 100vh;
  }
  .modal-header {
    display: flex;
    justify-content: flex-start;
    border-bottom: 2px dotted gray;
    img {
      width: 20%;
    }
  }
  .modal-body {
    width: 100%;
    display: flex;
    justify-content: space-between;
    padding: 5px 10px;
  }
}
.modal-header {
  justify-content: space-around !important;
}
// =========================選單設定
* {
  position: relative;
}
.show {
  position: relative;
}
.active {
  background-color: transparent;
}
.container {
  line-height: 2;
}
table {
  width: 80% !important;
  table-layout: fixed;
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
        font-weight: 600;
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
import BackstageIndexAside from "@/components/BackstageIndexAside.vue";
import BackstageIndexHeader from "@/components/BackstageIndexHeader.vue";
import BackTherapist from "@/components/BackTherapist.vue";
import { BASE_URL } from "@/assets/js/common.js";

export default {
  components: {
    BackstageIndexHeader,
    BackstageIndexAside,
    BackTherapist,
  },
  data() {
    return {
      data: [],
      info: [],
      detail: [],
      show: false,
      totalPrice: "",
      subtotal: "",
      coupon: "",
      number1: 0,
      number2: 7,
      pageColor: 1,
      orderName: "",
      changePageButton: true,
      orderSel: "1",
    };
  },
  methods: {
    changePage(num) {
      switch (num) {
        case 1:
          this.number1 = 0;
          this.number2 = 7;

          break;
        case 2:
          this.number1 = 8;
          this.number2 = 7;
          break;

          case 3:
          this.number1 = 16;
          this.number2 = 7;
          break;
      
      }
      
      this.getORderInfo();
    },
    orderDetail(id) {
      var url = `${BASE_URL}/orderItemProduct.php`; //上線
      // var url = "http://localhost/CGD102_G2/public/api/orderItemProduct.php";
      this.axios
        .get(url, {
          params: {
            order_id: id,
          },
        })
        .then((res) => {
          this.show = true;
          this.detail = res.data;
          console.log("detail", this.detail);
          this.subtotal = this.detail[0].PROD_ORDERS_SUBTOTAL;
          this.totalPrice = this.detail[0].PROD_ORDERS_TOTAL;
          this.coupon = this.detail[0].PROD_ORDERS_CPS_ID;
          this.prodId = id;
        });
    },
    getORderInfo() {
      var url = `${BASE_URL}/backOrderItems.php`; //上線
      // var url = "http://localhost/CGD102_G2/public/api/backOrderItems.php";
      this.axios
        .get(url, {
          params: {
            range_1: this.number1,
            range_2: this.number2,
          },
        })
        .then((res) => {
          this.data = res.data;
          this.info = res.data;
        });
    },
    searchORDER() {
      var url = `${BASE_URL}/backOrderItemsSearch.php`;
      this.axios
        .get(url, {
          params: {
            search: this.orderName,
          },
        })
        .then((res) => {
          console.log(res);
          this.data = res.data;
          this.changePageButton = false;
        });
    },
    filterOrder(){
      switch(this.orderSel){
        case "1":
          this.data.sort(function(a,b){
            return new Date(a.PROD_ORDERS_DATE)-new Date(b.PROD_ORDERS_DATE)
          })
          break;

           case "2":
          this.data.sort(function(a,b){
            return new Date(b.PROD_ORDERS_DATE)-new Date(a.PROD_ORDERS_DATE)
          })
          break;
      }
     
    }
  },
  watch: {
    orderName: {
      handler(newVal) {
        if (newVal == "") {
          this.data = this.info;
          this.changePageButton = true;
        }
      },
    },
  },
  created() {
    this.getORderInfo();
  },
};
</script>
