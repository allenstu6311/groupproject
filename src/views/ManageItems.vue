<template>
  <div class="container-fluid mt-5">
    <div class="row">
      <SlideChose />
  <form class="w-75">
  <div class="row mb-3 form-check ">
    <label for="inputEmail3" class="col-sm-2 col-form-label">產品名稱</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" name="PROD_NAME" v-model="PROD_NAME">
    </div>
  </div>
  <div class="row mb-3 form-check">
    <label for="inputPassword3" class="col-sm-2 col-form-label">價錢</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputEmail3" name="PROD_PRICE" v-model="PROD_PRICE">
    </div>
  </div>
 
   <div class="form-check p-lg-0 mb-3">
       <label for="inputPassword3" class="col-sm-2 col-form-label">上傳圖片</label>
        <input type="file" name="photo[]"  class="form-control ml-1" id="inputEmail3" @change="getFiles($event)">
        <input type="file" name="photo[]"  class="form-control ml-1" id="inputEmail3">
        <input type="file" name="photo[]"  class="form-control ml-1" id="inputEmail3" >
    </div>
       <div class="form-check mb-3">
       <label for="inputPassword3" class="col-sm-2 col-form-label">商品狀態</label>
        <input type="text" name="PROD_STATUS"  class="form-control" id="inputEmail3">
    </div>
       <div class="form-check mb-3">
       <label for="inputPassword3" class="col-sm-2 col-form-label">上架日期</label>
        <input type="date" name="PROD_DATE"  class="form-control" id="inputEmail3">  
    </div>
    <div class="form-check mb-3">
       <label for="inputPassword3" class="col-sm-2 col-form-label">商品敘述1</label>
        <input type="text" name="PROD_DESC1"  class="form-control" id="inputEmail3">
    </div>
     <div class="form-check mb-3">
       <label for="inputPassword3" class="col-sm-2 col-form-label">商品敘述2</label>
        <input type="text" name="PROD_DESC2"  class="form-control" id="inputEmail3">
    </div>
     <div class="form-check mb-3">
       <label for="inputPassword3" class="col-sm-2 col-form-label">商品敘述3</label>
        <input type="text" name="PROD_DESC3"  class="form-control" id="inputEmail3">
    </div>
     <div class="form-check mb-3">
       <label for="inputPassword3" class="col-sm-2 col-form-label">商品種類</label>
        <input type="text" name="PROD_TYPE"  class="form-control" id="inputEmail3">
    </div>
  <div class="row mb-3 w-25 btn-center">
      <button type="button" class="btn btn-primary" @click="upload">上傳</button>
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
.form-check{
  display: flex;
  padding: 0;
  font-weight: 800;
}
.btn-center{
  margin: auto;
}

</style>
<script>
import SlideChose from "@/components/SlideChose.vue";
export default {
  components: {
    SlideChose,
  },
  date(){
    return{

    }
  },
  methods:{
    upload(){
      this.axios.get("http://localhost/CGD102_G2/src/assets/phps/file.php",{
        params:{

        }
      })
    },
    getFiles(e){
      console.log(e)
      
    }  
    
    }
};
</script>
