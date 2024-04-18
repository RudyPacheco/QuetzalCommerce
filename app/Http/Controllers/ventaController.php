<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use App\Models\cuentas;
use App\Models\PublicacionVenta;
use App\Models\User;
use App\Models\venta_realizada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ventaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categoriass = categorias::all();

        if (auth()->check()) {
            $username = auth()->user()->username;

            $ventas = PublicacionVenta::where('user_propietario', '!=', $username)->where('estado_publicacion', 1)->where('cantidad','>','0')
                ->latest()
                ->get();
            return view('compraPage', ['ventas' => $ventas, 'categoriass' => $categoriass]);
        } else {

//a;adir el where estado aqui
            // $ventas = PublicacionVenta::latest()->get();

            $ventas = PublicacionVenta::where('estado_publicacion', 1)->where('cantidad','>','0')
                ->latest()
                ->get();


            return view('compraPage', ['ventas' => $ventas, 'categoriass' => $categoriass]);


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


    public function filtrarVentas(Request $request)
    {
        $categoriaId = $request->input('categoria');

        if ($categoriaId == 'todos') {


            return redirect()->route('comprasPubli.index');

        } else {
            $categoriass = categorias::all();
            if (auth()->check()) {
                $username = auth()->user()->username;

                $ventas = PublicacionVenta::where('user_propietario', '!=', $username)->where('estado_publicacion', 1)->where('categoria', $categoriaId)
                    ->latest()
                    ->get();

                return view('compraPage', ['ventas' => $ventas, 'categoriass' => $categoriass]);
            } else {

//a;adir el where estado aqui
                // $ventas = PublicacionVenta::latest()->get();

                $ventas = PublicacionVenta::where('estado_publicacion', 1)->where('categoria', $categoriaId)
                    ->latest()
                    ->get();


                return view('compraPage', ['ventas' => $ventas, 'categoriass' => $categoriass]);


            }

        }


    }


    public function comprarProducto( Request $requestId)
    {









        if (auth()->check()){
            $idSel = $requestId->input('id');
            //dd($requestId->all());
            $ventaSel = PublicacionVenta::findOrFail($idSel);

            $username = auth()->user()->username;
            $cuenta = cuentas::where('usuario_id', $username)->firstOrFail();

            return view('viewsComprar.viewPago',['ventaSel'=>$ventaSel,'cuenta'=>$cuenta]);
        }else{



            return view('auth.login')->withErrors(['error' => 'Error: ' . 'Inicie Sesion o registrese para poder comprar']);

        }




    }


    public function procesarCompra(Request $requestId)
    {

        if (auth()->check()) {
            $username = auth()->user()->username;

            $productoId = $requestId->input('id');
            $cantidad = $requestId->input('cantidad');

            DB::beginTransaction();

            try {
                // Obtener el cliente
               // $cliente = User::findOrFail($username);

                // Obtener el producto falta verificar el stock
                $producto = PublicacionVenta::findOrFail($productoId);

                if ($producto->cantidad < $cantidad) {
                    throw new \Exception('No hay suficiente stock disponible para esta compra.');
                }


               // $precioTotal = $producto->precio * $cantidad;

                //validar el dinero del cliente
                $cuenta = cuentas::where('usuario_id', $username)->firstOrFail();

                $saldoTotal = $cuenta->monto_ventas + $cuenta->monto_otros;

                // Verificar si el cliente tiene suficiente dinero
                $precioTotal = $producto->precio * $cantidad;
                if ($saldoTotal < $precioTotal) {
                    throw new \Exception('No tiene suficientes jades para realizar esta compra.');
                }


                // Verificar primero el monto en montos_ventas
                if ($cuenta->monto_ventas >= $precioTotal) {
                    $cuenta->decrement('monto_ventas', $precioTotal);
                } else {
                    // Restar lo que falta de montos_ventas y el resto de montos_otros
                    $restantePorCubrir = $precioTotal - $cuenta->monto_ventas;
                    $cuenta->monto_ventas = 0;

                    $cuenta->monto_otros->decrement('monto', $restantePorCubrir);

                    $cuenta->update();


                }

                // Actualizar el stock del producto
                $producto->decrement('cantidad', $cantidad);

                $fechaActual = date('Y-m-d');

                //buscar al usuario vendedor del producto y sumarle el monto
                $user_propietario = $producto->user_propietario;

                $cuentaVendedor = cuentas::where('usuario_id', $user_propietario)->firstOrFail();

                $cuentaVendedor->increment('monto_ventas',$precioTotal);


                // Realizar la compra
                $nuevaCompra = new venta_realizada();
                $nuevaCompra->fecha = $fechaActual;
                $nuevaCompra->usuario_vendedor = $producto->user_propietario;
                $nuevaCompra->usuario_comprador = $username;
                $nuevaCompra->producto_id = $producto->id;
                $nuevaCompra->cantidad = $cantidad;
                $nuevaCompra->precio_total = $precioTotal;
                $nuevaCompra->save();



                // Confirmar la transacción
                DB::commit();

               // return response()->json(['message' => 'Compra realizada con éxito'], 200);

                return redirect()->route('comprasPubli.index')->with('succes','Compra realiazada con exito');


            } catch (\Exception $e) {
                // Revertir la transacción en caso de error
                DB::rollback();

              //  return response()->json(['message' => 'Error al procesar la compra: ' . $e->getMessage()], 500);

                return view('viewsComprar.viewPago',['ventaSel'=>$producto])->withErrors(['error' => 'Error al procesar la compra  '. $e->getMessage()]);

            }






        } else {

            return view('homeGeneral');
        }


    }





}
