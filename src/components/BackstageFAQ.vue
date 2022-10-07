<template>
    <div class="laster_therapist">
        <h1>管理常見問題</h1>
        <div class="laster_selectbar hstack gap-3">
            <select class="form-select form-select-sm bg-light" aria-label=".form-select-sm example">
                <option selected>上架中的問題</option>
                <option value="1">已下架的問題</option>
            </select>
            <div class="input-group rounded bg-light">
                <input type="search" class="form-control rounded" placeholder="搜尋關鍵字" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
            </div>
            <router-link class="btn btn-primary ms-auto" to="/XXXXX">新增常見問題</router-link>
        </div>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="co1">編號</th>
                    <th scope="col">標題</th>
                    <th scope="col">狀態</th>
                    <th scope="col">修改</th>
                    <th scope="col">刪除</th>
                </tr>
            </thead>
            <tbody>
                <tr  v-for="(faq, index) in faqCardList" :key="index">
                    <td>{{faq.FAQ_ID}}</td>
                    <td>{{faq.FAQ_TITLE}}</td>
                    <td>上架中</td>
                    <td>修改</td>
                    <td>刪除</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..';

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
                var url = 'http://localhost/CGD102_G2/public/api/FAQContent.php' //開發用
                // var url = `${BASE_URL}/api/FAQContent.php` //上線用
                let getData = async(url) => {
                    let response = await fetch(url); // await: 這行的 await 執行完才會執行下一個 await
                    let JSON =  response.json();
                    this.faqCardList = await JSON; // php 抓取回來的資料存取在預設好的參數裡
                }
                await getData(url); // 觸發 getData 的匿名 function 內容 ==> 89 ~ 91 行的內容
                console.log(this.faqCardList);
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "bootstrap/scss/bootstrap";
    @import "../assets/style.scss";

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
                width: 30%;
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
