<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ControllerPublicacionventa;
use App\Http\Controllers\ventaController;
use App\Http\Controllers\solicitudVentaController;
use App\Http\Controllers\voluntariadoController;
use App\Http\Controllers\intercambioController;
use App\Http\Controllers\servicioController;

use App\Http\Controllers\cuentaMonetariaController;

Route::view('/','homeGeneral')->name('index');

#Route::view('/register','register')->name('register');
Route::get('/register',function (){
   return view('auth.register');
})->name('registro');

Route::post('/register',[RegisterController::class,'register'])->name('register');


Route::get('/login',function (){
    return view('auth.login');
})->name('iniciarSesion');

Route::post('/login',[LoginController::class,'login'])->name('login');

Route::get('/logout',[LogoutController::class,'logout'])->name('logout');





#Route::post('/QuetzalCommerce/public/registerDos',[RegisterController::class,'register']);



Route::view('/homeG','homeGeneral')->name('homeGeneral');

Route::view('/admin','homeAndmin')->name('homeAndmin');


Route::resource('publiVenta',ControllerPublicacionventa::class);




Route::resource('comprasPubli',ventaController::class);
Route::get('comprasPubliFilter',[ventaController::class,'filtrarVentas'])->name('filtrar.ventas');


Route::resource('solicitudVentas',solicitudVentaController::class);


//controller para intercambio
Route::resource('intercambioH',intercambioController::class);
Route::get('/intercambio/ofertar',[intercambioController::class,'publicarOferta'])->name('intercambio.ofertar');
Route::post('/intercambio/registarOferta',[intercambioController::class,'registrarOferta'])->name('intercambio.registarOferta');
Route::get('/intercambio/mi',[intercambioController::class,'misIntercambios'])->name('intercambio.mios');
Route::get('/intercambio/ofertas',[intercambioController::class,'ofertasIntercambio'])->name('intercambio.ofertas');
Route::get('/intercambio/aceptar',[intercambioController::class,'aceptarIntercambio'])->name('intercambio.aceptar');


Route::get('/intercambio/{id}/detalles',[intercambioController::class,'show'])->name('intercambio.detalles');

//controller para la ceunta monetaria
Route::resource('cuentaH',cuentaMonetariaController::class);

Route::get('/cuentaR',[cuentaMonetariaController::class,'pantallaRetiro'])->name('cuenta.retiro');
Route::get('/cuentaRecarga',[cuentaMonetariaController::class,'pantallaRecarga'])->name('cuenta.recarga');
Route::post('/cuentaEjecutarR',[cuentaMonetariaController::class,'recargarJades'])->name('cuenta.ejecutarRecarga');
Route::post('/cuentaEjecutarRetiro',[cuentaMonetariaController::class,'retirarJades'])->name('cuenta.ejecutarRetiro');


Route::view('/publicacionForm',' formularioPublicacion')->name('formularioPublicacion');

Route::view('/formVoluntariado',' viewsVoluntariado.formuPubliVoluntariado')->name('formularioVoluntariado');


Route::get('/producto/{id}/detalles',[ControllerPublicacionventa::class,'show'])->name('venta.detalles');

//pantalla de compra
Route::get('/producto/compra',[ventaController::class,'comprarProducto'])->name('venta.comprar');

Route::get('/producto/pago',[ventaController::class,'procesarCompra'])->name('venta.pagar');

//servicios
Route::resource('serviciosHome',servicioController::class);
Route::get('/serviciosmi',[servicioController::class,'misServicios'])->name('servicios.mios');

//voluntariado
Route::get('/producto/inscripcion',[voluntariadoController::class,'inscribirse'])->name('voluntariado.inscribir');
Route::get('/producto/anular',[voluntariadoController::class,'anularInscripcion'])->name('voluntariado.anular');
Route::get('/voluntariado/mi',[voluntariadoController::class,'misVoluntariados'])->name('voluntariado.mios');
Route::get('/voluntariado/participantes',[voluntariadoController::class,'participantesVoluntariado'])->name('voluntariado.participantes');

Route::post('/voluntariado/ejecutar',[voluntariadoController::class,'ejecutarVoluntariado'])->name('guardar-asistencia');



Route::get('/solicitudVentas/{id}/aceptar',[solicitudVentaController::class,'aceptarVenta'])->name('solicitudVentas.aceptar');


Route::resource('voluntariadoHome',voluntariadoController::class);
Route::get('/voluntariado/{id}/detalles',[voluntariadoController::class,'show'])->name('voluntariado.detalles');



Route::view('/ventas','ventaPage')->name('ventaPage');
Route::view('/compra','compraPage')->name('compraPage');
Route::view('/voluntariado','voluntariadoPage')->name('voluntariadoPage');
//Route::view('/intercambio','intercambioPage')->name('intercambioPage');

Route::view('/chat','chatPage')->name('chatPage');
