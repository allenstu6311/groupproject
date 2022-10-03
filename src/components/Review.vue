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
    <!-- =============================================如果沒有留言 -->

        <div class="no-article" v-if="article.length==0">
            <h2>目前沒有評論</h2>    
        </div> 
    <!-- =========================================留言 -->
    <div class="message-container" v-for="item in  article" :key="item">
        <div class="message-user"  >
            <div class="message-user">
                <div class="user-pic">
                    <img :src="item.pic">
                    <img src="https://picsum.photos/50/50/?random=10" v-if="item.pic==null">
                </div>
            <div class="user-name">
                <p>{{item.mem_name}}</p>
                <small>{{item.COMMENT_DATE}}</small>
            </div>
            </div>

         <div class="message-area">
            <p>{{item.COMMENT_MESSAGE}}</p>
        </div>
    </div>
    </div>
    

    <div class="message-write">
            <textarea name="" id="" cols="40" rows="10" class="write-tex" v-model="tex" @keyup.enter="upload"></textarea>
            <div class="write-send">
                <button class="btnLittle" @click="upload"  >上傳</button>
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
            article:[]
       
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
            
                this.axios.get("http://localhost/CGD102_G2/src/assets/phps/comment.php",
                {
                    params:{
                        post:this.tex,
                        product_id:this.order[0].PROD_ID,
                        mem_id:this.member[0].MEM_ID,
                    }
                })
                
                this.article.push({
                    COMMENT_MESSAGE:this.tex,
                    mem_name:this.article[0].mem_name,
                    COMMENT_DATE:new Date().toISOString().slice(0, 19).replace('T', ' ')
                })

                this.tex=""

        },
        getStorage(){
           
            let orders = localStorage.getItem("order");
            if(!orders) return;
            this.order = JSON.parse(orders)

            let members = localStorage.getItem("user");
            if (!members) return;
            this.member = JSON.parse(members);

            this.score =(this.order[0].PROD_REVIEW/this.order[0].PROD_TIMES ).toFixed(1)
           
            this.star = parseInt(this.score)
        },
    
    },
   
    created(){
       
        this.getStorage()
       
        this.axios.get("http://localhost/CGD102_G2/src/assets/phps/article.php",
        {
            params:{
                prod_id:this.order[0].PROD_ID
            }
        })
        .then((res)=>{
            console.log(res)
            this.article = res.data
            console.log("文章", this.article)
         })
       
    }
}
</script>