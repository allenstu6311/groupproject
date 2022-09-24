<template>
  <Header />
    <AreaList />
  <Footer />

</template>


<script>
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
import AreaList from "@/components/AreList.vue"
export default {
    components:{
        Header,
        Footer,
        AreaList
    },
    data(){

        return{

        }
    },

}
</script>