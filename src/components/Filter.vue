<template>
 <div class="filter-range" @click="filterChose">
    <img src="../assets/images/filter_min_blue.png" alt="">
 </div>
    <div class="filter-container" v-if="filter==true">   
        <div class="filter-list">
            <div class="filter-close">
                <p @click="filter=false">X</p>
            </div>
            <div class="price-range">
            <p>價格範圍</p>
            <input type="text" size="5">
            ~
             <input type="text" size="5">
             <div class="range-btn">
                <button class="btnLittle">送出</button>
             </div>
        </div>
        <div class="price-checkbox">
            <p>價格區間</p>
            <p><input type="checkbox">299~399元</p>
            <p><input type="checkbox">299~399元</p>
            <p><input type="checkbox">299~399元</p>
            <p><input type="checkbox">299~399元</p>
        </div>
         <div class="keyword">
            <p>關鍵字搜尋</p>
             <p><input type="checkbox">按摩槍</p>
            <p><input type="checkbox">按摩槍</p>
            <p><input type="checkbox">按摩槍</p>
            <p><input type="checkbox">按摩槍</p>
        </div>
        </div>
      
    </div>
   <!-- ===================================  -->

      <div class="filter-wrap  col-2">   
        <div class="filter-list">
          
            <div class="price-range">
            <p>價格範圍</p>
            <input type="text" size="5">
            ~
             <input type="text" size="5">
             <div class="range-btn">
                <button class="btnLittle">送出</button>
             </div>
        </div>
        <div class="price-checkbox">
            <p>價格區間</p>
            <p><input type="checkbox">299~399元</p>
            <p><input type="checkbox">299~399元</p>
            <p><input type="checkbox">299~399元</p>
            <p><input type="checkbox">299~399元</p>
        </div>
        <div class="keyword">
            <p>關鍵字搜尋</p>
             <p><input type="checkbox">按摩槍</p>
            <p><input type="checkbox">按摩槍</p>
            <p><input type="checkbox">按摩槍</p>
            <p><input type="checkbox">按摩槍</p>
        </div>
        </div>
    </div>
</template>

<script>
export default {
    
    data(){
        return{
            filter:false,
        }
    },
    methods:{
        filterChose(){
            this.filter=true
        }
    }
}
</script>