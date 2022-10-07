<template>
    <div class="game_over">

        <h1 class="sr_only">穴道小遊戲</h1>

        <div class="background_flower">

            <div class="coupon_container">
                <div class="coupon_frame">
                    <p class="coupon">
                        遊戲結束,總共答對了一題<br>
                        恭喜您獲得<span>8折</span>折價券!
                    </p>
                    <div class="btn_group">
                        <div class="over_btn">
                            <router-link to="/MassageSchool" class="btnLarge">穴道小知識</router-link>
                        </div>
                        <div class="over_btn">
                            <router-link to="/MassageGame" class="btnLarge">再試一次</router-link>
                        </div>
                        <div class="over_btn">
                            <router-link to="/ProductList" class="btnLarge">前往商品專區</router-link>
                        </div>
                    </div> 
                </div>
            </div>
            
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            count:''
        }
    },
    created(){
        this.getDataFromApi(); // 在建立Vue.js模板時順帶執行這個參數
    },
    methods: {
        async getDataFromApi() {
            var url = 'http://localhost/CGD102_G2/public/api/getCoupons.php'
            let getData = async(url) => {
                let response = await fetch(url); // await 很雞掰，真的在哭
                let JSON =  response.json();
                this.count = await JSON; // php抓取回來的資料存取在預設好的參數裡
            }
            await getData(url); // 觸發 getData 的匿名 function 內容 ==> 76 ~ 78 行的內容
            console.log(this.count);
        }
    },
}
</script>