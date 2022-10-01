<template>

    <div class="commodity-list col-4">
        <div class="commodity-title">
            <h4 class="bold">購物明細</h4>
        </div>
    <div class="commodity-show">
        <ul>
            <li v-for="item in cart" :key="item">
               <div class="commodity-pic">
                <img :src="require(`../assets/phps/pic/${item.PROD_PIC1}`)">
               </div>
               <div class="commodity-price">
                ${{item.PROD_PRICE}}
               </div>
               <div class="commodity-price-num">
                X{{item.PROD_NUM}}
               </div>
            </li>
        </ul>
    </div>
    <div class="commodity-detail">
        <div class="commodity-money">
            <span class="bold">商品金額</span>
            <span class="bold">0元</span>
        </div>
          <div class="commodity-money">
            <span class="bold">折扣金額</span>
            <span class="bold">0元</span>
        </div>
          <div class="commodity-money">
            <span class="bold">最後金額</span>
            <span class="bold">0元</span>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    
    data(){
        return{

        }
    },
    methods:{

    getInfo(){

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
        this.getInfo()
    }
}
</script>