<template>
  <div class="container-fluid">
    <div class="row">
      <SlideChose />
  <form class="w-75">
  <div class="row mb-3 ">
    <label for="inputEmail3" class="col-sm-2 col-form-label">產品名稱</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">價錢</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputEmail3">
    </div>
  </div>
  <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <input type="text" class="form-control" id="inputEmail3">
      </div>
      <div class="form-check">
        <input type="file" name="upFile[]" id="">
        <input type="file" name="upFile[]" id="">
        <input type="file" name="upFile[]" id="">
      </div>
      <div class="form-check disabled">
        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
        <label class="form-check-label" for="gridRadios3">
          Third disabled radio
        </label>
      </div>
    </div>
  </fieldset>
  <div class="row mb-3">
    <div class="col-sm-10 offset-sm-2">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
          Example checkbox
        </label>
      </div>
    </div>
  </div>
  <button type="button" class="btn btn-primary">上傳</button>
</form>
    </div>
  </div>
</template>
<style lang="scss" scoped>
@import "bootstrap/scss/bootstrap";
.row {
  flex-wrap: nowrap;
}

</style>
<script>
import SlideChose from "@/components/SlideChose.vue";
export default {
  components: {
    SlideChose,
  },
};
</script>
