<template>
    <BackstageIndexHeader />
    <div class="container">
        <div class="row">
            <div class="col-2 aside_height">
                <BackstageIndexAside />
            </div>
            <div class="col-10">
                <BackCoupon />
            </div>
        </div>
    </div>
</template>

<script>
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
    *{
        position: relative;
    }
    .container{
        line-height: 2;
        .aside_height{
            line-height: 1.7;
        }
    }
</style>