<template>
    <div class="container">
       <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Crear Quadre</h4>
                    </div>
                    <div class="card_body">
                        <form @submit.prevent="crear">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="form-floating">
                                       
                                        <input type="text" id="floatingInput" class="form-control" v-model="quadre.nomAutor">
                                        <label for="floatingInput">Nom</label>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" v-model="quadre.preu"></textarea>
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

export default{
    name: "crearQuadre",
    data(){
        return{
            quadre:{
                nomAutor:"",
                preu:""
            }
        }
    },
    methods:{
        async crear(){ //alert(JSON.stringify(this.quadre));
            await this.axios.post('/api/quadre', this.quadre)
            .then(response => {
              this.$router.push({name:"mostrarQuadres"})
            })
            .catch(error =>{
                console.log(error)
            })
            
       }
    }
}
</script>