<template>
    <Header />
    <ResvPage />
    <Footer />
</template>

<script>
    import Header from "@/components/Header.vue"
    import Footer from "@/components/Footer.vue"
    import ResvPage from "@/components/ResvPage.vue"
    export default {
        components: {
            Header,
            Footer,
            ResvPage
        },
    };
</script>