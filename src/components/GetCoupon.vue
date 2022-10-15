<template>
    <div class="game_over">

        <h1 class="sr_only">穴道小遊戲</h1>

        <div class="background_flower">

            <div class="coupon_container">
                <div class="coupon_frame">
                    <p class="coupon">
                        遊戲結束,總共答對了<span>{{count}}題</span><br>
                        恭喜您獲得折價券!
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
            num:"",
            couponId:"",
        }
    },
    created(){
        this.count = this.$route.query.count

        let members = sessionStorage.getItem("member");
        this.member = JSON.parse(members);
        var url = `${BASE_URL}/getCoupons.php` //上線用]

        this.axios.get(url,{
            params:{
                mem_id:this.member.MEM_ID,
                coupon_id: this.couponId
            }
        })
        .then((res)=>{
            this.data = res.data
    
            let check = this.data.find(item=>item.MEM_ID===this.member.memId)
            
            if(!check){
                this.num=1
                switch(this.count){
                    case "0":
                        this.couponId = this.data[0].CPS_ID
                        this.timerd = setTimeout(this.sendCoupons,1000)
                        alert('獲得9折折價券')
                        break;

                    case "1":
                        this.couponId = this.data[1].CPS_ID
                        this.timerd = setTimeout(this.sendCoupons,1000)
                        alert('獲得8折折價券')
                        break;
                }

            }else{
                this.num=2
                switch(this.count){
                    case "0":
                        this.couponId = this.data[0].CPS_ID
                        if(this.data[0].MY_COUPONS_STATUS == 1){
                            alert('您已擁有這張折價券')
                        }else{
                            this.timerd = setTimeout(this.sendCoupons,1000)
                            alert('獲得9折折價券')
                        }
                        break;
                    case "1":
                        this.couponId = this.data[1].CPS_ID
                        if(this.data[1].MY_COUPONS_STATUS ==1){
                            alert('您已擁有這張折價券')
                        }else{
                            this.timerd = setTimeout(this.sendCoupons,1000)
                            alert('獲得8折折價券')
                        }
                        break;
                }
            }
        })
    },
    methods: {
        sendCoupons(){
            let members = sessionStorage.getItem("member");
            this.member = JSON.parse(members);
            var url = `${BASE_URL}/sendCoupon.php`
            this.axios.get(url,{
                params:{
                    checkNum:this.num,
                    mem_id:this.member.memId,
                    coupon_id: this.couponId 
                }
            })
            .then((res)=>{

            })
        }
    },
}
</script>

<style lang="scss" scoped>
    a:hover{
        color: #fff;
    }    
</style>