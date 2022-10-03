<template>


    <span class="filter-range" @click="filterChose">
      <i class="fa-solid fa-filter"></i>
    </span>
   

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
             <p><input type="radio" name="price" v-model="checkTarget_1" value="true"  @click="checked(1)">100~499元</p>
            <p><input type="radio" name="price" v-model="checkTarget_2" value="true" @click="checked(2)">500~999元</p>
            <p><input type="radio" name="price" v-model="checkTarget_3" value="true" @click="checked(3)">1000~1499元</p>
            <p><input type="radio" name="price" v-model="checkTarget_4" value="true" @click="checked(4)">1500~1999元</p>
        </div>
         <div class="keyword">
        <p>關鍵字搜尋</p>
            <p><input type="radio" name="product" v-model="tool_1" value="true" @click="tool(1)">按摩槍</p>
            <p><input type="radio" name="product" v-model="tool_2" value="true" @click="tool(2)">按摩球</p>
            <p><input type="radio" name="product" v-model="tool_3" value="true" @click="tool(3)">按摩滾筒</p>
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
            <p><input type="radio" name="price" v-model="checkTarget_1" value="true"  @click="checked(1)">100~499元</p>
            <p><input type="radio" name="price" v-model="checkTarget_2" value="true" @click="checked(2)">500~999元</p>
            <p><input type="radio" name="price" v-model="checkTarget_3" value="true" @click="checked(3)">1000~1499元</p>
            <p><input type="radio" name="price" v-model="checkTarget_4" value="true" @click="checked(4)">1500~1999元</p>
        </div>
        <div class="keyword">
            <p>關鍵字搜尋</p>
            <p><input type="radio" name="product" v-model="tool_1" value="true" @click="tool(1)">按摩槍</p>
            <p><input type="radio" name="product" v-model="tool_2" value="true" @click="tool(2)">按摩球</p>
            <p><input type="radio" name="product" v-model="tool_3" value="true" @click="tool(3)">按摩滾筒</p>
        </div>
        </div>
    </div> 
</template>
<script>
export default {
    data(){
        return{
            filter:false,
            priceRange_1:0,
            priceRange_2:0,
            range:[],
            checkPrice:[],
            checkTool:[],
            checkTarget_1:false,
            checkTarget_2:false,
            checkTarget_3:false,
            checkTarget_4:false,
            tool_1:false,
            tool_2:false,
            tool_3:false,
            tool_4:false,
            filterPrice:[],
            filterTool:[]
           
        }
    },
    methods:{
    
        choseRange(){
            this.axios.get("http://localhost/CGD102_G2/src/assets/phps/priceRange.php",
            {
                params:{
                    priceRange_1:this.priceRange_1,
                    priceRange_2:this.priceRange_2
                }
               
            })
            .then((res)=>{
               
                this.range = res.data
                console.log("range--->",this.range)
                this.data=this.range
                this.$emit("filter",this.range)
             
            })
        },
        filterChose(){
            this.filter=true
        },
        checked(num){
            switch(num){
                case 1:
                    if(this.checkTarget_1){
                        this.checkTarget_1=false
                        this.checkPrice=[]
                        location.reload()
                    }else{
                        this.checkPrice=[
                        {
                        price_1:100,
                        price_2:499,
                        
                        }]
                    }
                    break;
                case 2:
                     if(this.checkTarget_2){
                        this.checkTarget_2=false
                        this.checkPrice=[]
                        location.reload()
                    }else{
                        this.checkPrice=[
                        {
                        price_1:500,
                        price_2:999,
                        
                        }]
                    }
                    
                break;
                    case 3:
                     if(this.checkTarget_3){
                        this.checkTarget_3=false
                        this.checkPrice=[]
                        location.reload()
                    }else{
                        this.checkPrice=[
                        {
                        price_1:1000,
                        price_2:1499,
                        
                        }]
                    }
                break;
                    case 4:
                     if(this.checkTarget_4){
                        this.checkTarget_4=false
                        this.checkPrice=[]
                        location.reload()
                    }else{
                        this.checkPrice=[
                        {
                        price_1:1500,
                        price_2:1999,
                        
                        }]
                        
                    }
                break;
            }
            this.axios.get("http://localhost/CGD102_G2/src/assets/phps/filterPrice.php",{

                params:{
                    filterPrice_1:this.checkPrice[0].price_1,
                    filterPrice_2:this.checkPrice[0].price_2
                }
                
            })
            .then((res)=>{
                this.filterPrice = res.data
                 this.$emit("checkMoney",this.filterPrice)
            })
        },
        tool(num){
            switch(num){
                case 1:
                    if(this.tool_1){
                        this.tool_1 = false;
                        this.checkTool=[]
                        location.reload()
                    }else{
                        this.checkTool=[{
                            type:"按摩槍"
                        }]
                    }
                    break;
                      case 2:
                    if(this.tool_2){
                        this.tool_2 = false;
                        this.checkTool=[]
                        location.reload()
                    }else{
                        this.checkTool=[{
                            type:"按摩球"
                        }]
                    }
                    break;
                      case 3:
                    if(this.tool_3){
                        this.tool_3 = false;
                        this.checkTool=[]
                        location.reload()
                    }else{
                        this.checkTool=[{
                            type:"滾筒"
                        }]
                    }
                    break;
            }
            this.axios.get("http://localhost/CGD102_G2/src/assets/phps/fiterTool.php",
            {
                params:{
                    type:this.checkTool[0].type
                }
            })
            .then((res)=>{
                this.filterTool = res.data
                this.$emit("tool",this.filterTool)
            })
        },
      
    },
    watch:{
        priceRange_1:{
            handler(newVal){
                // console.log("子層-->",newVal)
                this.$emit("int_1",this.priceRange_1)
            }
        },
          priceRange_2:{
            handler(newVal){
                // console.log("2層-->",newVal)
                this.$emit("int_1",this.priceRange_2)
            }
        },
      
    }
}
</script>