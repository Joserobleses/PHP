<!DOCTYPE html>
<html>
<head>
<title>Tasca M6 </title>
</head>
<body>

<h1>Nivel 2</h1>

<h2>Ejercicio 1 </h2>
<h3>Per jugar a "l'amagatall"  se'ns ha demanat un programa que compti fins a 10. Però la persona que comptarà és una mica tramposa y ho farà comptant de dos en dos. Crea una funció que compti fins a 10, de 2 en 2, mostrant cada número del compte per pantalla.</h3>
<?php
for ($i=10;$i>=0;$i-=2) echo "<br />".$i."<br />";

?>
<h2>Ejercicio 2 </h2>
<h3>Imagina't que volem que conti fins a un número diferent de 10. Programa la funció per a que el final del compte estigui parametritzat.</h3>
<?php
function contar($i){
    for ($i;$i>=0;$i-=2) echo "<br />".$i."<br />";

}
contar(17);
?>
<h2>Ejercicio 3 </h2>
<h3>Per a prevenir oblits al utilitzar la nostra meravellosa funció "amagatall" establirem un paràmetre per defecte a 10 en la funció que s'encarrega de fer aquest compte. </h3>

<?php
function amagatall($num =10){
    for ($num;$num>=0;$num-=2) echo "<br />".$num."<br />";

}
amagatall();
?>


<p><a href="index.php">Volver a p&aacute;gina a index.php</a></p>
<p><a href="nivel1.php">Enlace a nivel1.php</a></p>
<p><a href="nivel3.php">Enlace a nivel3.php</a></p>


</body>
</html>