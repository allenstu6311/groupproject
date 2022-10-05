<template>
    <Header />
    <FAQ />
    <Footer />
</template>

<script>
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
import FAQ from"@/components/FAQ.vue"
export default {
    components:{
        Header,
        Footer,
        FAQ
    }
}
</script>