<template>
    <Header />
    <MemLogin/>
    <Footer />
</template>

<script>
    import Header from "@/components/Header.vue"
    import Footer from "@/components/Footer.vue"
    import MemLogin from "@/components/MemLogin.vue"
    export default{
        components:{
            Header,
            Footer,
            MemLogin
        }
    }
</script>