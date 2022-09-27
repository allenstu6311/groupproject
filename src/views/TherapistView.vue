<template>
  	<Header />
	<Therapist />
  	<Footer />
<router-view/>
</template>

<script>
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
import Therapist from "@/components/Therapist.vue"

export default{
    components:{
        Header,
        Footer,
        Therapist
    }
}
</script>
