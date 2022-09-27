<template>

    <div class="commodity-total col-7">
          <div class="commodity-container col-12">
        <div class="commodity-order col-12">
            <div class="commodity-sale">
                <span class="bold">全部商品</span>
                <span class="bold">特價商品</span>
            </div>
            <div class="commodity-filter">
                <button @click="order=1" :class="{orderColor:order==1}">價格排序</button>
                <button @click="order=2" :class="{orderColor:order==2}">評價排序</button>
                <button @click="order=3" :class="{orderColor:order==3}">改變展示</button>
            </div>
        </div>
    </div>

     <div class="commodity-area col-12">
            <div class="commodity-obj" v-for="item in gun" :key="item.PROD_ID
">            
                 <button @click="next(item)"> ＜ </button>
                <div class="commodity-pic" >
               
                   <div class="slide-pic" :style="{left:126.93*item.slide+'px',transition:.4+'s'}">
                    <img :src="require(`../assets/php/pic/${item.PROD_PIC1}`)">
                    <img :src="require(`../assets/php/pic/${item.PROD_PIC2}`)" >
                    <img :src="require(`../assets/php/pic/${item.PROD_PIC3}`)" >
                   </div>
            
                </div>
                    <button @click="prev(item)">＞</button>
                <div class="commodity-body">
                    <div class="commodity-name">
                        <h4 class="bold">{{item.PROD_NAME}}</h4>
                    </div>
                    <div class="commodity-price">
                        <p>${{item.PROD_PRICE}}</p>
                    </div>
                    <div class="commodity-evaluation">
                        <span v-for="i in 3" :key='i'>★</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</template>

<script >
export default {
        data(){
        return{
            gun:[],
            order:1
        }
    },
    methods:{
        next(item){
            if(item.slide<0){
                item.slide+=1
            }
            
        },
        prev(item){
            if(item.slide>-2){
                item.slide-=1
            }
                
        },
        
    },
    created(){
        this.axios.get("http://localhost/cli/team/src/assets/php/productlist.php")
        .then((res)=>{
            this.gun = res.data
            console.log(this.gun)
        })
    },
    
}
</script>
<style scope>
  .commodity-total{
    display: flex;
    flex-direction: column;
    
   
  }
</style>