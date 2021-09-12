<!--

Formulari reservas hotel

PHP_M13 - Nivell 1 - Exercici 2
Crea les vistes amb blade i associa-la a cadascuna de las rutes .

-->

<!-- missatges d' error al validar -->
@if(count($errors)>0)

    @foreach($errors->all() as $error)
    {{$error}}
    @endforeach
 
@endif

<!-- links per confirmar formulari o retornar a llistat de reserves sense fer res -->

<button type="submit" onclick="return confirm('ATENCIÓ : Crearà una nova reserva a la base de dades')" >Actualitzar dades</button>
<a href="{{route('reservas.index')}}" onclick="return confirm('ATENCIÓ : Tornarà al llistat de reserves')">Tornar al llistat de reserves</a>

<!-- formulari per crear nova reserva -->

<!--
    PHP_M13 - Nivell 1 - Exercici 3

    Crear els formularis necessaris per poder realitzar el CRUD sobre el sistema de reservas.
    Heu de validar que la informació introduïda a l'usuari sigui correcta.
    -->
    
<form action="{{route('reservas.store')}}" method="post">
    @csrf
    Nom :<input type="text" name="nom">
    Cognom :<input type="text" name="cognoms">
    Passaport :<input type="text" name="passaport">
    Telefon :<input type="text" name="telefon">
    Email :<input type="text" name="email">
    Adreça :<input type="text" name="adreca">
    Ciutat :<input type="text" name="ciutat">
    Estat : <input type="text" name="provincia">
    Pais : <input type="text" name="pais">
    Comentaris : <input type="text" name="comentaris">
    <input type="submit" value="Enviar">
</form>
