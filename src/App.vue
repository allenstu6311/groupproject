<template>
<Header    v-if="!this.$router.currentRoute.value.meta.isHide"/>
    <router-view/>
<Footer  v-if="!this.$router.currentRoute.value.meta.isHide" />
</template>

<script>
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
import {routes} from "@/router/index.js"

export default {
    data(){
      return{
        routes,
      }
    },
//     created() {
//       console.log('this.$router :>> ', this.$router.currentRoute
// .value.meta);
//     },
    components:{
        Header,
        Footer,
    }
}
</script>
