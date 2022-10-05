<template>
    <Header />
    <MemCenter />
    <Footer />
</template>

<script>
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
import MemCenter from "@/components/MemCenter.vue"
export default {
  components: {
    Header,
    Footer,
    MemCenter
  },
}
</script>