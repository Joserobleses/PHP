<!DOCTYPE html>
<html>
<head>
<title>Tasca M5 </title>
</head>
<body>

<h1>Nivel 2</h1>

<h2>Ejercicio 1 </h2>
<h3>Crea dos arrays, un que inclogui 5 integers, i un altre que inclogui 3 integers.</h3>
<?php
$array_uno = [
    5,
    2,
    1,
    9,
    7,
];
$array_dos = [
    3,
    6,
    4
];

print_r ($array_uno);
echo "<br /><br />";
print_r ($array_dos);
?>
<h2>Ejercicio 2 </h2>
<h3>Afegeix un valor més a l'array que conté 3 integers.</h3>
<?php
array_push($array_dos, 8);
print_r ($array_dos);
?>
<h2>Ejercicio 3 </h2>
<h3>Mescla els dos arrays i imprimeix el tamany de l'array resultant per pantalla.</h3>
<?php
 $suma_arrays=array_merge($array_uno,$array_dos);
 print_r ($suma_arrays);
echo "<br /><br />El tamaño del array resultante de unir los dos array es : ".count($suma_arrays);
?>
<p><a href="index.php">Volver a p&aacute;gina a index.php</a></p>
<p><a href="nivel1.php">Enlace a nivel1.php</a></p>


<?php 

/* usamos implode para convertir array a string */
$a=implode(" ",$suma_arrays);

/* enviamos variable string por url */
echo "<p><a href='nivel3.php?variable=$a'>Enlace a nivel3.php</a></p>";?>
</body>
</html>