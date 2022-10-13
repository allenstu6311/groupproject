<template>
    <MemCenter  
    @memberInfo="$emit('update-member',$event)"/>
    
   
</template>

<script>
import MemCenter from "@/components/MemCenter.vue"

export default {
    components: {
      MemCenter,
     
    },
    data(){
      return{
      }
    },
    methods:{
  
    },
    watch:{
   
    }
}
</script>