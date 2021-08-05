<?php

class ConectarBBDD {

    private $servidor;
    private $usuari;
    private $contrasenya;
    private $base_de_dades;
    private $descriptor;

    function __construct($servidor, $usuari, $contrasenya, $base_de_dades) {
        $this->servidor = $servidor;
        $this->usuari = $usuari;
        $this->contrasenya = $contrasenya;
        $this->base_de_dades = $base_de_dades;
        $this->conectar_base_d_dades();
    }
	// Nivell 1 - EXERCICI 1 - Connectarse a una base de dades(pots crear una classe per a aïllar aquesta lògica del fluxe principal d'execució).
    private function conectar_base_d_dades() {
        $this->descriptor = mysqli_connect($this->servidor, $this->usuari, $this->contrasenya, $this->base_de_dades);
        mysqli_set_charset($this->descriptor,"utf8");
    }
	
	// Nivell 1 - EXERCICI 1 -  Desconnectarse de la base de dades.
	public function tancar_base_d_dades(){
		mysqli_free_result($this->resultat);
		mysqli_close($this->descriptor);
	}

    public function consulta($consulta) {
        $this->resultat = mysqli_query($this->descriptor, $consulta);
    }

    public function extreure_registre() {
        if ($fila = mysqli_fetch_array($this->resultat, MYSQLI_ASSOC)) {
            return $fila;
        } else {
            return false;
        }
    }
}
