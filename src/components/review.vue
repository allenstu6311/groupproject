<template>
<div class="review-title">
      <h2>商品評價</h2>
</div>
    <div class="review-container">
      
        <div class="review-score">
            <div class="review-fraction">
                <h3><strong>5</strong>/5</h3>
            </div>
            <div class="review-star">
                <p v-for="i in 5" :key="i">★</p>
            </div>
        </div>

        <div class="review-evaluation">
            <div class="evaluation-star"><p>1星</p></div>
            <div class="evaluation-star"><p>2星</p></div>
            <div class="evaluation-star"><p>3星</p></div>
            <div class="evaluation-star"><p>4星</p></div>
            <div class="evaluation-star"><p>5星</p></div>
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
        upload(){
            this.article.push({
                pic:"https://picsum.photos/50/50/?random=10",
                name:"玄玄",
                post:this.tex,
            })
            this.tex=""
            this.setStorage()
        },
        // keypress(){
        //     window.addEventListener("keypress",function(e){
        //         if(e.code=="Enter"){
        //             this.article.push({
        //             pic:"https://picsum.photos/50/50/?random=10",
        //             name:"玄玄",
        //             post:this.tex,
        //     })
        //     this.tex=""
        //         }
        //     })
        // },
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
        this.onlineStorage()
    
    }
}
</script>