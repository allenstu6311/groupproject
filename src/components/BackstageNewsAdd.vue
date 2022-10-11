<template>
    <div class="base_content">
        <h1>新增最新消息</h1>
        <div class="add_content">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <span class="text">日期:</span>
                        <input type="date" class="form-control"  maxlength="50" v-model="NEWS_DATE">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <span class="text">標題:</span>
                        <input type="text" class="form-control"  id="NEWS_TITLE" placeholder="請輸入標題(最多50字)" aria-describedby="basic-addon1" maxlength="50" v-model="NEWS_TITLE">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <span class="text">上傳圖片:</span>
                        <input class="form-control upload" type="file" id="formFile" maxlength="50" :v-model="NEWS_PIC" @change="photo($event)">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <span class="text">內文:</span>
                        <textarea class="form-control"  placeholder="請輸入內文(最多500字)" style="height:60px" v-model="NEWS_TEXT"></textarea>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary me-md-2" @click="submit" type="button">儲存</button>
                <router-link class="btn btn-primary" to="/BackstageNews">取消</router-link>
            </div>
        </div>
    </div>
</template>
<script>
import {BASE_URL} from '@/assets/js/common.js'

export default {
    data(){
        return{
            NEWS_DATE: '',
            NEWS_TITLE: '',
            NEWS_PIC: '',
            NEWS_TEXT: '',
            allenHandsome:[],
        }
    },
    created(){
        
    },
    methods: {
        checkmName(){
            //產生XMLHttpRequest物件
            let xhr = new XMLHttpRequest();

            //註冊callback function
            xhr.onreadystatechange = function () {
            // if (xhr.readyState == 4) { //4代表server端已處理完畢
            if (xhr.readyState == XMLHttpRequest.DONE) { //XMLHttpRequest.DONE==4代表server端已處理完畢
                if (xhr.status == 200) { //200:server端正確執行完畢
                    document.getElementById("?????????").innerText = xhr.responseText;
                } else {
                    alert(xhr.status);
                }
            }
        }

            //設定好所要連結的程式
            //開發用
            let url = "??????????????" + document.getElementById("NEWS_TITLE").value;
            // console.log(url);

            xhr.open("get", url, true);

            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
            //送出資料
            xhr.send(null);
        },

        submit(){
            //產生XMLHttpRequest物件
            let xhr = new XMLHttpRequest();
            
            //註冊callback function
            xhr.onreadystatechange = function(){
                // console.log(xhr.readyState);
            }

            //設定好所要連結的程式
            let url = "http://localhost/CGD102_G2/public/api/BackstageNewsAdd";//開發用
            // let url = `${BASE_URL}/backMsgAdd.php`//上線用
            // xhr.open("post", url, true);
            xhr.open("get", url, true);
            xhr.send(null);



        },
        photo(e){
            this.NEWS_PIC = e.target.files[0].name;
            // console.log(this.msg_pic);
        },
        
    },
}
</script>

<style lang="scss" scoped>
    // @import "bootstrap/scss/bootstrap"; 
    // @import "../assets/style.scss";
    @import "../assets/base/_color.scss"; //有變數要引用的sass


    .base_content{

        h1{
            font-size: 32px;
            text-align: center;
            padding: 0 0 10px;
        }
        .add_content{
            border: 2px solid #ccc;
            box-shadow: 0px 0px 3px 0px #ccc;
            padding: 30px 40px;
            .form-control{
                width: 100%;
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
    }
</style>
