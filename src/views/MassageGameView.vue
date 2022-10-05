<template>
    <Header />
    <MassageGame/>
    <Footer />
</template>

<script>
    import Header from "@/components/Header.vue"
    import Footer from "@/components/Footer.vue"
    import MassageGame from "@/components/MassageGame.vue"
    export default{
        components:{
            Header,
            Footer,
            MassageGame
        }
    }
</script>