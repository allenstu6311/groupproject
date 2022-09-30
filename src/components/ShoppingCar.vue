<template>

  <div class="background-pic">
        <img src="../assets/images/bcgFlower.png" alt="">
    </div>

        <!-- ========================================banner -->
 
        <div class="shopping-cart">
            <div class="shopping-title">
                <div class="title-font">購</div>
                <div class="title-font">物</div>
                <div class="title-font">車</div>
            </div>

            <div class="shopping-list col-12">
                 <div class="shopping-cart-empty" v-if="detect==0" style="text-align:center;">
                    <h1>目前購物車是空的</h1>
                </div> 
   
                <div class="shopping-list-order" v-for="item in car" :key="item">
                    <input type="checkbox"   v-model="calculate" :value="item">
           
                    <div class="shopping-list-pic ">
                        <img :src="item.img" alt="">
                    </div>
                    <div class="shopping-list-body">
                        <div class="shopping-list-name">
                            <h5>{{item.name}}</h5><br>
                            <p>✅{{item.product1}}</p>
                            <p>✅{{item.product2}}</p>
                         
                        </div>
                 
                        <div class="shopping-list-calculate">
                            <h5>${{item.price}}</h5>
                        </div>
                        <div class="shopping-list-int">
                            <button @click="reduceNum(item)">-</button ><input style="text-align:center" type="text" :value="item.num" size="1"><button @click="addNum(item)">+</button>
                        </div>
                    </div>
                    <div class="shopping-list-btn">
                        <button  class="btnMinimum" style="padding:7px"  @click="reduceCar(item.id)">移出購物車</button>
                    </div>
                </div>
            </div>
            <div class="shopping-line"><small>確認價錢</small></div>
            
         
                <div class="shopping-discount">
                    <h5>選擇優惠券:</h5>
                    <select name="" id="" v-model="sel">
                        <option value="1">請選擇</option>
                        <option value="0.85">85折</option>
                        <option value="0.7">7折</option>
                        <option value="0.5">5折</option>
                
                    </select>
                </div>
                <div class="shopping-price">
                    <div class="shopping-box">
                        全選<input type="checkbox" v-model="checked"  @click="checkTotal">
                        <button class="btnLarge" @click="drop">刪除選取項目</button>
                    </div>
                    <div class="shopping-check">
                    <div class="shopping-checkout">
                        <p>商品金額:{{box}}元</p><p>折扣金額:{{box-totalPrice}}</p>  <p>結帳金額:$<strong>{{totalPrice}}</strong></p>
                    <router-link  to="/Confirm"><button class="btnLittle">前往結帳</button>
                    </router-link>
                    </div>
                    
                </div>

            </div>
            
        </div>


        <div class="purchase-area">
            <div class="purchase-area-title">
               <div class="title-font">加</div>
               <div class="title-font">購</div>
               <div class="title-font">區</div>
            </div>
         
            <div class="purchase-area-container">
                <button @click="next" class="next"></button>
                <div class="purchase-area-slide" :style="{left:330*index+'px',
                transition:.5+'s'}">
                  <div class="purchase-area-card" v-for="item in total" :key="item.id">
                        <div class="purchase-area-pic">
                            <img :src="item.img" alt="">
                        </div>
                     
                        <div class="purchase-area-introduce">
                            <div class="purchase-area-name bold">
                                <h5>{{item.name}}</h5>
                            </div>
                        <div class="purchase-area-price">
                            <h3>$<h3 class="price-important">{{item.price}}</h3></h3>
                        </div>
                        <div class="purchase-area-btn ">
                            <button class="btnLittle" @click="addCar(item.id,item)">加入購物車</button>
                        </div>
                    </div>
                </div>
            </div>
            <button @click="prev" class="prev">></button>
        </div>
    </div>

    
</template>

<script>
export default {
    
}
</script>