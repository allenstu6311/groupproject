<template>
    <div>
      <header class="backstage_manage_header">
        <div class="backstage_manage_logo">
          <img src="../assets/images/backstageHeaderLogo.png">
          <div class="title">後台管理者系統</div>
        </div>
        <div class="user_name">
          無名氏 您好
          <a class="logout">登出</a>
        </div>
      </header>
      <div class="menageIndex container">
        <div class="row">
          <div class="col-2 backgrond_color">
            <div class="list-group" id="list-tab" role="tablist">
                  <!-- <router-link
                  v-for="item in routes" 
                  :key="item.path" 
                  :to="item.path"
                  class="list-group-item list-group-item-action active myset_border myset_list_bac"
                  id="list-home-list"
                  data-bs-toggle="list"
                  role="tab" 
                  aria-controls="list-home"
                  >
                  {{ item.chName ? item.chName : item.name }}
                  </router-link> -->
              <router-link class="list-group-item list-group-item-action active myset_border myset_list_bac" id="list-home-list"
                data-bs-toggle="list" to="backTherapist" role="tab" aria-controls="list-home">首頁</router-link>
              <router-link class="list-group-item list-group-item-action myset_border myset_list_bac" id="list-profile-list"
                data-bs-toggle="list" to="backTherapist" role="tab" aria-controls="list-profile">管理最新消息</router-link>
              <router-link class="list-group-item list-group-item-action myset_border myset_list_bac" id="list-messages-list"
                data-bs-toggle="list" to="BackShop" role="tab" aria-controls="list-messages">管理商品</router-link>
              <router-link class="list-group-item list-group-item-action myset_border myset_list_bac" id="list-settings-list"
                data-bs-toggle="list" to="OrderItem" role="tab" aria-controls="list-settings">管理商品訂單</router-link>
              <router-link class="list-group-item list-group-item-action myset_border myset_list_bac" data-bs-toggle="list"
                to="backTherapist" role="tab" aria-controls="list-settings">管理按摩項目</router-link>
              <router-link class="list-group-item list-group-item-action myset_border myset_list_bac" data-bs-toggle="list"
                to="backTherapist" role="tab" aria-controls="list-settings">管理按摩訂單</router-link>
              <router-link class="list-group-item list-group-item-action myset_border myset_list_bac" data-bs-toggle="list"
                to="/backTherapist" role="tab" aria-controls="list-settings">管理按摩師</router-link>
              <router-link class="list-group-item list-group-item-action myset_border myset_list_bac" data-bs-toggle="list"
                to="backTherapist" role="tab" aria-controls="list-settings">管理會員帳號</router-link>
              <router-link class="list-group-item list-group-item-action myset_border myset_list_bac" data-bs-toggle="list"
                to="backTherapist" role="tab" aria-controls="list-settings">管理後台帳號</router-link>
              <router-link class="list-group-item list-group-item-action myset_border myset_list_bac" data-bs-toggle="list"
                to="backTherapist" role="tab" aria-controls="list-settings">管理常見問題</router-link>
              <router-link class="list-group-item list-group-item-action myset_border myset_list_bac" data-bs-toggle="list"
                to="backTherapist" role="tab" aria-controls="list-settings">管理折價券</router-link>
            </div>
          </div>
          <div class="col-9">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active myset_bac backstage_index" id="list-home" role="tabpanel"
                aria-labelledby="list-home-list">
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
              </div>
              <div class="tab-pane fade myset_bac" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">321
              </div>
              <div class="tab-pane fade myset_bac" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                231</div>
              <div class="tab-pane fade myset_bac" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                111</div>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
// import {routes} from "../router/index.js"
// console.log(routes);

// export default {
//     components:{
//       routes
//     },
//     data(){
//       return{
//         routes,
//       }
//     }
// }
</script>

<style lang="scss" scoped>
  @import "~bootstrap/scss/bootstrap";
  @import"../assets/style.scss";

  *{
    position: relative;
  }
  .active{
    background-color: transparent;
  }
  .backstage_manage_header{
    background-color: #163D82;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    padding: 20px 5%;
    color: #fff;
    font-weight: 600;
    margin-bottom: 30px;
    .backstage_manage_logo{
      display: flex;
      align-items: flex-end;
      div{
        padding: 0px 40px;
        font-size: 40px;
      }
    }
    .user_name{
      display: flex;
      .logout{
        padding: 0 20px;
        text-decoration: none;
      }
    }
  }
  .menageIndex{
    line-height: 2;
    a{
      font-size: 16px;
      font-weight: 600;
      color: $blue;
    }
    .col-2{
      margin-right: 30px;
    }
  }
  .table {
    text-align: center;
    thead{
      background-color: $blue;
    }
    th{
      font-weight: 600;
      color: $white;
    }
  }
  .latest_reservation_title,
  .latest_order_title{
    display: flex;
    align-items: center;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 10px;
    h2{
      font-size: 28px;
    }
    .btnLarge{
      border-radius: 50px;
    }
    a{
      font-size: 16px;
      font-weight: 600;
      color: $blue;
    }
  }
  .show{
    position: relative;
  }
</style>
