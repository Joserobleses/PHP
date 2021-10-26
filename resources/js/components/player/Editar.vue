<template>
    <div class="container">
       <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Nom del Player</h4>
                    </div>
                    <div class="card_body">
                        <form @submit.prevent="actualitzar">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="form-floating">
                                       
                                        <input type="text" id="floatingInput" class="form-control" v-model="player.name">
                                        <label for="floatingInput">Nom Player</label>
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
    name : "editar-player",
    data() {
        return{
           player:{
                name:"",
                email:"",
                password:"",
            }
        }
    },
    mounted(){
        this.mostrarPlayers()
    },
    methods : {
        async mostrarPlayers(){
            axios.defaults.headers.common = {
                Authorization: "Bearer " + localStorage.getItem("token")
            };
            this.axios.get(`/api/player/${this.$route.params.id}`)
            .then(response=>{console.log(response);
                const{name, email, password} = response.data
                this.player.name = name,
                this.player.email = email,
                this.player.password = password
            })
            .catch(error => {
                console.log(error)
            })
        },
        async actualitzar(){
            axios.defaults.headers.common = {
                Authorization: "Bearer " + localStorage.getItem("token")
            };
             this.axios.put(`/api/players/${this.$route.params.id}`, this.player)
            .then(response=>{
                this.$router.push({
                    name : "mostrarPlayers"
                })
            })
            .catch(error =>{
                console.log(error)
            })
        }
    }
}
</script>