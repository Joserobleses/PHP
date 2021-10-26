<template>
    <div class="container">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <router-link :to='{name:"crearPlayer"}' class="btn btn-success" title="Crear Player"><i class="fas fa-plus-circle"></i></router-link>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Player</th>
                        <th>Email</th>
                        <th>% éxits</th>
                        <th>Accions</th>
                    </thead>
                    <tbody>
                        <tr v-for="player in players" :key="player.id">
                            <td>{{player.id}}</td>
                            <td>{{player.name}}</td>
                            <td>{{player.email}}</td>
                            <td v-if="player.media_exit">
                               <b> {{  player.media_exit  }} </b>
                            </td>
                            <td v-else><b>0</b></td>
                            <td>
                                <router-link :to='{name:"editarPlayer", params:{id:player.id}}' :title="'Editar nom jugador@'" class="btn btn-info"><i class="far fa-edit"></i></router-link>
                                <a type="button" @click="borrarPlayer(player.id, player.name)" title="Borrar jugador@" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                <router-link :to='{name:"llistarJugadesPlayer", params:{id:player.id}}' :title="'Listar partides del jugador@'" class="btn btn-danger"><i class="fas fa-list-ol"></i></router-link>
                                
                            </td>
                            
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
        name: "players",
        data(){
            return  {
                        players:[],
                        
                    }
            },
           
        mounted(){
            this.mostrarPlayers();
            
        },
        methods:{
            async mostrarPlayers(){ console.log(localStorage.getItem("token"));
                 this.axios.defaults.headers.common = {
                Authorization: "Bearer " + localStorage.getItem("token")
            };
                await this.axios.get('api/players')
                    .then(response =>{
                        this.players = response.data
                    })
                    .catch(error =>{
                        this.player = []
                    })
            },
            async mostrarGames(){
                this.axios.defaults.headers.common = {
                Authorization: "Bearer " + localStorage.getItem("token")
            };
                await this.axios.get('api/game')
                    .then(response =>{
                        this.games = response.data
                        
                    })
                    .catch(error =>{
                        this.game = []
                    })
            },
            borrarPlayer(id, name){
            this.axios.defaults.headers.common = {
                Authorization: "Bearer " + localStorage.getItem("token")
            };
                if (confirm("eliminar tots els games del player "+name+"?")){
                    this.axios.delete('/api/players/'+id+'/games')
                    .then(response =>{
                       this.$router.push({name:"mostrarGames"}) 
                    })
                    .catch(error =>{
                        console
                    })
                }
            },
        }
    }
</script>
