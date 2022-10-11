<template>
    <BackstageIndexHeader />
    <div class="container">
        <div class="row">
            <div class="col-2 aside_height">
                <BackstageIndexAside />
            </div>
            <div class="col-10">
                <BackstageFAQ/>
            </div>
        </div>
    </div>
</template>

<script>
import BackstageIndexAside from '@/components/BackstageIndexAside.vue'
import BackstageIndexHeader from '@/components/BackstageIndexHeader.vue'
import BackstageFAQ from '@/components/BackstageFAQ.vue'

export default {
    components: {
        BackstageIndexHeader,
        BackstageIndexAside,
        BackstageFAQ
    }
}
</script>

<style lang="scss" scoped>

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