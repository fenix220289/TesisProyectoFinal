<?php

namespace App\Http\Controllers;

use App\Models\Mensajes;
use Illuminate\Http\Request;

class MensajesController extends Controller
{
    public function index()
    {
        $mensajes = Mensajes::paginate(100);
        return view("dashboard.mensajes.index", compact('mensajes'));
    }

    public function update($id)
    {   
        $titulo = "Editar mensaje";
        $mensaje = Mensajes::find($id);
        return view("dashboard.mensajes.form", compact('titulo','mensaje'));
    }

    public function store(Request $request)
    {
        if(!$request->id){

            $data = $request->validate([
                'nombre' => 'required',
                'asunto' => 'required',
                'contacto' => 'required',
                'mensaje' => 'required'
            ]);

            //Registra nuevo mensaje
            Mensajes::create($data);
            $mensaje = 'Mensaje enviado satisfactoriamente!!';
        }else{

            if($request->state == "on"){
                $data["state"] = "1";
                $str = "como leído!!";
            }else{
                $data["state"] = "0";
                $str = "como no leído!!";
            }

            Mensajes::where('id', $request->id)->update($data);
            $mensaje = 'Mensaje marcado '.$str;
        }

        return redirect()->back()->with('message', $mensaje);
    }
}
