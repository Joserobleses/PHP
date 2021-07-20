<!DOCTYPE html>
<html>
<head>
<title>Tasca M5 </title>
</head>
<body>

<h1>Nivel 1</h1>
<h2>Ejercicio 1 </h2>
<h3>Defineix una variable de cada tipus: integer,double,string i boolean. Després, imprimeix-les per pantalla.</h3>
<?php
$variable_integer    = 10;
$variable_double     = 10.5;
$variable_string     = "Hola";
$variable_boolean    = true;

echo "la variable Entera vale : ".$variable_integer."<br />".
     "la variable decimal vale : ".$variable_double."<br />".
     "la variable de cadena vale : ".$variable_string."<br />".
     "la variable de booleana vale : ".($variable_boolean ? "verdadero" : "falso");
?>
<h2>Ejercicio 2 </h2>
<h3>Crea una altra variable string. Després:</h3>
<ul>
    <li>Imprimeix per pantalla el tamany(longitud) del dos strings.</li>
    <li>Imprimeix per pantalla el dos strings però en ordre invers de caràcters.</li>
    <li>Imprimeix la concatenació dels dos strings.</li>
</ul>
<?php
$variable_string2     = "Mundo";

echo "tamany(longitud) del dos strings es : ".strlen($variable_string.$variable_string2)."<br /><br />";
echo "el dos strings però en ordre invers de caràcters : ".strrev($variable_string.$variable_string2)."<br /><br />";
echo "concatenació dels dos strings : ".$variable_string.$variable_string2;
?>
 

<h2>Ejercicio 3 </h2>
<h3>Crea una constant que inclogui el teu nom i imprimeix-la per pantalla. </h3>
<?php
    define("NOMBRE", "Jose Robles");
    echo NOMBRE;
?>
<p><a href="index.php">Volver a p&aacute;gina a index.php</a></p>
<p><a href="nivel2.php">Enlace a nivel2.php</a></p>
<p><a href="nivel3.php">Enlace a nivel3.php</a></p>

</body>
</html>