<template>
    <div class="laster_therapist">
        <h1>管理常見問題</h1>
        <div class="laster_selectbar hstack gap-3">
            <select class="form-select form-select-sm bg-light" aria-label=".form-select-sm example">
                <option selected>依編號排序</option>
            </select>
            <router-link class="btn btn-primary ms-auto" to="/BackstageFAQAdd">新增常見問題</router-link>
        </div>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="co1">編號</th>
                    <th scope="col">標題</th>
                    <th scope="col">修改</th>
                    <th scope="col">刪除</th>
                </tr>
            </thead>
            <tbody>
                <tr  v-for="(faq, index) in faqCardList" :key="index">
                    <td>{{faq.FAQ_ID}}</td>
                    <td>{{faq.FAQ_TITLE}}</td>
                    <td>
                        <router-link 
                        :to="{path:'/BackstageFAQModify',query:{
                                    id:`${faq.FAQ_ID}`,
                                    title:`${faq.FAQ_TITLE}`,
                                    text:`${faq.FAQ_TEXT}`,
                                    }}">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                    <path d="M16 5l3 3"></path>
                                </svg>
                            </div>
                        </router-link>
                    </td>
                    <td>
                        <a href="">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#0d6efd" data-v-5c299b9d="" @click="deleteFAQ(faq.FAQ_ID)"><path d="M 10 2 L 9 3 L 4 3 L 4 5 L 5 5 L 5 20 C 5 20.522222 5.1913289 21.05461 5.5683594 21.431641 C 5.9453899 21.808671 6.4777778 22 7 22 L 17 22 C 17.522222 22 18.05461 21.808671 18.431641 21.431641 C 18.808671 21.05461 19 20.522222 19 20 L 19 5 L 20 5 L 20 3 L 15 3 L 14 2 L 10 2 z M 7 5 L 17 5 L 17 20 L 7 20 L 7 5 z M 9 7 L 9 18 L 11 18 L 11 7 L 9 7 z M 13 7 L 13 18 L 15 18 L 15 7 L 13 7 z" data-v-5c299b9d=""></path></svg>
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
    // const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..';

    export default {
        props: {
            faq: String
        },
        data() {
            return {
                faqCardList: [],
            }
        },
        created(){
            this.getDataFromApi(); // 在建立 Vue.js 模板時順帶執行這個參數
        },
        methods:{
            async getDataFromApi() {
                // var url = 'http://localhost/CGD102_G2/public/api/FAQContent.php' //開發用
                const url = `${BASE_URL}/FAQContent.php` //上線用
                let getData = async(url) => {
                    let response = await fetch(url); // await: 這行的 await 執行完才會執行下一個 await
                    let JSON =  response.json();
                    this.faqCardList = await JSON; // php 抓取回來的資料存取在預設好的參數裡
                }
                await getData(url); // 觸發 getData 的匿名 function 內容 ==> 89 ~ 91 行的內容
                // console.log(this.faqCardList);
            },
            deleteFAQ(id){
                console.log(id)
                this.axios.get(`${BASE_URL}/BackstageFAQDelete.php`,{
                    params:{
                        faq_id:id
                    }
                })
            },  
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
            .form-select{
                width: 42%;
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
