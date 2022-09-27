<template>

    <div class="commodity-container col-12">
        <div class="commodity-order">
            <div class="commodity-sale">
                <span class="bold">全部商品</span>
                <span class="bold">特價商品</span>
            </div>
            <div class="commodity-filter">
                <button>價格排序</button>
                <button>評價排序</button>
                <button>改變展示</button>
            </div>
        </div>
    </div>

        <div class="commodity-area col-12">
            <div class="commodity-obj">
                <div class="commodity-pic">
                    <img src="https://picsum.photos/300/200/?random=10">
                </div>
                <div class="commodity-body">
                    <div class="commodity-name">
                        <h4 class="bold">商品名稱</h4>
                    </div>
                    <div class="commodity-price">
                        <p>$1000</p>
                    </div>
                    <div class="commodity-evaluation">
                        <span v-for="i in 3" :key='i'>★</span>
                    </div>
                </div>
            </div>

              <div class="commodity-obj">
                <div class="commodity-pic">
                    <img src="https://picsum.photos/300/200/?random=11">
                </div>
                <div class="commodity-body">
                    <div class="commodity-name">
                        <h4 class="bold">商品名稱</h4>
                    </div>
                    <div class="commodity-price">
                        <p>$1200</p>
                    </div>
                    <div class="commodity-evaluation">
                        <span v-for="i in 3" :key='i'>★</span>
                    </div>
                </div>
            </div>


            
       
    </div>
    
</template>

<script>
export default {
    
}
</script>