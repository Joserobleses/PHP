<!--

Llistar reservas hotel

PHP_M13 - Nivell 1 - Exercici 2
Crea les vistes amb blade i associa-la a cadascuna de las rutes .

-->

@if(Session::has('missatge'))

{{Session::get('missatge')}}

@endif
<a href="{{route('reservas.create')}}" >Crear nova reserva</a>
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>Nom</th>
            <th>Cognoms</th>
            <th>Passaport</th>
            <th>Telèfon</th>
            <th>Email</th>
            <th>Adreça</th>
            <th>Ciutat</th>
            <th>Provincia</th>
            <th>Païs</th>
            <th>Comentaris</th>
            <th>Accions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($reservas as $reserva)
        <tr>
        <td>{{$reserva->id}}</td>
        <td>{{$reserva->nom}}</td>
        <td>{{$reserva->cognoms}}</td>
        <td>{{$reserva->passaport}}</td>
        <td>{{$reserva->telefon}}</td>
        <td>{{$reserva->email}}</td>
        <td>{{$reserva->adreca}}</td>
        <td>{{$reserva->ciutat}}</td>
        <td>{{$reserva->provincia}}</td>
        <td>{{$reserva->pais}}</td>
        <td>{{$reserva->comentaris}}</td>
        <td>
        <div class="btn-group" role="group">
                        <a href="{{route('reservas.edit',['reserva'=>$reserva->id])}}" role="button" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-pencil">EDITAR</i>
                        </a>
   <!--
    PHP_M13 - Nivell 1 - Exercici 3

    Crear els formularis necessaris per poder realitzar el CRUD sobre el sistema de reservas.
    Heu de validar que la informació introduïda a l'usuari sigui correcta.
    -->
                        <form action="{{route('reservas.destroy',['reserva'=>$reserva->id])}}" style="margin-bottom: 0px;" method = "post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('ATENCIÓ : Eliminarà la reserva')"><i class="bi bi-trash">ESBORRAR</i></button>
                        </form>
                    
                        </div>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>