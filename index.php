<html lang="es">
<head>
    <link rel="stylesheet" href="css/style3.css">

</head>
<body style="font-family: 'Roboto', sans-serif;">
    
	<!-- caja contenedora -->
    <main>
        <!-- cabecera -->
    <?php include 'cabecera.php';?>
		

        <!-- menú principal de navegación -->
        
		<nav>
            <ul>
                <li id="uno"><a href="#" title="Inicio">Inicio</a></li>
                <li id="dos"><a href="#" title="Blog">Blog</a></li>
                <li id="tres"><a href="#" title="Utilidades">Utilidades</a></li>
                <li id="cuatro"><a href="#" title="Sobre nosotr@s">Sobre nosotr@s</a></li>
                <li id="cinco"><a href="#" title="Contacto">Contacto</a></li>
            </ul>
        </nav>

        <!-- contenido principal -->

        <section>
            <div id="uno">
                <div class="titulo">T&iacute;tulo 1</div>
                <div class="centrado"><a href="#">Acceder</a></div>
            </div>
            <div id="dos">
                <div class="titulo">T&iacute;tulo 2</div>
                <div class="centrado"><a href="#">Acceder</a></div>
            </div>
            <div id="tres">
                <div class="titulo">T&iacute;tulo 3</div>
                <div class="centrado"><a href="#">Acceder</a></div>
            </div>
        </section>
		
        <!-- contenido secundario -->
        <aside>
            <div id="uno"></div>
            <div id="dos">
                <section id="uno">
              <h2>T&iacute;tulo 1</h2> 
                <img src="images/imagen-articulo.jpg" alt="imagen articulo 1" title="imagen articulo 1" />
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum mollis lacus at congue tempor. Vestibulum venenatis mattis lorem consequat posuere...<a href="#" class="leermas">Leer m&aacute;s</a></p>
            </section>
            <section id="dos">
               <h2>T&iacute;tulo 2</h2> 
               <img src="images/imagen-articulo.jpg" alt="imagen articulo 2" title="imagen articulo 2" />
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum mollis lacus at congue tempor. Vestibulum venenatis mattis lorem consequat posuere...<a href="#" class="leermas">Leer m&aacute;s</a></p>
            </section>   
            </div>
            <div id="tres"></div>
        </aside>
		
        <!-- pié de página -->
        <?php include 'pie-pagina.php';?>
		
    </main>
</body>
</html>