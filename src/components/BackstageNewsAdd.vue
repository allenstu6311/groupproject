<template>
    <div class="base_content">
        <h1>新增最新消息</h1>
        <div class="add_content">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <span class="text">編號:</span>
                        <input type="text" class="form-control"   maxlength="20" v-model="NEWS_ID" disabled>
                    </div>
                </div>
            </div>
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
// import "bootstrap/scss/bootstrap.scss";
    import {BASE_URL} from '@/assets/js/common.js'
// const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..';

export default {
    name: 'NewsAdd',
    data(){
        return{
            NEWS_ID: '',
            NEWS_DATE: '',
            NEWS_TITLE: '',
            NEWS_TEXT: '',
            NEWS_PIC: '',
        }
    },
    methods: {
        submit(){
        
            var xhr = new XMLHttpRequest();
            
            xhr.onload = function(){
                if(xhr.status == 200){
                    if(xhr.responseText == "新增成功"){
                        alert("新增成功");
                        // window.location.replace("/BackstageNews"); //開發用
                        window.location.replace("/cgd102/g2/BackstageNews"); //上線用
                    }else if(xhr.responseText == "新增失敗"){
                        alert("新增失敗");
                    }
                }
            }
            // xhr.open("post","http://localhost/CGD102_G2/public/api/backtherapistadd.php", true); //開發用
            xhr.open("post",`${BASE_URL}/BackstageNewsAdd.php`, true); //上線用
            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");

            let news_data = `NEWS_ID=${this.NEWS_ID}&NEWS_DATE=${this.NEWS_DATE}&NEWS_TITLE=${this.NEWS_TITLE}&NEWS_TEXT=${this.NEWS_TEXT}&NEWS_PIC=${this.NEWS_PIC}`;
            xhr.send(news_data);
            console.log(news_data);

        },
        photo(e){
            this.NEWS_PIC = e.target.files[0].name;
            console.log(this.NEWS_PIC);
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
