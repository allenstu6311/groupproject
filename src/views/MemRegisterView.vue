<template>
    <Header/>
      <MemRegister/>
    <Footer/>
        
        
  <router-view/>
  
</template>
<script>
  import Header from "@/components/Header.vue"
    import Footer from "@/components/Footer.vue"
    import MemRegister from "@/components/MemRegister.vue"
        export default{
    
            components:{
                Header,
                Footer,
                MemRegister
            }
        }
</script>