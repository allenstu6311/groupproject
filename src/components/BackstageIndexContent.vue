<template>
    <div class="latest_order">
        <div class="latest_order_title">
            <h2>最新訂單</h2>
            <a href="#">前往管理訂單 ></a>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">訂單編號</th>
                    <th scope="col">訂購人</th>
                    <th scope="col">訂單成立時間</th>
                    <th scope="col">狀態</th>
                    <th scope="col">詳細資訊</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>A123456789</td>
                    <td>無名氏</td>
                    <td>2022-09-11</td>
                    <td>未出貨</td>
                    <td><a href="#">詳細資訊</a></td>
                </tr>
                <tr>
                    <td>A123456789</td>
                    <td>無名氏</td>
                    <td>2022-09-11</td>
                    <td>未出貨</td>
                    <td><a href="#">詳細資訊</a></td>
                </tr>
                <tr>
                    <td>A123456789</td>
                    <td>無名氏</td>
                    <td>2022-09-11</td>
                    <td>未出貨</td>
                    <td><a href="#">詳細資訊</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="latest_reservation">
        <div class="latest_reservation_title">
            <h2>最新預約</h2>
            <a href="#">前往管理預約 ></a>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">訂單編號</th>
                    <th scope="col">預約客戶</th>
                    <th scope="col">預約時段</th>
                    <th scope="col">預約項目</th>
                    <th scope="col">按摩師</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>A123456789</td>
                    <td>無名氏</td>
                    <td>2022-09-11 10:00 ~ 11:00</td>
                    <td>精油深層放鬆</td>
                    <td>李駿燕</td>
                </tr>
                <tr>
                    <td>A123456789</td>
                    <td>無名氏</td>
                    <td>2022-09-11 10:00 ~ 11:00</td>
                    <td>精油深層放鬆</td>
                    <td>李駿燕</td>
                </tr>
                <tr>
                    <td>A123456789</td>
                    <td>無名氏</td>
                    <td>2022-09-11 10:00 ~ 11:00</td>
                    <td>精油深層放鬆</td>
                    <td>李駿燕</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    
</script>

<style lang="scss" scoped>
    // @import "bootstrap/scss/bootstrap";
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