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
		
	$servidor = "localhost";
    $usuari = "root";
    $contrasenya = "";
    $base_de_dades = "compra";
	
	// Nivell 3 - EXERCICI 4 - Carreguem conectarBBDD.php on la funció conectar_base_d_dades
	
	// consulta per carregar les dades de la BBDD
	require_once("conectarBBDD.php");
		$mostrar_registre = "SELECT * FROM compra WHERE id='".$id=$_GET['id']."'";
		$descriptor = new conectarBBDD($servidor, $usuari, $contrasenya, $base_de_dades);
        $descriptor->consulta($mostrar_registre);
		$fila = $descriptor->extreure_registre();
		$nom = $fila['nom'];$preu= $fila['preu'];$quantitat= $fila['quantitat'];
	}else{
		// agafem dades de formulari per actualitzar dades d'un registre determinat a la BBDD
		if (isset($_POST['nom'])){$nom = $_POST['nom'];}
		if (isset($_POST['quantitat'])){
		$quantitat = $_POST['quantitat'];
		$quantitat = str_replace(",", ".", $quantitat);
		}
		if (isset($_POST['preu'])){
		$preu = $_POST['preu'];
		$preu = str_replace(",", ".", $preu);
		}
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
	  $actualitzar_registre = 	"UPDATE compra SET nom='".$nom.
								"', preu='".$preu."', quantitat='".$quantitat."' WHERE id=".$_GET['id'];
	$descriptor = new conectarBBDD($servidor, $usuari, $contrasenya, $base_de_dades);
    $descriptor->consulta($actualitzar_registre);
	// redirecció per veure actualiztació del registre al llistat complert
	header('Location: index.php');
	$fila['nom']=$nom;
	$fila['preu']=$preu;
	$fila['quantitat']=$quantitat;
	}
?>
<!-- formulari per modificar un registre concret i determinat -->
<form action="#" method="post">
  <div class="container mt-4">
    <div class="row">
      <div class="col">
        <h2>Modificar Producte</h2>
      </div>
      <div class="col text-end">
		<a href="index.php" role="button" class="btn btn-secondary">Tornar al llistat</a>
        <button type="submit" class="btn btn-primary">Desar dades</button>
      </div>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="Nom Producte" name="nom" value="<?php echo $nom ?>">
      <label for="floatingInput">Nom producte</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text"  class="form-control" id="floatingInput" placeholder="Preu Unitat" name="preu" value="<?php echo $fila['preu'] ?>">
      <label for="floatingInput">Preu unitat</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="Quantitat" name="quantitat" value="<?php echo $fila['quantitat'] ?>">
      <label for="floatingInput">Quantitat</label>
    </div>
    </div>
</form>
</body>
</html>