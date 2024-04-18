<?php

namespace App\Http\Controllers;

use App\Models\PublicacionVenta;
use Illuminate\Http\Request;

class solicitudVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        if(auth()->check()){
            $rol = auth()->user()->rol;
            if ($rol==1){
                $ventas = PublicacionVenta::where('estado_publicacion',0)
                    ->latest()
                    ->get();
                return view('tablaSolicitudVenta',['ventas'=>$ventas]);
            }else{
                route('logout');
                return view('auth.login');

            }


        }else{


            route('logout');
            return view('auth.login');


        }






        //
        return view('tablaSolicitudVenta');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function aceptarVenta($request)
    {

        $ventaSel = PublicacionVenta::findOrFail($request); // Recupera la venta por ID
        if ($ventaSel!=null){
            $ventaSel->update([
                'estado_publicacion' => 1,
            ]);
        }

        return redirect()->route('solicitudVentas.index');
    }

    public function rechazarVenta(Request $request)
    {

    }

}
