<template>
    <div class="container">
    <div class="row">
        <div class="col-lg-12 mb-4">

        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Dau1</th>
                        <th>Dau2</th>
                        <th>Resultat</th>
                        <th>Player id</th>
                    </thead>
                    <tbody>
                        <tr v-for="game in games" :key="game.id">
                            <td>{{game.id}}</td>
                            <td>{{game.dau1}}</td>
                            <td>{{game.dau2}}</td>
                            <td>{{game.resultat}}</td>
                            <td>{{game.player_id}}</td>    
                        </tr>   
                    </tbody>
                </table>
            </div>
        </div>
        

    </div>
    </div>
</template>
<script>
    export default{
        name: "games",
        data(){
            return  {
                        games:[]
                    }
            },
        mounted(){
            this.mostrarGames();
        },
        methods:{
        async mostrarGames(){
            axios.defaults.headers.common = {
                Authorization: "Bearer " + localStorage.getItem("token")
            };
            await this.axios.get('api/games')
                .then(response =>{
                    this.games = response.data
                })
                .catch(error =>{
                    this.game = []
                })
        },
        }
    }
</script>
