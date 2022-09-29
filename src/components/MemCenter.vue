<template>
        <teleport to='body'>
            <div class="modal-mask" :style="modalStyle">
                <div class="modal-container" @click="toggleModal">
                    <MemLightBox />
                </div>
            </div>
        </teleport>
        <h1 class="sr_only">會員中心</h1>
        <!-- header -->
        <div class="memCenter">
            <div class="member">
                <div class="mem_mug_shot">
                    <img src="../assets/images/member.jpg">
                </div>
                <div class="mem_name">無名氏</div>
            </div>
            <div class="mem_banner">
                <img src="../assets/images/memberbanner.jpg">
            </div>
            <div class="panel_group">
                <input type="radio" name="panel_radio" id="radio1" class="panel_control" checked>
                <input type="radio" name="panel_radio" id="radio2" class="panel_control">
                <input type="radio" name="panel_radio" id="radio3" class="panel_control">
                <div class="tab_group">
                    <label for="radio1">個人資料</label>
                    <label for="radio2">歷史訂單</label>
                    <label for="radio3">預約紀錄</label>
                </div>
                <div class="content_group">
                    <!-- 個人資料 -->
                    <div class="content content1">
                        <h2>個人資料</h2>
                        <hr>
                        <div class="mem_data">
                            <div class="mem_data_table">
                                <table id="person_info">
                                    <tr class="person_info_item">
                                        <th>帳號:</th>
                                        <td :style="pdata_display_none">{{account}}</td>
                                        <td><input type="text" v-model="account" :style="pdata_display_show" maxlength="10"></td>
                                    </tr>
                                    <tr class="person_info_item">
                                        <th>密碼:</th>
                                        <td :style="pdata_display_none">{{password}}</td>
                                        <td><input type="password" v-model="password" :style="pdata_display_show" maxlength="10"></td>
                                    </tr>
                                    <tr class="person_info_item">
                                        <th>信箱:</th>
                                        <td :style="pdata_display_none">{{email}}</td>
                                        <td><input type="text" v-model="email" :style="pdata_display_show" maxlength="30"></td>
                                    </tr>
                                    <tr class="person_info_item">
                                        <th>生日:</th>
                                        <td :style="pdata_display_none">{{birthday}}</td>
                                        <td><input type="date" v-model="birthday" :style="pdata_display_show"></td>
                                    </tr>
                                    <tr class="person_info_item">
                                        <th>手機:</th>
                                        <td :style="pdata_display_none">{{phone}}</td>
                                        <td><input type="text" v-model="phone" :style="pdata_display_show" maxlength="10"></td>
                                    </tr>
                                    <tr class="person_info_item">
                                        <th>市話:</th>
                                        <td :style="pdata_display_none">{{lphonef}}{{lphones}}</td>
                                        <td><input type="text" v-model="lphonef" :style="pdata_display_show" maxlength="3" style="width:20px;">-<input type="text" v-model="lphones" :style="pdata_display_show" maxlength="10"></td>
                                        
                                    </tr>
                                    <tr class="person_info_item">
                                        <th>地址:</th>
                                        <td :style="pdata_display_none">{{address}}</td>
                                        <td><input type="text" v-model="address" :style="pdata_display_show" maxlength="40"></td>
                                    </tr>
                                </table>
                                <div class="confirm_button">
                                    <button class="btnMinimum" id="mem_confirm" :style="pdata_display_show" @click="editdata = false,displayshow = true">確定</button>
                                </div>
                            </div>
                            <div class="edit">
                                <button class="btnMinimum" id="mem_edit" :style="pdata_display_none" @click="editdata = true,displayshow = false">編輯</button>
                            </div>
                        </div>
                    </div>
                    <!-- 歷史訂單 -->
                    <div class="content content2">
                        <h2>歷史訂單</h2>
                        <hr>
                        <!-- 歷史訂單搜尋 -->
                        <div class="order_search_bar">
                            <label for="order_search"><img src="../assets/images/Search.png"></label>
                            <div class="order_search_row">
                                <div class="category_row">
                                    <select name="category">
                                        <option value="">購買日期</option>
                                        <option value="">訂單編號</option>
                                        <option value="">訂單名稱</option>
                                    </select>
                                    <select name="state" id="state_search" class="state_search">
                                        <option value="">未出貨</option>
                                        <option value="">已出貨</option>
                                        <option value="">訂單名稱</option>
                                    </select>
                                </div>
                                <input type="text" id="order_search">
                            </div>
                        </div>
                        <!-- 資料表格 -->
                        <div class="order_data">
                            <table>
                                <tr>
                                    <th>訂單編號</th>
                                    <th>訂單名稱</th>
                                    <th>訂單日期</th>
                                    <th>訂單狀態</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>A123456789</td>
                                    <td>訂單一</td>
                                    <td>2022-09-16</td>
                                    <td>未出貨</td>
                                    <td valign="middle">
                                        <div id="order_detail">
                                            <button class="btnMinimum order_detail" @click="isShow = true">詳細資訊</button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- 預約紀錄 -->
                    <div class="content content3">
                        <h2>預約紀錄</h2>
                        <hr>
                        <!-- 預約紀錄搜尋 -->
                        <div class="reserve_search_bar">
                            <label for="reserve_search"><img src="../assets/images/Search.png"></label>
                            <div class="reserve_search_row">
                                <div class="category_row">
                                    <select name="category">
                                        <option value="">預約日期</option>
                                        <option value="">預約項目</option>
                                    </select>
                                    <div class="reserve_time">
                                        預約時間:
                                        <input type="text">
                                        ~
                                        <input type="text">
                                    </div>
                                </div>
                                <input type="text" id="reserve_search">
                            </div>
                        </div>
                        <!-- 資料表格 -->
                        <div class="order_data">
                            <table>
                                <tr>
                                    <th>預約日期</th>
                                    <th>按摩項目</th>
                                    <th>按摩師</th>
                                    <th>價錢</th>
                                    <th>開始時間</th>
                                    <th>按摩時間長度</th>
                                </tr>
                                <!-- <tr id="vieworder">
                                    <td id="resvDate"></td>
                                    <td>{{this.orderList[0]["orderMsg"]}}</td>
                                    <td>{{this.orderList[0]["orderTherapist"]}}</td>
                                    <td>{{this.orderList[0]["orderPrice"]}}</td>
                                    <td>{{this.resvDate}</td>
                                    <td id="resvTimeStart"></td>
                                    <td>1hr</td>
                                </tr> -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
import MemLightBox from '@/components/MemLightBox.vue';
export default {
    components: {
        MemLightBox,
    },
    data: () => ({
        isShow: false,
        editdata:false,
        displayshow:true,
        account:"abc123",
        password:"123abc",
        email:"abc123@gmail.com",
        birthday:"1998年10月27日",
        phone:"0912345678",
        lphonef:"03",
        lphones:"12345678",
        address:"桃園市中壢區復興路46號9樓"
    }),
    computed: {
        modalStyle() {
            return {
                'display': this.isShow ? '' : 'none',
            };
        },
        pdata_display_show(){
            return{
                'display': this.editdata ? '' : 'none',
            }
        },
        pdata_display_none(){
            return{
                'display': this.displayshow ? '' : 'none',
            }
        },
    },
    methods: {
        toggleModal() {
            this.isShow = !this.isShow;
        },
    }
}
</script>