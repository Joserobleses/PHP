<!--Formulari per afegir nou empleat-->
@extends('layouts.app')
@section('content')
<div class="container">

@if(Session::has('missatge'))
<div class="alert alert-success" role="alert">
{{Session::get('missatge')}}
</div>
@endif

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
   
<form action="#" method="post">
    @csrf
  <div class="container mt-4">
    <div class="row">
      <div class="col">
        <h2>Cercar Empleats per feina</h2>
      </div>
      <div class="col text-end">
        <a href="{{route('empleat.index')}}" role="button" class="btn btn-primary" onclick="return confirm('ATENCIÓ : Tornarà al llistat d\'empleats')">Tornar al llistat d'empleats</a>
      </div>
    </div>
    </div>
    </div>
</form>
</div>

<div class="container mt-4">
</head>

<input type="text" id="cerca" onkeyup="filtradorTreballs()" placeholder="Escriu aqui el treball que busques i Filtra per treballs" title="Escriu un treball">

<div class="row">
        <div class="col">
            <h2>Llistat d'Empleats filtrats per treballs</h2>
        </div>
    <div class="row">
        <table class="table table-hover table-striped" id="taula">
            <thead>
                <tr>
                <th scope="col">Id Empleat</th>                    
                <th scope="col">Nom Empleat</th>
                <th scope="col">Cognom Empleat</th>
                <th scope="col">Adreça Empleat</th>
                <th scope="col">Treballs Empleat</th>
                <th scope="col">Telèfon Empleat</th>
				<th scope="col">Email Empleat</th>
                <th scope="col">Accions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($empleats as $empleat)
                <tr>
                    
                    <td>{{$empleat->id}}</td>
                    <td>{{$empleat->nom}}</td>
                    <td>{{$empleat->cognom}}</td>
					<td>{{$empleat->adreca}}</td>
                    <td>{{$empleat->treballs}}</td>
                    <td>{{$empleat->telefon}}</td>
                    <td>{{$empleat->email}}</td>
                    <td>
                        <div class="btn-group" role="group">
                        <a href="{{route('empleat.edit',['empleat'=>$empleat->id])}}" role="button" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-pencil"></i>
                        </a>
   
                        <form action="{{route('empleat.destroy',['empleat'=>$empleat->id])}}" style="margin-bottom: 0px;" method = "post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('ATENCIÓ : Eliminarà l\'empleat')"><i class="bi bi-trash"></i></button>
                        </form>
                    
                        </div>
                    </td>
                </tr>
				@endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
<script>
function filtradorTreballs() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("cerca");
  filter = input.value.toUpperCase();
  table = document.getElementById("taula");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
