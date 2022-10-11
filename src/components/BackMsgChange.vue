<template>
    <div class="msg_change">
        <h1>修改按摩項目</h1>
        <section class="add_content">
            <div class="row">
                <div class="col">
                    <div class="input-group fixwidth mb-3">
                        <span class="input-group-text">按摩項目名稱</span>
                        <input type="text" class="form-control" placeholder="按摩項目名稱" maxlength="10" v-model="msg_name">
                    </div>
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
                        <span class="input-group-text">120分鐘 NT$</span>
                        <input type="text" class="form-control" maxlength="50" v-model="msg_price_1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text">120分鐘推薦客群</span>
                        <input type="text" class="form-control" maxlength="50" v-model="msg_rec_1">
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
                    <div class="mb-3">
                        <label for="formFile" class="form-label">按摩項目圖片上傳</label>
                        <input class="form-control upload" type="file" id="formFile" maxlength="50" :v-model="msg_pic" @change="photo($event)">
                    </div>
                </div>
                <div class="col">
                    <figure class="figure">
                        <figcaption class="figure-caption">預覽圖片</figcaption>
                        <img src="../assets/images/resv1.jpg" class="figure-img img-fluid rounded" alt="預覽圖片" maxlength="50">
                    </figure>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary me-md-2" @click="submit" type="button">儲存</button>
                <router-link class="btn btn-primary" to="/backtherapist">取消</router-link>
            </div>
        </section>
    </div>
</template>

<script>
import {BASE_URL} from '@/assets/js/common.js'

export default {
    name: 'BackMsgChange',
    data(){
        return{
            backMsgList: [],
            msg_name: '',
            msg_intro: '',
            msg_price_1: '',
            msg_rec_1: '',
            msg_price_2: '',
            msg_rec_2: '',
            msg_desc: '',
            msg_pic: '',
            pswtip: "*",
            pswclass: "error",
            pswflag: false,
            allenHandsome:[],
        }
    },
    created(){
        // this.onlineStorage()
        
    },
    mounted(){

    },
    methods: {
        submit(){
        
            var xhr = new XMLHttpRequest();
            
            xhr.onload = function(){
                if(xhr.status == 200){
                    if(xhr.responseText == "修改完成"){
                        alert("修改完成");
                        window.location.replace("/backmsg");
                    }else if(xhr.responseText == "修改失敗"){
                        alert("修改失敗");
                    }
                }
            }
            xhr.open("post","http://localhost/CGD102_G2/public/api/backMsgChange.php", true); //開發用
            // xhr.open("post",`${BASE_URL}/backMsgChange.php`, true); //上線用
            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");


            let msg_data = `MSG_NAME=${this.msg_name}&MSG_INTRO=${this.msg_intro}&MSG_PRICE_1=${this.msg_price_1}&MSG_REC_1=${this.msg_rec_1}&MSG_PRICE_2=${this.msg_price_2}&MSG_REC_2=${this.msg_rec_2}&MSG_DESC=${this.msg_desc}&MSG_PIC=${this.msg_pic}`;
            //送出資料
            xhr.send(msg_data);


        },
        photo(e){
            this.msg_pic = e.target.files[0].name;
            // console.log(this.msg_pic);
        },
        checkContentByReg(reg, content, tip, classname) {
            if (reg.test(content)) {
                this[tip] = "V"
                this[classname] = "success"
                return true
            } else {
                this[tip] = "請檢查格式"
                this[classname] = "error"
                return false
            }
        },
        // onlineStorage(){
        //         let allens = localStorage.getItem("THERAPIST_NAME")
        //         this.allenHandsome = JSON.parse(allens)
        //         // alert(this.allenHandsome)
                
        //         this.$nextTick=()=>{
        //             this.getInfo()
        //         }
        //         console.log("俊彥大帥哥",this.allenHandsome)
                
        // },
        // getInfo(){
            
        //     // this.axios.get("http://localhost/CGD102_G2/public/api/backtherapistgetvalue.php",{
        //     this.axios.get(`${BASE_URL}/backtherapistgetvalue.php`,{
        //         params:{
        //             searchName:this.allenHandsome[0].THERAPIST_NAME
        //         }
        //     })
        //     .then((res)=>{
        //         console.log("俊彥率倒吊渣",res)
        //         // this.backMsgList = res.data
        //         this.name =this.allenHandsome[0].THERAPIST_NAME
        //     })  
        // },
    },
    watch: {
        password: function (content) {
            var reg = /^[0-9a-z]{6,10}$/;
            this.pswflag = this.checkContentByReg(reg, content, "pswtip", "pswclass")
        }
    }
}
</script>

<style lang="scss" scoped>
    @import "@/assets/base/_color.scss";

    .msg_change{
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