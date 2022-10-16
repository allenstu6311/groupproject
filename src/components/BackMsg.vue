<template>
    <div class="laster_therapist">
        <h1>查看按摩項目</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">按摩項目</th>
                    <th scope="col">詳細資訊</th>
                </tr>
            </thead>
            <tbody>
                <tr 
                v-for="backMsg in backMsgList" 
                :key="backMsg">
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
              modifyMsg(name){
                // this.axios.get("http://localhost/CGD102_G2/public/api/backMsgGetValue.php",{
                this.axios.get(`${BASE_URL}/backMsgGetValue.php`,{
                    params:{
                        msg_name:name
                    }
                })
                .then((res)=>{
                    console.log(res.data[0].MSG_NAME)
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