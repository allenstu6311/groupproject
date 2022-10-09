<template>
  <div class="not_found">
    <h1>404</h1>
    <h2>抱歉，找不到該頁面</h2>
    <p>你...累了嗎？🥱<br>來去
        <router-link to="/reservation">預約按摩</router-link>
        吧
    </p>
  </div>
</template>

<style lang="scss" scoped>
    .not_found{
        width: 100%;
        margin: auto;
        text-align: center;
        color: #ccc;
        h1{
            margin-top: 80px;
            font-size: 30px;
            // color: #163D82; //主色
               color: #ccc;
        }
        h2{
            margin-top: 20px;
            // color: #163D82; //主色
            font-size: 30px;
               color: #ccc;
        }
        p{
            margin-top: 80px;
            font-size: 30px;
            color: #163D82; //主色
line-height: 1.5;
            a{
                font-size: 40px;            
                color: #B52011; //次主色
            }
        }
    }
</style>