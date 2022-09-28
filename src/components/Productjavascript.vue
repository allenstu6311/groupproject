<script>
export default {
    
    data(){
        return{
            filter:false,
            priceRange_1:0,
            priceRange_2:0,
            range:[],
        }
    },
    methods:{
        choseRange(){
            alert("")
            this.axios.get("http://localhost/cli/team/src/assets/php/priceRange.php",
            {
                params:{
                    priceRange_1:this.priceRange_1,
                    priceRange_2:this.priceRange_2
                }
               
            })
            .then((res)=>{
                console.log(res)
                this.range = res.data
                this.data = this.range
            })

        },
        filterChose(){
            this.filter=true
        },
        // setStorage(){
        //     localStorage.setItem("range",JSON.stringify(this.range))
        // },
        // onlineStorage(){
        //     let ranges = localStorage.getItem("range");
        //     if(!ranges) return;
        //     this.range = JSON.parse(ranges)
        // },
    }
}
</script>