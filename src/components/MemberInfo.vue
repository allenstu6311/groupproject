<template>

    <div class="member-info col-5">
        <div class="member-title">
            <h3 class="bold">訂單資訊</h3>
        </div>
        <div class="member-synchronize">
            <input type="checkbox" v-model="check">同訂購人資訊
        </div>
        <div class="member-body">
            <div class="member-name">
                <label for="name">姓名:</label>
                <input type="text" size="30" name="name"  v-model="name">
            </div>
            <div class="member-cellphone">
                <label for="cellphone">手機:</label>
                <input type="text" size="30" name="cellphone"  v-model="cellphone">
            </div>
              <div class="member-address">
                <label for="address">地址:</label>
                <input type="text" size="30" name="address"  v-model="address">
            </div>
              <div class="member-transport">
                <div class="delivery">
                      <label for="transport">配送方式:</label>
                </div>
                <div class="method">     
                 <h5><input type="radio" name="transport" value="home">宅配到府</h5> 
                 <h5><input type="radio" name="transport" value="seven">7-11取貨付款</h5>
             
                </div>
            </div>
              <div class="member-pay">
                <div class="pay">
                  <label for="pay">付款方式:</label>
                </div>
                <div class="methods">
                    <h5>
                        <input type="radio" name="pay" value="online">線上付款
                      </h5>
                      <h5>
                        <input type="radio" name="pay" value="pick">取貨付款
                      </h5>
                </div>
            </div>
        </div>
        <div class="member-send">
            <button class="btnLittle">送出</button>
        </div>
    </div>
    
</template>

<style lang="scss" scope>
  *{
    box-sizing: border-box;
  }
</style>

<script>
export default {
  data(){
    return{
        member:[],
        check:false,
        name:"",
        cellphone:"",
        address:"",
    }
  },
  methods:{

  },
  watch:{
    check:{
       handler(newVal){
        if(newVal==true){
          this.name = this.member[0].MEM_NAME
          this.cellphone = this.member[0].MEM_PHONE
          this.address = this.member[0].MEM_ADDRESS

        }else{
          this.name="",
          this.cellphone="",
          this.address=""

        }
    }
    }
   
  },
  created(){
    this.axios.get("http://localhost/CGD102_G2/src/assets/phps/memberInfo.php")
    .then((res)=>{
      this.member = res.data
      console.log(this.member[0])
    })
  }
}
</script>
