<template>
  <Header/>
  <MassageSchool/>
  <Footer/>
</template>

<script>
  import Header from "@/components/Header.vue"
  import Footer from "@/components/Footer.vue"
  import MassageSchool from "@/components/MassageSchool.vue"
      export default{
  
          components:{
              Header,
              Footer,
              MassageSchool
          }
      }
</script>