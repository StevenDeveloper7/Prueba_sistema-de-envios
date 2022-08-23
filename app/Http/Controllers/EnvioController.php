<?php

namespace App\Http\Controllers;

use App\Models\Envio;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class EnvioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $envios = Envio::join('productos', 'productos.id', '=', 'envios.id_producto')
                    ->select("envios.*","productos.nombre_p")
                    ->paginate(10);
        return view('envio.index')->with('envios', $envios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_URL,"https://sandbox.entregalo.co/api/branches/list");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'token: GaiddltASrvIruZQmnL8qaHmWL3LUOjpVo1grvqBV7BnZRTu8nuvQI8AOzh82HulmjKhonYSUqt802aQ')
        );
    
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $server_output = curl_exec($ch);
    
        curl_close ($ch);
        $ciudades = $server_output;
        $ciudades = json_decode($ciudades,true);
        $ciudades = $ciudades['data'];
        $ciudades = $ciudades['branches'];

        $productos = Producto::all();

        return view('envio.form')->with('ciudades', $ciudades)->with('productos', $productos);
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $envio = Envio::create($request->only('codigo_env', 'id_producto', 'ciudad_origen', 'ciudad_destino'));
        Session::flash('mensaje', 'Registro de envio creado con exito');

        return redirect()->route('envio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Envio  $envio
     * @return \Illuminate\Http\Response
     */
    public function show(Envio $envio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Envio  $envio
     * @return \Illuminate\Http\Response
     */
    public function edit(Envio $envio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Envio  $envio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Envio $envio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Envio  $envio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Envio $envio)
    {
        //
    }
}
