<template>
    <div class="laster_therapist">
        <h1>管理按摩師</h1>
        <div class="laster_selectbar hstack gap-3">
            <select class="form-select form-select-sm bg-light" aria-label=".form-select-sm example">
                <option selected>依入職日期排序</option>
                <option value="1">依姓名排序</option>
            </select>
            <div class="input-group rounded bg-light">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
            </div>
            <router-link class="btn btn-primary ms-auto" to="/backtherapistadd">新增按摩師</router-link>
        </div>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">姓名</th>
                    <th scope="col">帳號</th>
                    <th scope="col">入職日期</th>
                    <th scope="col">狀態</th>
                    <th scope="col">修改</th>
                </tr>
            </thead>
            <tbody>
                <tr 
                v-for="backstageTherapsit in backstageTherapsitList" 
                :key="backstageTherapsit">
                    <td>{{ backstageTherapsit.THERAPIST_NAME }}</td>
                    <td>{{ backstageTherapsit.THERAPIST_ACCOUNT }}</td>
                    <td>{{ backstageTherapsit.THERAPIST_HIREDATE }}</td>
                    <td>
                        <div>
                        <select class="form-select form-select-sm" @change="chlive($event)">
                            <option value='1' selected>在職</option>
                            <option value='0'>離職</option>
                        </select></div>
                    </td>
                    <td>
                        <div>
                            <!-- <img src="../assets/images/Pen.png" alt="修改icon"> -->
                            <!-- @click="getTherapsitInfo(backstageTherapsit.THERAPIST_NAME)" -->
                            <router-link   :to="{path:'/BackTherapistChangeInfo' , query:{ 
                                
                                name: `${backstageTherapsit.THERAPIST_NAME}`,
                                account:`${backstageTherapsit.THERAPIST_ACCOUNT}`,
                                password:`${backstageTherapsit.THERAPIST_PSW}`
                                }}" >
                            <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            class="icon icon-tabler icon-tabler-edit"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            >
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                <path d="M16 5l3 3"></path>
                            </svg>
                            </router-link>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import "bootstrap/scss/bootstrap.scss";
    // const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..';

    export default {
        props: {
            backstageTherapsit: String
        },
        data() {
            return {
                backstageTherapsitList: [],
                allenHandsome:[],
            }
        },
        created(){
            this.getDataFromApi();// 在建立Vue.js模板時順帶執行這個參數
        },
        methods:{
            async getDataFromApi() {
                var url = 'http://localhost/CGD102_G2/public/api/therapistContent.php'; //開發用
                // var url = `${BASE_URL}/api/therapistContent.php`; //上線用
                let getData = async(url) => {
                    let response = await fetch(url); // await 很重要
                    let JSON =  response.json();
                    this.backstageTherapsitList = await JSON; // php抓取回來的資料存取在預設好的參數裡
                }
                await getData(url); // 觸發 getData 的匿名 function 內容 ==> 76 ~ 78 行的內容
                console.log(this.backstageTherapsitList);
                 
            },
            // chlive(e){
            //     this.backstageTherapsitList[0].THERAPIST_STATUS = e.target.value;
            //     let THERAPIST_STATUS = this.backstageTherapsitList[0].THERAPIST_STATUS;
            //     let THERAPIST_ACCOUNT = this.backstageTherapsitList[0].THERAPIST_ACCOUNT;

            //     console.log(THERAPIST_STATUS);

            //     var xhr = new XMLHttpRequest();
                
            //     xhr.onload = function(){
            //         if(xhr.status == 200){
            //             console.log(xhr.status);
            //             if(xhr.responseText){
            //                 if(xhr.reponseText == "1"){
            //                     alert("ok");
            //                 }
            //                 // alert("狀態修改成功");
            //                 // window.location.replace("/backtherapist");
            //             }else{
            //                 alert("狀態修改失敗");
            //             }
            //         }
            //     }
            //     xhr.open("post","http://localhost/CGD102_G2/public/api/backtherapistselectchange.php", true); //開發用
            //     // xhr.open("post",`${BASE_URL}/api/backtherapistselectchange.php`, true); //上線用
            //     xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");

            //     let therapist_data = `account=${THERAPIST_ACCOUNT}&status=${THERAPIST_STATUS}`;
            //     xhr.send(therapist_data);
            //     console.log(therapist_data);
            // },
            // watch: {
            //      chlive(e){
            //         // e.target.value;
            //         console.log(e.target.value);
            //     }
            // }
        }
    }
</script>

<style lang="scss" scoped>
    // @import "bootstrap/scss/bootstrap"; 
    // @import "../assets/style.scss";
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