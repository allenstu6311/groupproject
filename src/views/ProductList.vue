<template>
  <Header />
    <Commodity />
  <Footer />

</template>


<script>
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
import Commodity from "@/components/Commodity.vue"
export default {
    components:{
        Header,
        Footer,
        Commodity
    },
    data(){

        return{

        }
    },

}
</script>
<style lang="scss" scope>
  *{
    box-sizing: border-box;
  }
</style>