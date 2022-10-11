<template>
    <teleport to='body'>
        <div class="modal-mask" :style="modalStyle">
            <div class="modal-container" @click.stop="toggleModal">
                <div class="lightbox">
                    <div class="lightbox-body">
                        <div class="title">
                            會員詳細資料
                        </div>
                        <table class="memdetail">
                            <thead>
                                <tr>
                                    <th>編號</th>
                                    <th>姓名</th>
                                    <th>帳號</th>
                                    <th>密碼</th>
                                    <th>生日</th>
                                    <th>信箱</th>
                                    <th>電話</th>
                                    <th>市話</th>
                                    <th>地址</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="memdata_bar">
                                    <td>{{this.memId}}</td>
                                    <td>{{this.memName}}</td>
                                    <td>{{this.memAccount}}</td>
                                    <td>{{this.memPsw}}</td>
                                    <td>{{this.memBirthday}}</td>
                                    <td>{{this.memEmail}}</td>
                                    <td>{{this.memPhone}}</td>
                                    <td>{{this.memLocal}}</td>
                                    <td>{{this.memAddress}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </teleport>
    <div class="manage_mem">
        <h1>管理會員帳號</h1>
        <div class="search_mem_bar">
            <select class="form-select form-select-sm bg-light condition-search" aria-label=".form-select-sm example"
                v-model="selecttype">
                <option selected value="MEM_ID">依會員編號</option>
                <option value="MEM_NAME">依姓名排序</option>
                <option value="MEM_PHONE">依手機排序</option>
            </select>
            <select class="form-select form-select-sm bg-light mem_status" aria-label=".form-select-sm example">
                <option selected>正常</option>
                <option value="1">停權</option>
            </select>
            <div class="input-group rounded bg-light">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
            </div>
        </div>
        <hr>
        <table class="mem_table">
            <thead>
                <tr>
                    <th>會員編號</th>
                    <th>會員姓名</th>
                    <th>會員手機</th>
                    <th>狀態</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(memberdata,index) in memberlist" :key="index" class="memdata_bar">
                    <td>{{memberdata.MEM_ID}}</td>
                    <td>{{memberdata.MEM_NAME}}</td>
                    <td>{{memberdata.MEM_PHONE}}</td>
                    <td>
                        <select class="form-select form-select-sm bg-light mem_status"
                            aria-label=".form-select-sm example">
                            <option selected>正常</option>
                            <option value="1">停權</option>
                        </select>
                    </td>
                    <td>
                        <button class="btnMinimum" @click="getTargetData(memberdata)">詳細資訊</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</template>
<script>
export default {
    data() {
        return {
            memberlist: [],
            isShow: false,
            index: '',
            memId: '',
            memName: '',
            memAccount: '',
            memPsw: '',
            memBirthday: '',
            memPhone: '',
            memLocal: '',
            memEmail: '',
            memAddress: '',
            selecttype: ''
        }
    },
    created() {
        this.getmemlist();
    },
    computed: {
        modalStyle() {
            return {
                'display': this.isShow ? '' : 'none',
            };
        },
    },
    methods: {
        getmemlist() {
            let xhr = new XMLHttpRequest();
            var url = `${BASE_URL}/backGetMemData.php`; //上線用
            // var url = "http://localhost/CGD102_G2/public/api/backGetMemData.php";//開發用
            xhr.open("get", url, true);
            xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            xhr.send(null);
            xhr.onload = function () {
                this.memberlist = JSON.parse(xhr.responseText);
            }.bind(this);
        },
        toggleModal() {
            this.isShow = !this.isShow;
        },
        getTargetData(memberdata) {
            this.isShow = true;
            this.index = this.memberlist.indexOf(memberdata);
            this.memId = this.memberlist[this.index].MEM_ID;
            this.memName = this.memberlist[this.index].MEM_NAME;
            this.memAccount = this.memberlist[this.index].MEM_ACCOUNT;
            this.memPsw = this.memberlist[this.index].MEM_PSW;
            this.memBirthday = this.memberlist[this.index].MEM_BIRTHDAY;
            this.memPhone = this.memberlist[this.index].MEM_PHONE;
            this.memLocal = this.memberlist[this.index].MEM_LOCALCALL;
            this.memEmail = this.memberlist[this.index].MEM_EMAIL;
            this.memAddress = this.memberlist[this.index].MEM_ADDRESS;
        },
        sort() {
            if (this.selecttype) {
                this.memberlist.sort((a, b) => b[this.selecttype] < a[this.selecttype] ? 1 : -1)
            }
        }
    },
    watch: {
        selecttype: {
            handler(value) {
                this.sort()
            },
            deep: true
        }
    }
}
</script>
<style lang="scss" scoped>
@import "../assets/base/_color.scss";

.lightbox-body {
    width: 50%;

    .title {
        background-color: $blue;
        text-align: center;
        color: $white;
        font-size: 26px;
    }

    .memdetail {
        background-color: $white;
        border-collapse: separate;
        border-spacing: 0px 10px;
        width: 100%;
        text-align: center;

    }
}

.manage_mem {
    h1 {
        font-size: 32px;
        text-align: center;
        padding: 0 0 10px;
    }

    .search_mem_bar {
        display: flex;

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

    hr {
        margin: 1rem 0;
        color: inherit;
        border: 0;
        border-top: 1px solid;
        opacity: 0.25;
    }

    .mem_table {
        width: 100%;
        text-align: center;
        table-layout: fixed;
        border-collapse: separate;
        border-spacing: 0px 10px;

        thead {
            background-color: $blue;

            th {
                font-weight: 600;
                color: $white;
            }
        }

        tbody {
            tr {
                border-spacing: 10px;

                td {
                    text-align: center;

                    select {
                        margin: 0 auto;
                        width: 80px
                    }

                }
            }




        }
    }
}
</style>