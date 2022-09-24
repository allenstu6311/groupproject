<template>
      <div class="background-pic">
        <img src="./images/bcgFlower.png" alt="">
    </div>
        <!-- ========================================banner -->

        <div id="app" class="shopping-container" style="margin-top:100px">
         
          
            <div class="bread">
                <a href="./index.html">首頁</a>><a href="./shopingArea.html">商品專區</a>><a href="./shopingArea.html">{{bread}}</a>
            </div>
            <div class="product-title">
            
                <div class="product-pic left" v-for="item in order" :class="{light:value==page}" :key="item"> 
                    <!-- <img :src="item.img" > -->
            
                    <img :src="item.img" v-if ="page==0" >
                    <img :src="item.imgTop" v-if ="page==1">
                    <img :src="item.imgBody" v-if ="page==2">

                  
                        <div v-show="topShow" class="top" :style="topStyle"></div>
                        <div class="maskTop" @mouseenter="enterHandler" @mousemove="moveHandler" @mouseout="outHandler"></div>

                        <div v-show="rShow" class="right">
                      
                            <img :src="item.img" v-if ="page==0"  :style="r_img" class="rightImg">
                            <img :src="item.imgTop" v-if ="page==1" :style="r_img" class="rightImg">
                            <img :src="item.imgBody" v-if ="page==2" :style="r_img" class="rightImg">
                        </div>
                
                
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

                <div class="product-body" v-for="item in order" :key="item.id">
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
            <!-- ================================================ -->
            <div class="illustrate col-12">
                <div class="illustrate-chose ">
                    <div class="illustrate-order" @click="changeRule":class="{color:rule}">
                        <h4>規格說明</h4>
                    </div>
                    <div class="illustrate-order" @click="changeNotice" :class="{color:precautions}">
                        <h4>產品特色</h4>
                    </div>
                    <div class="illustrate-order" @click="changePickUp":class="{color:pickUp}">
                        <h4>取貨問題</h4>
                    </div>
                    <div class="illustrate-order" @click="changeComment" :class="{color:comment}">
                        <h4>退貨須知</h4>
                    </div>
                </div>

                <div class="illustrate-txt " v-if="article==1"  width="600">
                    <table border="1" width="100%">
                        <tr >
                            <th>商品名稱</th>
                            <th>{{product.name}}</th>
                        </tr>
                        <tr>
                            <th>品牌</th>
                            <th>{{product.brand}}</th>
                        </tr>
                        <tr>
                            <th>尺寸</th>
                            <th>{{product.size}}</th>
                        </tr>
                        <tr>
                            <th>顏色</th>
                            <th>{{product.color}}</th>
                        </tr>
                        <tr>
                            <th>類別</th>
                            <th style="border-bottom: none;">{{product.type}}</th>
                        </tr>
                        <tr>
                            <th>產地</th>
                            <th>{{product.origin}}</th>
                        </tr>
                    </table>
                </div>

                <div class="illustrate-txt" v-if="article==2" style="font-weight:800;letter-spacing:3px;" >
               
                <p style="font-size:25px">{{special.one}}</p>
                <p style="font-size:25px">{{special.two}}</p>
                <p style="font-size:25px">{{special.three}}</p>
                <p style="font-size:25px">{{special.four}}</p>
                <p style="font-size:25px">{{special.five}}</p>
                <p style="font-size:25px">{{special.six}}</p>
                <p style="font-size:25px">{{special.seven}}</p>
                </div>

                <div class="illustrate-txt" v-if="article==3">
                <p>※使用前請務必充飽電再使用※ </p>
                <p>※請將當筆訂單所有之商品、贈品寄送至 '' 台中市豐原大道一段647號  葵柏兒  04-2313-8558 轉422 '' </p>
                <p>※若非商品問提退貨之運費，請消費者自行吸收。</p>
                <p>※退回之商品內容必須保維持所有商品、贈品、附件、包裝、附隨文件或資料的完整性</p>
                <p>※退貨須連同發票一併退回，若沒有提供發票，恕不退還現金</p>
                
                    
                </div>

                <div class="illustrate-txt" v-if="article==4">
                    <p>※須於訂單商品送達後14日內申請 </p>
                    <p>※ 此商品僅配送一樓，謝謝 ※</p>
                    <p>※ 請將此平台的購買證明印出 或 發票 與保固卡一起保存，即可視為保證章，享保固服務</p>
                    <p>※ 因拍攝與實品略有色差，圖片僅供參考，請以實際收到商品為準</p>
                    <p>※ 以上規格資料若與原廠資料有所出入，以原廠官方所公佈資料為準</p>
                   
                </div>
            </div>
</template>

<script>
export default {
    
}
</script>