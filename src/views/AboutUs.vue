<template>
    <Header />
	<About />
    <Footer />
</template>

<script>
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
import About from "@/components/About.vue"

export default{
    components: {
        Header,
        Footer,
        About
    }
}
</script>