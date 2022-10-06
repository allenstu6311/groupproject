<template>
  <div class="container-fluid mt-5">
    <div class="row">
      <SlideChose />
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
</template>
<style lang="scss" scoped>
@import "bootstrap/scss/bootstrap";
.row {
  flex-wrap: nowrap;
  line-height: 1.5;
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
</style>
<script>
import SlideChose from "@/components/SlideChose.vue";
export default {
  components: {
    SlideChose,
  },
  date() {
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
      this.axios.get(
        "http://localhost/CGD102_G2/src/assets/phps/backfile.php",
        {
          params: {
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
          },
        }
      );
    },
    getFiles1(e) {
      this.PROD_PIC1 = e.target.files[0];
      console.log("pic",this.PROD_PIC1);
      let reader = new FileReader();
      reader.onload = function () {
        document.getElementById("myImg1").src = reader.result; 
      };
      reader.readAsDataURL(this.PROD_PIC1);
    },
    getFiles2(e) {
      this.PROD_PIC2 = e.target.files[0];
      let reader = new FileReader();
      reader.onload = function () {
        document.getElementById("myImg2").src = reader.result; 
      };
      reader.readAsDataURL(this.PROD_PIC2);
    },
    getFiles3(e) {
      this.PROD_PIC3 = e.target.files[0];
      let reader = new FileReader();
      reader.onload = function () {
        document.getElementById("myImg3").src = reader.result; 
      };
      reader.readAsDataURL(this.PROD_PIC3);
    },
  },
};
</script>
