<template>
  <div class="background-pic">
    <img src="../assets/images/bcgFlower.png " alt="" />
  </div>
  <!-- ========================================banner -->
  <div class="product-title">
    <div class="product-pic">
      <img
        :src="require(`../assets/phps/pic/${order[0].PROD_PIC1}`)"
        v-if="page == 1"
        :class="{ light: page == 1 }"
      />
      <img
        :src="require(`../assets/phps/pic/${order[0].PROD_PIC2}`)"
        v-if="page == 2"
        :class="{ light: page == 2 }"
      />
      <img
        :src="require(`../assets/phps/pic/${order[0].PROD_PIC3}`)"
        v-if="page == 3"
        :class="{ light: page == 3 }"
      />

      <div class="pic-slide">
        <button @click="prev()">＜</button>
        <div class="pic-chose">
          <img
            :src="require(`../assets/phps/pic/${order[0].PROD_PIC1}`)"
            :class="{ light: page == 1 }"
            @click="page = 1"
          />
          <img
            :src="require(`../assets/phps/pic/${order[0].PROD_PIC2}`)"
            :class="{ light: page == 2 }"
            @click="page = 2"
          />
          <img
            :src="require(`../assets/phps/pic/${order[0].PROD_PIC3}`)"
            :class="{ light: page == 3 }"
            @click="page = 3"
          />
        </div>

        <button @click="next()">＞</button>
      </div>
    </div>

    <div class="pic-control">
      <div
        class="pic-number"
        v-for="i in 3"
        :class="{ changeColor: page == i }"
        @click="changePic(i)"
        :key="i"
      >
        {{ i }}
      </div>
    </div>

    <div class="product-body">
      <div class="product-name">
        <h2>{{ order[0].PROD_NAME }}</h2>
      </div>
      <div class="review-star">
        <p v-for="item in star" :key="item">★</p>
        <p v-if="star < 1">{{ block }}</p>
        <p v-if="star < 2">{{ block }}</p>
        <p v-if="star < 3">{{ block }}</p>
        <p v-if="star < 4">{{ block }}</p>
        <p v-if="star < 5">{{ block }}</p>
      </div>

      <div class="product-price">
        <p>${{ order[0].PROD_PRICE }}元</p>
      </div>
      <div class="product-introduce">
        <div class="product-txt">
          <ul>
            <li>💓{{ order[0].PROD_DESC1 }}</li>
            <li>💓{{ order[0].PROD_DESC2 }}</li>
            <li>💓{{ order[0].PROD_DESC3 }}</li>
          </ul>
          <br />
        </div>
        <div class="product-number">
          <button @click="reduceNum(order)">-</button>
          <input type="text" v-model="product_num" />
          <button @click="addNum(order)">+</button>
        </div>
        <div class="product-addcar">
          <button class="btnLarge" @click="addCar()">加入購物車</button>
          <a href="./shoppingCart.html"
            ><button class="btnLarge redBtn" @click="direct()">直接購買</button>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      order: [],
      page: 1,
      score: [],
      star: [],
      member: [],
      cart: [],
      block: "☆",
      product_num: 1,
    };
  },
  methods: {
    addNum() {
      this.product_num += 1;
    },
    reduceNum(item) {
      if (this.product_num > 0) {
        this.product_num -= 1;
      }
    },
    changePic(i) {
      this.page = i;
    },
    prev() {
      if (this.page > 1) {
        this.page -= 1;
      }
    },
    next() {
      if (this.page < 3) {
        this.page += 1;
      }
    },
    addCar() {
      this.cart.push({
        PROD_ID: this.order[0].PROD_ID,
        PROD_NAME: this.order[0].PROD_NAME,
        PROD_PRICE: this.order[0].PROD_PRICE,
        PROD_PIC1: this.order[0].PROD_PIC1,
        PROD_PIC2: this.order[0].PROD_PIC2,
        PROD_PIC3: this.order[0].PROD_PIC3,
        PROD_DATE: this.order[0].PROD_DATE,
        PROD_NUM: this.product_num,
        PROD_DESC1: this.order[0].PROD_DESC1,
        PROD_DESC2: this.order[0].PROD_DESC2,
        PROD_DESC3: this.order[0].PROD_DESC3,
        PROD_REVIEW: this.order[0].PROD_REVIEW + 1,
        PROD_TIMES: this.order[0].PROD_TIMES + 1,
      });

      this.setStorage();
    },
    setStorage() {
      localStorage.setItem("user", JSON.stringify(this.member));
      localStorage.setItem("cart", JSON.stringify(this.cart));
    },
    getStar() {
      let orders = localStorage.getItem("order");
      if (!orders) return;
      this.order = JSON.parse(orders);
      this.score = (
        this.order[0].PROD_REVIEW / this.order[0].PROD_TIMES
      ).toFixed(1);
      this.star = parseInt(this.score);

      let members = localStorage.getItem("user");
      if (!members) return;
      this.member = JSON.parse(members);

      console.log(this.member);

      let carts = localStorage.getItem("cart");
      if (!carts) return;
      this.cart = JSON.parse(carts);
    },
  },
  created() {
    this.axios
      .get("http://localhost/CGD102_G2/src/assets/phps/member.php")
      .then((res) => {
        this.member = res.data;
        console.log(this.member[0].MEM_ID);
      });
    this.getStar();
  },
};
</script>

<style lang="scss" scoped>
img {
  opacity: 0.2;
}
.light {
  opacity: 1;
}
.review-star {
  display: flex;

  p {
    font-size: 35px;
    margin: 0 5px;
    font-weight: 800;
    color: #b52011;
  }
}
</style>
