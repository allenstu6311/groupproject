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
                <div class="mem_name">{{name}}</div>
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
                                        <th :style="pdata_display_show">輸入舊密碼:</th>
                                        <td><input type="password" v-model="inputpassword" :style="pdata_display_show" maxlength="10"></td>
                                    </tr>
                                    <tr class="person_info_item">
                                        <th :style="pdata_display_show">輸入新密碼:</th>
                                        <td><input type="password" v-model="newpassword" :style="pdata_display_show" maxlength="10"></td>
                                    </tr>
                                    <tr class="person_info_item">
                                        <th :style="pdata_display_show">再次輸入密碼:</th>
                                        <td><input type="password" v-model="newpasswordA" :style="pdata_display_show" maxlength="10"></td>
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
                                        <td :style="pdata_display_none">{{areaCode}}-{{lphone}}</td>
                                        <td><input type="text" v-model="areaCode" :style="pdata_display_show" maxlength="3" style="width:20px;">
                                            <span :style="pdata_display_show">-</span>
                                            <input type="text" v-model="lphone" :style="pdata_display_show" maxlength="10" style="width:100px;">
                                        </td>
                                        
                                    </tr>
                                    <tr class="person_info_item">
                                        <th>地址:</th>
                                        <td :style="pdata_display_none">{{address}}</td>
                                        <td><input type="text" v-model="address" :style="pdata_display_show" maxlength="40"></td>
                                    </tr>
                                </table>
                                <div class="confirm_button">
                                    <button class="btnMinimum" :style="pdata_display_show" @click="cancelEdit">返回</button>
                                    <button class="btnMinimum" id="mem_confirm" :style="pdata_display_show" @click="upmemdata">確定</button>
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
import {BASE_URL} from '@/assets/js/common.js'
import MemLightBox from '@/components/MemLightBox.vue';
import { watch } from '@vue/runtime-core';
export default {
    components: {
        MemLightBox,
    },
    data: () => ({
        isShow: false,
        editdata:false,
        displayshow:true,
        account:'',
        newAccount:'',
        inputpassword:'',
        oldpassword:'',
        newpassword:'',
        newpasswordA:'',
        email:'',
        birthday:'',
        phone:'',
        lphonef:'',
        lphone:'',
        address:'',
        name:'',
        memData:'',
        areaCode:'',
        member:'',
        memId:'',
        verifyPsw:'',
        verifyEmail:'',
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
        getMemData(){
            this.member = JSON.parse(sessionStorage.getItem('member'));
            this.name = this.member.memName;
            this.memId = this.member.memId;
            var xhr = new XMLHttpRequest();
            
            var url = `${BASE_URL}/getMemData.php`;
            // var url = "http://localhost/CGD102_G2/public/api/getMemData.php";
            xhr.open("post", url, true);
            xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            var getMemInfo = `name=${this.name}`;
            xhr.send(getMemInfo);

            xhr.onload = function(){
                this.memData = JSON.parse(xhr.responseText);
                this.account = this.memData.MEM_ACCOUNT;
                this.oldpassword = this.memData.MEM_PSW;
                this.email = this.memData.MEM_EMAIL;
                this.birthday = this.memData.MEM_BIRTHDAY;
                this.phone = this.memData.MEM_PHONE;
                this.address = this.memData.MEM_ADDRESS;
                this.lphonef = this.memData.LOCALCALL;
                this.name = this.memData.MEM_NAME;
                this.lphonef = this.memData.MEM_LOCALCALL;
                this.areaCode = this.lphonef.slice(0,2)
                this.lphone = this.lphonef.slice(3)
            }.bind(this);
        },
        upmemdata(){
            if(this.inputpassword!=this.oldpassword){
                alert("輸入舊密碼不符");
                return;
            }else if(this.verifyPsw == false){
                alert("新密碼格式錯誤");
                return;
            }else if(this.newpassword!=this.newpasswordA){
                alert("輸入新密碼兩次不相同");
                return;
            }else if(this.verifyEmail == false){
                alert("信箱格式錯誤");
                return;
            }else{
                this.editdata = false;
                this.displayshow = true;
                
                var xhr = new XMLHttpRequest();
                // const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..';
                var url = `${BASE_URL}/updateMemData.php`;
                // var url = "http://localhost/CGD102_G2/public/api/updateMemData.php";
                xhr.open("post",url, true);
                xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");

                let new_mem_deta = `id=${this.memId}&account=${this.account}&password=${this.newpassword}&name=${this.name}&email=${this.email}&birthday=${this.birthday}&phone=${this.phone}&localphone=${this.lphonef}&address=${this.address}`
                xhr.send(new_mem_deta);

                this.inputpassword = '';
                this.newpassword = '';
                this.newpasswordA = '';
                alert("修改成功");
                location.reload();
            }
        },
        checkNew(reg,content){
            if(reg.test(content)){
                return true;
            }else{
                return false;
            }
        },
        cancelEdit(){
            this.editdata = false;
            this.displayshow = true;
        }
    },
    watch:{
        newpassword:function(content){
            let reg = /^[0-9a-z]{6,10}$/;
            this.verifyPsw = this.checkNew(reg,content)
        },
        email:function(content){
            let reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
            this.verifyEmail = this.checkNew(reg,content)
        },
    },
    created() {
        let checkLogin = sessionStorage.getItem('member');
        if(checkLogin == null){
            location.replace("/home");
        }
        this.getMemData(); 
    },
}
</script>