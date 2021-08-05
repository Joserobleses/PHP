<!DOCTYPE html>
<html>
<head>
    <title>Tasca M8 - Nivell 3 - Exercici 4</title>
    <meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php

/* comprobació de que existeixen dades al formulari */

if (!isset($_POST['nom']) || !isset($_POST['quantitat']) || !isset($_POST['preu'])){
		echo "<h1 class='position-absolute top-50 start-50 translate-middle text-danger'>Falten dades a omplir.</h1>";
	}else{
		// dades rebudes del formulari
		
		$nom = $_POST['nom'];
		$quantitat = $_POST['quantitat'];
		$quantitat = str_replace(",", ".", $quantitat);
		$preu = $_POST['preu'];
		$preu = str_replace(",", ".", $preu);
		
		// dades servidor mysql
		
		$servidor = "localhost";
		$usuari = "root";
		$contrasenya = "";
		$base_de_dades = "compra";
	  
		// Nivell 3 - EXERCICI 4 - Carreguem conectarBBDD.php on la funció conectar_base_d_dades
		/*
		Nivell 3 - Exercici 4
			Implementar les lògiques d'inserció, esborrat i modificació dels productes.
		*/
		require_once("conectarBBDD.php");
		$insertar = "INSERT INTO compra (nom, quantitat, preu) VALUES ('$nom', '$quantitat', '$preu')";
		$descriptor = new conectarBBDD($servidor, $usuari, $contrasenya, $base_de_dades);
        $descriptor->consulta($insertar);
		//redirecció al finalitzar la inserció a la BBDD per veure la taula actualitzada
		header('Location: index.php');
	}
	
?>
<!-- formulari per inserir nous productes -->
   
<form action="#" method="post">
  <div class="container mt-4">
    <div class="row">
      <div class="col">
        <h2>Inserir nou Producte</h2>
      </div>
      <div class="col text-end">
        <button type="submit" class="btn btn-primary">Desar dades</button>
      </div>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="Nom Producte" name="nom">
      <label for="floatingInput">Nom producte</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text"  class="form-control" id="floatingInput" placeholder="Preu Unitat" name="preu">
      <label for="floatingInput">Preu unitat</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="Quantitat" name="quantitat">
      <label for="floatingInput">Quantitat</label>
    </div>
    </div>
</form>
</body>
</html>