<template>
    <div class="container">
       <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Crear Botiga</h4>
                    </div>
                    <div class="card_body">
                        <form @submit.prevent="crear">
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
                                    <label for="floatingTextarea">Capacitat</label>
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

export default{
    name: "crearBotiga",
    data(){
        return{
            botiga:{
                nomBotiga:"",
                capacitat:""
            }
        }
    },
    methods:{
        async crear(){// alert(JSON.stringify(this.botiga));
            await this.axios.post('/api/botiga', this.botiga)
            .then(response => {
              this.$router.push({name:"mostrarBotigues"})
            })
            .catch(error =>{
                console.log(error)
            })
            
       }
    }
}
</script>