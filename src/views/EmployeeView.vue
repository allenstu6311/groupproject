<template>
    <Header />
	<Employee />
    <Footer />
</template>

<script>
import Header from "@/components/Header.vue"
import Footer from "@/components/Footer.vue"
import Employee from "@/components/Employee.vue"

export default{
    components:{
        Header,
        Footer,
        Employee
    }
}
</script>