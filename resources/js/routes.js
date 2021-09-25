const Home = ()=> import('./components/Home.vue')
const Contacte = ()=> import('./components/Contacte.vue')

// importar components quadres

const MostrarQ = ()=> import('./components/quadre/Mostrar.vue')
const CrearQ = ()=> import('./components/quadre/Crear.vue')
const EditarQ = ()=> import('./components/quadre/Editar.vue')

// importar components botigues

const MostrarB = ()=> import('./components/botiga/Mostrar.vue')
const CrearB = ()=> import('./components/botiga/Crear.vue')
const EditarB = ()=> import('./components/botiga/Editar.vue')

export const routes = [
    {
        name    :   'home',
        path    :   '/',
        component:  Home
    },
    {
        name    :   'contacte',
        path    :   '/contacte',
        component:  Contacte
    },
    {
        name    :   'mostrarQuadres',
        path    :   '/quadres',
        component:  MostrarQ
    },
    {
        name    :   'crearQuadre',
        path    :   '/crearquadre',
        component:  CrearQ
    },
    {
        name    :   'editarQuadre',
        path    :   '/editarquadre/:id',
        component:  EditarQ
    },
    {
        name    :   'mostrarBotigues',
        path    :   '/botigues',
        component:  MostrarB
    },
    {
        name    :   'crearBotiga',
        path    :   '/crearbotiga',
        component:  CrearB
    },
    {
        name    :   'editarBotiga',
        path    :   '/editarbotiga/:id',
        component:  EditarB
    },
]