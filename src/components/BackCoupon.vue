<template>
    <div class="back_coupons">
        <h1>管理折價券</h1>
        <div class="laster_selectbar hstack gap-3">
            <select class="form-select form-select-sm bg-light condition-search" aria-label=".form-select-sm example" v-model="selecttype">
                <option value="-1">選擇排序條件</option>
                <option value="CPS_ID">依代碼排序</option>
                <option value="CPS_NAME">依名稱排序</option>
                <option value="CPS_DIS">依折扣排序</option>
            </select>
            <div class="input-group rounded bg-light">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
            </div>
            <router-link class="btn btn-primary ms-auto" to="/BackCouponAdd">新增折價券</router-link>
        </div>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">折價券代碼</th>
                    <th scope="col">折價券名稱</th>
                    <th scope="col">折扣</th>
                    <th scope="col">修改</th>
                    <th scope="col">刪除</th>
                </tr>
            </thead>
            <tbody>
                <tr 
                v-for="backstageCoupon in backstageCouponList"
                :key="backstageCoupon">
                    <td>{{ backstageCoupon.CPS_ID }}</td>
                    <td>{{ backstageCoupon.CPS_NAME }}</td>
                    <td>{{ backstageCoupon.CPS_DIS }}</td>
                    <td>
                        <div>
                            <!-- <img src="../assets/images/Pen.png" alt="修改icon"> -->
                            <router-link
                                :to="{
                                    path:'/BackCouponChangeinfo', query:{ 
                                        id: `${backstageCoupon.CPS_ID}`,
                                        name:`${backstageCoupon.CPS_NAME}`,
                                        discount:`${backstageCoupon.CPS_DIS}`
                                    }
                                }"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                    <path d="M16 5l3 3"></path>
                                </svg>
                            </router-link>
                        </div>
                    </td>
                    <td>
                        <a href="">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"  @click="remove(backstageCoupon.CPS_ID)">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg>
                            </div>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

    import {BASE_URL} from '@/assets/js/common.js'


    export default {
        props: {
            backstageCoupon: String
        },
        data() {
            return {
                backstageCouponList: [],
                couponValue:[],
                selecttype: '-1',
            }
        },
        created(){
            this.getDataFromApi(); // 在建立Vue.js模板時順帶執行這個參數
        },
        methods:{
            async getDataFromApi() {

                var url = `${BASE_URL}/backCoupon.php` //上線用
                let getData = async(url) => {
                    let response = await fetch(url); // await 很重要
                    let JSON =  response.json();
                    this.backstageCouponList = await JSON; // php抓取回來的資料存取在預設好的參數裡
                }
                await getData(url); // 觸發 getData 的匿名 function 內容 ==> 76 ~ 78 行的內容
                console.log(this.backstageCouponList);
            },
            chtherapistinfo(name){
                // this.axios.get("http://localhost/CGD102_G2/public/api/backtherapistgetvalue.php",{
                this.axios.get(`${BASE_URL}/backCoupongetvalue.php`,{
                    params:{
                        searchName: name
                    }
                })
                .then((res)=>{
                    // console.log(res.data[0].THERAPIST_NAME)
                    this.couponValue = res.data
                    this.setStorage()
                })
            },
            setStorage(){
                localStorage.setItem("CPS_NAME",JSON.stringify(this.couponValue))
            },
            onlineStorage(){
                let couponsv = localStorage.getItem("CPS_NAME")
                this.couponValue = JSON.parse(couponsv)
            },
            clear(){
                // let index = this.allenHandsome.findIndex(item=>item.THERAPIST_NAME)
                this.couponValue=[]
                this.setStorage()
            },
            remove(id){
                console.log(id)
                this.axios.get(`${BASE_URL}/backCouponremove.php`,{
                    params:{
                        coupon_id:id
                    }
                })

            },
            sorttype() {
            if (this.selecttype != -1) {
                this.backstageCouponList.sort((a, b) => b[this.selecttype] < a[this.selecttype] ? 1 : -1)
            }
        },
        },
        watch: {
            selecttype: {
                handler(value) {
                    this.sorttype()
                },
                deep: true
            }
        }
    }
</script>

<style lang="scss" scoped>
    // @import "bootstrap/scss/bootstrap"; 
    // @import "../assets/style.scss";
    @import "../assets/base/_color.scss"; //有變數要引用的sass

    .back_coupons{
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
                width: 55%;
                background-color: transparent;
                border: none;
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
