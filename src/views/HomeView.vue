<template>
  <Header />
    <Home />
   <Footer />
  <router-view/>
</template>

<script>
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
import Home from "@/components/Home.vue"

export default {

  components: {
    Header,
    Footer,
    Home
  }
}
</script>
