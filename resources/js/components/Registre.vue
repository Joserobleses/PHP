<template>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-6">
        <div class="card card-default">
          <div class="card-header">Registrar</div>
          <div class="card-body">
              <form autocomplete="off" >
                <div class="form-group" >
                    <label for="name">Nom</label>
                    <input type="text" id="name" class="form-control" placeholder="Full Name" v-model="registre.name">
                    
                </div>
                <div class="form-group" >
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" placeholder="usuari@exemple.com" v-model="registre.email">
                   
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" v-model="registre.password">
                   
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmar Password</label>
                    <input type="password" id="password_confirmation" class="form-control" v-model="registre.password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {

 data: () => ({
    email: "",
    password: "",
    passwordRepeat: ""
  }),
  methods: {
    register() {
      console.log(this.email);
      console.log(this.password);
      console.log(this.passwordRepeat);
    }
  }

}
</script> 