<template>
  <div class="light-box-container" v-if="lightBoxShow==true">
    <div class="light-box-text">
        <div class="light-box-logo">
            <h2>⛔</h2>
        </div>
      <div class="light-box-title">
       
        <h3>您尚未登入</h3>
        <p class="bold">需登入才可執行此功能</p>
      </div>
      <div class="light-box-check">
        <router-link to="/MemLogin" class="btnLarge">前往登入</router-link>
      </div>
      <div class="light-box-close">
        <button type="button" @click="lightBoxShow=false">x</button>
      </div>
    </div>
  </div>

</template>
<style lang="scss" scoped>
// @import "../assets/style.scss";
@import "@/assets/base/_color.scss";
.light-box-container {
  position: fixed;
  margin:  0 auto;
  bottom: 0;
  left: 0;
  top: 0;
  right: 0;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 999;
  .light-box-logo{
    margin-top: 40px;
    margin-bottom: 20px;
    h2{
        font-size: 70px;
    }
  }
  .light-box-title{
    margin-bottom: 50px;
    h3{
        font-weight:800
    }
  }
  .light-box-text {
    position: fixed;
    margin: auto;
    left: 40%;
    top: 25%;
    background-color: white;
    width: 300px; 
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    line-height: 2;
    border-radius: 20px;
  }
  .light-box-check {
    margin-bottom: 50px;
    a {
      display: block;
    }
  }
  .light-box-close {
    position: absolute;
    right:10px;
    top: 0px;
    button {
    width: 50px;
    height: 50px;
    background-color: $white;
    border: none;
    border-radius: 50%;
    padding: 10px;
    font-size: 35px;
    font-weight: 800;
    display: flex;
    justify-content: center;
    align-items: center;
    }
  }
}
/*====== 行動版 RWD | 320px ~ 768px ======*/
@media screen and (min-width: 320px) and (max-width: 767.98px){
  .light-box-container {
    .light-box-text {
      left: 15%;
      top: 25%;
    }
  }
}
/*======    平板版 RWD | 768px ~ 1200px ======*/
@media screen and (min-width: 768px) and (max-width: 1199.98px){
  .light-box-container {
    .light-box-text {
      left: 32%;
      top: 25%;
    }
  }
}
</style>
<script>

export default {
  props:{
     lightBoxShow:Boolean,
  },
  components:{
  
  },
    data(){
        return{
          judge:false
        }
    },
    methods:{
    
        sendLightBoxInfo(){
   
          this.$emit("boo",this.judge)
        
      },
      
    },
    
    mounted(){

    },
    created(){
      
     
    }
}
</script>