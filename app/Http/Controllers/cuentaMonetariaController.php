<?php

namespace App\Http\Controllers;

use App\Models\asistencia_voluntariado;
use App\Models\cuentas;
use App\Models\publi_intercambios;
use App\Models\PublicacionVenta;
use App\Models\venta_realizada;
use App\Models\voluntariados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class cuentaMonetariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //


        if (auth()->check()) {
            // return view('viewsUsuario.estadoCuenta');
            $username = auth()->user()->username;
            $cuenta = cuentas::where('usuario_id', $username)->firstOrFail();
            $compras = venta_realizada::where('usuario_comprador', $username)->join('publicacion_ventas', 'venta_realizadas.producto_id', 'publicacion_ventas.id')->select('venta_realizadas.*', 'publicacion_ventas.nombre as nombre_producto')
                ->latest()
                ->get();

            return view('viewsUsuario.estadoCuenta', ['cuenta' => $cuenta, 'compras' => $compras]);

        } else {

//a;adir el where estado aqui
            // $ventas = PublicacionVenta::latest()->get();

            return redirect()->route('homeGeneral')->withErrors(['error' => 'Error: ' . 'Inicie Sesion o registrese para poder publicar sus productos']);
        }


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
    public function store($username)
    {
        //
        $estadoInil = 0;


        cuentas::create([

            'usuario_id' => $username,
            'monto_ventas' => $estadoInil,
            'monto_otros' => $estadoInil,

        ]);

        return view('homeGeneral');
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

    public function pantallaRecarga()
    {

        if (auth()->check()) {
            $username = auth()->user()->username;
            //validar el dinero del cliente
            $cuenta = cuentas::where('usuario_id', $username)->firstOrFail();
            return view('viewsUsuario.recargarCuenta', ['cuenta' => $cuenta]);


        } else {
            return $this->index();
        }


    }


    public function pantallaRetiro(Request $request)
    {

        if (auth()->check()) {
            $username = auth()->user()->username;
            //validar el dinero del cliente
            $cuenta = cuentas::where('usuario_id', $username)->firstOrFail();
            return view('viewsUsuario.retirarCuenta', ['cuenta' => $cuenta]);


        } else {
            return $this->index();
        }


    }

    public function recargarJades(Request $request)
    {


        $usuario = $request->input('usuario_id');
        $cantidad = $request->input('cantidad');

        $cuenta = cuentas::where('usuario_id', $usuario)->firstOrFail();

        $cuenta->increment('monto_ventas', $cantidad);

        return $this->index()->with('succes', 'Oferta realiazada con exito');


    }


    public function retirarJades(Request $request)
    {
       // dd($request->all());




        DB::beginTransaction();

        try {

            $usuario = $request->input('usuario_id');
            $cantidad = $request->input('cantidad');
            $cuenta = cuentas::where('usuario_id', $usuario)->firstOrFail();

            $saldoDisponible = $cuenta->monto_ventas;

            if ($saldoDisponible < $cantidad) {
                throw new \Exception('No tiene suficientes jades para realizar esta compra.');
            }

            $cuenta->decrement('monto_ventas', $cantidad);

            $cuenta->update();
            // Confirmar la transacción
            DB::commit();


            return view('cuentaH.index')->with(['success', 'Retiro Exitoso']);

        } catch (\Exception $e) {
            // Revertir la transacción en caso de error
            DB::rollback();

            //  return response()->json(['message' => 'Error al procesar la compra: ' . $e->getMessage()], 500);

            return $this->index()->withErrors(['error' => 'Error: ' . 'Error al procesar']);
        }





    }


}
