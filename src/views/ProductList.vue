<template>
  <Header />
   <div class="product-search">
      <input type="text" name=""  v-model="search_obj" placeholder="請輸入商品名稱">
      <button @click="searchStar">搜尋</button>
    </div>
  <div class="Product-container">
   
     <Commodity  :price ="priceInfo" 
                  :enter1 =  int_Num1
                  :enter2 =  int_Num2
                  :search =  project_target
                  :search_empty ="search_obj"
                  :checkPrice ="product_price"
                  :checkTool ="product_tool"
     
     />
      <Filter  @filter="filterRange"
              @int_1 ="intValue1"
              @int_2 ="intValue2"
              @checkMoney ="productMoney"
              @tool ="productTool"
      />
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
          priceInfo:[],
          int_Num1:0,
          int_Num2:0,
          search_obj:'',
          project_target:[],
          product_price:[],
          product_tool:[],
        }
    },
    methods:{
        filterRange(val){     
          this.priceInfo = val
        },
        intValue1(val){
          this.int_Num1=val
     
        },
        intValue2(val){
          this.int_Num2=val
     
        },
        searchStar(){
          this.axios.get("http://localhost/CGD102_G2/src/assets/php/search.php",{

            params:{
              target:this.search_obj
            }
          })
          .then((res)=>{
               this.project_target = res.data
          })
        },
        productMoney(val){
          this.product_price = val
        },
        productTool(val){
          this.product_tool = val
        }
    },
    watch:{
        search_obj:{
            handler(newVal){   
          }
        },
        product_price:{
          handler(newVal){
            console.log("watch-->",newVal)
          }
        }
    }

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