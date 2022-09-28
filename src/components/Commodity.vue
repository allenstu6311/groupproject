<template>

<div class="commodity-total col-7">
    <div class="commodity-container col-12">
        <div class="commodity-order col-12">
            <div class="commodity-sale">
                <span class="bold" @click="commoditySale=1" :class="{saleColor:commoditySale==1}">全部商品</span>
                <span class="bold" @click="commoditySale=2" :class="{saleColor:commoditySale==2}">特價商品</span>
            </div>
            <div class="commodity-filter">
                <button @click="order=1" :class="{orderColor:order==1}">價格排序</button>
                <button @click="order=2" :class="{orderColor:order==2}">評價排序</button>
                <button @click="toggle=!toggle">{{areaShow}}</button>
            </div>
        </div>
    </div>

    <div class="commodity-total" v-if="commoditySale==1">
        <!-- =============================================橫排顯示 -->
     <div class="commodity-area col-12" v-if="toggle==true">
         <div class="commodity-obj" v-for="item in data" :key="item.PROD_ID">            
                 <button @click="next(item)"> ＜ </button>
                <div class="commodity-pic" >
                   <router-link to="/Detail">
                    <div class="slide-pic" :style="{left:126.93*item.slide+'px',transition:.4+'s'}">    
                        <img :src="require(`../assets/php/pic/${item.PROD_PIC1}`)">
                        <img :src="require(`../assets/php/pic/${item.PROD_PIC2}`)" >
                        <img :src="require(`../assets/php/pic/${item.PROD_PIC3}`)" >
                   </div>
                    </router-link>
                </div>
                    <button @click="prev(item)">＞</button>
                <div class="commodity-body">
                   
                    <div class="commodity-name">
                        <h4 class="bold">{{item.PROD_NAME}}</h4>
                    </div>
                    <div class="commodity-price">
                        <p>$<strong>{{item.PROD_PRICE}}</strong></p>
                    </div>
                    <div class="commodity-evaluation">
                        <span v-for="i in 3" :key='i'>★</span>
                    </div>
                </div>
            </div>  
    </div>

    <!-- =============================================卡片顯示 -->
    <div class="commodity-card " v-if="toggle==false">
        <div class="commodity-obj col-3" v-for="item in data" :key="item.PROD_ID">            
               
                <div class="commodity-pic" >
                 <button @click="next(item)"> ＜ </button>
                   <!-- <router-link to="/Detail">  </router-link> -->
                   <div class="slide-pic" @click="addOrder(item.PROD_ID)" :style="{left:210*item.slide+'px',transition:.4+'s'}" >
                
                    <img :src="require(`../assets/php/pic/${item.PROD_PIC1}`)">
                    <img :src="require(`../assets/php/pic/${item.PROD_PIC2}`)" >
                    <img :src="require(`../assets/php/pic/${item.PROD_PIC3}`)" >
                   </div>
                 
                 <button @click="prev(item)">＞</button>
                </div>
                   
                <div class="commodity-body">
                    <div class="commodity-name">
                        <h4 class="bold">{{item.PROD_NAME}}</h4>
                    </div>
                    <div class="commodity-price">
                        <p>$<strong>{{item.PROD_PRICE}}</strong></p>
                    </div>
                    <div class="commodity-evaluation">
                        <span v-for="i in 3" :key='i'>★</span>
                    </div>
                </div>
            </div>
    </div> 
    </div>
<!-- =============================================特賣商品 -->

    <div class="special-offer" v-if="commoditySale==2">
        <h1>目前無特價商品</h1>
    </div>
</div>
  
</template>

<script >
export default {
        data(){
        return{
            data:[],
            order:[],
            order:1,
            toggle:false,
            commoditySale:1,
            areaShow:"卡片",

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
        addOrder(id){
            let index = this.data.findIndex(item=> item.PROD_ID===id)
            this.order=[{
                PROD_ID:this.data[index].PROD_ID,
                PROD_NAME:this.data[index].PROD_NAME,
                PROD_PRICE:this.data[index].PROD_PRICE,
                PROD_PIC1:this.data[index].PROD_PIC1,
                PROD_PIC2:this.data[index].PROD_PIC2,
                PROD_PIC3:this.data[index].PROD_PIC3,
                PROD_DATE:this.data[index].PROD_DATE,
                PROD_DESC1:this.data[index].PROD_DESC1,
                PROD_DESC2:this.data[index].PROD_DESC2,
                PROD_DESC3:this.data[index].PROD_DESC3,
            }]
            console.log(this.order)
            this.setStorage()
        },
        setStorage(){
            localStorage.setItem("order",JSON.stringify(this.order))
        },
        onlineStorage(){
            let orders = localStorage.getItem("order");
            if(!orders) return;
            this.order = JSON.parse(orders)
        }
        
    },
    created(){
        this.axios.get("http://localhost/cli/team/src/assets/php/productlist.php")
        .then((res)=>{
            this.data = res.data
            console.log(this.data)
        })
    },
    watch:{
        toggle:{
            handler(newVal){
             if(newVal==false){
                this.areaShow="卡片"
             }else{
                this.areaShow="橫排"
             }
            }
        }
    }
    
}

</script>
<style scoped>
  .commodity-total{
    display: flex;
    flex-direction: column;
    
   
  }
</style>