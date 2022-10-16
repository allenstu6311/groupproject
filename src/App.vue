<template>
<Header v-if="!hideHeaderFooter" ref="header" />
    <router-view   @update-cart="updateCart"
                    @update-member="updateMember"
                    @synchronize="synchronize"
                   />
                   
<Footer v-if="!hideHeaderFooter" />
</template>

<script>
import { BASE_URL } from "@/assets/js/common.js";
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
import { Alert } from 'view-ui-plus';

export default {

    data(){
      return{
        member:[],
        memory:[]
    
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
      synchronize(val){
        console.log("val",val)
         this.$refs.header.synchronize(val);
      },
      newUpdateCart() {
      var url = `${BASE_URL}/shoppingCart.php`; //上線
      this.axios
        .get(url, {
          params: {
            mem_id: this.member.memId,
          },
        })
        .then((res) => {
          this.memory = res.data;
          let oldVal = this.memory;
          let newVal = res.data;
          let isSame = newVal.length === oldVal.length;
          if (!isSame) {
            this.memory = res.data;
            return;
          }

          isSame = newVal.every(
            (v) =>
              oldVal.findIndex(
                (u) => u.PROD_ID === v.PROD_ID && u.PROD_QTY == v.PROD_QTY
              ) > -1
          );
          if (!isSame) {
            this.memory = res.data;
          }
        
          this.$emit("synchronize",res.data);
        });
    },

   
    },
    created(){
      let members = sessionStorage.getItem("member");
      this.member = JSON.parse(members);
      if(this.member){
         this.newUpdateCart()
      }else{
        return
      }
     

  },
  watch:{
    
  }
}
</script>
