<?php

use App\Http\Controllers\CabeceraController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\MensajesController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\PlanesController;
use App\Http\Controllers\PreguntasController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SeccionesController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\TestimoniosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home']);
Route::post('mensajes/send', [MensajesController::class, 'store'])->name('mensaje.send');


Route::group(['middleware' => 'auth'], function () {
	
	Route::get('dashboard/', function () {
		return redirect('/dashboard/inicio');
	});
	
	Route::get('dashboard/inicio', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('/dashboard/billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('/dashboard/profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('/dashboard/user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('/dashboard/tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('/dashboard/virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('/dashboard/static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('/dashboard/static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

	Route::get('/dashboard/mensajes', [MensajesController::class, 'index'])->name('dashboard.mensajes');
	Route::get('/dashboard/mensajes/edit/{id}', [MensajesController::class, 'update']);
	Route::post('/dashboard/mensajes/update', [MensajesController::class, 'store'])->name('mensajes.update');


	Route::get('/dashboard/cabecera', [CabeceraController::class, 'index'])->name('dashboard.cabecera');
	Route::post('/dashboard/cabecera', [CabeceraController::class, 'store'])->name("cabecera.store");

	Route::get('/dashboard/menus', [MenusController::class, 'index']);
	Route::get('/dashboard/empresa', [EmpresaController::class, 'index'])->name('dashboard.empresa');
	Route::post('/dashboard/empresa', [EmpresaController::class, 'store'])->name('empresa.store');


	Route::get('/dashboard/secciones', [SeccionesController::class, 'index'])->name('dashboard.secciones');
	Route::get('/dashboard/secciones/create', [SeccionesController::class, 'create'])->name('dashboard.secciones.create');
	Route::get('/dashboard/secciones/edit/{id}', [SeccionesController::class, 'update']);
	Route::post('/dashboard/secciones', [SeccionesController::class, 'store'])->name('secciones.store');
	Route::get('/dashboard/secciones/delete/{id}', [SeccionesController::class, 'delete'])->name('secciones.delete');


	Route::get('/dashboard/planes', [PlanesController::class, 'index'])->name('dashboard.planes');
	Route::get('/dashboard/planes/create', [PlanesController::class, 'create'])->name('dashboard.planes.create');
	Route::get('/dashboard/planes/edit/{id}', [PlanesController::class, 'update']);
	Route::post('/dashboard/planes', [PlanesController::class, 'store'])->name('planes.store');
	Route::get('/dashboard/planes/delete/{id}', [PlanesController::class, 'delete'])->name('planes.delete');


	Route::get('/dashboard/testimonios', [TestimoniosController::class, 'index'])->name('dashboard.testimonios');
	Route::get('/dashboard/testimonios/create', [TestimoniosController::class, 'create'])->name('dashboard.testimonios.create');
	Route::get('/dashboard/testimonios/edit/{id}', [TestimoniosController::class, 'update']);
	Route::post('/dashboard/testimonios', [TestimoniosController::class, 'store'])->name('testimonios.store');
	Route::get('/dashboard/testimonios/delete/{id}', [TestimoniosController::class, 'delete'])->name('testimonios.delete');


	Route::get('/dashboard/preguntas', [PreguntasController::class, 'index'])->name('dashboard.preguntas');
	Route::get('/dashboard/preguntas/create', [PreguntasController::class, 'create'])->name('dashboard.preguntas.create');
	Route::get('/dashboard/preguntas/edit/{id}', [PreguntasController::class, 'update']);
	Route::post('/dashboard/preguntas', [PreguntasController::class, 'store'])->name('preguntas.store');
	Route::get('/dashboard/preguntas/delete/{id}', [PreguntasController::class, 'delete'])->name('preguntas.delete');


    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/dashboard/user-profile', [InfoUserController::class, 'create']);
	Route::post('/dashboard/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');