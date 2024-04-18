<?php

namespace App\Http\Controllers;

use App\Models\asistencia_voluntariado;
use App\Models\cuentas;
use App\Models\inscripcion_voluntariado;
use App\Models\PublicacionVenta;
use App\Models\venta_realizada;
use App\Models\voluntariados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class voluntariadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (auth()->check()) {
            $username = auth()->user()->username;

            $voluntariados = voluntariados::where('usuario_promotor', '!=', $username)
            ->latest()
            ->get();

            return view('voluntariadoPage', ['voluntariados' => $voluntariados]);
        } else {
            $voluntariados = voluntariados::
                latest()
                ->get();
            return view('voluntariadoPage', ['voluntariados' => $voluntariados]);
        }





    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        if (auth()->check()) {


            return view('viewsVoluntariado.formuPubliVoluntariado');
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


        voluntariados::create([
            'id' => $request->id,
            'titulo' => $request->titulo,
            'detalles' => $request->detalles,
            'fecha' => $request->fecha,
            'imagen' => $url,
            'usuario_promotor' => $username,


        ]);


        return view('homeGeneral');


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //

        //
        if (auth()->check()) {

            $username = auth()->user()->username;

            $voluntariadoSel = voluntariados::findOrFail($id); // Recupera la venta por ID

            $estaInscrito  = inscripcion_voluntariado::where('voluntariado_id',$id)->where('usuario_id', $username)->exists();



            return view('viewsVoluntariado.detallesVoluntariado', ['voluntariadoSel' => $voluntariadoSel,'estaInscrito'=>$estaInscrito]);



        } else {

            $voluntariadoSel = voluntariados::findOrFail($id); // Recupera la venta por ID

            return view('viewsVoluntariado.detallesVoluntariado', ['voluntariadoSel' => $voluntariadoSel]);


        }





    }


    public function misVoluntariados()
    {
        if (auth()->check()) {
            $username = auth()->user()->username;

            $voluntariados = voluntariados::where('usuario_promotor', '=', $username)
                ->latest()
                ->get();


            return view('viewsVoluntariado.misVoluntariados', ['voluntariados' => $voluntariados]);
        } else {

            return $this->index()->withErrors(['error' => 'Error: ' . 'Inicie Sesion o registrese para poder seguir']);
        }






    }

    public function participantesVoluntariado(Request $request)
    {


        $id = $request->input('id');
        if (auth()->check()) {

            $username = auth()->user()->username;

            $voluntariadoSel = voluntariados::findOrFail($id); // Recupera la venta por ID

            $inscritos  = inscripcion_voluntariado::all();



            return view('viewsVoluntariado.participantesVoluntariado', ['voluntariadoSel' => $voluntariadoSel,'inscritos'=>$inscritos]);



        } else {

            $voluntariadoSel = voluntariados::findOrFail($id); // Recupera la venta por ID

            return view('viewsVoluntariado.detallesVoluntariado', ['voluntariadoSel' => $voluntariadoSel]);


        }

    }

    public function ejecutarVoluntariado(Request $request)
    {

        $eventoId = $request->input('evento_id');
        $asistenciaData = $request->input('asistencia');
        $fechaActual = date('Y-m-d');

        DB::beginTransaction();

        try {

        foreach ($asistenciaData as $inscritoId => $asistio) {
            if ($asistio == 1) {

                /* Crear un registro en la tabla de asistentes
                asistencia_voluntariado::created([
                    'usuario_id' => $inscritoId,
                    'voluntariado_id' => $eventoId,
                    'fecha' => $fechaActual,

                ]);*/

                $nuevaAsistencia = new asistencia_voluntariado();
                $nuevaAsistencia->usuario_id=$inscritoId;
                $nuevaAsistencia->voluntariado_id=$eventoId;
                $nuevaAsistencia->fecha=$fechaActual;

                $nuevaAsistencia->save();
            }
        }


        $voluntariadoSel = voluntariados::findOrFail($eventoId);
        $voluntariadoSel->estado='Realizado';
        $voluntariadoSel->update();

            // Confirmar la transacción
            DB::commit();


            return $this->index()->with(['success', 'Voluntariado Exitoso']);

        } catch (\Exception $e) {
            // Revertir la transacción en caso de error
            DB::rollback();

            //  return response()->json(['message' => 'Error al procesar la compra: ' . $e->getMessage()], 500);

            return $this->index()->withErrors(['error' => 'Error: ' . 'Error al procesar']);
        }
    }







// return response()->json(['message' => 'Compra realizada con éxito'], 200);








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


    public function inscribirse(Request $request)
    {

        $voluntariadoID = $request->input('id');


        // Realizar la compra


        if (auth()->check()) {
            $username = auth()->user()->username;

            $nuevaInscripcion = new inscripcion_voluntariado();
            $nuevaInscripcion->usuario_id = $username;
            $nuevaInscripcion->voluntariado_id=$voluntariadoID;
            $nuevaInscripcion->save();

            return $this->index();

        } else {
            return view('auth.login')->withErrors(['error' => 'Error: ' . 'Inicie Sesion o registrese para poder Publicar']);
        }


    }


    public function anularInscripcion(Request $request)
    {

        $voluntariadoID = $request->input('id');

        if (auth()->check()) {
            $username = auth()->user()->username;

            $voluntariadoSel = inscripcion_voluntariado::where('voluntariado_id',$voluntariadoID);

            $voluntariadoSel->delete();

            return $this->index();

        } else {
            return view('auth.login')->withErrors(['error' => 'Error: ' . 'Inicie Sesion o registrese para poder Publicar']);
        }
    }
}
