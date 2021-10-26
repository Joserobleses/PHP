<template>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-6">
        <div class="card card-default">
          <div class="card-header">Login</div>
          <div class="card-body">
            <div class="login" >
            <form autocomplete="off" @submit.prevent="login" method="post">
              <div class="form-group">
                <label for="email">E-mail</label>
                <input v-model="credencials.email" type="email" id="email" class="form-control" placeholder="usuari@exemple.com"  required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input v-model="credencials.password" type="password" id="password" class="form-control"  required>
              </div>
              <p v-if="error" class="error">Has introducido mal el email o la contraseña.</p>
              <button type="submit" class="btn btn-primary">Accedir</button>
            </form>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    name : "Login",
   data() {
      return {
        credencials: {
          email:'',
          password:''
          
        },
        loading : true,
        error:'',
        player_id:''
      }
  },
  methods: {
    login(){
            this.axios.post('/api/login/', this.credencials)
            .then(response => {
              if (response.data.success){
                this.$store.commit('setToken',response.data.token)
               localStorage.id = response.data.player_id;
               localStorage.token = response.data.token;
               this.$router.push({name:'crearGame'}); 
              }
            })
            .catch(error =>{
                console.log('error, no autoritzat 401')
               
            })
            
       }
    
  }
}
</script>