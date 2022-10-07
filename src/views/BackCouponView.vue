<template>
    <BackstageIndexHeader />
    <div class="container">
        <div class="row">
            <div class="col-2">
                <BackstageIndexAside />
            </div>
            <div class="col-10">
                <BackCoupon />
            </div>
        </div>
    </div>
</template>

<script>
import "bootstrap/scss/bootstrap.scss";
import BackstageIndexAside from '@/components/BackstageIndexAside.vue'
import BackstageIndexHeader from '@/components/BackstageIndexHeader.vue'
import BackCoupon from '@/components/BackCoupon.vue'

export default {
    components: {
        BackstageIndexHeader,
        BackstageIndexAside,
        BackCoupon
    }
}
</script>

<style lang="scss" scoped>
    // @import "bootstrap/scss/bootstrap"; 
    // @import "../assets/style.scss";
    @import "../assets/base/_color.scss"; //有變數要引用的sass

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
</style>