<!--Mostrar llistat d' empleats per treballs a traves d'url (php_m11/public/empleat/treball/{parametre_treball})-->
@extends('layouts.app')
@section('content')
<div class="container">

@if(Session::has('missatge'))
<div class="alert alert-success" role="alert">
{{Session::get('missatge')}}
</div>
@endif

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h2>Empleats per treball</h2>
        </div>
        <div class="col text-end">
            <a href="{{route('empleat.index')}}" role="button" class="btn btn-primary" onclick="return confirm('ATENCIÓ : Tornarà al llistat d\'empleats')">Tornar al llistat d'empleats</a>
        </div>
		
    </div>
    <div class="row">
        <table class="table table-hover table-striped">
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
</div>
@endsection