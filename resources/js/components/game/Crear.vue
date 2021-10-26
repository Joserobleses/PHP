<template>
    <div class="container">
        
        <h1>jugar</h1>
        <h2>Dau 1 : {{game.dau1}}</h2>
        <h2>Dau 2 :{{game.dau2}}</h2>
        <h2>Resultat de la partida : {{ game.resultat }}</h2>
        <h2>player_id : {{ game.player_id }}</h2>
        <table id="Dice3D"><tr><td>
                <section class="container">
                    <div id="cube">
                        <div class="front">
                            <span class="dot dot1"></span>
                        </div>
                        <div class="back">
                            <span class="dot dot1"></span>
                            <span class="dot dot2"></span>
                        </div>
                        <div class="right">
                            <span class="dot dot1"></span>
                            <span class="dot dot2"></span>  
                            <span class="dot dot3"></span>
                        </div>
                        <div class="left">
                            <span class="dot dot1"></span>
                            <span class="dot dot2"></span>  
                            <span class="dot dot3"></span>
                            <span class="dot dot4"></span>
                        </div>
                        <div class="top">
                            <span class="dot dot1"></span>
                            <span class="dot dot2"></span>  
                            <span class="dot dot3"></span>
                            <span class="dot dot4"></span>
                            <span class="dot dot5"></span>
                        </div>
                        <div class="bottom">
                            <span class="dot dot1"></span>
                            <span class="dot dot2"></span>  
                            <span class="dot dot3"></span>
                            <span class="dot dot4"></span>
                            <span class="dot dot5"></span>
                            <span class="dot dot6"></span>
                        </div>
                    </div>
                </section>
            </td></tr></table>
            <table id="Dice3D2"><tr><td>
                <section class="container">
                    <div id="cube2">
                        <div class="front">
                            <span class="dot dot1"></span>
                        </div>
                        <div class="back">
                            <span class="dot dot1"></span>
                            <span class="dot dot2"></span>
                        </div>
                        <div class="right">
                            <span class="dot dot1"></span>
                            <span class="dot dot2"></span>  
                            <span class="dot dot3"></span>
                        </div>
                        <div class="left">
                            <span class="dot dot1"></span>
                            <span class="dot dot2"></span>  
                            <span class="dot dot3"></span>
                            <span class="dot dot4"></span>
                        </div>
                        <div class="top">
                            <span class="dot dot1"></span>
                            <span class="dot dot2"></span>  
                            <span class="dot dot3"></span>
                            <span class="dot dot4"></span>
                            <span class="dot dot5"></span>
                        </div>
                        <div class="bottom">
                            <span class="dot dot1"></span>
                            <span class="dot dot2"></span>  
                            <span class="dot dot3"></span>
                            <span class="dot dot4"></span>
                            <span class="dot dot5"></span>
                            <span class="dot dot6"></span>
                        </div>
                    </div>
                </section>
                   
                    <input name="RollDice3D" type="button"  v-on:click="tirada" value=" Nova Tirada">
            </td></tr>
        </table>
  
    </div>
    
   
</template>
<style>

#Dice3D,#Dice3D2 {
	
    margin:5px auto 20px;
	width:300px;
	padding:20px;	
	height:200px;
    
}


#cube .front {
  transform: 
    translateZ(100px);
}

#cube .back {
  transform: 
    rotateX(-180deg)
    translateZ(100px);
}

#cube .right {
  transform:
    rotateY(90deg)
    translateZ(100px);
}

#cube .left {
  transform:
    rotateY(-90deg)
    translateZ(100px);
}

#cube .top {
  transform:
    rotateX(90deg)
    translateZ(100px);
}

#cube .bottom {
  transform:
    rotateX(-90deg)
    translateZ(100px);
}

#cube2 .front {
  transform: 
    translateZ(100px);
}

#cube2 .back {
  transform: 
    rotateX(-180deg)
    translateZ(100px);
}

#cube2 .right {
  transform:
    rotateY(90deg)
    translateZ(100px);
}

#cube2 .left {
  transform:
    rotateY(-90deg)
    translateZ(100px);
}

#cube2 .top {
  transform:
    rotateX(90deg)
    translateZ(100px);
}

#cube2 .bottom {
  transform:
    rotateX(-90deg)
    translateZ(100px);
}


.container {
  width: 100%;
  height: 100%;
  position: relative;
  margin: 10px 40px 10px;
  border: 0px solid #FFF;
  perspective: 1000px;
  perspective-origin: 25% 25%;
}


#cube {
  width: 100%;
  height: 100%;
  top: 50px;
  left:-300px;
  position: absolute;
  transform-style: preserve-3d;
  transition: transform 6s;
}

#cube2 {
  width: 100%;
  height: 100%;
  top: -150px;
  left:150px;
  position: absolute;
  transform-style: preserve-3d;
  transition: transform 6s;
}

#cube div,#cube2 div {
  background: hsla(0, 85%, 50%, 0.8);
  display: inline-block;
  position: absolute;
  width: 200px;
  height: 200px;
  border: 2px solid #ab1a1a;
  margin: 120px;
  padding: 10px 0;
}


.dot {
  display: block;
  position: absolute;
  width: 30px;
  height: 30px;
  background: #fff;
  border-radius: 15px;  
}

.front .dot1 { top: 85px; left: 85px; }
.back .dot1 { top: 45px; left: 45px; }
.back .dot2 { top: 125px; left: 125px; }
.right .dot1 { top: 45px; left: 45px; }
.right .dot2 { top: 85px; left: 85px; }
.right .dot3 { top: 125px; left: 125px; }
.left .dot1 { top: 45px; left: 45px; }
.left .dot2 { top: 45px; left: 125px; }
.left .dot3 { top: 125px; left: 45px; }
.left .dot4 { top: 125px; left: 125px; }
.top .dot1 { top: 45px; left: 45px; }
.top .dot2 { top: 45px; left: 125px; }
.top .dot3 { top: 85px; left: 85px; }
.top .dot4 { top: 125px; left: 45px; }
.top .dot5 { top: 125px; left: 125px; }
.bottom .dot1 { top: 45px; left: 45px; }
.bottom .dot2 { top: 45px; left: 85px; }
.bottom .dot3 { top: 45px; left: 125px; }
.bottom .dot4 { top: 125px; left: 45px; }
.bottom .dot5 { top: 125px; left: 85px; }
.bottom .dot6 { top: 125px; left: 125px; }

</style>
<script>
import $ from 'jquery'

export default{
    name: "crear",
    data(){
        return{
            game:{
                dau1:"",
                dau2:"",
                resultat:"",
                player_id:"",
               
                

            },
            loading: true,
            
        }
    },
    methods:{
        logout(){
            axios.post('api/logout', {token : this.$store.state.token})
            .then(response => {
                this.$store.commit('clearToken');
                this.$router.push('/');
            })
        },
        async crear(){ 
            axios.defaults.headers.common = {
                Authorization: "Bearer " + localStorage.getItem("token")
            };
            var id = localStorage.getItem('id');
            this.game.player_id = id;
            await this.axios.post('/api/players/'+id+'/games/', this.game)
            .then(response => {
             this.$router.push({name:"crearGame"}) 
            })
            .catch(error =>{
                console.log(error)
            })
            
       },
       getRandom(max, min) {
                                       
            return (Math.floor(Math.random() * (max-min)) + min) * 90;
    
        },

        mod(n, m) {
            return ((n % m) + m) % m;
        },

        getResult(rotX, rotY) {
            let countX = this.mod(rotX / 90, 4);
            if (countX === 1) {
                // Bottom face
                return 6;
            }
            if (countX === 3) {
                // Top face
                return 5;
            }
            // We add countX here to correctly offset in case it is a 180 degrees rotation
            // It can be 0 (no rotation) or 2 (180 degrees)
            let countY = this.mod(rotY / 90 + countX, 4);
            // Faces order
            return [1, 4, 2, 3][countY];
        },
       tirada(){
          
          var min = 1;
          var max = 24;
           var xRandC1 = this.getRandom(max, min);
            var yRandC1 = this.getRandom(max, min);

            var cube = document.getElementById('cube');
            cube.style.webkitTransform = 'rotateX('+xRandC1+'deg) rotateY('+yRandC1+'deg)';
            cube.style.transform = 'rotateX('+xRandC1+'deg) rotateY('+yRandC1+'deg)';

            var xRandC2 = this.getRandom(max, min);
            var yRandC2 = this.getRandom(max, min);

            var cube2 = document.getElementById('cube2');
            cube2.style.webkitTransform = 'rotateX('+xRandC2+'deg) rotateY('+yRandC2+'deg)';
            cube2.style.transform = 'rotateX('+xRandC2+'deg) rotateY('+yRandC2+'deg)';


           this.game.dau1 = this.getResult(xRandC1, yRandC1);
            this.game.dau2 = this.getResult(xRandC2, yRandC2);
    
            if ((this.game.dau1 + this.game.dau2) == 7){this.game.resultat="guanya"}else {this.game.resultat="perd"}
            this.crear()
        
        }
    }
}
</script>