<template>
    <div class="background_flower">
        <div class="container">
            <div class="choose_id">選擇登入身分</div>
            <div class="containerLogin">
                <router-link to="/manageLogin">
                    <div class="manageLogin">
                        <p>管理員登入</p>
                        <img src="../assets/images/manageIcon.png">
                    </div>
                </router-link>
                <router-link to="">
                    <div class="masseurLogin">
                        <p>按摩師登入</p>
                        <img src="../assets/images/masseurIcon.png">
                    </div>
                </router-link>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.container{
    width: 100%;
    height: 100vh;
    text-align: center;

    .choose_id{
        font-size: 40px;
        font-weight: 600;
        padding: 100px 0 150px 0 ;
        letter-spacing: 1px;
        color:#163D82;
    }

    .containerLogin{
        margin: 0 auto;
        max-width: 1200px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;

        .manageLogin,.masseurLogin{
            width: 250px;
            height: 250px;
            background-color: #163D82;
            border-radius: 50%;
            cursor: pointer;
            transition: all .3s;
            
            &:hover{
                transform: scale(1.1);
            }
            
            p{
                font-size: 32px;
                font-weight: 600;
                color: white;
                padding: 45px 0 40px 0;
            }
        }
    }
}

</style>