<?php

namespace App\Http\Controllers;

use App\Models\PublicacionVenta;
use App\Models\categorias;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ControllerPublicacionventa extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        if(auth()->check()){
            $username = auth()->user()->username;

            $ventas = PublicacionVenta::where('user_propietario', '=', $username)->latest()->get();
            return view('ventaPage',['ventas'=>$ventas]);

        }else {

//a;adir el where estado aqui
            // $ventas = PublicacionVenta::latest()->get();

            return redirect()->route('homeGeneral')->withErrors(['error' => 'Error: ' . 'Inicie Sesion o registrese para poder publicar sus productos']);
        }


        //logica para que inicie sesion


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categoriass = categorias::all();
        return view('formularioPublicacion',['categoriass'=>$categoriass]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
     //   dd($request->all());
        $estado = 0;
        $estadoDispo = 'disponible';
        $username = auth()->user()->username;

        $imagenPath = $request->file('imagen')->store('public/images');
        $url = Storage::url($imagenPath);

        $cantidadPublisAceptadsa = PublicacionVenta::where('user_propietario',$username)->where('estado_publicacion',1)->count();

        if ($cantidadPublisAceptadsa==5){
            $estado=1;
        }

        PublicacionVenta::create([
            'id' => $request->id,
            'nombre' => $request->nombre,
            'estado_producto' => $request->estado_producto,
            'precio' => $request->precio,
            'categoria' => $request->categoria,
            'cantidad' => $request->cantidad,
            'descripcion' => $request->descripcion,
            'imagen'=>$url,
            'user_propietario' => $username,
            'estado_publicacion' => $estado,
            'estado_disponibilidad'=>$estadoDispo

        ]);

        return view('homeGeneral')->with(['success', 'Registro Exitoso']);

    }

    /**
     * Display the specified resource.
     */
    public function show($publicacionVenta)
    {




      //  return view('compraPage', ['ventas' => $ventas, 'categoriass' => $categoriass]);


        //


        $ventaSel = PublicacionVenta::findOrFail($publicacionVenta); // Recupera la venta por ID


       // $categoriaId = $ventaSel->input('categoria');

        $categoriaId = $ventaSel->categoria;

        // Obtener otros productos de la misma categoría
        $productosSimilares = PublicacionVenta::where('categoria', $categoriaId)
            ->where('id', '<>', $ventaSel->id) // Excluir el producto actual
            ->take(4) // Tomar hasta 4 productos de la misma categoría
            ->get();


        // Completar con otros productos si es necesario
        if ($productosSimilares->count() < 4) {
            $productosFaltantes = PublicacionVenta::where('categoria', '<>', $categoriaId)
                ->where('id', '<>', $ventaSel->id) // Excluir el producto actual
                ->take(4 - $productosSimilares->count()) // Tomar los productos faltantes
                ->get();

            $productosSimilares = $productosSimilares->merge($productosFaltantes);
        }






        return view('detallesProducto',['ventaSel'=>$ventaSel,'prodSimilares'=>$productosSimilares->take(4)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PublicacionVenta $publicacionVenta)
    {
        //
        dd($publicacionVenta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PublicacionVenta $publicacionVenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PublicacionVenta $publicacionVenta)
    {
        //
    }
}
