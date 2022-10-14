<template>
    <div class="laster_therapist">
        <h1>管理按摩項目</h1>
        <div class="laster_selectbar hstack gap-3">
            <select class="form-select form-select-sm bg-light" aria-label=".form-select-sm example">
                <option selected>依名稱排序</option>
            </select>
            <div class="input-group rounded bg-light">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
            </div>
            <router-link class="btn btn-primary ms-auto" to="/backmsgadd">新增按摩項目</router-link>
        </div>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <!-- <th scope="col">☐</th> -->
                    <th scope="col">標題</th>
                    <th scope="col">狀態</th>
                    <th scope="col">修改</th>
                </tr>
            </thead>
            <tbody>
                <tr 
                v-for="backMsg in backMsgList" 
                :key="backMsg">
                    <td>{{ backMsg.MSG_NAME }}</td>
                    <td>
                        <div>
                        <select class="form-select form-select-sm" @change="chlive($event)">
                            <option value='0'>下架</option>
                            <option value='1' selected>上架</option>
                        </select></div>
                    </td>
                    <td>
                        <div>
                            <!-- <img src="../assets/images/Pen.png" alt="修改icon"> -->
                            <router-link to="/backmsgchange" @click="modifyMsg(backMsg.MSG_NAME)">
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
    import {BASE_URL} from '@/assets/js/common.js'

    export default {
        props: {
            backMsg: String
        },
        data() {
            return {
                backMsgList: [],
                allenHandsome:[],
            }
        },
        created(){
            this.getDataFromApi();// 在建立Vue.js模板時順帶執行這個參數
        },
        methods:{
            async getDataFromApi() {
                // var url = 'http://localhost/CGD102_G2/public/api/msg.php'; //開發用
                var url = `${BASE_URL}/msg.php`; //上線用
                let getData = async(url) => {
                    let response = await fetch(url); // await 很重要
                    let JSON =  response.json();
                    this.backMsgList = await JSON; // php抓取回來的資料存取在預設好的參數裡
                }
                await getData(url); // 觸發 getData 的匿名 function 內容
                console.log(this.backMsgList);
            },
              modifyMsg(name){
                // this.axios.get("http://localhost/CGD102_G2/public/api/backMsgGetValue.php",{
                this.axios.get(`${BASE_URL}/backMsgGetValue.php`,{
                    params:{
                        searchName:name
                    }
                })
                .then((res)=>{
                    // console.log(res.data[0].MSG_NAME)
                    this.allenHandsome = res.data
                    this.setStorage()
                })
            },
            setStorage(){
                localStorage.setItem("MSG_NAME",JSON.stringify(this.allenHandsome))
            },
            onlineStorage(){
                let allens = localStorage.getItem("MSG_NAME")
                this.allenHandsome = JSON.parse(allens)
            },
            clear(){
                // let index = this.allenHandsome.findIndex(item=>item.MSG_NAME)
                this.allenHandsome=[]
                this.setStorage()
            },
       
            // chlive(e){
            //     this.backMsgList[0].MSG_STATUS = e.target.value;
            //     let MSG_STATUS = this.backMsgList[0].MSG_STATUS;
            //     let MSG_STATUS = this.backMsgList[0].MSG_STATUS;

            //     console.log(MSG_STATUS);

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

            //     let MSG_data = `account=${MSG_STATUS}&status=${MSG_STATUS}`;
            //     xhr.send(MSG_data);
            //     console.log(MSG_data);
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