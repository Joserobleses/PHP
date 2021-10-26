<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><img src="http://4.bp.blogspot.com/-dXcs_KyCBY4/VsdFrieIIvI/AAAAAAAAANA/W7rM_ESnDiM/s1600/dados-rojos-vector_621212.jpg" alt="logo PHP_M15" width="30" height="24" />Dados Locos</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" v-if="myToken !=null">
       
        
        <li class="nav-item">
           <router-link exact-active-class="active" to="/players"  class="nav-link">Players</router-link>
        </li>
        
        <li class="nav-item">
           <router-link exact-active-class="active" to="/games"  class="nav-link">Games</router-link>
        </li>
        
        <li class="nav-item">
           <router-link exact-active-class="active" to="/players/ranking/"  class="nav-link">Ranking</router-link>
        </li>
        <li class="nav-item">
           <router-link exact-active-class="active" to="/players/ranking/loser"  class="nav-link">Loser</router-link>
        </li>
        <li class="nav-item">
           <router-link exact-active-class="active" to="/players/ranking/winner"  class="nav-link">Winner</router-link>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" @click.prevent="logout">Logout</a>
        </li>
        
      </ul>

      <ul class="navbar-nav me-auto mb-2 mb-lg-0" v-else>
        <li class="nav-item">
        <router-link exact-active-class="active" to="/login"  class="nav-link active" aria-current="page">Jugar</router-link>
        </li>
         <li class="nav-item">
        <router-link exact-active-class="active" to="/crearplayer"  class="nav-link active" aria-current="page">Registrar-se</router-link>
        </li>
      </ul>
      <span class="navbar-text btn btn-outline-success">
        Debes clicar en la opción jugar, y estar registrado para poder acceder a los datos del juego
      </span>
    </div>
  </div>
</nav>
<div>
    <router-view></router-view>
</div>
    </main>
</template>
<script>
  export default {
    data() {
      return {
        routes: {
         
        },
        myToken:''
      }
    },
    watch: {
     
            $route(){ this.myToken = localStorage.getItem("token");}
    },
    methods:{
        logout(){
            axios.post('/logout', {token : this.$store.state.token})
            .then(response => {
                localStorage.removeItem('token');
                localStorage.removeItem('id');
                this.$router.push('/');
            })
            .catch(error =>{
                console.log('error')
               
            })
        },
    }
  }
</script>