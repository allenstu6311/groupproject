<template>
    <BackstageIndexHeader />
    <div class="container">
        <div class="row">
            <div class="col-2">
                <BackstageIndexAside />
            </div>
            <div class="col-2"></div>
            <div class="col-6">
                <BackCouponAdd />
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</template>

<script>
import BackstageIndexAside from '@/components/BackstageIndexAside.vue'
import BackstageIndexHeader from '@/components/BackstageIndexHeader.vue'
import BackCouponAdd from '@/components/BackCouponAdd.vue'

export default {
    components: {
        BackstageIndexHeader,
        BackstageIndexAside,
        BackCouponAdd
    }
}
</script>

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
</style>