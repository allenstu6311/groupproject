<template>
   <header class="page_header">
    <nav>
        <input type="checkbox" id="check">
        <label for="check">
            <span class="line1"></span>
            <span class="line2"></span>
            <span class="line3"></span>
        </label> 
        <router-link to="/"   class="header_logo"><img src="../assets/images/headerLogo.png" alt=""></router-link>
    
        <ul>
            <li><router-link to="/about">關於我們</router-link></li>
            <li><router-link to="/reserve">預約按摩</router-link></li>
            <li><a href="./shopingArea.html">商品專區</a></li>
            <!-- <a href="../index.html" class="header_logo"><img src="../images/headerLogo.png" alt=""></a> -->
            <li><a href="./massageFAQ.html">按摩小學堂</a></li>
            <li><router-link to="/message">常見問題</router-link></li>
        </ul>
        <div class="header_icon">
            <span class="header_member"><a href="./memLogin.html" ><img src="../assets/images/headerMember.png" alt=""></a></span>
            <span class="header_shopping_cart"><a href="./shoppingCart.html"><img src="../assets/images/headerShoppinCart.png" alt=""></a></span>
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