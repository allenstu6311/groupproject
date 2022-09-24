<template>
 <div class="background-pic">
        <!-- <img src="../assets/images/bcgFlower.png" alt=""> -->
        </div>

        <!-- ===================================header -->
        <div class="banner">
            <img src="../assets/images/bannerProduct.png" alt="">
        </div>
        <div class="main_title">
            <img src="../assets/images/productTitle.png" alt="">
        </div>


     <!-- ========================= -->
        <div id="app" style="margin-bottom:100px" class="shopping-container">
   
            <div class="title_area">
                <h2 class="sure_title">
                    <p class="title_font">嚴</p>
                    <p class="title_font">選</p>
                    <p class="title_font">商</p>
                    <p class="title_font">品</p>
                </h2>
                <div class="commodity-post">
                    <small>• EXQUISITE PRODUCTS • </small>
                </div>
            </div>
           
            <div class="commodity-search">
                <div class="commodity-filter">
                    <span class="bold">排序方式: </span>
                    <select name="" id="" @change="change" v-model="orderSel">
                        
                        <option value="news">由新到舊</option>
                        <option value="old">由舊到新</option>
                        <option value="height">價錢由高至低</option>
                        <option value="low">價錢由低至高</option>
                    </select>
                </div>
            <div class="commodity-container">
            
                    <div class="commodity-enter">
                        <input type="text" placeholder="輸入商品名稱">
                        <button>   <i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    </div>
                    <!-- <div class="commodity-keywords">
                        <p class="words">玫瑰</p>
                        <p class="words">薄荷</p>
                        <p class="words">筋膜槍</p>
                        <p class="words">按摩槍</p>
                        <p class="words">精油</p>
                    </div> -->
                </div>
          
        

            <div class="area-list">
                
                <div class="row">
                    <div class="area-order">
                        <div class="area-order-title">
                            <h4 @click="allCommodity" :class="{focus:number=='3'}">ALL</h4>
                        </div>
                        <ul>
                            <li v-for="product in obj" @click="showOil(key,value)" :class="{focus:value==number}" :key="product">
                                <span class="list-chose"  style="font-size: 23px;font-weight: 800;" :class="{focus:value==number}">{{product[0].itemName}}</span>
                                <!-- <span class="triangle">{{text}}</span>                           -->

                                <ul :class="{oilList:openPage1}">
                                    <li>玫瑰ROSE</li>
                                    <li>薰衣草 Lavender</li>
                                    <li>薄荷 Peppermint</li>
                                </ul>    
                            </li>
                        </ul>
                    </div>
            
                    <div class="wrap">
                        <div class="bread">
                            <a href="./index.html">首頁</a>><a href="./shopingArea.html">商品專區</a>
                        </div>
                            <div class="area-box" v-if="currentPage==1" :class="{block:currentPage==1}" >

                                <div class="col-3  area-card" v-for="item in commodity" @click="addOrder(item.id)" :key="item.id" >
                                    <a  :href="`./productdetails.html?id=${item.id}`">
                                    <div class="area-pic">
                                        <!-- <img :src="item.img"> -->
                                    </div>
                                    <div class="area-name bold">
                                        <h4>{{item.name}}</h4>
                                    </div>
                                    <small v-for="i in radom" :key="i">⭐</small>
                                    <div class="area-price">
                                    
                                        <p>NT${{item.price}}</p>
                                        
                                    </div>
                                    </a>
                                </div>
                            </div>
                        
                    
                            <div class="area-box" v-if="currentPage==2" :class="{block:currentPage==2}" >
                        
                                <div class="col-3  area-card" v-for="item in commodity" @click="addOrder(item.id)" :key="item.id" >
                                <a :href="`./productdetails.html?id=${item.id}`">
                                    <div class="area-pic">
                                        <!-- <img :src="item.img"> -->
                                    </div>
                                    <div class="area-name bold">
                                        <h4>{{item.name}}</h4>
                                    </div>
                                    <small v-for="i in radom" :key="i">⭐</small>
                                    <div class="area-price">
                                    
                                        <p>NT${{item.price}}</p>
                                        
                                    </div>
                                </a>
                                </div>
                            </div>
                      
        <!-- ========================================================== -->
          
                        <div class="page-number-computer" v-if="number==0">
                            <button  class="btnLittle"  @click="pageReduce"></button>
                            <span style="  letter-spacing: 2px;" v-for="i in 2" :key="i" :class="{fontcolor:i==currentPage}" @click="chose(i)">{{i}}</span>
                            <button class="btnLittle"  @click="pageAdd()">></button>
                        </div>
                    </div> 
                </div>
            </div>   
                  
        </div>

    
</template>

<script>
export default {
    
}
</script>