<template>

  <div class="background-pic">
        <img src="../assets/images/bcgFlower.png" alt="">
    </div>

        <!-- ========================================banner -->

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
    data(){
        return{
            
        }
    }
}
</script>