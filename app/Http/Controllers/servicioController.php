<?php

namespace App\Http\Controllers;

use App\Models\publi_intercambios;
use App\Models\publicacion_servicios;
use App\Models\PublicacionVenta;
use App\Models\voluntariados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class servicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        if (auth()->check()) {
            $username = auth()->user()->username;

            $servicios = publicacion_servicios::where('user_propietario', '!=', $username)
                ->latest()
                ->get();
            return view('viewsServicio.servicioHome', ['servicios' => $servicios]);
        } else {

//a;adir el where estado aqui
            // $ventas = PublicacionVenta::latest()->get();

            $servicios = publicacion_servicios::
                latest()
                ->get();


            return view('viewsServicio.servicioHome', ['servicios' => $servicios]);


        }

    }

    public function misServicios()
    {



        if (auth()->check()) {
            $username = auth()->user()->username;
            $intercambios = publicacion_servicios::where('user_propietario', '=', $username)
                ->latest()
                ->get();


            return view('viewsServicio.misServicios', ['servicios' => $intercambios]);

        } else {

//a;adir el where estado aqui
            // $ventas = PublicacionVenta::latest()->get();
            return redirect()->route('homeGeneral')->withErrors(['error' => 'Error: ' . 'Inicie Sesion o registrese para poder acceder']);

        }




    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        if (auth()->check()) {


            return view('viewsServicio.formPubliServicio');
        } else {


            return view('auth.login')->withErrors(['error' => 'Error: ' . 'Inicie Sesion o registrese para poder Publicar']);

        }



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


        publicacion_servicios::create([

            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'imagen' => $url,
            'user_propietario' => $username,


        ]);


        return $this->index();


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
}
