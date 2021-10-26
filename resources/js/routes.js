const Home = ()=> import('./components/Home.vue')
const Login = ()=> import('./components/Login.vue')




// importar components games

const MostrarG = ()=> import('./components/game/Mostrar.vue')
const CrearG = ()=> import('./components/game/Crear.vue')

// importar components players

const MostrarP = ()=> import('./components/player/Mostrar.vue')
const CrearP = ()=> import('./components/player/Crear.vue')
const EditarP = ()=> import('./components/player/Editar.vue')


//

const LlistarGP = ()=>import('./components/player/LlistatJugadesUnJugador.vue')

const RankingP = ()=>import('./components/player/PercentatgeMigExits.vue')

const RankingPW = ()=>import('./components/player/Winner.vue')

const RankingPL = ()=>import('./components/player/Loser.vue')

export const routes = [
    {
        name    :   'home',
        path    :   '/',
        component:  Home,
        meta: {
            auth: undefined
          }
    },

    {
        name    :   'login',
        path    :   '/login',
        component:  Login,
        meta: {
            auth: false
          }
    },
    
   
    {
        name    :   'percentatgeMigExits',
        path    :   '/players/ranking',
        component:  RankingP
    },
    {
        name    :   'winner',
        path    :   '/players/ranking/winner/',
        component:  RankingPW
    },
    {
        name    :   'loser',
        path    :   '/players/ranking/loser/',
        component:  RankingPL
    },
    {
        name    :   'editarPlayer',
        path    :   '/players/:id',
        component:  EditarP
    },
    {
        name    :   'llistarJugadesPlayer',
        path    :   '/players/:id/games/',
        component:  LlistarGP
    },
    {
        name    :   'mostrarPlayers',
        path    :   '/players',
        component:  MostrarP
    },
    {
        // registrar usuari /////////////////////////////////
        name    :   'crearPlayer',
        path    :   '/crearplayer',
        component:  CrearP
        // fi registrar usuari
    },
    
    {
        name    :   'mostrarGames',
        path    :   '/games',
        component:  MostrarG
    },
    
    {
        name    :   'crearGame',
        path    :   '/players/games/',
        component:  CrearG
    },
]