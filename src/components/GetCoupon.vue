<template>
    <div class="game_over">

        <h1 class="sr_only">穴道小遊戲</h1>

        <div class="background_flower">

            <div class="coupon_container">
                <div class="coupon_frame">
                    <p class="coupon">
                        遊戲結束,總共答對了三題<br>
                        恭喜您獲得<span>85折</span>折價券!
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