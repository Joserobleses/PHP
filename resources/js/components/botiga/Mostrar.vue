<template>
    <div class="container">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <router-link :to='{name:"crearBotiga"}' class="btn btn-success"><i class="fas fa-plus-circle"></i></router-link>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Botiga</th>
                        <th>Capacitat</th>
                        <th>Accions</th>
                    </thead>
                    <tbody>
                        <tr v-for="botiga in botigas" :key="botiga.id">
                            <td>{{botiga.id}}</td>
                            <td>{{botiga.nomBotiga}}</td>
                            <td>{{botiga.capacitat}}</td>
                            <td>
                                <router-link :to='{name:"editarBotiga", params:{id:botiga.id}}' class="btn btn-info"><i class="far fa-edit"></i></router-link>
                                <a type="button" @click="borrarBotiga(botiga.id)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                <a type="button"  class="btn btn-danger"><i class="fas fa-fire"></i></a>
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
        name: "botigas",
        data(){
            return  {
                        botigas:[]
                    }
            },
        mounted(){
            this.mostrarBotigas();
        },
        methods:{
        async mostrarBotigas(){
            await this.axios.get('api/botiga')
                .then(response =>{
                    this.botigas = response.data
                })
                .catch(error =>{
                    this.botiga = []
                })
        },
        borrarBotiga(id){
            if (confirm("eliminar botiga?")){
                this.axios.delete('api/botiga/'+id)//+'/pictures')
                .then(response =>{
                    this.mostrarBotigas()
                })
                .catch(error =>{
                    console
                })
            }
        }
    }
    }
</script>
