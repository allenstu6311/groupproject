<template>
    <!-- 新增管理員燈箱 -->
    <teleport to='body'>
        <div class="modal-mask" :style="modalStyle">
            <div class="modal-container">
                <div class="lightbox" @click.self="toggleModal">
                    <div class="lightbox-body">
                        <div class="title">
                            新增管理員帳號
                        </div>
                        <div class="inputarea">
                            帳號: <input type="text" v-model="addaccount">
                            密碼: <input type="text" v-model="addpsw">
                            姓名: <input type="text" v-model="addname">
                        </div>
                        <div class="add_button_area">
                            <button class="btnLittle" @click="toggleModal">取消</button>
                            <button class="btnLittle" @click="newAdmin">確定</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </teleport>
    <!-- 再次確定是否刪除 -->
    <teleport to='body'>
        <div class="modal-mask" :style="comfirmA">
            <div class="modal-container">
                <div class="lightbox" @click.self="closeConfirmAgain">
                    <div class="lightbox-body">
                        <div class="title">
                            刪除管理員帳號
                        </div>
                        <div class="inputarea">
                            確定刪除選取的資料?
                        </div>
                        <div class="add_button_area">
                            <button class="btnLittle" @click="closeConfirmAgain">取消</button>
                            <button class="btnLittle" @click="dropAdmin">確定</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </teleport>
    <div class="backmanage">
        <h1>管理後台帳號</h1>
        <div class="search_manage_bar">
            <div class="button_area">
                <button class="btnMinimum new" @click="openlightbox">新增</button>
                <button class="btnMinimum" @click="openConfirmAgain">刪除</button>
            </div>
        </div>
        <hr>
        <table class="manage_table">
            <thead>
                <tr>
                    <td></td>
                    <td>編號</td>
                    <td>姓名</td>
                    <td>帳號</td>
                    <td>密碼</td>
                    
                </tr>
            </thead>
            <tbody>
                <tr v-for="(managedata,index) in managelist" :key="index" class="managedata_bar">
                    <td>
                        <input type="checkbox" v-model="managedata.checkedArray" @change="getindex(managedata.ADMIN_ID)">
                    </td>
                    <td>{{managedata.ADMIN_ID}}</td>
                    <td>{{managedata.ADMIN_NAME}}</td>
                    <td>{{managedata.ADMIN_ACCOUNT}}</td>
                    <td>{{managedata.ADMIN_PSW}}</td>
                    <!-- <td>
                        <button class="btnMinimum" @click="editTargetData(managedata)" :style="edit">修改</button>
                        <button class="btnMinimum" @click="confirmTargetData(managedata)" :style="confirm">確定</button>
                    </td> -->
                </tr>
            </tbody>
        </table>
    </div>


</template>
<script>
import { BASE_URL } from '@/assets/js/common.js'
import { useRouter } from "vue-router";
export default {
    data() {
        return {
            managelist: [],
            isShow: false,
            confirmagain:false,
            addaccount: '',
            addpsw: '',
            addname: '',
            checkedArray:[],
            adminName:'',
            router: useRouter(),
            // editShow: true,
            // confirmShow:false,
        }
    },
    created() {
        this.getmanagelist();
    },
    computed: {
        modalStyle() {
            return {
                'display': this.isShow ? '' : 'none',
            };
        },
        comfirmA(){
            return {
                'display': this.confirmagain ? '' : 'none',
            };
        },
        // edit() {
        //     return {
        //         'display': this.editShow ? '' : 'none',
        //     }
        // },
        // confirm() {
        //     return {
        //         'display': this.confirmShow ? '' : 'none',
        //     }
        // },
    },
    methods: {
        //取得資料
        getmanagelist() {
            let xhr = new XMLHttpRequest();
            var url = `${BASE_URL}/backGetManage.php`; //上線用
            // var url = "http://localhost/CGD102_G2/public/api/backGetManage.php";//開發用
            xhr.open("get", url, true);
            xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            xhr.send(null);
            xhr.onload = function () {
                this.managelist = JSON.parse(xhr.responseText);
            }.bind(this);
        },
        //開啟新增管理員的燈箱
        openlightbox() {
            this.isShow = true;
        },
        //關閉新增管理員的燈箱
        toggleModal() {
            this.isShow = !this.isShow;
        },
        //開啟再次確認刪除
        openConfirmAgain(){
            this.confirmagain = true;
        },
        closeConfirmAgain() {
            this.confirmagain = !this.confirmagain;
        },
        //新增管理員
        newAdmin() {
            let xhr = new XMLHttpRequest();
            let thus = this;
            var url = `${BASE_URL}/backNewAdmin.php`; //上線用
            // var url = "http://localhost/CGD102_G2/public/api/backNewAdmin.php";//開發用
            xhr.open("post", url, true);
            xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            if (this.addaccount == '' || this.addpsw == '' || this.addname == '') {
                alert("欄位不能空白")
            } else {
                let newAdminData = `account=${this.addaccount}&password=${this.addpsw}&name=${this.addname}`
                xhr.send(newAdminData);
            }
            xhr.onload = function () {
                thus.isShow = false;
                thus.addaccount = '';
                thus.addpsw = '';
                thus.addname = '';
                alert("新增成功");
                thus.router.go(0);
            }
        },
        //取得checked的index
        getindex(ADMIN_ID){
            if(this.checkedArray.indexOf(ADMIN_ID) == -1){
                this.checkedArray.push(ADMIN_ID);
            }else{
                this.checkedArray.shift(ADMIN_ID);
            }
        },
        //刪除管理員
        dropAdmin(){
            let xhr = new XMLHttpRequest();
            let thus = this;
            var url = `${BASE_URL}/backDropAdmin.php`;//上線用
            // var url = "http://localhost/CGD102_G2/public/api/backDropAdmin.php";//開發用
            xhr.open("post", url, true);
            xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            let droplist = `checked=${this.checkedArray}`;
            xhr.send(droplist);
            console.log(droplist);

            xhr.onload = function(){
                if(xhr.response){
                    alert("刪除成功");
                    thus.router.go(0);
                }
            }
        }
        //編輯按鈕顯示
        // editTargetData(managedata){
        //     this.editShow = !this.editShow;
        //     this.confirmShow = !this.confirmShow;
        // },
        // confirmTargetData(managedata){
        //     this.editShow = !this.editShow;
        //     this.confirmShow = !this.confirmShow;
        // }
    }
}
</script>
<style lang="scss" scoped>
@import "../assets/base/_color.scss";

//燈箱
.lightbox-body {
    width: 50%;
    cursor: auto;

    .title {
        background-color: $blue;
        text-align: center;
        color: $white;
        font-size: 26px;
        padding: 10px 0;
    }

    .inputarea {
        background-color: $white;
        border-collapse: separate;
        border-spacing: 0px 10px;
        width: 100%;
        height: 80px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;

        input {
            margin-right: 10px;
            margin-left: 5px;
        }

    }

    .add_button_area {
        background-color: $white;
        display: flex;
        justify-content: center;
        padding-bottom: 10px;

        button {
            margin-right: 10px;
        }
    }
}

//內容
.backmanage {
    h1 {
        font-size: 32px;
        text-align: center;
        padding: 0 0 10px;
    }

    .search_manage_bar {
        display: flex;
        justify-content: flex-end;

        .search_bar {
            display: flex;
            flex-grow: 1;

            .condition-search {
                width: 20%;
            }

            .mem_status {
                width: 10%;
                margin: 0 20px;
            }

            .input-group {
                width: 25%;
            }
        }

        .button_area {
            .new {
                margin-right: 10px;
            }
        }
    }

    hr {
        margin: 1rem 0;
        color: inherit;
        border: 0;
        border-top: 1px solid;
        opacity: 0.25;
    }

    .manage_table {
        width: 100%;
        text-align: center;
        table-layout: fixed;
        border-collapse: separate;
        border-spacing: 0px 10px;

        thead {
            background-color: $blue;

            tr {
                font-weight: 600;
                color: $white;
                td{
                    &:nth-of-type(1){
                        width: 40px;
                    }
                }
            }
        }

        tbody {
            tr {
                border-spacing: 10px;

                td {
                    text-align: center;
                }
            }
        }
    }
}
</style>