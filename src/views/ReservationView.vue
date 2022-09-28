<template>
  <Header />
  <Reservation />
  <Footer />
</template>

<script>
import Reservation from "@/components/Reservation.vue";
import Header from "@/components/Header.vue";
import Footer from "@/components/Footer.vue";

export default {
  components: {
    Reservation,
    Header,
    Footer,
  },
};
</script>