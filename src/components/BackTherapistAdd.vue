<template>
    <div class="laster_therapist">
        <h1>新增按摩師</h1>
        <div class="add_content">
            <div class="input-group fixwidth mb-3">
                <span class="input-group-text" id="basic-addon1">姓名</span>
                <input type="text" class="form-control" placeholder="師傅" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">證照一</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">證照二</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">證照三</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">證照四</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">頭像上傳</label>
                        <input class="form-control upload" type="file" id="formFile">
                    </div>
                </div>
                <div class="col">
                    <figure class="figure">
                        <!-- <figcaption class="figure-caption">預覽圖片</figcaption> -->
                        <img src="../assets/images/masseusePic1.jpg" class="figure-img img-fluid rounded" alt="預覽圖片">
                    </figure>
                </div>
            </div>
            <!-- <div class="mb-3">
                <label for="formFile" class="form-label">頭像上傳</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <figure class="figure">
                <figcaption class="figure-caption">預覽圖片</figcaption>
                <img src="../assets/images/masseusePic1.jpg" class="figure-img img-fluid rounded" alt="預覽圖片">
            </figure> -->
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary me-md-2" type="button">儲存</button>
                <router-link class="btn btn-primary" to="/backtherapist">取消</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    
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
                width: 40%;
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