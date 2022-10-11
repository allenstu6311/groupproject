<template>
<Header v-if="!hideHeaderFooter" ref="header" />
    <router-view @update-cart="updateCart"/>
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
    },
    methods: {
      updateCart(list) {
        this.$refs.header.updateCart(list);//?
      },
    }
}
</script>
