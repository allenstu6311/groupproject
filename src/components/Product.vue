<template>

      <div class="background-pic">
        <img src="../assets/images/bcgFlower.png " alt="">
        </div>
        <!-- ========================================banner -->

      
            <div class="product-title">
                <div class="product-pic"  :class="{light:value==page}"> 
            
                    <img :src="item.img" v-if ="page==0" >
                    <img :src="item.imgTop" v-if ="page==1">
                    <img :src="item.imgBody" v-if ="page==2">

                    <div class="pic-slide" >
                        <button @click="prev()"></button>
                        <div class="pic-chose" v-for="item in order" :key="item">              
                            <img  :src="item.img" alt="" :class="{light:page==0}" @click="changePhoto(0)">
                            <img  :src="item.imgTop" alt="" :class="{light:page==1}" @click="changePhoto(1)">
                            <img  :src="item.imgBody" alt="" :class="{light:page==2}" @click="changePhoto(2)">
                        </div>
                              
                        <button @click="next()">></button>
                    </div>
                </div>
            

                <div class="pic-control" >
                    <div class="pic-number" v-for="i in 3" :class="{changeColor:page==i-1}" 
                    @click="changePic(i)" :key="i">{{i-1}}</div>
                    
                </div>

                <div class="product-body" >
                    <div class="product-name" >
                        <h2>{{item.name}}</h2>
                    </div>
            
                    <div class="product-price"  >
                        <p>${{item.price}}元</p>
                    </div>
                    <div class="product-introduce">
                        <div class="product-txt">
                            <p>品牌:{{item.logo}}</p>
                            <ul>
                                <li>💓{{item.product1}}</li>
                                <li>💓{{item.product2}}</li>
                                <li>💓{{item.product3}}</li>
                            </ul>
                            <br>
                            <table border="1" width="100%">
                                <tr>
                                    <th><p>產地:{{item.specification.origin}}</p></th>
                                </tr>
                                <tr>
                                    <th><p>付款方式:{{item.checkout}}貨到付款</p></th>
                                   
                                </tr>
                                <tr>
                                    <th><p>保固資訊:{{item.warranty}}</p></th>
                                </tr>
                            </table>
                       
                        </div>
                        <div class="product-number">
                            <button @click="reduceNum(item)">-</button>
                            <input type="text" v-model="item.num">
                            <button  @click="addNum(item)">+</button>
                        </div>
                        <div class="product-addcar">
                            <button  class="btnLarge"  @click="addCar(item.id,item)">加入購物車</button>
                            <a href="./shoppingCart.html"><button   class="btnLarge  redBtn" @click="direct(item.id,item)">直接購買</button> </a>
                           
                        </div>
                    </div>
                </div>
            </div>             
       
</template>

<script>
export default {
    
}
</script>