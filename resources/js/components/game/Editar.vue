<template>
    <div class="container">
       <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Game</h4>
                    </div>
                    <div class="card_body">
                        <form @submit.prevent="actualitzar">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="form-floating">
                                       
                                        <input type="text" id="floatingInput" class="form-control" v-model="game.dau1">
                                        <label for="floatingInput">Dau 1</label>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-floating">
                                       
                                        <input type="text" id="floatingInput" class="form-control" v-model="game.dau2">
                                        <label for="floatingInput">Dau 2</label>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-floating">
                                       
                                        <input type="text" id="floatingInput" class="form-control" v-model="game.resultat">
                                        <label for="floatingInput">Resultat</label>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-floating">
                                       
                                        <input type="text" id="floatingInput" class="form-control" v-model="game.player_id">
                                        <label for="floatingInput">Player Id</label>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name : "editar-game",
    data() {
        return{
           game:{
                dau1:"",
                dau2:"",
                resultat:"",
                player_id:""
            },
        }
    },

    mounted(){
        this.mostrarGames()
    },
    
    methods : {
        async mostrarGames(){
            axios.defaults.headers.common = {
                Authorization: "Bearer " + localStorage.getItem("token")
            };
            this.axios.get(`/api/game/${this.$route.params.id}`)
            .then(response=>{
                const{dau1, dau2, resultat, player_id} = response.data
                this.game.dau1 = dau1,
                this.game.dau2 = dau2,
                this.game.resultat = resultat,
                this.game.player_id = player_id
            })
            .catch(error => {
                console.log(error)
            })
        },
        async actualitzar(){
        axios.defaults.headers.common = {
                Authorization: "Bearer " + localStorage.getItem("token")
            };
            this.axios.put(`/api/game/${this.$route.params.id}`, this.game)
            .then(response=>{
                this.$router.push({
                    name : "mostrarGames"
                })
            })
            .catch(error =>{
                console.log(error)
            })
        }
    }
}
</script>