<template>
    <Header/>
    <GetCoupon/>
    <Footer/>
</template>

<script>
    import Header from "@/components/Header.vue"
    import Footer from "@/components/Footer.vue"
    import GetCoupon from "@/components/GetCoupon.vue"
    export default{
        components:{
            Header,
            Footer,
            GetCoupon,
        }
    }
</script>