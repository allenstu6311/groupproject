<template>
<Header v-if="!hideHeaderFooter" ref="header" />
    <router-view   @update-cart="updateCart"
                    @update-member="updateMember"
                   />
                   
<Footer v-if="!hideHeaderFooter" />
</template>

<script>
import { BASE_URL } from "@/assets/js/common.js";
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"

export default {
    // created() {
    //   console.log('this.$router :>> ', this.$router);
    // },
    data(){
      return{
        member:[]
      }
    },
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
        this.$refs.header.updateCart(list);
      },
       updateMember(info) {
       
        this.$refs.header.updateMember(info);
        
      },
   
    },
    created(){

      //  let members = sessionStorage.getItem("member");
      // this.member = JSON.parse(members);
      //   console.log("app",this.member)
    }
}
</script>
