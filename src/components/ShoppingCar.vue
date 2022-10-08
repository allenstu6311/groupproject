<template>
  <div class="background-pic">
    <img src="../assets/images/bcgFlower.png" alt="" />
  </div>

  <!-- ========================================banner -->

  <div class="purchase-area" style="padding: 50px 0">
    <div class="purchase-area-title">
      <div class="title-font">加</div>
      <div class="title-font">購</div>
      <div class="title-font">區</div>
    </div>
  </div>

  <div class="add-on-container">
    <div
      class="add-on-product"
      v-for="item in data"
      :key="item.PROD_ID"
      :style="{ left: 150 * index + 'px', transition: 0.4 + 's' }"
    >
      <div class="add-on-pic" @click="addShoppingCart(item.PROD_ID)">
        <img :src="require(`../../public/api/pic/${item.PROD_PIC1}`)" alt="">
        {{item.PROD_PIC1}}
      </div>
      <div class="add-on-price-name">
        {{ item.PROD_NAME }}
      </div>
      <div class="add-on-price">
        <p>${{ item.PROD_PRICE }}</p>
      </div>
    </div>
  </div>
  <div class="add-on-control">
    <span class="prev" @click="productPrev"
      ><i class="fa-solid fa-arrow-left"></i
    ></span>
    <span class="next" @click="productNext"
      ><i class="fa-solid fa-arrow-right"></i
    ></span>
  </div>
</template>

<script>
export default {
  props: {
    checkCar: Array,
  },

  data() {
    return {
      data: [],
      index: 0,
      addOn: [],
      cart: [],
      calculate: [],
      member: [],
      memory: [],
    };
  },
  methods: {
    productPrev() {
      if (this.index < 0) {
        this.index += 1;
      }
    },
    productNext() {
      if (this.index > -7) {
        this.index -= 1;
      }
    },
    addShoppingCart(id) {
      let count = this.data.findIndex((item) => item.PROD_ID === id);
      let sameProduct = this.memory.find((item) => item.PROD_ID === id);
      // let index = this.cart.find(item=>item.PROD_ID===id)

      if (!sameProduct) {
        alert("成功加入");
        this.IncreaseShoppingCart(count);
        this.updateCart();
        location.reload()
      } else {
        alert("購物車已有相同物品");
      }

      // this.addOn = {
      //   PROD_ID: this.data[count].PROD_ID,
      //   PROD_NAME: this.data[count].PROD_NAME,
      //   PROD_PRICE: this.data[count].PROD_PRICE,
      //   PROD_PIC1: this.data[count].PROD_PIC1,
      //   PROD_PIC2: this.data[count].PROD_PIC2,
      //   PROD_PIC3: this.data[count].PROD_PIC3,
      //   PROD_DATE: this.data[count].PROD_DATE,
      //   PROD_NUM: 1,
      //   PROD_DESC1: this.data[count].PROD_DESC1,
      //   PROD_DESC2: this.data[count].PROD_DESC2,
      //   PROD_DESC3: this.data[count].PROD_DESC3,
      //   PROD_REVIEW: this.data[count].PROD_REVIEW + 1,
      //   PROD_TIMES: this.data[count].PROD_TIMES + 1,
      // };
      // this.IncreaseShoppingCart(count);
      // this.$emit("product-info", this.addOn);
    },
    IncreaseShoppingCart(count) {
      this.axios.get(
        "http://localhost/CGD102_G2/public/api/changeShoppingCart.php",
        {
          params: {
            judge: 1,
            mem_id: this.member.memId,
            prod_id: this.data[count].PROD_ID,
            prod_qty: 1,
          },
        }
      );
    },
    updateStorage() {
      localStorage.setItem("cart", JSON.stringify(this.cart));
      localStorage.setItem("calculate", JSON.stringify(this.calculate));
    },
    updateCart() {
      this.axios
        .get("http://localhost/CGD102_G2/public/api/shoppingCart.php", {
          params: {
            mem_id: this.member.memId,
          },
        })
        .then((res) => {
          this.memory = res.data;
          // console.log("before",this.memory)
        });
    },

    cartInfo() {
      // let orders = localStorage.getItem("order");
      // if (!orders) return;
      // this.order = JSON.parse(orders);

      // let carts = localStorage.getItem("cart");
      // if (!carts) return;
      // this.cart = JSON.parse(carts);

      let calculates = localStorage.getItem("calculate");
      if (!calculates) return;
      this.calculate = JSON.parse(calculates);

      let totalPrices = localStorage.getItem("totalPrice");
      if (!totalPrices) return;
      this.totalPrice = JSON.parse(totalPrices);

      // this.score = (
      //   this.order[0].PROD_REVIEW / this.order[0].PROD_TIMES
      // ).toFixed(1);
      // this.star = parseInt(this.score);
    },
  },
  created() {
  
    //  var url = `${BASE_URL}/api/addOn.php` //上線
    var url = "http://localhost/CGD102_G2/public/api/addOn.php";
    this.axios.get(url).then((res) => {
      this.data = res.data;
        console.log(this.data);
    });
    let members = sessionStorage.getItem("member");
    this.member = JSON.parse(members);
    // console.log("mem", this.member.memId);

    if (!this.member) {
      alert("請先登入");
      this.$router.push("/MemLogin");
    } else {
      this.axios
        .get("http://localhost/CGD102_G2/public/api/shoppingCart.php", {
          params: {
            mem_id: this.member.memId,
          },
        })
        .then((res) => {
          this.memory = res.data;
          // console.log("before",this.memory)
        });
    }

    this.cartInfo();
  },
  watch: {
    cart: {
      handler(newVal) {
        let members = sessionStorage.getItem("member");
        this.member = JSON.parse(members);
        // console.log("mem", this.member.memId);

        // for (let i = 0; i < newVal.length; i++) {
        //   this.axios
        //     .get(
        //       "http://localhost/CGD102_G2/public/api/insertShoppingCart.php",
        //       {
        //         params: {
        //           judge:
        //           mem_id: this.member.memId,
        //           prod_id: this.cart[i].PROD_ID,
        //           prod_qty: this.cart[i].PROD_NUM,
        //         },
        //       }
        //     )
        //     .then((res) => {
        //       console.log("購物車內部", res);
        //     });
        // }
      },
    },
    deep: true,
  },
};
</script>
