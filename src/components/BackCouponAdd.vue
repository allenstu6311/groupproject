<template>
    <div class="back_coupons_add">
        <h1>新增折價券</h1>
        <div class="add_content">
            <div class="input-group fixwidth mb-3">
                <span class="input-group-text" id="basic-addon1">折價券代碼</span>
                <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">折價券名稱</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">折價券折扣</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1">
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary me-md-2" type="button">儲存</button>
                <router-link class="btn btn-primary" to="/BackCoupon">取消</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    
</script>

<style lang="scss" scoped>
    @import "bootstrap/scss/bootstrap";
    @import "../assets/style.scss";

    .back_coupons_add{
        h1{
            font-size: 32px;
            text-align: center;
            padding: 0 0 10px;
        }
        .add_content{
            border: 2px solid #ccc;
            box-shadow: 0px 0px 3px 0px #ccc;
            padding: 30px 40px;
            margin-bottom: 50px;
            .fixwidth{
                width: 40%;
            }
            .form-control{
                width: 50%;
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