<template>
    <div class="msg_add">
        <h1>新增按摩項目</h1>
        <section class="add_content">
            <div class="row">
                <div class="col">
                    <div class="input-group fixwidth mb-3">
                        <span class="input-group-text">按摩項目名稱</span>
                        <input type="text" class="form-control" placeholder="按摩項目名稱" maxlength="10" v-model="msg_name" id="msg_name">
                    </div>
                </div>
                <div class="col">
                    <input type="button" id="btnCheckmName" @click="checkmName" value="檢查按摩項目名稱是否可用"><span id="idMsg"></span>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text">按摩簡述</span>
                        <input type="text" class="form-control" maxlength="50" v-model="msg_intro">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text">60分鐘 NT$</span>
                        <input type="text" class="form-control" maxlength="50" v-model="msg_price_2">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text">60分鐘推薦客群</span>
                        <input type="text" class="form-control" maxlength="50" v-model="msg_rec_2">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text">按摩描述</span>
                        <input type="text" class="form-control" maxlength="50" v-model="msg_desc">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text">注意事項</span>
                        <input type="text" class="form-control" maxlength="50" v-model="msg_notice">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text">常見問題</span>
                        <input type="text" class="form-control" maxlength="50" v-model="msg_faq">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">按摩項目圖片上傳</label>
                        <input class="form-control upload" type="file" id="formFile" maxlength="50" :v-model="msg_pic" @change="photo($event)">
                    </div>
                </div>
                <div class="col">
                    <figcaption class="figure-caption">預覽圖片</figcaption>
                    <figure class="figure">
                        <img src="" class="figure-img img-fluid rounded" id="getfile" alt="預覽圖片" maxlength="50">
                    </figure>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary me-md-2" @click="submit" type="button">儲存</button>
                <router-link class="btn btn-primary" to="/backmsg">取消</router-link>
            </div>
        </section>
    </div>
</template>

<script>
import {BASE_URL} from '@/assets/js/common.js'

export default {
    data(){
        return{
            text: '',
            backMsgList: [],
            msg_name: '',
            msg_intro: '',
            msg_price_1: '',
            msg_timespan_1: '120',
            msg_rec_1: '',
            msg_price_2: '',
            msg_timespan_2: '60',
            msg_rec_2: '',
            msg_desc: '',
            msg_notice: '',
            msg_faq: '',
            msg_pic: '',
            data: [],
        }
    },
    created(){
        // this.onlineStorage()
        
    },
    mounted(){

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
                        document.getElementById("idMsg").innerText = xhr.responseText;
                    } else {
                        alert(xhr.status);
                    }
                }
            }

            //設定好所要連結的程式
            //開發用
            let urlBackMsgAddCheckName = `${BASE_URL}/backMsgAddCheckName.php?MSG_NAME=` + document.getElementById("msg_name").value;
            // console.log(urlBackMsgAddCheckName);

            xhr.open("get", urlBackMsgAddCheckName, true);

            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
            //送出資料
            xhr.send(null);
        },

        // submit(){
        //     //產生XMLHttpRequest物件

        //     var xhr = new XMLHttpRequest();
            
        //     xhr.onload = function(){
        //         if(xhr.status == 200){
        //             console.log(xhr.responseText);
        //             if(xhr.responseText){
        //                 alert("按摩項目已建立");
        //                 window.location.replace("/backmsg"); //開發用
        //                 // window.location.replace("/cgd102/g2/backmsg"); //上線用
        //             }else if(xhr.responseText == "無法建立按摩項目"){
        //                 alert("無法建立按摩項目");
        //             }
        //         }
        //     }

        //     //設定好所要連結的程式
        //     let urlBackMagAdd = "http://localhost/CGD102_G2/public/api/backMsgAdd.php";//開發用
        //     // let urlBackMagAdd = `${BASE_URL}/backMsgAdd.php`//上線用
        //     xhr.open("post", urlBackMagAdd, true);
        //     let msg_data = `msg_name=${this.msg_name}&msg_intro=${this.msg_intro}&msg_price_2=${this.msg_price_2}&msg_rec_2=${this.msg_rec_2}&msg_desc=${this.msg_desc}&msg_notice=${this.msg_notice}&msg_faq=${this.msg_faq}&msg_pic=${this.msg_pic}&msg_timespan_1=${this.msg_timespan_1}&msg_timespan_2=${this.msg_timespan_2}`;
        //     console.log(msg_data);
        //     xhr.send(msg_data);
        // },
        submit(){
            // let urlBackMagAdd = "http://localhost/CGD102_G2/public/api/backMsgAdd.php";//開發用
            let urlBackMagAdd = `${BASE_URL}/backMsgAdd.php`//上線用
            this.axios.get(urlBackMagAdd, {
                params: {
                    msg_name: this.msg_name,
                    msg_intro: this.msg_intro,
                    msg_price_2: this.msg_price_2,
                    msg_rec_2: this.msg_rec_2,
                    msg_desc: this.msg_desc,
                    msg_notice:this.msg_notice,
                    msg_faq:this.msg_faq,
                    msg_pic:this.msg_pic,
                    msg_timespan_1:this.msg_timespan_1,
                    msg_timespan_2:this.msg_timespan_2
                }
            }).then((res) => {
                this.data = res.data
                console.log("data",this.data)
                console.log("res.data",res.data)
                // window.location.replace("/backmsg")
                window.location.replace("/cgd102/g2/backmsg"); //上線用

            })
        },
        photo(e){
            this.msg_pic = e.target.files[0].name;
            console.log(this.msg_pic);
            this.picShow = e.target.files[0];
            let reader = new FileReader();
            reader.onload = function () {
                document.getElementById("getfile").src = reader.result; 
                this.test = reader.result
                console.log("test",document.getElementById("getfile").src)
            };
            reader.readAsDataURL(this.picShow);
        },
    },
    watch: {
    }
}
</script>

<style lang="scss" scoped>
    @import "@/assets/base/_color.scss";

    .msg_add{
        h1{
            font-size: 32px;
            text-align: center;
            padding: 0 0 10px;
        }
        .add_content{
            border: 2px solid #ccc;
            box-shadow: 0px 0px 3px 0px #ccc;
            padding: 30px 40px;
            .fixwidth{
                width: 100%;
            }
            .form-control{
                width: 50%;
            }
            .upload{
                width: 90%;
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
            .figure{
                width: 200px;
                height: 200px;
                overflow: hidden;
                img{
                    width: 100%;
                }
            }
        }
    }
</style>