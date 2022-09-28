<template>

      <div class="background-pic">
        <img src="../assets/images/bcgFlower.png " alt="">
        </div>
        <!-- ========================================banner -->

   
            <div class="product-title">
                <div class="product-pic"> 
            
                    <img :src="require(`../assets/php/pic/${order[0].PROD_PIC1}`)" v-if="page==1"  :class="{light:page==1}">
                    <img :src="require(`../assets/php/pic/${order[0].PROD_PIC2}`)" v-if="page==2"  :class="{light:page==2}">
                    <img :src="require(`../assets/php/pic/${order[0].PROD_PIC3}`)" v-if="page==3"  :class="{light:page==3}">

                    <div class="pic-slide" >
                        <button @click="prev()">＜</button>
                        <div class="pic-chose">              
                            <img  :src="require(`../assets/php/pic/${order[0].PROD_PIC1}`)" :class="{light:page==1}" @click="page=1">
                            <img  :src="require(`../assets/php/pic/${order[0].PROD_PIC2}`)" :class="{light:page==2}" @click="page=2">
                            <img :src="require(`../assets/php/pic/${order[0].PROD_PIC3}`)" :class="{light:page==3}" @click="page=3">
                        </div>
                              
                        <button @click="next()">＞</button>
                    </div>
                </div>
            
                <div class="pic-control" >
                    <div class="pic-number" v-for="i in 3" :class="{changeColor:page==i}" 
                    @click="changePic(i)" :key="i">{{i}}</div>
                    
                </div>

                <div class="product-body" >
                    <div class="product-name" >
                        <h2>{{order[0].PROD_NAME}}</h2>
                    </div>
            
                    <div class="product-price"  >
                        <p>${{order[0].PROD_PRICE}}元</p>
                    </div>
                    <div class="product-introduce">
                        <div class="product-txt">
                            <ul>
                                <li>💓{{order[0].PROD_DESC1}}</li>
                                <li>💓{{order[0].PROD_DESC2}}</li>
                                <li>💓{{order[0].PROD_DESC3}}</li>
                            </ul>
                            <br>
                        </div>
                       <div class="product-number">
                             <button @click="reduceNum(order)">-</button> 
                             <input type="text" v-model = "order[0].PROD_NUM"> 
                             <button  @click="addNum(order)">+</button> 
                       </div>
                        <div class="product-addcar">
                            <button  class="btnLarge"  @click="addCar()">加入購物車</button>
                            <a href="./shoppingCart.html"><button   class="btnLarge  redBtn" @click="direct()">直接購買</button> </a> 
                            </div>  
                    </div>
                </div>
            </div>             
       
</template>

<script>
export default {
    data(){
        return{
            order:[],
            page:1,
        }
    },
    methods:{
        addNum(item){
             item[0].PROD_NUM+=1
        },
        reduceNum(item){
            if(item[0].PROD_NUM>0){
                item[0].PROD_NUM-=1
            }
        },
        changePic(i){
           this.page=i
        },
        prev(){
            if(this.page>1){
                  this.page-=1
            }
          
        },
        next(){
            if(this.page<3){
                 this.page+=1
            }
        },

        onlineStorage(){
        let orders = localStorage.getItem("order");
        if(!orders) return;
        this.order = JSON.parse(orders)
        console.log(this.order)
        }
    },
    created(){
        this.onlineStorage()
    }
    
}
</script>

<style lang="scss" scoped>
    img{
        opacity: .2;
    }
    .light{
        opacity: 1;
    }

</style>