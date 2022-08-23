@extends('layouts.principal')
@section('content')

<div class="container py-5">
    <div class="card">
        <div class="card-header">
           <h3 class="text-center">Formulario de registro de Envios</h3> 
        </div>
    </div>


    <form action="{{ route('envio.store')}}" method="post">
        @csrf

    <div class="row">
        <div class="col-md-3">
            <label for="codigo" class="form-label">Codigo</label>
            <input type="text" name="codigo_env" class="form-control" value="{{ old('codigo_env') ?? @$producto->codigo }}">
            @error('codigo')
            <p class="form-text text-danger"> {{ $message }} </p>
            @enderror
    </div>
        <div class="col-md-3">
            <label for="producto" class="form-label">Producto</label>
            <select class="form-select" name="id_producto" aria-label="Default select example">
                @foreach($productos as $producto)
                <option value=" {{$producto->id}} "> {{$producto->nombre_p}} </option>
                @endforeach
              </select>
        </div>
        <div class="col-md-3">
            <label for="ciudad_origen" class="form-label">Ciudad Origen</label>
            <select class="form-select" name="ciudad_origen" aria-label="Default select example">
                @foreach($ciudades as $ciudad)
                <option value=" {{$ciudad['city']}} "> {{$ciudad['city']}} </option>
                @endforeach
              </select>
        </div>
        <div class="col-md-3">
            <label for="ciudad_destino" class="form-label">Ciudad destino</label>
            <select class="form-select" name="ciudad_destino" aria-label="Default select example">
                @foreach($ciudades as $ciudad)
                <option value=" {{$ciudad['city']}} "> {{$ciudad['city']}} </option>
                @endforeach
              </select>
        </div>
        
    </div>
    <br>
    <div>

    <button class="btn btn-primary form-control" type="submit">Realizar Envio</button>
    </div>
</form>
</div>
@endsection