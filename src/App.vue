<template>
<Header v-if="!hideHeaderFooter" />
    <router-view/>
<Footer v-if="!hideHeaderFooter" />
</template>

<script>
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"

export default {
    // created() {
    //   console.log('this.$router :>> ', this.$router);
    // },
    computed:{
      hideHeaderFooter(){
        return this.$router.currentRoute.value.meta && this.$router.currentRoute.value.meta.isHide
      }
    },
    components:{
        Header,
        Footer,
    }
}
</script>
