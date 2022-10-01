<template>
    
        <div class="shopping-cart">
            <div class="shopping-title">
                <div class="title-font">購</div>
                <div class="title-font">物</div>
                <div class="title-font">車</div>
            </div>
        </div>

        <div class="shopping-list col-12">
                 <div class="shopping-cart-empty" v-if="detect==0" style="text-align:center;">
                    <h1>目前購物車是空的</h1>
                </div> 
   
                <div class="shopping-list-order" v-for="item in cart" :key="item">
                    <input type="checkbox"   v-model="calculate" :value="item">
           
                    <div class="shopping-list-pic ">
                        <img :src="require(`../assets/phps/pic/${item.PROD_PIC1}`)" alt="">
                    </div>
                    <div class="shopping-list-body">
                        <div class="shopping-list-name">
                            <h5>{{item.PROD_NAME}}</h5><br>
                            <p>✅{{item.PROD_DESC1}}</p>
                            <p>✅{{item.PROD_DESC2}}</p>
                            <p>✅{{item.PROD_DESC3}}</p>
                         
                        </div>
                 
                        <div class="shopping-list-calculate">
                            <h5>${{item.PROD_PRICE}}</h5>
                        </div>
                        <div class="shopping-list-int">
                            <button @click="reduceNum(item)">-</button ><input style="text-align:center" type="text" :value="item.PROD_NUM" size="1"><button @click="addNum(item)">+</button>
                        </div>
                    </div>
                    <div class="shopping-list-btn">
                        <button  class="btnMinimum" style="padding:7px"  @click="reduceCar(item.PROD_ID)">移出購物車</button>
                    </div>
                </div>
            </div>
            <div class="shopping-line"><small>確認價錢</small></div>
            
         
               
                <!-- <div class="shopping-price">
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
            </div> -->
       
</template>

<script>
export default {
    data(){
        return{
            carts:[],
            coupon:[],
            sel:"1",
        }
    },
    methods:{
        pay(){
            //     this.axios.get("http://localhost/CGD102_G2/src/assets/php/productOrder.php",{

            //     params:{
            //         MEM_ID:,
            //         PROD_ORDERS_STATUS:,
            //         PROD_ORDERS_DATE:,
            //         PROD_ORDERS_SUBTOTAL:,
            //         PROD_ORDERS_CPS_ID:,
            //         PROD_ORDERS_TOTAL:,
            //         PROD_ORDERS_ADDRESS:,

            //     }
            // })
        },
        getInfo(){

        },

          onlineStorage(){
          
        let orders = localStorage.getItem("order");
        if(!orders) return;
        this.order = JSON.parse(orders)

        let members = localStorage.getItem("user")
        if(!members) return;
        this.member = JSON.parse(members)
        
        let carts = localStorage.getItem("cart")
        if(!carts) return;
        this.cart = JSON.parse(carts)

        console.log(this.cart)

        this.score =(this.order[0].PROD_REVIEW/this.order[0].PROD_TIMES ).toFixed(1)
        this.star = parseInt(this.score)
        
        }
    },
    created(){
        this.axios.get("http://localhost/CGD102_G2/src/assets/phps/member.php")
        .then((res)=>{
            this.coupon = res.data
             console.log(this.coupon)
        })
        this.onlineStorage()
    },
    update(){

    }
}
</script>

<style lang="scss">
.shopping-list{
    background-color: red;
}

</style>
   
