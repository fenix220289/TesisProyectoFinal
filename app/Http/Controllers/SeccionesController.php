<?php

namespace App\Http\Controllers;

use App\Models\Secciones;
use Illuminate\Http\Request;

class SeccionesController extends Controller
{
    public function index()
    {
        $secciones = Secciones::paginate(100);
        return view("dashboard.secciones.index", compact('secciones'));
    }

    public function create()
    {
        $titulo = "Nuevo sección";
        $seccion = null;
        return view("dashboard.secciones.form", compact("titulo","seccion"));
    }

    public function update($id)
    {   
        $titulo = "Editar Sección";
        $seccion = Secciones::find($id);
        return view("dashboard.secciones.form", compact('titulo','seccion'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'contenido' => 'required'
        ]);
       
        $data["state"] = ($request->state == "on")? "1" : "0";
       
        if(!$request->id){
            //Registra nueva sección de la página
            Secciones::create($data);
        }else{
            //Actualiza la sección de la página
            Secciones::where('id', $request->id)->update($data);
        }

        return redirect()->back()->with('message', 'Datos actualizados correctamente!!');
    }

    public function delete($id)
    {
        if(Secciones::where("id", $id)->delete()){
            return redirect()->route("dashboard.secciones")->with('message', 'Sección eliminada correctamente!!');
        }
    }
}
