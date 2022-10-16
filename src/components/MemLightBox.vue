<template>
  <div class="lightbox">
    <div class="modal-body">
      <header>訂單詳細資訊</header>
      <body>
        <span class="order-date">
          訂購日期:<slot name="order-date">{{memberInfo.length>0 ? orderDate:0}}</slot></span><br>
        <span class="total-money">
          總計:<slot name="total-money">
            {{
              memberBuyInfo.length > 0 ? memberBuyInfo[0].PROD_ORDERS_TOTAL : 0
            }}
          </slot>
        </span>
        <div class="recipient">
          收件人:<slot name="recipient">{{ member.memName }}</slot>
        </div>
        <div class="address">
          收件地址:<slot name="address">{{ memberInfo.length>0 ? storeAddress:"" }}<span v-if="storeAddress.length<4">門市</span></slot>
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
            <tr
              class="item-info"
              v-for="item in memberBuyInfo"
              :key="item.PROD_NAME"
            >
              <td>
                <slot name="item-pic"
                  ><img
                    :src="require(`../../public/api/pic/${item.PROD_PIC1}`)"
                /></slot>
              </td>
              <td>
                <slot name="item-name">{{ item.PROD_NAME }}</slot>
              </td>
              <td>
                <slot name="item-count">{{ item.ORDER_ITEMS_QTY }}</slot>
              </td>
              <td>
                <slot name="item-price">{{ item.PROD_PRICE }}</slot>
              </td>
            </tr>
          </table>
        </div>
      </body>
    </div>
  </div>
</template>


<script>
import { BASE_URL } from "@/assets/js/common.js";
// import MemberCenter from '@/components/MemCenter.vue'
export default {
  props: {
    memberBuyInfo: Array,
    memberInfo: Array,
    storeAddress:String,
    orderDate:Date,

  },
  data() {
    return {
      data: [],
    };
  },
  created() {
    let members = sessionStorage.getItem("member");
    this.member = JSON.parse(members);
  },
};
</script>
