<?php

namespace App\Http\Controllers;

use App\Models\Preguntas;
use Illuminate\Http\Request;

class PreguntasController extends Controller
{
    public function index()
    {
        $preguntas = Preguntas::paginate(100);
        return view("dashboard.preguntas.index",compact('preguntas'));
    }
    
    public function create()
    {   
        $titulo = "Nueva pregunta";
        $pregunta = null;
        return view("dashboard.preguntas.form", compact('titulo','pregunta'));
    }
   
    public function update($id)
    {   
        $titulo = "Editar pregunta";
        $pregunta = Preguntas::find($id);
        return view("dashboard.preguntas.form", compact('titulo','pregunta'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pregunta' => 'required',
            'respuesta' => 'required'
        ]);
       
        $data["state"] = ($request->state == "on")? "1" : "0";
       
        if(!$request->id){
            //Registra la nueva pregunta
            Preguntas::create($data);
        }else{
            Preguntas::where('id', $request->id)->update($data);
        }

        return redirect()->back()->with('message', 'Datos actualizados correctamente!!');
    }

    public function delete($id)
    {
        if(Preguntas::where("id", $id)->delete()){
            return redirect()->route("dashboard.preguntas")->with('message', 'Pregunta eliminada correctamente!!');
        }
    }
}
