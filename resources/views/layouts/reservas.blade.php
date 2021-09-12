@extends('layouts.dashboard')
@section('content')
@can('view-any',$usuarios)
<div class="col text-end">
            <a href="{{route('reservas.create')}}" role="button" class="btn btn-primary">Nova Reserva</a>
        </div>
@endcan
<div class="row">
    <div class="col-lg-12">
        <h1 class="title-1 m-b-25">Reservas Hotel</h1>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning">
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
        @can('view-any',$usuarios)
        <div class="btn-group" role="group">
                        <a href="{{route('reservas.edit',['reserva'=>$reserva->id])}}" role="button" class="btn btn-sm btn-outline-secondary" title="editar la reserva {{$reserva->id}}">
                            <i class="fa fa-edit"></i>
                        </a>
   <!--
    PHP_M13 - Nivell 2 - Exercici 4

    Customitza la vista de login, registre i recuperació de contrasenya que l'usuari necessita per accedir a l'aplicació.
    Completa la integració del template COOL ADMIN Dashboard en el proyecte Laravel a mode de Layout.
    Pots descarregar el template fent click ací (https://github.com/puikinsh/CoolAdmin).
    -->
                        <form action="{{route('reservas.destroy',['reserva'=>$reserva->id])}}" style="margin-bottom: 0px;" method = "post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('ATENCIÓ : Eliminarà la reserva')" title="esborrar la reserva {{$reserva->id}}"><i class="fa fa-trash-o"></i></button>
                        </form>
                    
                        </div>
        @endcan
        </td>
        </tr>
        @endforeach
                                    </table>
                                </div>
    </div>
</div>
@endsection