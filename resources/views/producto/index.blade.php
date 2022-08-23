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
           <h3 class="text-center">Listado de Productos disponibles</h3> 
        </div>

    </div>
    
    <a  href="{{ route('producto.create')}}" class="btn btn-primary">Agregar nuevo Producto</a>
  

<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="bg-primary text-white">
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Valor</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td>{{$producto->codigo}}</td>
                <td>{{$producto->nombre_p}}</td>
                <td>{{$producto->descripcion_p}}</td>
                <td>{{$producto->valor}}</td>
                <td>
                    <a class="btn btn-success" href="{{ route('producto.edit', $producto)}}">Editar</a>
                    <form action="{{ route('producto.destroy', $producto) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar este producto')" >Eliminar</button>
                        
                    </form>
                </td>
            </tr> 

            @endforeach
           
        </tbody>
    </table>
    @if ($productos->count())
    {{ $productos->links() }}
    @endif
</div>
</div>

    
@endsection