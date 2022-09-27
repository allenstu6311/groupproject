<template>
  	<Header />
	<About />
  	<Footer />
<router-view/>
</template>

<script>
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
import About from "@/components/About.vue"

// Vue.mixin({
//   created: function () {
//     this.gsap = gsap;
//   }
// });

export default{
    components:{
        Header,
        Footer,
        About
    }
}
</script>