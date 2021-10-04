<template>
    <div class="container">
       <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Quadre</h4>
                    </div>
                    <div class="card_body">
                        <form @submit.prevent="actualitzar">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="form-floating">
                                       
                                        <input type="text" id="floatingInput" class="form-control" v-model="botiga.nomBotiga">
                                        <label for="floatingInput">Nom Botiga</label>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" v-model="botiga.capacitat"></textarea>
                                    <label for="floatingTextarea">Preu</label>
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
    name : "editar-botiga",
    data() {
        return{
           botiga:{
                nomBotiga:"",
                capacitat:""
            }
        }
    },
    mounted(){
        this.mostrarBotigues()
    },
    methods : {
        async mostrarBotigues(){
            this.axios.get(`/api/botiga/${this.$route.params.id}`)
            .then(response=>{
                const{nomBotiga, capacitat} = response.data
                this.botiga.nomBotiga = nomBotiga,
                this.botiga.capacitat = capacitat
            })
            .catch(error => {
                console.log(error)
            })
        },
        async actualitzar(){
            this.axios.put(`/api/botiga/${this.$route.params.id}`, this.botiga)
            .then(response=>{
                this.$router.push({
                    name : "mostrarBotigues"
                })
            })
            .catch(error =>{
                console.log(error)
            })
        }
    }
}
</script>