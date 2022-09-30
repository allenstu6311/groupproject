<template>
<div class="review-title">
      <h2>商品評價</h2>
</div>
    <div class="review-container">
      
        <div class="review-score">
            <div class="review-fraction">
                <h3><strong>{{score}}</strong>/5</h3>
             
            </div>
            <div class="review-star">
                <p v-for="item in star" :key="item">★</p>
                <p v-if='star<1'>{{block}}</p>
                <p v-if='star<2'>{{block}}</p>
                <p v-if='star<3'>{{block}}</p>
                <p v-if='star<4'>{{block}}</p>
                <p v-if='star<5'>{{block}}</p>
            </div>
               <small style="text-align:center">共{{order[0] ? order[0].PROD_TIMES : 0}}人評價此商品</small>
        </div>

        <div class="review-evaluation">
            <div class="evaluation-star"><p @click="giveRating(1,order[0].PROD_NAME)">1星</p></div>
            <div class="evaluation-star"><p @click="giveRating(2,order[0].PROD_NAME)">2星</p></div>
            <div class="evaluation-star"><p @click="giveRating(3,order[0].PROD_NAME)">3星</p></div>
            <div class="evaluation-star"><p @click="giveRating(4,order[0].PROD_NAME)">4星</p></div>
            <div class="evaluation-star"><p @click="giveRating(5,order[0].PROD_NAME)">5星</p></div>
        </div>
    </div>
    <!-- =========================================留言 -->
    <div class="message-container">
        <div class="message-user"  v-for="item in article" :key="item.name">
            <div class="message-user">
                <div class="user-pic">
                    <img :src="item.pic">
                </div>
            <div class="user-name">
                <p>{{item.name}}</p>
            </div>
            </div>

         <div class="message-area">
            <p>{{item.post}}</p>
        </div>
    </div>

  
        <div class="message-write">
            <textarea name="" id="" cols="40" rows="10" class="write-tex" v-model="tex" @keyup.enter="upload"></textarea>
            <div class="write-send">
                <button class="btnLittle" @click="upload"  >上傳</button>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    *{
        box-sizing: border-box;
    }   
 
</style>

<script>
export default {
    data(){
        return{
            tex:"",
            review:[],
            order:[],
            score:[],
            star:[],
            block:"☆",
            article:[
                {
                    pic:"https://picsum.photos/50/50/?random=10",
                    name:"俊彥",
                    post:"Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed suscipit iusto quibusdam nesciunt est distinctio praesentium magnam delectus, mollitia ex quam omnis excepturi magni dicta, vero sunt reprehenderit amet ad."
                }
                ]
        }
    },
    methods:{
        giveRating(num,name){
            

            this.axios.get("http://localhost/CGD102_G2/src/assets/phps/review.php",
            {
                params:{
                    number:num,
                    product:name
                }
            })
            alert("感謝評價")
        },
        upload(){
            this.article.push({
                pic:"https://picsum.photos/50/50/?random=10",
                name:"玄玄",
                post:this.tex,
            })
            this.tex=""
            this.setStorage()
            
        },
        getStorage(){
            
            let orders = localStorage.getItem("order");
            if(!orders) return;
            this.order = JSON.parse(orders)
            this.score =(this.order[0].PROD_REVIEW/this.order[0].PROD_TIMES ).toFixed(1)
           
            this.star = parseInt(this.score)
        },
    
        setStorage(){
            localStorage.setItem("article",JSON.stringify(this.article))
        },
        onlineStorage(){
         
            let articles = localStorage.getItem("article")
            if(!articles) return
            this.article = JSON.parse(articles)
        
        }
    },
    created(){
        this.getStorage()
        this. onlineStorage()
        
      
    }
}
</script>