<template>
    <div class="container">
        

    <div class="row">
       
        <div class="col-12">
           <h1>Percentatge Mig Èxits</h1>
           <h2>{{ total }} %</h2>
           <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
        </div>
        

    </div>
    </div>
</template>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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
        await this.axios.get('/api/players/ranking')
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
