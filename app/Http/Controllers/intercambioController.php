<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use App\Models\inscripcion_voluntariado;
use App\Models\ofertas_intercambio;
use App\Models\PublicacionVenta;
use App\Models\registro_intercambio;
use App\Models\venta_realizada;
use App\Models\voluntariados;
use App\Models\publi_intercambios;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class intercambioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //


        if (auth()->check()) {
            $username = auth()->user()->username;
            $intercambios = publi_intercambios::where('usuario_propietario', '!=', $username)->where('estado', 'Activo')
                ->latest()
                ->get();


            return view('intercambioPage', ['intercambios' => $intercambios]);

        } else {

//a;adir el where estado aqui
            // $ventas = PublicacionVenta::latest()->get();

            $intercambios = publi_intercambios::where('estado', 'Activo')
                ->latest()
                ->get();


            return view('intercambioPage', ['intercambios' => $intercambios]);

               }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $categoriass = categorias::all();
        return view('viewsIntercambio.formPubliIntercambio', ['categoriass' => $categoriass]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //

        $username = auth()->user()->username;

        $imagenPath = $request->file('imagen')->store('public/images');
        $url = Storage::url($imagenPath);

        // $cantidadPublisAceptadsa = PublicacionVenta::where('user_propietario',$username)->where('estado_producto',1)->count();

        //  if ($cantidadPublisAceptadsa>=5){
        //      $estado=1;
        //   }

        publi_intercambios::create([
            'id' => $request->id,
            'nombre' => $request->nombre,
            'objeto_busqueda' => $request->objeto_busqueda,
            'categoria' => $request->categoria,
            'detalles' => $request->detalles,
            'imagen' => $url,
            'usuario_propietario' => $username,

        ]);

        return view('homeGeneral');

        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //

        //
        $intercambioSel = publi_intercambios::findOrFail($id); // Recupera la venta por ID
        return view('viewsIntercambio.detallesIntercambio', ['intercambioSel' => $intercambioSel]);

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

    public function publicarOferta(Request $request)
    {

        if (auth()->check()) {


            $id = $request->input('id');

            $intercambioSel = publi_intercambios::findOrFail($id); // Recupera la venta por ID

            $username = auth()->user()->username;

            // $intercambioSel = publi_intercambios::findOrFail($id); // Recupera la venta por ID

            $productosDisponibles = PublicacionVenta::where('user_propietario', '=', $username)->where('estado_disponibilidad', 'disponible')->where('cantidad', '>', '0')->where('estado_publicacion', 1)
                ->latest()->get();


            return view('viewsIntercambio.formOfertaIntercambio', ['productosDisponibles' => $productosDisponibles, 'intercambioSel' => $intercambioSel]);

        } else {

            return redirect()->route('homeGeneral')->withErrors(['error' => 'Error: ' . 'Inicie Sesion o registrese para poder publicar sus productos']);

        }


    }


    public function registrarOferta(Request $request)
    {
        //   dd($request->all());

        if (auth()->check()) {


            $username = auth()->user()->username;
            $intercambioid = $request->input('intercambio_id');
            $produto_id = $request->input('producto_id');
            $cantidad = $request->input('producto_id');
            $fechaActual = date('Y-m-d');

            $estado = 'pendiente';

            DB::beginTransaction();
            try {

                ofertas_intercambio::create([
                    'inercambio_id' => $intercambioid,
                    'usuario_ofreciendo' => $username,
                    'producto_ofrecido' => $produto_id,
                    'cantidad' => $cantidad,
                    'estado' => $estado,
                    'fecha' => $fechaActual,


                ]);

                $producto = PublicacionVenta::findOrFail($produto_id);


                $producto->estado_publicacion = 3;
                $producto->estado_disponibilidad = 'Apartado';
                $producto->update();

                // Confirmar la transacción
                DB::commit();

                // return response()->json(['message' => 'Compra realizada con éxito'], 200);

                return $this->index()->with('succes', 'Oferta realiazada con exito');


            } catch (\Exception $e) {
                // Revertir la transacción en caso de error
                DB::rollback();

                //  return response()->json(['message' => 'Error al procesar la compra: ' . $e->getMessage()], 500);

                return $this->index()->withErrors(['error' => 'Error al procesar la oferta  ' . $e->getMessage()]);

            }


        } else {

            return redirect()->route('homeGeneral')->withErrors(['error' => 'Error: ' . 'Inicie Sesion o registrese para poder publicar sus productos']);

        }


    }



    public function misIntercambios()
    {



        if (auth()->check()) {
            $username = auth()->user()->username;
            $intercambios = publi_intercambios::where('usuario_propietario', '=', $username)
                ->latest()
                ->get();


            return view('viewsIntercambio.misIntercambios', ['intercambios' => $intercambios]);

        } else {

//a;adir el where estado aqui
            // $ventas = PublicacionVenta::latest()->get();
            return $this->index()->withErrors(['error' => 'Error: ' . 'Inicie Sesion o registrese para poder seguir']);

              }




    }




    public function ofertasIntercambio(Request $request)
    {



        $id = $request->input('id');
        if (auth()->check()) {

            $username = auth()->user()->username;



            $ofertas  = ofertas_intercambio::all();

$ofertasConProductos = ofertas_intercambio::join('publicacion_ventas','ofertas_intercambios.producto_ofrecido','publicacion_ventas.id')->select('ofertas_intercambios.*','publicacion_ventas.nombre as nombre_producto')

    ->latest()
    ->get();

      $compras = venta_realizada::where('usuario_comprador',$username)->join('publicacion_ventas','venta_realizadas.producto_id','publicacion_ventas.id')->select('venta_realizadas.*','publicacion_ventas.nombre as nombre_producto')
          ->latest()
          ->get();


     // dd($ofertasConProductos);

            $intercambioSel = publi_intercambios::findOrFail($id); // Recupera la venta por ID
            return view('viewsIntercambio.ofertasIntercambio', ['intercambioSel' => $intercambioSel,'ofertas'=>$ofertasConProductos]);




        } else {
//?????
            $intercambioSel = publi_intercambios::findOrFail($id); // Recupera la venta por ID
            return view('viewsIntercambio.detallesIntercambio', ['intercambioSel' => $intercambioSel]);


        }

    }


    public function aceptarIntercambio(Request $request)
    {


        $id = $request->input('id');





        if (auth()->check()) {


            $username = auth()->user()->username;





            $fechaActual = date('Y-m-d');

            $estado = 'pendiente';

            DB::beginTransaction();

            //buscamos la oferta
            $ofertaSel = ofertas_intercambio::findOrFail($id);

            //buscamos el intercambio
            $intercambioSel = publi_intercambios::findOrFail($ofertaSel->inercambio_id); // Recupera la venta por ID




            //$prodcutoIntercambio = PublicacionVenta::findOrFail($produto_id);


            try {



                //cambiar modelo por registro

                registro_intercambio::create([
                    'inercambio_id' => $ofertaSel->inercambio_id,
                    'usuario_intercambio' => $intercambioSel->usuario_propietario,
                    'usuario_ofertante' => $ofertaSel->usuario_ofertante,
                    'producto_ofrecido_id' => $intercambioSel->id,
                    'producto_ofertado_id' => $ofertaSel->producto_ofrecido,
                    'fecha' => $fechaActual,


                ]);

                $producto = PublicacionVenta::findOrFail($ofertaSel->producto_ofrecido);

//verificar cantidad del producto

                if ($producto->cantidad < $ofertaSel->cantidad) {
                    throw new \Exception('No hay suficiente stock disponible para esta compra.');
                }

                $producto->decrement('cantidad', $ofertaSel->cantidad);

                $producto->update();

                // Confirmar la transacción
                DB::commit();

                // return response()->json(['message' => 'Compra realizada con éxito'], 200);

                return $this->index()->with('succes', 'Oferta realiazada con exito');


            } catch (\Exception $e) {
                // Revertir la transacción en caso de error
                DB::rollback();

                //  return response()->json(['message' => 'Error al procesar la compra: ' . $e->getMessage()], 500);

                return $this->index()->withErrors(['error' => 'Error al procesar la oferta  ' . $e->getMessage()]);

            }


        } else {

            return redirect()->route('homeGeneral')->withErrors(['error' => 'Error: ' . 'Inicie Sesion o registrese para poder publicar sus productos']);

        }







    }


}
