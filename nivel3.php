<!DOCTYPE html>
<html>
<head>
<title>Tasca M6 </title>
</head>
<body>

<h1>Nivel 3</h1>

<h2>Ejercicio 1 </h2>
<h3>Ens han demanat un llistat de tots els anys on es van produir jocs olímpics desde 1960 inclós fins al 2016. Programa un bucle que calculi i mostri per pantalla els anys olímpics dins de l'interval esmentat.</h3>
<?php
// imprimimos las olimpiadas, teniendo en cuenta que se celebran cada 4 años entre 1960 a 2016 
for ($i=1960;$i<=2016;$i+=4) echo "<br /> En el año : ".$i." hubo olimpiadas";
?>

<h2>Ejercicio 2 </h2>
<h3>Imagina que som a una botiga on es ven:</h3>
<pre>
Xocolata: 1 euro
Xiclets: 0.50 euros
Carmels: 1.50 euros
Implementa un programa que permeti afegir càlculs a un total de compres d'aquest tipus. Per exemple, que si comprem:

2 xocolates, 1 de xiclets i 1 de carmels, tinguem un programa que permeti anar afegint els subtotals a un total, tal que així,

funció(2 xocolates) + funció(1 de xiclets) + funció(1 de carmels) = 2+0.5+1.5

Sent per tant el total, 4.
</pre>
<?php
	
	function calcular($xocolata,$xiclets,$carmels){
		
		function xoco($xo){$preuXocolata=1;return $preuXocolata*=$xo;}//Calculamos precio xocolate por cantidad adquirida
		function xicle($xi){$preuXiclets=0.5;return $preuXiclets*=$xi;}//Calculamos precio chicles por cantidad adquirida
		function carmel($ca){$preuCarmels=1.5;return $preuCarmels*=$ca;}//Calculamos precio caramelos por cantidad adquirida
		
		return xoco($xocolata)+xicle($xiclets)+carmel($carmels);// retornamos el restultado de las suma de las tres funciones
	}
	
	echo calcular(2,1,1);
	
?>



<h2>Ejercicio 2 </h2>
<h3>La criba d'Eratóstenes és un algoritme pensat per a trobar nombres primers dins d'un interval donat. Basats en l'informació de l'enllaç adjunt, implementa la criba d'Eratóstenes dins d'una funció, de tal forma que poguem invocar la funció per a un número concret.</h3>
<?php
function eratosthenes($numeroCribar)
{
   $conjuntoTotal=array();
   $numPrimo=1;
   /* evitamos los números hasta el dos para comenzar a contar en el bucle a partir de este último */
   echo 1," ",2;
   $contador=3;
   
   /* comenzamos la criba */
   
   while($contador<=$numeroCribar)
   {
        if(!in_array($contador,$conjuntoTotal))
         {
            echo " ",$contador;// imprimimos número primo
            $numPrimo+=1;
            $contador2=$contador;
			/* usamos bucle para almacenar los descartados */
            while($contador2<=($numeroCribar/$contador))
            {
               array_push($conjuntoTotal,$contador*$contador2);
               $contador2+=1;
            }
         }
        $contador+=2;
   }
   echo "<br />";
   return;
}

eratosthenes(50);






?>
<p><a href="index.php">Volver a p&aacute;gina a index.php</a></p>
<p><a href="nivel1.php">Enlace a nivel1.php</a></p>
<p><a href="nivel2.php">Enlace a nivel2.php</a></p>

</body>
</html>