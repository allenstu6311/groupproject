<template>
  <div class="laster_therapist">
    <h1>修改資訊</h1>
    <section class="add_content">
      <div class="row">
        <div class="col">
          <div class="input-group fixwidth mb-3">
            <span class="input-group-text" id="basic-addon1">姓名</span>
            <input
              type="text"
              class="form-control"
              placeholder="師傅"
              aria-label="Username"
              aria-describedby="basic-addon1"
              maxlength="10"
              v-model="name"
            />
          </div>
        </div>
        <div class="col">
          <div class="input-group fixwidth mb-3">
            <span class="input-group-text" id="basic-addon1">帳號</span>
            <input
              type="text"
              class="form-control"
              placeholder=""
              aria-label="account"
              aria-describedby="basic-addon1"
              maxlength="10"
              v-model="account"
              disabled
            />
          </div>
        </div>
        <div class="col">
          <div class="input-group fixwidth mb-3">
            <span class="input-group-text" id="basic-addon1">密碼</span>
            <input
              type="text"
              class="form-control"
              placeholder=""
              aria-label="password"
              aria-describedby="basic-addon1"
              maxlength="10"
              v-model="password"
            />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">證照一</span>
            <input
              type="text"
              class="form-control"
              aria-describedby="basic-addon1"
              maxlength="50"
              v-model="license1"
            />
          </div>
        </div>
        <div class="col">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">證照二</span>
            <input
              type="text"
              class="form-control"
              aria-describedby="basic-addon1"
              maxlength="50"
              v-model="license2"
            />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">證照三</span>
            <input
              type="text"
              class="form-control"
              aria-describedby="basic-addon1"
              maxlength="50"
              v-model="license3"
            />
          </div>
        </div>
        <div class="col">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">證照四</span>
            <input
              type="text"
              class="form-control"
              aria-describedby="basic-addon1"
              maxlength="50"
              v-model="license4"
            />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">入職日期</span>
            <input
              type="date"
              class="form-control"
              aria-describedby="basic-addon1"
              maxlength="50"
              v-model="hiredate"
            />
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">頭像上傳</label>
            <input
              class="form-control upload"
              type="file"
              id="formFile"
              maxlength="50"
              :v-model="pic"
              @change="photo($event)"
            />
          </div>
        </div>
        <div class="col">
          <figcaption class="figure-caption">預覽圖片</figcaption>
          <figure class="figure">
            <img
              src=""
              class="figure-img img-fluid rounded"
              id="getfile"
              alt="預覽圖片"
              maxlength="50"
            />
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
// const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..';

export default {
  name: "therapistchangeinfo",
  data() {
    return {
      backstageTherapsitList: [],
      name: "",
      account: "",
      password: "",
      license1: "",
      license2: "",
      license3: "",
      license4: "",
      hiredate: "",
      pic: "",
      pswtip: "*",
      pswclass: "error",
      pswflag: false,
    }
  },
  mounted() {
    this.getInfo();
  },
  methods: {
        getInfo() {
            this.axios.get(`${BASE_URL}/backtherapistgetvalue.php`,{
                params: {
                    searchName: this.$route.query.name,
                }
            })
            .then((res) => {
                // this.backstageTherapsitList = res.data
                // this.name = this.$route.query;
                this.name = this.$route.query.name;
                this.account = this.$route.query.account;
                this.password = this.$route.query.password;
                this.license1 = this.$route.query.license1;
                this.license2 = this.$route.query.license2;
                this.license3 = this.$route.query.license3;
                this.license4 = this.$route.query.license4;
                this.hiredate = this.$route.query.hiredate;
                // this.pic = this.$route.query.pic;
            })
        },
        submit(){

            var xhr = new XMLHttpRequest();

            xhr.onload = function(){
                if(xhr.status == 200){
                  // console.log(xhr.responseText);
                    if(xhr.responseText == "修改成功"){
                        alert("修改成功");
                        window.location.replace("/backtherapist");
                    }else if(xhr.responseText == "修改失敗"){
                        alert("修改失敗");
                    }
                }
            }
            // xhr.open("post","http://localhost/CGD102_G2/public/api/backtherapistchangeinfo.php", true); //開發用
            xhr.open("post",`${BASE_URL}/backtherapistchangeinfo.php`, true); //上線用
            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");

            let therapist_data = `license1=${this.license1}&license2=${this.license2}&license3=${this.license3}&license4=${this.license4}&account=${this.account}&password=${this.password}&name=${this.name}&hiredate=${this.hiredate}&pic=${this.pic}`;
            xhr.send(therapist_data);
            console.log(therapist_data);
        },
        photo(e) {
            this.pic = e.target.files[0].name;
            // console.log(this.pic);
            this.picShow = e.target.files[0];
            let reader = new FileReader();
            reader.onload = function () {
                document.getElementById("getfile").src = reader.result; 
                // this.test = reader.result
                console.log("test",document.getElementById("getfile").src)
            };
            reader.readAsDataURL(this.picShow);
        },
        checkContentByReg(reg, content, tip, classname) {
            if (reg.test(content)) {
                this[tip] = "V";
                this[classname] = "success";
                return true;
            } else {
                this[tip] = "請檢查格式";
                this[classname] = "error";
                return false;
            }
        }
    },
    watch: {
        password: function (content) {
            var reg = /^[0-9a-z]{6,10}$/;
            this.pswflag = this.checkContentByReg(reg, content, "pswtip", "pswclass");
        }
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
                width: 180px;
                height: 180px;
                overflow: hidden;
                img{
                    width: 100%;
                }
            }
        }
    }
</style>
