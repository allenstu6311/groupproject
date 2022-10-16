<template>
    <div class="laster_therapist">
        <h1>查看按摩訂單</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">訂單編號</th>
                    <!-- <th scope="col">預約會員編號</th> -->
                    <th scope="col">預約人</th>
                    <th scope="col">按摩項目</th>
                    <th scope="col">按摩師</th>
                    <th scope="col">預約日期</th>
                    <th scope="col">預約時段</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in backResv" :key="item.RESV_ID">
                    <td>{{item.RESV_ID}}</td>
                    <!-- <td>{{item.MEM_ID}}</td> -->
                    <td>{{item.MEM_NAME}}</td>
                    <td>{{item.MSG_NAME}}</td>
                    <td>{{item.THERAPIST_NAME}}</td>
                    <td>{{item.RESV_DATE}} </td>
                    <td>{{item.RESV_TIME_START}}:00 - {{item.RESV_TIME_END}}:00</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import {BASE_URL} from '@/assets/js/common.js'

    export default {
        props: {
            backMsg: String
        },
        data() {
            return {
                backMsgList: [],
                msgData:[],
                resv_id: '',
                backResv:[]
            }
        },
        created(){
            this.getResvInfo();// 在建立Vue.js模板時順帶執行這個參數
        },
        methods:{
        getResvInfo() {
            // let urlResv = "http://localhost/CGD102_G2/public/api/memberCenterResv.php";
            let urlBackResv = `${BASE_URL}/backResv.php`
            this.axios.get(urlBackResv, {
                params: {
                    resv_id: this.resv_id
                }
            })
                .then((res) => {
                    this.backResv = res.data
                })
        },


        }
    }
</script>

<style lang="scss" scoped>
    @import "../assets/base/_color.scss"; //有變數要引用的sass

    .laster_therapist{
        h1{
            font-size: 32px;
            text-align: center;
            padding: 0 0 10px;
        }
        .laster_selectbar{
            display: flex;
            .form-select{
                width: 20%;
                line-height: 2;
            }
            .input-group{
                width: 25%;
            }
            .btn-primary{
                background-color: #fff;
                border: 2px solid #ccc;
                color: $blue;
                padding: 6px 20px;
                font-weight: 600;
                &:hover{
                    background-color: $blue;
                    color: $white;
                    border: 2px solid transparent;
                }
            }
        }
        .table{
            text-align: center;
            table-layout:fixed;
            .form-select{
                width: 50%;
                text-align: end;
                background-color: transparent;
                border: none;
                cursor: pointer;
            }
            thead{
                background-color: $blue;
                th{
                    font-weight: 600;
                    color: $white;
                }
            }
            tbody{
                td{
                    vertical-align: middle;
                    div{
                        display: flex;
                        justify-content: center;
                    }
                }
            }
        }
    }
</style>