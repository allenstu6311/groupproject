<template>
    <BackstageIndexHeader />
    <div class="container">
        <div class="row">
            <div class="col-2 aside_height">
                <BackstageIndexAside />
            </div>
            <div class="col-9">
                <BackTherapistChangeInfo />
            </div>
        </div>
    </div>
</template>

<script>
import BackstageIndexAside from '@/components/BackstageIndexAside.vue'
import BackstageIndexHeader from '@/components/BackstageIndexHeader.vue'
import BackTherapistChangeInfo from '@/components/BackTherapistChangeInfo.vue'

export default {
    components: {
        BackstageIndexHeader,
        BackstageIndexAside,
        BackTherapistChangeInfo
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
        .aside_height{
            line-height: 1.7;
        }
    }
</style>