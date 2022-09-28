<template>
  <Header />
  <ResvPage />
  <Footer />
</template>

<script>
import ResvPage from "@/components/ResvPage.vue";
import Header from "@/components/Header.vue";
import Footer from "@/components/Footer.vue";

export default {
  components: {
    ResvPage,
    Header,
    Footer,
  },
};
</script>