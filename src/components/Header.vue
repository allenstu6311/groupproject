<template>
   <header class="page_header">
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="hamburger">
            <span class="line1"></span>
            <span class="line2"></span>
            <span class="line3"></span>
        </label> 
        <router-link to="/home"   class="header_logo"><img src="../assets/images/headerLogo.png" alt=""></router-link>
    
        <ul class="navList">
            <li><router-link to="/about">關於我們</router-link></li>
            <li><router-link to="/reservation">預約按摩</router-link></li>
            <li><router-link to="/ProductList">商品專區</router-link></li>
            <li><router-link to="/MassageSchool">按摩小學堂</router-link></li>
            <li><router-link to="/message">常見問題</router-link></li>
        </ul>
        <div class="header_icon">
            <!--這是已登入的大頭--->
            <input type="checkbox" id="check2">
            <label for="check2">
                <span class="header_loginMember"><img src="../assets/images/loginHead.png" alt=""></span>
            </label>

            <!--這是大頭下拉選單--->
            <ul class="headerLogin">
                <li><router-link to="/MemCenter">會員中心</router-link></li>
                <li><router-link to="">登出</router-link></li>
            </ul>

            <!--這是未登入的大頭--->
            <span class="header_member"><router-link to="/MemLogin"><img src="../assets/images/headerMember.png" alt=""></router-link></span>

            <!--這是購物車--->
            <span class="header_shopping_cart"><router-link to="/cart"><img src="../assets/images/headerShoppinCart.png" alt=""></router-link></span>
        </div>  
        
    </nav>
</header>


    
</template>
<script>
export default {
    
}
</script>

<style lang="scss">
@import "../assets/style.scss";


</style>