<template>
    <div class="container">
       <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Registrar Player</h4>
                    </div>
                    <div class="card_body">
                        <form @submit.prevent="crear">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="form-floating">
                                        
                                        <input type="text" id="floatingInput" class="form-control" v-model="player.name">
                                        <label for="floatingInput">Nom Player</label>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-floating">
                                    <input type="email" id="floatingInput" class="form-control" v-model="player.email">
                                    <label for="floatingTextarea">Email</label>
                                    
                                </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-floating">
                                    <select class="form select form-control"  v-model="player.role">
                                        <option disabled value="">Seleccione un elemento</option>
                                        <option value="admin">Admin</option> 
                                        <option value="manager">Manager</option> 
                                        <option value="editor">Editor</option>
                                    </select>
                                   
                                </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-floating">
                                    <input type="text" id="floatingInput" class="form-control" v-model="player.password">
                                    <label for="floatingTextarea">Password</label>
                                </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <button type="submit" class="btn btn-primary">Registrar Player</button>
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
    name: "crear",
    data(){
        return{
            player:{
                name:"",
                email:"",
                role:"",
                password:"",
                remember_token:"",
            }
        }
    },
    
    methods:{
        async crear(){
        
            await this.axios.post('/api/players/', this.player)
            .then(response => {
            if (response.data.success){
                localStorage.id = response.data.player_id;
               localStorage.token = response.data.token;
              this.$router.push({name:"mostrarPlayers"})
              }
            })
            .catch(error =>{
                console.log(error)
               
            })
            
       }
    }
}
</script>