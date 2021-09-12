<!--
    
    PHP_M13 - Nivell 1 - Exercici 3

    Crear els formularis necessaris per poder realitzar el CRUD sobre el sistema de reservas.
    Heu de validar que la informació introduïda a l'usuari sigui correcta.

    -------------------------------------------------
    
    PHP_M13 - Nivell 2 - Exercici 4

    Customitza la vista de login, registre i recuperació de contrasenya que l'usuari necessita per accedir a l'aplicació.
    Completa la integració del template COOL ADMIN Dashboard en el proyecte Laravel a mode de Layout.
    Pots descarregar el template fent click ací (https://github.com/puikinsh/CoolAdmin).
    -->

@extends('layouts.dashboard')
@section('content')

<!-- missatges d' error al validar -->
@if(count($errors)>0)
<div class='alert alert-danger' role='alert'>
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    <ul>
</div>
@endif

<!-- formulari per editar nova reserva -->

    <div class="card">
        <div class="card-header">
            <strong>Crear Reserva</strong>
        </div>
        <div class="card-body card-block">
        <div class="form-group">
    <form action="{{route('reservas.store')}}" method="post">
        @csrf
        <div class="form-group">
        <label for="floatingInput" class=" form-control-label">Nom</label>
        <input type="text" name="nom" value="{{isset($reserva->nom)?$reserva->nom:old('nom')}}" class="form-control">
        </div>
        <div class="form-group">
        <label for="floatingInput" class=" form-control-label">Cognoms</label>
        <input type="text" name="cognoms" value="{{isset($reserva->cognoms)?$reserva->cognoms:old('cognoms')}}" class="form-control">
        </div>
        <div class="form-group">
        <label for="floatingInput" class=" form-control-label">Passaport</label>
        <input type="text" name="passaport" value="{{isset($reserva->passaport)?$reserva->passaport:old('passaport')}}" class="form-control">
        </div>
        <div class="form-group">
        <label for="floatingInput" class=" form-control-label">telefon</label>
        <input type="text" name="telefon" value="{{isset($reserva->telefon)?$reserva->telefon:old('telefon')}}" class="form-control">
        </div>
        <div class="form-group">
        <label for="floatingInput" class=" form-control-label">Email</label>
        <input type="text" name="email" value="{{isset($reserva->email)?$reserva->email:old('email')}}" class="form-control">
        </div>
        <div class="form-group">
        <label for="floatingInput" class=" form-control-label">Adreça</label>
        <input type="text" name="adreca" value="{{isset($reserva->adreca)?$reserva->adreca:old('adreca')}}" class="form-control">
        </div>
        <div class="form-group">
        <label for="floatingInput" class=" form-control-label">Ciutat</label>
        <input type="text" name="ciutat" value="{{isset($reserva->ciutat)?$reserva->ciutat:old('ciutat')}}" class="form-control">
        </div>
        <div class="form-group">
        <label for="floatingInput" class=" form-control-label">Provincia</label>
        <input type="text" name="provincia" value="{{isset($reserva->provincia)?$reserva->provincia:old('provincia')}}" class="form-control">
        </div>
        <div class="form-group">
        <label for="floatingInput" class=" form-control-label">Pais</label>
        <input type="text" name="pais" value="{{isset($reserva->pais)?$reserva->pais:old('pais')}}" class="form-control">
        </div>
        <div class="form-group">
        <label for="floatingInput" class=" form-control-label">Comentaris</label>
        <input type="text" name="comentaris" value="{{isset($reserva->comentaris)?$reserva->comentaris:old('comentaris')}}" class="form-control">
        </div>
            <!-- links per confirmar formulari o retornar a llistat de reserves sense fer res -->
    <div class="card-footer">
    @can('view-any',$usuarios)
        <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('ATENCIÓ : Crearà una nova reserva a la base de dades')">
            <i class="fa fa-dot-circle-o"></i> Actualitzar dades
        </button>
    @endcan
        <a href="{{route('reservas.index')}}" onclick="return confirm('ATENCIÓ : Tornarà al llistat de reserves')" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i>Tornar al llistat de reserves</a>                                    
    </div>

    </form>
</div>
</div>
</div>     
@endsection