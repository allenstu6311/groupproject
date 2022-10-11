<template>
    <div class="lightbox">
        <div class="modal-body">
            <header>
                訂單詳細資訊
            </header>
            <body>
                <span class="order-date">
                    訂購日期:<slot name="order-date">2022-09-20</slot>
                </span>
                <span class="total-money">
                    總計:<slot name="total-money">
                        <!-- {{price}} -->
                    </slot>
                </span>
                <div class="recipient">
                    收件人:<slot name="recipient">康康</slot>
                </div>
                <div class="address">
                    收件地址:<slot name="address">桃園市中壢區復興路46號9樓</slot>
                </div>
                <div class="order-list">
                    訂購內容:
                    <table class="order-detail">
                        <tr class="item-title">
                            <th>商品圖片</th>
                            <th>商品名稱</th>
                            <th>商品數量</th>
                            <th>商品價格</th>
                        </tr>
                        <!-- <tr class="item-info" v-for='item in car' :key="item-info">
                                            <td><slot name="item-pic"><img :src='item.img'></slot></td>
                                            <td><slot name="item-name">{{item.name}}</slot></td>
                                            <td><slot name="item-count">{{item.num}}</slot></td>
                                            <td><slot name="item-price">{{item.price}}</slot></td>
                                        </tr> -->
                            <tr v-for="item in data" :key="item.PROD_ID">
                                <td><img :src="require(`../../public/api/pic/${item.PROD_PIC1}`)" alt=""></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                    </table>
                </div>
            </body>
        </div>
    </div>
</template>

<script>
import {BASE_URL} from '@/assets/js/common.js'
export default {
    data(){
        return{
            data:[],
        }
    },
    created(){
        let members = sessionStorage.getItem("member");
        this.member = JSON.parse(members)

        var url = `${BASE_URL}/memberLightBox.php`
        this.axios.get(url,{
            params:{
                mem_id:this.member.memId
            }
        })
        .then((res)=>{
            
            this.data=res.data
            console.log("會員中心",this.data)
    
        })
    }
}
</script>