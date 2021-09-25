<template>
    <div class="container">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <router-link :to='{name:"crearQuadre"}' class="btn btn-success"><i class="fas fa-plus-circle"></i></router-link>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead >
                        <th>ID</th>
                        <th>Autor</th>
                        <th>Preu</th>
                        <th>Accions</th>
                    </thead>
                    <tbody>
                        <tr v-for="quadre in quadres" :key="quadre.id">
                            <td>{{quadre.id}}</td>
                            <td>{{quadre.nomAutor}}</td>
                            <td>{{quadre.preu}}</td>
                            <td>
                                <router-link :to='{name:"editarQuadre", params:{id:quadre.id}}' class="btn btn-info"><i class="far fa-edit"></i></router-link>
                                <a type="button" @click="borrarQuadre(quadre.id)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                
                                
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
        name: "quadres",
        data(){
            return  {
                        quadres:[]
                    }
            },
        mounted(){
            this.mostrarQuadres()
        },
        methods:{
        async mostrarQuadres(){
            await this.axios.get('/api/quadre')
                .then(response =>{
                    this.quadres = response.data
                })
                .catch(error =>{
                    this.quadre = []
                })
        },
        borrarQuadre(id){
            if (confirm("eliminar quadre?")){
                this.axios.delete('/api/quadre/'+id)
                .then(response =>{
                    this.mostrarQuadres()
                })
                .catch(error =>{
                    console
                })
            }
        }
    }
    }
</script>
