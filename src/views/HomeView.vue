<template>
  <Header />
    <Home />
  <Footer />

      <router-view/>
</template>

<script>

import Home from "@/components/Home.vue"
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
export default {

  components: {
    Header,
    Footer,
    Home
  }
}
</script>
