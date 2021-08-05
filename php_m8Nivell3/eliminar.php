<?php
	  /*
	  Nivell 3 - Exercici 4
		Implementar les lògiques d'inserció, esborrat i modificació dels productes.
	  */
	  
	  // Dades per conectar i eliminar un registre determinat
	  
	  $servidor = "localhost";
      $usuari = "root";
      $contrasenya = "";
      $base_de_dades = "compra";
	  // Nivell 3 - EXERCICI 4 - Carreguem conectarBBDD.php on la funció conectar_base_d_dades
	  require_once("conectarBBDD.php");
	  $eliminar = 	"DELETE FROM compra WHERE id=".$_GET['id'];
	  $descriptor = new conectarBBDD($servidor, $usuari, $contrasenya, $base_de_dades);
      $descriptor->consulta($eliminar);
	  // redirecció per veure el llistat complet de entrades de BBDD i comprobar la eliminació del registre 
	  header('Location: index.php');
?>