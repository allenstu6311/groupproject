<template>
    <Reservation />
</template>

<script>
import Reservation from "@/components/Reservation.vue";

export default {
    components: {
        Reservation,
    },
    methods:{
           updateCart() {
      var url = `${BASE_URL}/shoppingCart.php`; //上線
      this.axios
        .get(url, {
          params: {
            mem_id: this.member.memId,
          },
        })
        .then((res) => {
          this.memory = res.data;
          let oldVal = this.memory;
          let newVal = res.data;
          let isSame = newVal.length === oldVal.length;
          if (!isSame) {
            this.memory = res.data;
            return;
          }

          isSame = newVal.every(
            (v) =>
              oldVal.findIndex(
                (u) => u.PROD_ID === v.PROD_ID && u.PROD_QTY == v.PROD_QTY
              ) > -1
          );
          if (!isSame) {
            this.memory = res.data;
          }

          this.$emit("update-cart", res.data);
        });
    },
    },
    created(){
    if(this.member){
        alert("")
    this.updateCart()
    }
    }
};
</script>