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
            <button class="btn btn-primary ms-auto" type="button">新增按摩師</button>
        </div>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">姓名</th>
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
                    <td>{{ backstageTherapsit.THERAPIST_HIREDATE }}</td>
                    <td>
                        <div>
                        <select class="form-select form-select-sm">
                            <option selected>在職</option>
                            <option value="1">離職</option>
                        </select></div>
                    </td>
                    <td>
                        <div>
                            <img src="../assets/images/Pen.png" alt="修改icon">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: {
            backstageTherapsit: String
        },
        data() {
            return {
                backstageTherapsitList: []
            }
        },
        created(){
            this.getDataFromApi(); // 在建立Vue.js模板時順帶執行這個參數
        },
        methods:{
            async getDataFromApi() {
                var url = 'http://localhost/CGD102_G2/src/assets/phps/therapistContent.php'
                let getData = async(url) => {
                    let response = await fetch(url); // await 很重要
                    let JSON =  response.json();
                    this.backstageTherapsitList = await JSON; // php抓取回來的資料存取在預設好的參數裡
                }
                await getData(url); // 觸發 getData 的匿名 function 內容 ==> 76 ~ 78 行的內容
                console.log(this.backstageTherapsitList);
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
                background-color: $white;
                color: $blue;
                font-weight: 600;
                &:hover{
                    background-color: #eee;
                }
            }
        }
        .table{
            text-align: center;
            table-layout:fixed;
            .form-select{
                width: 30%;
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