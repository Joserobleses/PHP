<!--
-Tasca PHP_M11 Nivell 1 Exercici 3

Crear els formularis necessaris per poder realitzar el CRUD sobre el sistema de gestió d'empleats.
 Heu de validar que la informació introduïda a l'usuari sigui correcta.

-->

<!-- Formulari per modificar dades d'un empleat-->
@extends('layouts.app')
@section('content')
<div class="container">
<!-- missatges validació formulari -->

@if(count($errors)>0)
<div class='alert alert-danger' role='alert'>
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  <ul>
</div>
@endif

<!-- formulari per inserir nous empleats -->
   
<form action="{{route('empleat.update',['empleat'=>$empleat])}}" method="post">
    @method('PUT')
    @csrf
  <div class="container mt-4">
    <div class="row">
      <div class="col">
        <h2>Editar dades Empleat</h2>
      </div>
      <div class="col text-end">
      <button type="submit" class="btn btn-primary" onclick="return confirm('ATENCIÓ : Crearà un nou empleat a la base de dades')" >Actualitzar dades</button>
        <a href="{{route('empleat.index')}}" role="button" class="btn btn-primary" onclick="return confirm('ATENCIÓ : Tornarà al llistat d\'empleats')">Tornar al llistat d'empleats</a>
      </div>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="Nom Empleat" name="nom" value="{{$empleat->nom}}" >
      <label for="floatingInput">Nom Empleat</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="Cognom Empleat" name="cognom"  value="{{$empleat->cognom}}" >
      <label for="floatingInput">Cognom Empleat</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="Treballs Empleat" name="treballs" value="{{$empleat->treballs}}">
      <label for="floatingInput">Treballs Empleat</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="Adreça Empleat" name="adreca"  value="{{$empleat->adreca}}" >
      <label for="floatingInput">Adreça Empleat</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="Telefon Empleat" name="telefon"  value="{{$empleat->telefon}}" >
      <label for="floatingInput">Telefon Empleat</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="Email Empleat" name="email"  value="{{$empleat->email}}" >
      <label for="floatingInput">Email Empleat</label>
    </div>
    </div>
</form>
</div>
@endsection