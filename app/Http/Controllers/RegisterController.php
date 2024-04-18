<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\cuentaMonetariaController;

class RegisterController extends Controller
{
    //
    public function show()
    {
        return view('auth.register');
    }


    public function register(RegisterRequest $request)
    {

        $data = $request->validated();
        $data['rol']=2;
        $user = User::create($data);

      $objetoC = new cuentaMonetariaController();

      $objetoC->store($request->username);


        return redirect('/')>with(['success', 'Registro Exitoso']);
    }
}
