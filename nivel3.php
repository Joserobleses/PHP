<!DOCTYPE html>
<html>
<head>
<title>Tasca M5 </title>
</head>
<body>

<h1>Nivel 3</h1>

<h2>Ejercicio 1 </h2>
<h3>Imprimeix per pantalla(valor a valor) l'array resultant del nivell anterior.</h3>

<?php
/* verificamos que se reciba valor de nivel2.php */

if( isset($_GET["variable"]) ){
/* recogemos valor de variable pasada por url */

$variable=$_GET['variable'];

/* convertimos variable de tipo string a array de nuevo*/
$array=explode(" ",$variable);

/* recorremos array e imprimimos uno a uno su valor mediante un bucle foreach */
foreach ($array as &$valor) {
    echo "<br />".$valor."<br />";
}

unset($valor); // rompe la referencia con el último elemento
}else{
    echo "<b style='border:2px red solid;'>debes ir a la página nivel2.php para recibir la variable del ejercicio anterior</b>";
}
?>

<h2>Ejercicio 2 </h2>
<h3>Escriure un programa PHP que realitzi lo següent: declarar dues variables X e Y de tipus int, dues variables N i M de tipous double i assigna a cada una un valor. A continuació, mostra per pantalla, per a X e Y:</h3>
<ul>
<li>El valor de cada variable</li>
<li>La suma</li> 
<li>La resta</li> 
<li>El producte</li>  
<li>La divisió</li> 
<li>El mòdul</li>
</ul>
<?php
$x=10;
$y=20;
$n=1.5;
$m=2.5;

$sumarxy=$x+$y;
$restaxy=$x-$y;
$productoxy=$x*$y;
$dividirxy=$x/$y;
$moduloxy=$x%$y;

$sumarnm=$n+$m;
$restanm=$n-$m;
$productonm=$n*$m;
$dividirnm=$n/$m;
$modulonm=$n%$m;

echo <<<EOT
El valor de la variable x e y es : $x e $y<br>
La suma de la variable x e y es : $x + $y = $sumarxy<br>
La resta de la variable x e y es : $x - $y = $restaxy<br>
El producte de la variable x e y es : $x * $y = $productoxy<br>
La divisió de la variable x e y es : $x / $y = $dividirxy<br>
El mòdul de la variable x e y es : $x % $y = $moduloxy<br>
<br /><br />
El valor de la variable n e m es : $n e $m<br>
La suma de la variable n e m es : $n + $m = $sumarnm<br>
La resta de la variable n e m es : $n - $m = $restanm<br>
El producte de la variable n e m es : $n * $m = $productonm<br>
La divisió de la variable n e m es : $n / $m = $dividirnm<br>
El mòdul de la variable n e m es : $n % $m = $modulonm<br>
EOT;

/* Sólo si no funciona sintaxis heredoc

echo "<br><br><br>El valor de la variable x e y es : ".$x." e ".$y."<br>";
echo "La suma de la variable x e y es : ".$x." + ".$y." = ".$x+$y."<br>";
echo "La resta de la variable x e y es : ".$x." - ".$y." = ".$x-$y."<br>";
echo "El producte de la variable x e y es : ".$x." * ".$y." = ".$x*$y."<br>";
echo "La divisió de la variable x e y es : ".$x." / ".$y." = ".$x/$y."<br>";
echo "El mòdul de la variable x e y es : ".$x." % ".$y." = ".$x%$y."<br>";
echo "<br /><br />";
echo "El valor de la variable n e m es : ".$n." e ".$m."<br>";
echo "La suma de la variable n e m es : ".$n." + ".$m." = ".$n+$m."<br>";
echo "La resta de la variable n e m es : ".$n." - ".$m." = ".$n-$m."<br>";
echo "El producte de la variable n e m es : ".$n." * ".$m." = ".$n*$m."<br>";
echo "La divisió de la variable n e m es : ".$n." / ".$m." = ".$n/$m."<br>";
echo "El mòdul de la variable n e m es : ".$n." % ".$m." = ".$n%$m."<br>";
*/
?>
<h3>per a N i M, lo mateix. I per a totes les variables(X,Y,N,M):</h3>

<ul>
<li>El doble de cada variable</li>
<li>La suma de totes les variables</li> 
<li>El producte de totes les variables</li> 
</ul>

<?php
echo "El doble de cada variable es :".($x*2)." ".($y*2)." ".($n*2)." ".($m*2)."<br>";
echo "<br>";
echo "Los valores de x,y,n,m ".$x."+".$y."+".$n."+".$m." suman ".$x+$y+$n+$m."<br>";
echo "<br>";
echo "Los valores de x,y,n,m ".$x."*".$y."*".$n."*".$m." dan como producto ".$x*$y*$n*$m."<br>";
?>

<p><a href="index.php">Volver a p&aacute;gina a index.php</a></p>
<p><a href="nivel1.php">Enlace a nivel1.php</a></p>
<p><a href="nivel2.php">Enlace a nivel2.php</a></p>

</body>
</html>