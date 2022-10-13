<template>
  <div class="review-title">
    <h2>商品評價</h2>
  </div>
  <div class="review-container">
    <div class="review-score">
      <div class="review-fraction">
        <h3>
          <strong>{{ (score - 1).toFixed(1) }}</strong
          >/5
        </h3>
      </div>
      <div class="review-star">
        <p v-for="item in star - 1" :key="item">★</p>
        <p v-if="star < 1">{{ block }}</p>
        <p v-if="star < 2">{{ block }}</p>
        <p v-if="star < 3">{{ block }}</p>
        <p v-if="star < 4">{{ block }}</p>
        <p v-if="star < 5">{{ block }}</p>
      </div>
      <small style="text-align: center"
        >共{{ order[0] ? order[0].PROD_TIMES - 1 : 0 }}人評價此商品</small
      >
    </div>

    <div class="review-evaluation">
      <div class="evaluation-star">
        <p @click="giveRating(1, order[0].PROD_NAME)">1星</p>
      </div>
      <div class="evaluation-star">
        <p @click="giveRating(2, order[0].PROD_NAME)">2星</p>
      </div>
      <div class="evaluation-star">
        <p @click="giveRating(3, order[0].PROD_NAME)">3星</p>
      </div>
      <div class="evaluation-star">
        <p @click="giveRating(4, order[0].PROD_NAME)">4星</p>
      </div>
      <div class="evaluation-star">
        <p @click="giveRating(5, order[0].PROD_NAME)">5星</p>
      </div>
    </div>
  </div>
  <!-- =============================================如果沒有留言 -->

  <div class="no-article" v-if="article.length == 0">
    <h2>目前沒有評論</h2>
  </div>
  <!-- =========================================留言 -->
  <div class="message-container" v-for="item in article" :key="item">
    <div class="message-user">
      <div class="message-user">
        <div class="user-pic">
          <img :src="item.pic" />
          <img
            src="https://picsum.photos/50/50/?random=10"
            v-if="item.pic == null"
          />
        </div>
        <div class="user-name">
          <p>{{ item.MEM_NAME }}</p>
          <small>{{ item.COMMENT_DATE }}</small>
        </div>
      </div>

      <div class="message-area">
        <p>{{ item.COMMENT_MESSAGE }}</p>
      </div>
    </div>
  </div>

  <div class="message-write">
    <textarea
      name=""
      id=""
      cols="40"
      rows="10"
      class="write-tex"
      v-model="tex"
      @keyup.enter="upload"
    ></textarea>
    <div class="write-send">
      <button class="btnLittle" @click="upload">上傳</button>
    </div>
  </div>

  <div class="star-lightBox" v-if="reviewStar == true">
    <div class="star-post">
      <div class="star-title">
        <h3>{{ checkFont }}</h3>
      </div>
      <div class="star-check">
        <button
          class="btnLittle"
          @click="
            reviewStar = false;
            thankYou();
          "
        >
          確定
        </button>
      </div>
      <div class="star-close">
        <button @click="reviewStar = false">x</button>
      </div>
    </div>
  </div>
  <lightBox :lightBoxShow="showBox" />
</template>
<script>
import { BASE_URL } from "@/assets/js/common.js";
import { Alert } from "view-ui-plus";
import lightBox from "@/components/lightBox.vue";
// const BASE_URL = process.env.NODE_ENV === 'production'? '/cgd102/g2': '..'
export default {
  components: {
    lightBox,
  },
  data() {
    return {
      tex: "",
      review: [],
      order: [],
      score: [],
      star: [],
      block: "☆",
      article: [],
      member: [],
      reviewStar: false,
      checkFont: "確定評價?",
      showBox: false,
    };
  },
  methods: {
    giveRating(num, name) {
      if(!this.member){
        this.showBox=true
      }else{
      this.reviewStar = true;
      var url = `${BASE_URL}/review.php`; //上線
      // var url = "http://localhost/CGD102_G2/public/api/review.php"
      this.axios
        .get(url, {
          params: {
            number: num,
            product: name,
          },
        })
        .then((res) => {});
        
      }
    
    },
    thankYou() {
      alert("感謝評價");
    },
    upload() {
      if (!this.member) {
        this.showBox = true;
      } else {
        var url = `${BASE_URL}/comment.php`; //上線
        // var url = "http://localhost/CGD102_G2/public/api/comment.php";

        this.axios.get(url, {
          params: {
            post: this.tex,
            product_id: this.order[0].PROD_ID,
            mem_id: this.member.memId,
          },
        });
        this.updateArticle();
        this.tex = "";
      }
    },
    updateArticle() {
      //  var url = 'http://localhost/CGD102_G2/public/api/article.php'
      var url = `${BASE_URL}/article.php`;
      this.axios
        .get(url, {
          params: {
            prod_id: this.order[0].PROD_ID,
          },
        })
        .then((res) => {
          this.article = res.data;
        });
    },
    getStorage() {
      let orders = localStorage.getItem("order");
      if (!orders) return;
      this.order = JSON.parse(orders);

      let members = sessionStorage.getItem("member");
      this.member = JSON.parse(members);

      this.score = (
        this.order[0].PROD_REVIEW / this.order[0].PROD_TIMES
      ).toFixed(1);
      this.star = parseInt(this.score);
    },
    checkMember() {
      let members = sessionStorage.getItem("member");
      this.member = JSON.parse(members);
      if (!this.member) {
        this.lightBoxShow = true;
      } else {
        this.lightBoxShow = false;
      }
    },
  },
  created() {
    this.checkMember();
    this.getStorage();
    // this.updateArticle();
  },
};
</script>

<style lang="scss" scoped>
* {
  box-sizing: border-box;
}
.star-lightBox {
  width: 100%;
  height: 100%;
  position: fixed;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  background-color: rgba($color: #000000, $alpha: 0.5);
  z-index: 10;
  .star-post {
    width: 300px;
    background-color: white;
    border-radius: 20px;
    position: fixed;
    top: 40%;
    left: 40%;
    padding: 10px;
    line-height: 2;
    .star-title {
      // margin-top: 30px;
      // margin-bottom: 30px;
      margin: 30px auto;
      text-align: center;
    }
    .star-check {
      text-align: center;
      button {
        padding: 5px;
      }
    }
    .star-close {
      position: absolute;
      top: -15px;
      right: 0;
      padding: 10px;
      button {
        background-color: transparent;
        font-size: 30px;
        border: none;
        &:hover {
          color: red;
        }
      }
    }
  }
}
</style>
