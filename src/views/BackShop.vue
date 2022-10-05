<template>
  <div class="container-fluid">
    <div class="row">
      <SlideChose />
      <table class="table  ">
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
          <tr v-for="item in data" :key="item.PROD_ID">
            <th>
              <img
                :src="require(`../assets/phps/pic/${item.PROD_PIC1}`)"
                alt=""
              />
            </th>
            <th>{{ item.PROD_NAME }}</th>
            <th v-show="item.PROD_STATUS == 1">上架中</th>
            <th v-show="item.PROD_STATUS == 0">下架中</th>
            <th>
              <button
                type="button"
                class="btn btn-primary"
                @click="onTheShelf(item.PROD_ID)"
              >
                上架
              </button>
            </th>
            <th>
              <button
                type="button"
                class="btn btn-danger"
                @click="takeDown(item.PROD_ID)"
              >
                下架
              </button>
            </th>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<style lang="scss" scoped>
@import "~bootstrap/scss/bootstrap";
table {
  width: 80% !important;
  thead {
    th {
      background-color: #163d82 !important;
      font-size: 22px;
      font-weight: 800;
      color: white;
    }
  }
  tbody {
    tr {
      th {
        width: 20%;
        color:#163d82 !important;
        background-color:white !important;
        font-weight:800;
        img {
          width: 20%;
        }
      }
    
    }
  
  }
}
.table-striped > tbody > tr:nth-of-type(odd) > *[data-v-1e3ad792]{
    background-color:white !important;
}
.container-fluid {
  width: 100%;
  box-sizing: border-box;
}
.row {
  flex-wrap: nowrap;
}
.list-group{
  width: 55% !important;

  li{
     
       a{
        background-color: red !important;
        }
    }
}
 

</style>
<script>
import SlideChose from "@/components/SlideChose.vue";
export default {
  components: {
    SlideChose,
  },
  data() {
    return {
      data: [],
    };
  },
  methods: {
    onTheShelf(id) {
      this.axios
        .get("http://localhost/CGD102_G2/src/assets/phps/rackupanddown.php", {
          params: {
            num: 1,
            id: id,
          },
        })
        .then((res) => {
          console.log(this.data);
          if (res.data == 1) {
            alert("上架成功");
          } else {
            alert("上架失敗");
          }
          location.reload();
        });
    },
    takeDown(id) {
      this.axios
        .get("http://localhost/CGD102_G2/src/assets/phps/rackupanddown.php", {
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
          location.reload();
        });
    },
  },
  created() {
    this.axios
      .get("http://localhost/CGD102_G2/src/assets/phps/totalproduct.php")
      .then((res) => {
        this.data = res.data;
        console.log(this.data);
      });
  },
};
</script>
