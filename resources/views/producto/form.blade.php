@extends('layouts.principal')
@section('content')

<div class="container py-5">
    @if (isset($producto))
    <h1 class="text-center">
        Editar producto
    </h1>  
    @else
    <div class="card">
        <div class="card-header">
           <h3 class="text-center">Formulario de registro de Producto</h3> 
        </div>
    </div>
    @endif

    @if (isset($producto))
    <form action="{{ route('producto.update', $producto)}}" method="post">
        @method('PUT')
    @else
    <form action="{{ route('producto.store')}}" method="post">
    @endif

        @csrf

        <div class="row">
            <div class="col-md-3">
                    <label for="codigo" class="form-label">Codigo</label>
                    <input type="text" name="codigo" class="form-control" value="{{ old('codigo') ?? @$producto->codigo }}">
                    @error('codigo')
                    <p class="form-text text-danger"> {{ $message }} </p>
                    @enderror
            </div>
            <div class="col-md-5">
                <label for="nombre_p" class="form-label">Nombre</label>
                <input type="text" name="nombre_p" class="form-control" value="{{ old('nombre_p') ?? @$producto->nombre_p }}">
                @error('nombre')
                <p class="form-text text-danger"> {{ $message }} </p>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="valor" class="form-label">Valor</label>
                <input type="number" name="valor" class="form-control" value="{{ old('valor') ?? @$producto->valor }}">
        </div>
        </div>
        <div class="row">
            
            <div class="col-md-12">
                <label for="descripcion_p" class="form-label">Descripcion</label>
                <input type="text" name="descripcion_p" class="form-control" value="{{ old('descripcion_p') ?? @$producto->descripcion_p }}">
            </div>
            
        </div>
        <br>
        @if (isset($producto))
        <div class="mb-3">
        <button class="btn btn-primary" type="submit">Actualizar informacion del producto</button>
        </div>  
         @else
        <div class="mb-3">
        <button class="btn btn-primary" type="submit">Guardar Producto</button>
        @endif

    </div>  
        

    </form>
   
</div>

@endsection