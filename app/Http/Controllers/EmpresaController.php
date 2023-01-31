<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresa = Empresa::find(1);
        return view("dashboard.empresa.index", compact('empresa'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'correo_electronico' => 'required',
            'telefono' => 'required',
            'direccion' => 'required'
        ]);

        //Actualizo la información de la empresa
        Empresa::where('id', 1)->update($data);
        return redirect()->route('dashboard.empresa')->with('message', 'Datos actualizados correctamente!!');
    }
}
