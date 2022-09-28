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
                    </table>
                </div>
            </body>
        </div>
    </div>
</template>

<script>
// export default {
//     data: () => ({
//         isShow: false,
//         // car: [],
//     }),
//     computed: {
//         modalStyle() {
//             return {
//                 'display': this.isShow ? '' : 'none',
//             };
//         }
//     },
//     methods: {
//         toggleModal() {
//             console.log('click')
//             this.isShow = !this.isShow;
//         },
//         // online() {
//         //     let buyCar = localStorage.getItem("car");
//         //     if (!buyCar) return;
//         //     this.car = JSON.parse(buyCar)
//         // },

//         // send() {
//         //     for (let i = 0; i < this.car.length; i++) {
//         //         this.price = this.car[i].price
//         //         this.name = this.car[i].name
//         //         this.num = this.car[i].num
//         //         this.img = this.car[i].img
//         //         this.img = this.car[i].img
//         //         this.img = this.car[i].img
//         //         this.img = this.car[i].img
//         //         this.img = this.car[i].img
//         //         this.img = this.car[i].img
//         //         this.img = this.car[i].img
//         //         this.img = this.car[i].img
//         //         this.img = this.car[i].img
//         //         this.img = this.car[i].img
//         //         this.img = this.car[i].img
//         //         this.img = this.car[i].img
//         //         this.img = this.car[i].img
//         //     }
//         // }
//     },
//     // created() {
//     //     this.online()
//     //     this.send()
//     // },
// };
</script>