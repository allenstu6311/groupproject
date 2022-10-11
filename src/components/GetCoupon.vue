<template>
    <div class="game_over">

        <h1 class="sr_only">穴道小遊戲</h1>

        <div class="background_flower">

            <div class="coupon_container">
                <div class="coupon_frame">
                    <p class="coupon">
                        遊戲結束,總共答對了<span>{{count}}題</span><br>
                        恭喜您獲得<span>{{couponName}}</span>!
                    </p>
                    <div class="btn_group">
                        <div class="over_btn">
                            <router-link to="/MassageSchool" class="btnLarge">穴道小知識</router-link>
                        </div>
                        <div class="over_btn">
                            <router-link to="/MassageGame" class="btnLarge">再試一次</router-link>
                        </div>
                        <div class="over_btn">
                            <router-link to="/ProductList" class="btnLarge">前往商品專區</router-link>
                        </div>
                    </div> 
                </div>
            </div>
            
        </div>
    </div>
</template>

<script>
    import {BASE_URL} from '@/assets/js/common.js'
    
export default {
    data(){
        return{
            count:'',
            data:[],
            couponName:'',
        }
    },
    created(){
        this.count = this.$route.query.count
        this.getDataFromApi(); // 在建立Vue.js模板時順帶執行這個參數
        // this.getcount();
        // console.log(this.$route.query.count)
        let members = sessionStorage.getItem("member");
        this.member = JSON.parse(members);
        if(!this.member){
                this.lightBoxShow=true
            }else{
                this.lightBoxShow=false
            } 
        
    },
    methods: {
        getDataFromApi(){
            var url = `${BASE_URL}/getCoupons.php` //上線用
            this.axios.get(url)
            .then((res)=>{
            this.data = res.data
            console.log(this.data)
            switch(this.count){
                case "0":
                    this.couponName=this.data[0].CPS_NAME
                    this.couponId = this.data[0].CPS_ID
                    break;
                case "1":
                    this.couponName=this.data[1].CPS_NAME
                    this.couponId = this.data[1].CPS_ID
                    break;
            }
            this.timerd = setTimeout(this.sendCoupons,1000)
            }) 
        },
        sendCoupons(){
            var url = `${BASE_URL}/sendCoupon.php`
            this.axios.get(url,{
                params:{
                    mem_id:this.member.memId,
                    coupon_id: this.couponId
                }
            })
            .thenn((res)=>{
                console.log("存入",res)
            })
        }
    },
}
</script>