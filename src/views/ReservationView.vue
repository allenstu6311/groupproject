<template>
    <Header />
    <Reservation />
    <Footer />
</template>

<script>
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
import Reservation from "@/components/Reservation.vue";

export default {
    components: {
        Header,
        Footer,
        Reservation,
    },
};
</script>