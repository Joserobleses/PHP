<template>
    <div class="container">
    <div class="row">
       
        <div class="col-12">
           <h1>Percentatge Màxim Èxits</h1>
           <h2>{{ total }}%</h2>
        </div>
        

    </div>
    </div>
</template>
<script>
    export default{
        name: "players",
        data(){
            return  {
                        players:[],
                        xValues:[],
                        yValues:[],
                        barColors:[],
                        total:'',
                    }
            },
        mounted(){
            this.mostrarPlayers();
        },
        methods:{
        async mostrarPlayers(){
            axios.defaults.headers.common = {
                Authorization: "Bearer " + localStorage.getItem("token")
            };
        await this.axios.get('/api/players/ranking/winner')
                .then(response =>{
                    const{total} = response.data
                    this.total = total
                })
                .catch(error =>{
                    this.total = []
                })
            
        }
    }
}
</script>
