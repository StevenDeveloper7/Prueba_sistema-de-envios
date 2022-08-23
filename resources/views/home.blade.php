@extends('layouts.principal')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pagina Principal Sistema de envios</div>
                <div class="text-center">
                    <img  src="img/logo_entregalo.jpg" width="300px" alt="">

                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Has iniciado sesion con exito 
                    <p>Para realizar un envio deberas primero crear tus productos correspondientes, para ello accede
                        al link de la barra de navegacion de nombre producto, posteriormente podras realizar el envio de tus productos a la ciudad
                        que requieras y este disponible en nuestro alcance.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
