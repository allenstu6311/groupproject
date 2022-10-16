<template>
    <div class="msg_change">
        <h1>查看按摩項目</h1>
        <section class="add_content" v-for="item in msgList" :key="item.MSG_ID">
            <div class="row">
                <div class="col">
                    <div class="input-group fixwidth mb-3">
                        <span class="input-group-text">按摩項目名稱</span>
                        <input type="text" class="form-control" placeholder="按摩項目名稱" maxlength="10" 
                        v-model="item.MSG_NAME" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text">按摩簡述</span>
                        <!-- <input type="text" class="form-control" maxlength="50" v-model="MSG_INTRO"> -->
                        <textarea type="text" class="form-control"  placeholder="請輸入內文(最多100字)" style="height:100px" v-model="item.MSG_INTRO" disabled></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text">60分鐘 NT$</span>
                        <input type="text" class="form-control" maxlength="50" v-model="item.MSG_PRICE_2" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text">60分鐘推薦客群</span>
                        <input type="text" class="form-control" maxlength="50" v-model="item.MSG_REC_2" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text">按摩描述</span>
                        <textarea type="text" class="form-control"  placeholder="內文(最多500字)" style="height:250px" v-model="item.MSG_DESC" disabled></textarea>
                    </div>
                </div>

            </div>
            <div class="row">
                <!-- <div class="col">

                    <div class="mb-3">
                        <label for="formFile" class="form-label">按摩項目圖片上傳</label>
                        <input
                        class="form-control upload"
                        type="file"
                        id="formFile"
                        maxlength="50"
                        :v-model="msg_pic"
                        @change="photo($event)"
                        />
                    </div>
                </div> -->
                <div class="col">
                    <figcaption class="figure-caption">按摩項目圖片預覽</figcaption>
                    <figure class="figure">
                        <img
                        :src="require(`@/assets/images/${item.MSG_PIC}`)"
                        class="figure-img img-fluid rounded"
                        id="getfile"
                        alt="預覽圖片"
                        maxlength="50"
                        />
                    </figure>
                </div>
                <!-- <div class="col">
                    <figure class="figure">
                        <figcaption class="figure-caption">預覽圖片</figcaption>
                        <img src="../assets/images/resv1.jpg" class="figure-img img-fluid rounded" alt="預覽圖片" maxlength="50">
                    </figure>
                </div> -->
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <!-- <button class="btn btn-primary me-md-2" @click="submit" type="button">儲存</button> -->
                <router-link class="btn btn-primary" to="/backmsg">返回</router-link>
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
            MSG_ID:'',
            MSG_NAME:'',
            MSG_INTRO:'',
            MSG_PRICE_2:'',
            MSG_REC_2:'',
            MSG_DESC:'',
            MSG_PIC:'',
            msg_id: '',
            msg_name: '',
            msg_intro: '',
            msg_price_1: '',
            msg_rec_1: '',
            msg_price_2: '',
            msg_rec_2: '',
            msg_desc: '',
            msg_pic: '',
            msgList:[],
        }
    },
    created(){
        // this.onlineStorage()
        console.log("test",this.$route.query.id)
        const urlGetMsg = `${BASE_URL}/backMsgGetValue.php`
        // const urlGetMsg = "http://localhost/CGD102_G2/public/api/backMsgGetValue.php"
        this.axios.get(urlGetMsg,{
            params:{
                msg_id:this.$route.query.id
                // NAME:this.name,
                // data:this.valuetime
            }
        })
        .then((res)=>{
            this.msgList = res.data
            // console.log("res", this.msgList)

            // this.msg_id = this.$route.query.msg_id;
            // this.msg_name = this.$route.query.msg_name;
            // console.log("msg_id",this.msg_id);
            // console.log("msg_name",this.msg_name);
        })
        
    },
    mounted(){
        this.MSG_ID = this.$route.query.msg_id
        this.MSG_NAME = this.$route.query.name
        this.MSG_INTRO = this.$route.query.intro
    },
    methods: {
        submit(){
            var xhr = new XMLHttpRequest();
            
            xhr.onload = function(){
                if(xhr.status == 200){
                    if(xhr.responseText == "修改完成"){
                        alert("修改完成");
                        window.location.replace("/backmsg"); //開發用
                        // window.location.replace("/cgd102/g2/backmsg"); //上線用
                    }else if(xhr.responseText == "修改失敗"){
                        alert("修改失敗");
                    }
                }
            }
            // xhr.open("post","http://localhost/CGD102_G2/public/api/backMsgChange.php", true); //開發用
            xhr.open("post",`${BASE_URL}/backMsgChange.php`, true); //上線用
            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");


            let msg_data = `MSG_ID=${this.msg_id}&MSG_NAME=${this.msg_name}&MSG_INTRO=${this.msg_intro}&MSG_PRICE_2=${this.msg_price_2}&MSG_REC_2=${this.msg_rec_2}&MSG_DESC=${this.msg_desc}&MSG_PIC=${this.msg_pic}`;
            //送出資料
            xhr.send(msg_data);
            console.log(msg_data);


        },
        photo(e){
            this.msg_pic = e.target.files[0].name;
            // console.log(this.msg_pic);
            this.picShow = e.target.files[0];
            let reader = new FileReader();
            reader.onload = function(){
                document.getElementById("getfile").src = reader.result;
                console.log("test", document.getElementById("getfile").src)
            };
            reader.readAsDataURL(this.picShow);
        },
    },
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