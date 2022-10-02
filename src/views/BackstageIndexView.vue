<template>
    <div>
      <header class="backstage_manage_header">
        <div class="backstage_manage_logo">
          <img src="../assets/images/backstageHeaderLogo.png">
          <div class="title">後台管理者系統</div>
        </div>
        <div class="user_name">
          無名氏
          <a class="logout">
            登出
          </a>
        </div>
      </header>
      <div class="menageIndex">
        <div class="row ">
          <div class="col-1 backgrond_color">
            <div class="list-group" id="list-tab" role="tablist">
              <a class="list-group-item list-group-item-action active myset_border myset_list_bac" id="list-home-list"
                data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">首頁</a>
              <a class="list-group-item list-group-item-action myset_border myset_list_bac" id="list-profile-list"
                data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">管理最新消息</a>
              <a class="list-group-item list-group-item-action myset_border myset_list_bac" id="list-messages-list"
                data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="list-messages">管理商品</a>
              <a class="list-group-item list-group-item-action myset_border myset_list_bac" id="list-settings-list"
                data-bs-toggle="list" href="#list-settings" role="tab" aria-controls="list-settings">管理商品訂單</a>
              <a class="list-group-item list-group-item-action myset_border myset_list_bac" data-bs-toggle="list"
                href="#list-settings" role="tab" aria-controls="list-settings">管理按摩項目</a>
              <a class="list-group-item list-group-item-action myset_border myset_list_bac" data-bs-toggle="list"
                href="#list-settings" role="tab" aria-controls="list-settings">管理按摩訂單</a>
              <a class="list-group-item list-group-item-action myset_border myset_list_bac" data-bs-toggle="list"
                href="#list-settings" role="tab" aria-controls="list-settings">管理按摩師</a>
              <a class="list-group-item list-group-item-action myset_border myset_list_bac" data-bs-toggle="list"
                href="#list-settings" role="tab" aria-controls="list-settings">管理會員帳號</a>
              <a class="list-group-item list-group-item-action myset_border myset_list_bac" data-bs-toggle="list"
                href="#list-settings" role="tab" aria-controls="list-settings">管理後台帳號</a>
              <a class="list-group-item list-group-item-action myset_border myset_list_bac" data-bs-toggle="list"
                href="#list-settings" role="tab" aria-controls="list-settings">管理常見問題</a>
              <a class="list-group-item list-group-item-action myset_border myset_list_bac" data-bs-toggle="list"
                href="#list-settings" role="tab" aria-controls="list-settings">管理折價券</a>
            </div>
          </div>
          <div class="col-11">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active myset_bac backstage_index" id="list-home" role="tabpanel"
                aria-labelledby="list-home-list">
                <div class="latest_order">
                  <div class="latest_order_title">
                    <h2>最新訂單</h2>
                    <button class="btnLarge">前往管理訂單</button>
                  </div>
                  <div class="latest_order_detail">
                      <ul>
                          <li>訂單編號</li>
                          <li>訂購人</li>
                          <li>訂單成立時間</li>
                          <li>狀態</li>
                      </ul>
                  </div>
                </div>
                <div class="latest_reservation">
                  <div class="latest_reservation_title">
                    <h2>最新預約</h2>
                    <button class="btnLarge">前往管理預約</button>
                  </div>
                  <div class="latest_reservation_detail">
                    <ul>
                        <li>訂單編號</li>
                        <li>預約時段</li>
                        <li>預約項目</li>
                        <li>按摩師</li>
                        <li>狀態</li>
                    </ul>
                  </div>
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

// import "bootstrap/dist/css/bootstrap.css"

export default {
    
}
</script>
<style lang="scss" scoped>

    @import "~bootstrap/scss/bootstrap";

</style>
