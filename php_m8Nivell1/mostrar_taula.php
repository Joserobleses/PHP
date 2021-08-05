<?php
/*
 Nivell 1 - EXERCICI 1 - 
Crear una classe Taula, que ens servirà per a invocar els mètodes que hi implementem
 per dibuixar una taula amb els productes registrats a la base de dades d'una manera semblant(que no té perquè igual)
 a aquesta:

Nom Producte	| Preu Unitat	| Quantitat	| Total

Sal				| 0.9			| 2			| 1.8
Xocolata		| 2				| 2			| 4

Total									|		5.8


*/
class Taula { 
 public function render($descriptor){ 
		require_once "capcelera.php";
		require_once "taula.php";
		require_once "peu_pagina.php";
 }
}
?>

