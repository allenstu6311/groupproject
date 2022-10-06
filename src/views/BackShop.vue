<template>
   <BackstageIndexHeader />
  <div class="container">
    <div class="row">
      <div class="col-2">
          <BackstageIndexAside />
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
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in data" :key="item.PROD_ID">
              <td>
                <img
                  :src="require(`../assets/phps/pic/${item.PROD_PIC1}`)"
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
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-10">
        <BackTherapistAdd />
  </div>   
</template>
<style lang="scss" scoped>
@import "~bootstrap/scss/bootstrap";
@import "../assets/style.scss";

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
.table-striped > tbody > tr:nth-of-type(odd) > *[data-v-1e3ad792]{
    background-color: $white;
}
// .container-fluid {
//   width: 100%;
//   box-sizing: border-box;
// }
// .row {
//   flex-wrap: nowrap;
// }

</style>
<script>
import BackstageIndexAside from '@/components/BackstageIndexAside.vue'
import BackstageIndexHeader from '@/components/BackstageIndexHeader.vue'
import BackTherapist from '@/components/BackTherapist.vue'
export default {
  components: {
       BackstageIndexHeader,
        BackstageIndexAside,
        BackTherapist
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
