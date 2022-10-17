<template>
    <div class="laster_therapist">
        <h1>修改折價券</h1>
        <section class="add_content">
            <div class="row">
                <div class="col">
                    <div class="input-group fixwidth mb-3">
                        <span class="input-group-text" id="basic-addon1">折價券代碼</span>
                        <input type="text" class="form-control" placeholder="" aria-label="id" aria-describedby="basic-addon1" disabled maxlength="10" v-model="id">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group fixwidth mb-3">
                        <span class="input-group-text" id="basic-addon1">折價券名稱</span>
                        <input type="text" class="form-control" placeholder="" aria-label="name" aria-describedby="basic-addon1" maxlength="10" v-model="name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group fixwidth mb-3">
                        <span class="input-group-text" id="basic-addon1">折價券折扣</span>
                        <input type="text" class="form-control" placeholder="" aria-label="discount" aria-describedby="basic-addon1" maxlength="10" v-model="discount">
                    </div>
                </div>
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary me-md-2" @click="submit" type="button">儲存</button>
                <router-link class="btn btn-primary" to="/BackCoupon">取消</router-link>
            </div>
        </section>
    </div>
</template>

<script>
// import "bootstrap/scss/bootstrap.scss";
    import {BASE_URL} from '@/assets/js/common.js'
// const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..';

export default {
    name: 'couponchangeinfo',
    data(){
        return{
            backstageCouponList: [],
            id:'',
            name: '',
            discount:''

        }
    },
    mounted() {
    this.getInfo();
    },
    methods: {
        getInfo() {
            this.axios.get(`${BASE_URL}/backCoupongetvalue.php`,{
                params: {
                    searchName: this.$route.query.name,
                }
            })
            .then((res) => {
                // this.backstageTherapsitList = res.data
                // this.name = this.$route.query;
                this.id = this.$route.query.id;
                this.name = this.$route.query.name;
                this.discount = this.$route.query.discount;
            })
        },
        submit(){
        
            var xhr = new XMLHttpRequest();
            
            xhr.onload = function(){
                if(xhr.status == 200){
                  // console.log(xhr.responseText);
                    if(xhr.responseText == "修改成功"){
                        alert("修改成功");
                        
                        // window.location.replace("/BackCoupon"); //開發用
                        window.location.replace("/cgd102/g2/BackCoupon"); //上線用
                    }else if(xhr.responseText == "修改失敗"){
                        alert("修改失敗");
                    }
                }
            }
            // xhr.open("post","http://localhost/CGD102_G2/public/api/backcouponadd.php", true); //開發用
            xhr.open("post",`${BASE_URL}/backCouponchangeinfo.php`, true); //上線用
            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");

            let coupon_data = `id=${this.id}&name=${this.name}&discount=${this.discount}`;
            xhr.send(coupon_data);
            console.log(coupon_data);

        },
        // checkContentByReg(reg, content, tip, classname) {
        //     if (reg.test(content)) {
        //         this[tip] = "V"
        //         this[classname] = "success"
        //         return true
        //     } else {
        //         this[tip] = "請檢查格式"
        //         this[classname] = "error"
        //         return false
        //     }
        // }
    },
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