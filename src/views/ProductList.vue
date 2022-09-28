<template>
  <Header />
   <div class="product-search">
      <input type="text" name="" value="">
      <button>搜尋</button>
    </div>
  <div class="Product-container">
   
     <Commodity />
    <Filter />
  </div>
  
  <Footer />
<router-link to="/Detail">詳細</router-link>
</template>


<script>
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
import Commodity from "@/components/Commodity.vue"
import Filter from "@/components/Filter.vue"
export default {
    components:{
        Header,
        Footer,
        Commodity,
        Filter
    },
    data(){

        return{

        }
    },

}
</script>
<style lang="scss" scoped>
  *{
    box-sizing: border-box;
  }
  .product-search{
    width: 100%;
    max-width: 1200px;
    margin: auto;
    display: flex;
    padding: 50px 0;
    justify-content: flex-end;

      input{
        width: 100%;
        max-width: 450px;
        padding: 5px;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        border: none;
        box-shadow: 0px 0px 10px rgb(208, 208, 208);
      }
      button{
        width: 100px;
        font-size: 18px;
        font-weight: 800;
        padding: 5px 20px;        
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        border: none;
        background-color: #163D82;;
        color:white;
        text-align: center;
        
      }
      
    }
  .Product-container{
    display: flex;
    margin: auto;
    justify-content: center;
  }
</style>