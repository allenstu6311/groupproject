<template>
    <div class="container-fluid">
        <div class="row">
            <SlideChose />
            <div class="orderBox">
                <div class="order-search  m-3">
                    <select class="form-select w-25" aria-label="Default select example">
                        <option selected>排序方式</option>
                    </select>
                    <div class="input-group mx-3  w-25">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="請輸入訂單名稱"
                            aria-label="Recipient's username"
                            aria-describedby="button-addon2"
                        />
                        <button
                            class="btn btn-outline-secondary"
                            type="button"
                            id="button-addon2"
                        >
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>折價券名稱</th>
                            <th>折扣</th>
                            <th>狀態</th>
                            <th>修改</th>
                            <th>刪除</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in data" :key="item">
                            <th>{{item.order_items_id}}</th>
                            <th>{{item.prod_orders_id}}</th>
                            <th>{{item.mem_name}}</th>
                            <th>{{item.prod_orders_date}}</th>
                            
                            <th v-if="item.prod_orders_cps_id==0">未出貨</th>
                            <th v-if="item.prod_orders_cps_id=1">已出貨</th>
                            <th v-if="item.prod_orders_cps_id==2">取消</th>
                            <th v-if="item.prod_orders_cps_id==3">已送達</th>
                            <th>
                                <button class="btnLittle" @click="orderDetail(item.prod_orders_id)">詳細資訊</button>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    @import "bootstrap/scss/bootstrap";
    @import "../assets/style.scss";

    .table {
        text-align: center;
        table-layout:fixed;
        a{
            font-weight: 600;
            color: $blue;
        }
        thead{
            background-color: $blue;
            th{
                font-weight: 600;
                color: $white;
            }
        }
    }
    .latest_reservation_title,
    .latest_order_title{
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 10px;
        h2{
            font-size: 28px;
        }
        a{
            font-size: 16px;
            font-weight: 600;
            color: $blue;
        }
    }
</style>
