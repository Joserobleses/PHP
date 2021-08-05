    <?php		
      $servidor = "localhost";
      $usuari = "root";
      $contrasenya = "";
      $base_de_dades = "compra";
	  // Nivell 1 - EXERCICI 1 - Carreguem conectarBBDD.php on la funció conectar_base_d_dades
	  require_once("conectarBBDD.php");
	  require_once "mostrar_taula.php";
     
     
		//  Nivell 1 - EXERCICI 1 - Inserir al menys 3 productes a la taula "producte"?? "compra" de la base de dades.
		/*
		$insertar = "INSERT INTO compra (nom, quantitat, preu) 
					VALUES 	('Sal', 2, 0.9),
							('Xocolata', 2, 2),
							('Pa', 3, 0.45)";
            $descriptor = new conectarBBDD($servidor, $usuari, $contrasenya, $base_de_dades);
            $descriptor->consulta($insertar);
		*/
		
		
		
		//  Nivell 1 - EXERCICI 1 - Creem objecte Classe Taula i enviem consulta SQL
		
            $descriptor = new conectarBBDD($servidor, $usuari, $contrasenya, $base_de_dades);
            $descriptor->consulta("select * from compra");
		// Creem objecte Taula per renderitzar el llistat complert de la BBDD	
		$mostrar = new Taula();
		$mostrar->render($descriptor); 
		$descriptor->tancar_base_d_dades();
    ?>
    
  </body>
</html>