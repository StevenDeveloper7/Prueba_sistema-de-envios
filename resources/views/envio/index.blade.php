@extends('layouts.principal')
@section('content')

<div class="container py-5 ">
    @if (Session::has('mensaje'))
    <div class="alert alert-info my-5">
        {{ Session::get('mensaje')}}
    </div>
         
    @endif
    <div class="card">
        <div class="card-header">
           <h3 class="text-center">Envios Realizados</h3> 
        </div>

    </div>
    
    <a  href="{{ route('envio.create')}}" class="btn btn-primary">Agregar nuevo envio</a>
  

<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="bg-primary text-white">
            <th>Codigo</th>
            <th>Producto</th>
            <th>Ciudad Origen</th>
            <th>Ciudad Destino</th>
        </thead>
        <tbody>
            @foreach ($envios as $envio)
            <tr>
                <td>{{$envio->codigo_env}}</td>
                <td>{{$envio->nombre_p}}</td>
                <td>{{$envio->ciudad_origen}}</td>
                <td>{{$envio->ciudad_destino}}</td>
            </tr> 

            @endforeach
           
        </tbody>
    </table>
 
</div>
</div>

    
@endsection