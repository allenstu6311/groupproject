<template>
    <MassageSchool/>
    <lightBox  @boo="judge"/>
</template>

<script>
import MassageSchool from "@/components/MassageSchool.vue"
import lightBox from "@/components/lightBox.vue"
export default{
    components:{
        MassageSchool,
        lightBox
    }
}
</script>