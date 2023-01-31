<?php

namespace App\Http\Controllers;

use App\Models\Cabecera;
use Illuminate\Http\Request;

class CabeceraController extends Controller
{
    public function index()
    {
        $cabecera = Cabecera::find(1);
        return view("dashboard.cabecera.index", compact('cabecera'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required'
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen');
            $filename = $request->file('imagen')->getClientOriginalName();
            $data['imagen']->move(public_path('images/cabecera'), $filename);
            $data['imagen'] = "images/cabecera/".$filename;
        }

        //Actualizo la información de la cabecera
        Cabecera::where('id', 1)->update($data);
        return redirect()->route('dashboard.cabecera')->with('message', 'Datos actualizados correctamente!!');
    }
}
