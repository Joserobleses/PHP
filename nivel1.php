<!DOCTYPE html>
<html>
<head>
<title>Tasca M6 </title>
</head>
<body>
<h1>Nivel 1</h1>
<h2>Ejercicio 1</h2>
<h3>Programa la funció "resta" que, donats dos paràmetres ens retorni la resta dels dos números.</h3>
<?php
function resta($num1,$num2){
return "la resta de ".$num1." - ".$num2." da como restultado : ".($num1-$num2);
}

echo resta(10,5);
?>

<h2>Ejercicio 2</h2>
<h3>Programa una lògica que, donat un número qualsevol(per exemple,la teva edat) ens digui si és parell o imparell mitjançant un missatge per pantalla.</h3>

<?php

$miedad=46;
echo $esParEsImpar=46%2? $miedad." es impar" : $miedad." es par";

?>


<h2>Ejercicio 3</h2>
<h3>Agafa la lògica de l'exercici 2 i encapsulala en una funció de nom parell_o_imparell. Invoca aquesta funció per a comprovar que funciona correctament.</h3>

<?php

function parell_o_imparell($num){

    return $num%2? $num." es impar" : $num." es par";

}

echo parell_o_imparell(47);
?>

<h2>Ejercicio 4</h2>
<h3>Programa un bucle que compti fins a 10, mostrant cada  número per pantalla.</h3>
<?php
    for ($i=1;$i<=10;$i++) echo "<br />".$i."<br />";
?>

<p><a href="index.php">Volver a p&aacute;gina a index.php</a></p>
<p><a href="nivel2.php">Enlace a nivel2.php</a></p>
<p><a href="nivel3.php">Enlace a nivel3.php</a></p>

</body>
</html>