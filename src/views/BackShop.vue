<template>
  <BackstageIndexHeader />
  <div class="container mt-5">
    <div class="row">
      <div class="col-2 aside_height">
        <BackstageIndexAside />
      </div>
      <div class="orderBox">
        <h1 style="font-size: 32px; text-align: center; width: 88%;">管理商品</h1>
        <div class="order-search m-3 " style="width:86%;">
          <select
            class="form-select w-25"
            aria-label="Default select example"
            v-model="productState"
            @change="checkProduct"
          >
            <option value="9" selected>找尋商品</option>
            <option value="0">下架中</option>
            <option value="1">上架中</option>
          </select>

          <div class="input-group mx-3 w-25">
            <input
              type="text"
              class="form-control"
              placeholder="請輸入商品名稱"
              aria-label="Recipient's username"
              aria-describedby="button-addon2"
              v-model="backProduct"
              @keydown.enter="backProductSearch"
            />
            <button
              class="btn btn-outline-secondary"
              type="button"
              id="button-addon2"
              @click="backProductSearch"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="25"
                height="25"
                fill="currentColor"
                class="bi bi-search"
                viewBox="0 0 16 16"
              >
                <path
                  d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"
                />
              </svg>
            </button>
          </div>
        </div>
        <div class="col-10">
          <table class="table">
            <thead>
              <tr>
                <th>商品照片</th>
                <th>標題</th>
                <th>狀態</th>
                <th>上架</th>
                <th>下架</th>
                <!-- <th>刪除</th> -->
              </tr>
            </thead>
            <tbody>
              <td colspan="5" v-if="this.data.length == 0">
                <p class="m-auto bold">找不到此商品</p>
              </td>
              <tr v-for="item in data" :key="item.PROD_ID">
                <td>
                  <img
                    :src="require(`../../public/api/pic/${item.PROD_PIC1}`)"
                    alt=""
                  />
                </td>
                <td>{{ item.PROD_NAME }}</td>
                <td v-show="item.PROD_STATUS == 1">上架中</td>
                <td v-show="item.PROD_STATUS == 0">下架中</td>
                <td>
                  <button
                    type="button"
                    class="btn btn-primary"
                    @click="onTheShelf(item.PROD_ID)"
                  >
                    上架
                  </button>
                </td>
                <td>
                  <button
                    type="button"
                    class="btn btn-danger"
                    @click="takeDown(item.PROD_ID)"
                  >
                    下架
                  </button>
                </td>
                <!-- <td>
                  <button
                    type="button"
                    class="btn btn-success"
                    @click="deleteProduct(item.PROD_ID)"
                  >
                    刪除
                  </button>
                </td> -->
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <nav aria-label="..." v-if="changePageButton == true" >
    <ul class="pagination justify-content-center mt-3 mb-3" style="margin-left:300px;">
      <li
        class="page-item"
        aria-current="page"
        :class="{ active: pageColor == true }"
      >
        <span
          class="page-link"
          @click="
            changePage(true);
            pageColor = true;
          "
          >1</span
        >
      </li>
      <li
        class="page-item"
        aria-current="page"
        :class="{ active: pageColor == false }"
      >
        <span
          class="page-link"
          @click="
            changePage(false);
            pageColor = false;
          "
          >2</span
        >
      </li>
    </ul>
  </nav>
  <div class="delete-light-box" v-if="lightBoxShow">
    <div class="delete-text">
      <label for="exampleDataList" class="form-label bold h3 mb-3 pt-4" >請輸入刪除密碼</label>
    <input
      class="form-control w-75 m-auto mb-3"
      list="datalistOptions"
      id="exampleDataList"
      placeholder="請輸入密碼"
      v-model="deleteCheck"
      type="password"
    />
    <button type="button" class="btn btn-primary m-2" @click="checkDelete">確定</button>
    <button type="button" class="btn btn-secondary m-2" @click="lightBoxShow=false">取消</button>
    </div>
  
  </div>

  <BackTherapistAdd />
</template>
<style lang="scss" scoped>
// @import "bootstrap/scss/bootstrap";
// @import "../assets/style.scss";
@import "../assets/base/_color.scss"; //有變數要引用的sass

* {
  position: relative;
}
.delete-light-box{
  position: fixed;
  margin:  0 auto;
  bottom: 0;
  left: 0;
  top: 0;
  right: 0;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 999;
  .delete-text{
    position: fixed;
    margin: auto;
    left: 40%;
    top: 25%;
    background-color: white;
    line-height: 3;
    padding: 20px;
    width: 300px;
    text-align: center; 
    border-radius: 20px;
  }
}
.show {
  position: relative;
}
.active {
  background-color: transparent;
}
.container {
  line-height: 2;
  .aside_height{
            line-height: 1.7;
        }
  .row {
    flex-wrap: nowrap;
  }
}
table {
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
.table-striped > tbody > tr:nth-of-type(odd) > *[data-v-1e3ad792] {
  background-color: $white;
}
.orderBox {
  width: 100%;
  max-width: 1200px;
  display: flex;
  margin-left: 60px;
  flex-direction: column !important;

  .order-search {
    display: flex;
    align-items: center;
  }
}
</style>
<script>
import BackstageIndexAside from "@/components/BackstageIndexAside.vue";
import BackstageIndexHeader from "@/components/BackstageIndexHeader.vue";
import BackTherapist from "@/components/BackTherapist.vue";
import { BASE_URL } from "@/assets/js/common.js";
// const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..'
export default {
  components: {
    BackstageIndexHeader,
    BackstageIndexAside,
    BackTherapist,
  },
  data() {
    return {
      data: [],
      productInfo: [],
      number1: 0,
      number2: 10,
      pageColor: true,
      backProduct: "",
      changePageButton: true,
      productState: "9",
      lightBoxShow:false,
      targetId:'',
      deletePassword:123456,
    };
  },
  methods: {
    onTheShelf(id) {
      var url = `${BASE_URL}/rackupanddown.php`; //上線
      // var url = "http://localhost/CGD102_G2/public/api/rackupanddown.php"
      this.axios
        .get(url, {
          params: {
            num: 1,
            id: id,
          },
        })
        .then((res) => {
          // console.log(this.data);
          if (res.data == 1) {
            alert("上架成功");
          } else {
            alert("上架失敗");
          }
          this.getPageNumber();
        });
    },
    takeDown(id) {
      var url = `${BASE_URL}/rackupanddown.php`; //上線
      // var url = "http://localhost/CGD102_G2/public/api/rackupanddown.php"
      this.axios
        .get(url, {
          params: {
            num: 0,
            id: id,
          },
        })
        .then((res) => {
          if (res.data == 1) {
            alert("下架成功");
          } else {
            alert("下架失敗");
          }
          this.getPageNumber();
        });
    },
    changePage(num) {
      if (num) {
        (this.number1 = 0), (this.number2 = 10);
        this.getPageNumber();
      } else {
        this.number1 = 10;
        this.number2 = 10;
        this.getPageNumber();
      }
    },
    getPageNumber() {
      var url = `${BASE_URL}/totalproduct.php`; //上線
      // var url = "http://localhost/CGD102_G2/public/api/totalproduct.php"
      this.axios
        .get(url, {
          params: {
            range_1: this.number1,
            range_2: this.number2,
          },
        })
        .then((res) => {
          this.data = res.data;
          this.productInfo = res.data;
        });
    },
    backProductSearch() {
      var url = `${BASE_URL}/backShopSearch.php`; //上線
      // var url = "http://localhost/CGD102_G2/public/api/backShopSearch.php"
      this.axios
        .get(url, {
          params: {
            PROD_NAME: this.backProduct,
          },
        })
        .then((res) => {
          this.data = res.data;
          this.changePageButton = false;
        });
    },
    checkProduct() {
      (this.number1 = 0), (this.number2 = 20);
      this.getPageNumber();
      this.changePageButton = false;

      this.timerd = setTimeout(this.filter, 500);
    },
    filter() {
      switch (this.productState) {
        case "9":
          (this.number1 = 0), (this.number2 = 10);
          this.getPageNumber();
          this.data = this.productInfo;
          this.changePageButton = true;

          break;
        case "0":
          let state0 = this.data.filter(
            (item) => item.PROD_STATUS == this.productState
          );
          // console.log("0",this.data)
          console.log("0", state0);
          this.data = state0;

          break;
        case "1":
          let state1 = this.data.filter(
            (item) => item.PROD_STATUS === this.productState
          );
          console.log("1", state1);
          this.data = state1;
      }
    },

    deleteProduct(id) {
      this.lightBoxShow=true
      this.targetId = id
    },
    checkDelete(){
      if(this.deleteCheck==this.deletePassword){
         var url = `${BASE_URL}/deleteProduct.php`; //上線
      this.axios
        .get(url, {
          params: {
            prod_id:this.targetId,
          },
        })
        .then((res) => {
          alert("刪除成功");
          this.lightBoxShow=false
          this.getPageNumber();
        });
      }else{
        alert("密碼錯誤")
      }
    }
  },
  created() {
    this.getPageNumber();
  },
  watch: {
    backProduct: {
      handler(newVal) {
        if (!newVal) {
          this.data = this.productInfo;
          this.changePageButton = true;
        }
      },
    },
    deep: true,
  },
};
</script>
