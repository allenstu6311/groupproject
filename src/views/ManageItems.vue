<template>
  <BackstageIndexHeader />
  <div class="container mt-5">
    <div class="row">
      <div class="col-2">
          <BackstageIndexAside />
      </div>
      <form class="w-75">
        <div class="row mb-3 form-check">
          <label for="inputEmail3" class="col-sm-2 col-form-label"
            >產品名稱</label
          >
          <div class="col-sm-10">
            <input
              type="text"
              class="form-control"
              id="inputEmail3"
              name="PROD_NAME"
              v-model="PROD_NAME"
            />
          </div>
        </div>
        <div class="row mb-3 form-check">
          <label for="inputPassword3" class="col-sm-2 col-form-label"
            >價錢</label
          >
          <div class="col-sm-10">
            <input
              type="text"
              class="form-control"
              id="inputEmail3"
              name="PROD_PRICE"
              v-model="PROD_PRICE"
            />
          </div>
        </div>

        <div class="form-check p-lg-0 mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label"
            >上傳圖片1</label
          >
          <input
            type="file"
            name="photo[]"
            class="form-control ml-1"
            id="inputEmail3"
            @change="getFiles1($event)"
          /><br>
          <img src="" alt="目前無圖片" id="myImg1" />
        </div>
        <div class="form-check p-lg-0 mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label"
            >上傳圖片2</label
          >
          <input
            type="file"
            name="photo[]"
            class="form-control ml-1"
            id="inputEmail3"
            @change="getFiles2($event)"
          /><br>
            <img src="" alt="目前無圖片" id="myImg2" />
        </div>
        <div class="form-check p-lg-0 mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label"
            >上傳圖片3</label
          >
          <input
            type="file"
            name="photo[]"
            class="form-control ml-1"
            id="inputEmail3"
            @change="getFiles3($event)"
          /><br>
            <img src="" alt="目前無圖片" id="myImg3" />
        </div>
        <div class="form-check mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label"
            >商品狀態</label
          >
          <input
            type="text"
            name="PROD_STATUS"
            class="form-control"
            id="inputEmail3"
            v-model="PROD_STATUS"
          />
        </div>
        <div class="form-check mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label"
            >上架日期</label
          >
          <input
            type="date"
            name="PROD_DATE"
            class="form-control"
            id="inputEmail3"
            v-model="PROD_DATE"
          />
        </div>
        <div class="form-check mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label"
            >商品敘述1</label
          >
          <input
            type="text"
            name="PROD_DESC1"
            class="form-control"
            id="inputEmail3"
            v-model="PROD_DESC1"
          />
        </div>
        <div class="form-check mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label"
            >商品敘述2</label
          >
          <input
            type="text"
            name="PROD_DESC2"
            class="form-control"
            id="inputEmail3"
            v-model="PROD_DESC2"
          />
        </div>
        <div class="form-check mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label"
            >商品敘述3</label
          >
          <input
            type="text"
            name="PROD_DESC3"
            class="form-control"
            id="inputEmail3"
            v-model="PROD_DESC3"
          />
        </div>
        <div class="form-check mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label"
            >商品種類</label
          >
          <input
            type="text"
            name="PROD_TYPE"
            class="form-control"
            id="inputEmail3"
            v-model="PROD_TYPE"
          />
        </div>
        <div class="row mb-3 w-25 btn-center">
          <button type="button" class="btn btn-primary" @click="upload">
            上傳
          </button>
        </div>
      </form>
    </div>
  </div>
  <BackTherapistAdd />
</template>
<style lang="scss" scoped>
// @import "bootstrap/scss/bootstrap";
// @import "../assets/style.scss";
    @import "../assets/base/_color.scss"; //有變數要引用的sass
.container{
  margin: auto;
  line-height: 2;
  .row {
  flex-wrap: nowrap;
  line-height: 1.5;

  form{
    margin: auto;
  }
}
}

.form-check {
  display: flex;
  padding: 0;
  font-weight: 800;
}
.btn-center {
  margin: auto;
}
img{
  width: 20%;
  max-width: 150px;
  height: 20%;
  max-height: 150px;
}
*{
    position: relative;
}
.show{
    position: relative;
}
.active{
    background-color: transparent;
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
      padding: 15px 0;
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
import {BASE_URL} from '@/assets/js/common.js'
// const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..'
export default {
  components: {
      BackstageIndexHeader,
      BackstageIndexAside,
      BackTherapist
  },
  data() {
    return {
      PROD_NAME: "",
      PROD_PRICE: "",
      PROD_PIC1: "",
      PROD_PIC2: "",
      PROD_PIC3: "",
      PROD_STATUS: "",
      PROD_DATE: "",
      PROD_DESC1: "",
      PROD_DESC2: "",
      PROD_DESC3: "",
      PROD_TYPE: "",
      
    };
  },
  methods: {
    upload() {
      alert("上傳成功")
      const data = {
            PROD_NAME: this.PROD_NAME,
            PROD_PRICE: this.PROD_PRICE,
            PROD_PIC1: this.PROD_PIC1,
            PROD_PIC2: this.PROD_PIC2,
            PROD_PIC3: this.PROD_PIC3,
            PROD_STATUS: this.PROD_STATUS,
            PROD_DATE: this.PROD_DATE,
            PROD_DESC1: this.PROD_DESC1,
            PROD_DESC2: this.PROD_DESC2,
            PROD_DESC3: this.PROD_DESC3,
            PROD_TYPE: this.PROD_TYPE,
        };
        // let myForm = document.querySelector("form");
        // const formData = new FormData(myForm);
        const formData = new FormData();
        for (let key in data) {
          formData.append(key, data[key]);
        }
        var url = `${BASE_URL}/backfile.php` //上線
      // var url = "http://localhost/CGD102_G2/public/api/backfile.php"
        this.axios.post(
        url, formData, {
          headers: { "Content-Type": "multipart/form-data" },
        })
        .then((res)=>{
          this.PROD_NAME= "",
          this.PROD_PRICE= "",
          this.PROD_PIC1= "",
          this.PROD_PIC2= "",
          this.PROD_PIC3= "",
          this.PROD_STATUS= "",
          this.PROD_DATE= "",
          this.PROD_DESC1= "",
          this.PROD_DESC2= "",
          this.PROD_DESC3= "",
          this.PROD_TYPE= ""
        }).catch((err)=> {
          console.log(err)
        });
    },
    getFiles1(e) {
      this.PROD_PIC1 = e.target.files[0];
      console.log("pic",this.PROD_PIC1);
      let reader = new FileReader();
      reader.onload = function () {
        document.getElementById("myImg1").src = reader.result; 

         this.test1 = reader.result
         console.log("test1",this.test1)
      };
      reader.readAsDataURL(this.PROD_PIC1);
     
    },
    getFiles2(e) {
      this.PROD_PIC2 = e.target.files[0];
      console.log(this.PROD_PIC2)
      let reader = new FileReader();
      reader.onload = function () {
        document.getElementById("myImg2").src = reader.result; 
      };
      reader.readAsDataURL(this.PROD_PIC2);
      this.test2 = reader.result
    },
    getFiles3(e) {
      this.PROD_PIC3 = e.target.files[0];
      let reader = new FileReader();
      reader.onload = function () {
        document.getElementById("myImg3").src = reader.result; 
      };
      reader.readAsDataURL(this.PROD_PIC3);
      this.test3 = reader.result
    },
  },
};
</script>
