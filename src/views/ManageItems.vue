<template>
  <div class="container-fluid">
    <div class="row">
      <SlideChose />
      <div class="card text-center" id="card-container">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link active" aria-current="true" href="#">Active</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
            </li>
          </ul>
        </div>
        <div class="card-body">

            <input type="file" name="picInfo">
        </div>
        <button>上傳</button>
      </div>
    </div>
  </div>
</template>
<style lang="scss" scoped>
@import "bootstrap/scss/bootstrap";
.row {
  flex-wrap: nowrap;
}
#card-container{
    width: 75%;
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
