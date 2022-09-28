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
            <input type="text" size="5" v-model="priceRange_1">
            ~
             <input type="text" size="5" v-model="priceRange_2">
             <div class="range-btn">
                <button class="btnLittle" @click="choseRange">送出</button>
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
            <input type="text" size="5"  v-model="priceRange_1">
            ~
             <input type="text" size="5"  v-model="priceRange_2">
             <div class="range-btn">
                <button class="btnLittle" @click="choseRange">送出</button>
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
    components:{
       
    },
    
    data(){
        return{
            filter:false,
            priceRange_1:0,
            priceRange_2:0,
            range:[],
        }
    },
    methods:{
        choseRange(){
            this.axios.get("http://localhost/cli/team/src/assets/php/priceRange.php",
            {
                params:{
                    priceRange_1:this.priceRange_1,
                    priceRange_2:this.priceRange_2
                }
               
            })
            .then((res)=>{
               
                this.range = res.data
                // console.log("range--->",this.range)
                this.data=this.range
                this.$emit("filter",this.range)
             
            })
        },
        filterChose(){
            this.filter=true
        },
      
    },
    watch:{
        priceRange_1:{
            handler(newVal){
                console.log("子層-->",newVal)
                this.$emit("int_1",this.priceRange_1)
            }
        },
          priceRange_2:{
            handler(newVal){
                console.log("2層-->",newVal)
                this.$emit("int_1",this.priceRange_2)
            }
        },
      
    }
}
</script>