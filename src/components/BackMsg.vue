<template>
    <div class="back_msg">
        <h1>查看按摩項目</h1>
        <div class="laster_selectbar hstack gap-3">
            <div class="input-group bg-light">
                <input 
                    type="search" 
                    class="form-control" 
                    placeholder="搜尋按摩項目" 
                    aria-label="Search" 
                    aria-describedby="search-addon" 
                    v-model="searchMsg"
                    @keydown.enter="search"
                />
                <button 
                    class="btn btn-outline-secondary"
                    type="button"
                    @click="search"
                >
                    <i class="fa fa-search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </i>
                </button>
            </div>
            <!-- <router-link class="btn btn-primary ms-auto" to="/backmsgadd">新增按摩項目</router-link>     -->
            
        </div>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">按摩項目</th>
                    <th scope="col">詳細資訊</th>
                    <!-- <th scope="col">刪除</th> -->
                </tr>
            </thead>
            <tbody>
                <tr 
                v-for="backMsg in backMsgList" 
                :key="backMsg.MSG_NAME">
                    <td>{{ backMsg.MSG_NAME }}</td>
                    <td>
                        <div>
                            <router-link :to="{ path:'/backmsgchange',query:{id:`${backMsg.MSG_ID}`} }" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg>
                            </router-link>
                        </div>
                    </td>
                    <!-- 刪除
                    <td>
                        <a href="">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#0d6efd" data-v-5c299b9d="" @click="deleteMsg(backMsg.MSG_ID)"><path d="M 10 2 L 9 3 L 4 3 L 4 5 L 5 5 L 5 20 C 5 20.522222 5.1913289 21.05461 5.5683594 21.431641 C 5.9453899 21.808671 6.4777778 22 7 22 L 17 22 C 17.522222 22 18.05461 21.808671 18.431641 21.431641 C 18.808671 21.05461 19 20.522222 19 20 L 19 5 L 20 5 L 20 3 L 15 3 L 14 2 L 10 2 z M 7 5 L 17 5 L 17 20 L 7 20 L 7 5 z M 9 7 L 9 18 L 11 18 L 11 7 L 9 7 z M 13 7 L 13 18 L 15 18 L 15 7 L 13 7 z" data-v-5c299b9d=""></path></svg>
                            </div>
                        </a>
                    </td> -->
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
                searchMsg: "",
            }
        },
        created(){
            this.getDataFromApi();// 在建立Vue.js模板時順帶執行這個參數
        },
        methods:{
            async getDataFromApi() {
                // let urlMsg = 'http://localhost/CGD102_G2/public/api/msg.php'; //開發用
                let urlMsg = `${BASE_URL}/msg.php`; //上線用
                let getData = async(urlMsg) => {
                    let response = await fetch(urlMsg); // await 很重要
                    let JSON =  response.json();
                    this.backMsgList = await JSON; // php抓取回來的資料存取在預設好的參數裡
                }
                await getData(urlMsg); // 觸發 getData 的匿名 function 內容
                console.log(this.backMsgList);
            },
            deleteMsg(id){
                console.log(id)
                this.axios.get(`${BASE_URL}/BackstageMsgDelete.php`,{
                    params:{
                        msg_id:id
                    }
                })
            },
            modifyMsg(name){
                // this.axios.get("http://localhost/CGD102_G2/public/api/backMsgGetValue.php",{
                this.axios.get(`${BASE_URL}/backMsgGetValue.php`,{
                    params:{
                        msg_name:name
                    }
                })
                .then((res)=>{
                    // console.log(res.data[0].MSG_NAME)
                    this.msgData = res.data
                    this.setStorage()
                })
            },
            setStorage(){
                localStorage.setItem("MSG_NAME",JSON.stringify(this.msgData))
            },
            onlineStorage(){
                let allens = localStorage.getItem("MSG_NAME")
                this.msgData = JSON.parse(allens)
            },
            clear(){
                // let index = this.msgData.findIndex(item=>item.MSG_NAME)
                this.msgData=[]
                this.setStorage()
            },
            search(){
                let urlSearch = `${BASE_URL}/backMsgSearch.php`; //上線
                this.axios.get(urlSearch, {
                    params:{
                        MSG_NAME: this.searchMsg,
                    }
                }).then((res)=>{
                    this.backMsgList = res.data;
                    console.log("this.backMsgList",this.backMsgList);
                    console.log("this.data",this.data);
                })
            },
        },
        watch: {
            searchMsg: {
                handler(newVal){
                    if(!newVal){
                        this.data = this.backMsgList;
                        console.log("this.data:",this.data);
                    }
                },
                deep: true
            },
        }
    }
</script>

<style lang="scss" scoped>
    @import "../assets/base/_color.scss"; //有變數要引用的sass

        .back_msg{
        h1{
            font-size: 32px;
            text-align: center;
            padding: 0 0 10px;
        }
        .bg-light:focus{
            box-shadow: 0 0 1px 1px $blue;
        }
        .form-control:focus{
            box-shadow: 0 0 1px 1px $blue;
        }
        .btn{
            border: 1px solid #ccc;
        }
        .laster_selectbar{
            display: flex;
            .form-select{
                width: 15%;
                line-height: 2;
            }
            .therapist_status{
                width: 8%;
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
                width: 14%;
                // text-align: center;
                margin-left: 12%;
                background-color: transparent;
                border: none;
                cursor: pointer;
                &:focus{
                    box-shadow: 0 0 0 1px $blue;
                }
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