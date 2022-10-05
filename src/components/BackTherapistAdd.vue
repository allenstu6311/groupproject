<template>
    <div class="laster_therapist">
        <h1>新增按摩師</h1>
        <div class="add_content">
            <div class="row">
                <div class="col">
                    <div class="input-group fixwidth mb-3">
                        <span class="input-group-text" id="basic-addon1">姓名</span>
                        <input type="text" class="form-control" placeholder="師傅" aria-label="Username" aria-describedby="basic-addon1" maxlength="10" v-model="name">
                    </div>
                </div>
                <div class="col">
                    <div class="input-group fixwidth mb-3">
                        <span class="input-group-text" id="basic-addon1">帳號</span>
                        <input type="text" class="form-control" placeholder="" aria-label="account" aria-describedby="basic-addon1" maxlength="10" v-model="account">
                    </div>
                </div>
                <div class="col">
                    <div class="input-group fixwidth mb-3">
                        <span class="input-group-text" id="basic-addon1">密碼</span>
                        <input type="text" class="form-control" placeholder="" aria-label="password" aria-describedby="basic-addon1" maxlength="10" v-model="password">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">證照一</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" maxlength="50" v-model="license1">
                    </div>
                </div>
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">證照二</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" maxlength="50" v-model="license2">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">證照三</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" maxlength="50" v-model="license3">
                    </div>
                </div>
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">證照四</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" maxlength="50" v-model="license4">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">入職日期</span>
                        <input type="date" class="form-control" aria-describedby="basic-addon1" maxlength="50" v-model="hiredate">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">頭像上傳</label>
                        <input class="form-control upload" type="file" id="formFile" maxlength="50" :v-model="pic">
                    </div>
                </div>
                <div class="col">
                    <figure class="figure">
                        <figcaption class="figure-caption">預覽圖片</figcaption>
                        <img src="../assets/images/masseusePic1.jpg" class="figure-img img-fluid rounded" alt="預覽圖片" maxlength="50">
                    </figure>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary me-md-2" type="button" @click="submit">儲存</button>
                <router-link class="btn btn-primary" to="/backtherapist">取消</router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'therapistadd',
    data(){
        return{
            name: '',
            account: '',
            password: '',
            license1: '',
            license2: '',
            license3: '',
            license4: '',
            hiredate: '',
            pic: '',
            pswtip: "*",
            pswclass: "error",
            pswflag: false,
        }
    },
    methods: {
        submit(){
            var xhr = new XMLHttpRequest();

            xhr.onload = function(){
                if(xhr.status == 200){
                    if(xhr.responseText == "帳號已建立"){
                        alert("帳號已建立");
                        window.location.replace("/backtherapistadd");
                    }else if(xhr.responseText == "無法建立帳號"){
                        alert("無法建立帳號");
                    }
                }
            }

            xhr.open("post","http://localhost/CGD102_G2/src/assets/phps/backtherapistadd.php", true);
            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");

            let therapist_data = `license1=${this.license1}&license2=${this.license2}&license3=${this.license3}&license4=${this.license4}&account=${this.account}&password=${this.password}&name=${this.name}&hiredate=${this.hiredate}&pic=${this.pic}`;
            xhr.send(therapist_data);
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
        }
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
    @import "bootstrap/scss/bootstrap";
    @import "../assets/style.scss";

    .laster_therapist{
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