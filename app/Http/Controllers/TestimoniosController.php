<?php

namespace App\Http\Controllers;

use App\Models\Testimonios;
use Illuminate\Http\Request;

class TestimoniosController extends Controller
{
    public function index()
    {
        $testimonios = Testimonios::paginate(100);
        return view("dashboard.testimonios.index", compact('testimonios'));
    }

    public function create()
    {
        $titulo = "Nuevo testimonio";
        $testimonio = null;
        return view("dashboard.testimonios.form", compact("titulo","testimonio"));
    }

    public function update($id)
    {   
        $titulo = "Editar testimonio";
        $testimonio = Testimonios::find($id);
        return view("dashboard.testimonios.form", compact('titulo','testimonio'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'persona' => 'required',
            'cargo' => 'required',
            'testimonio' => 'required'
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto');
            $filename = $request->file('foto')->getClientOriginalName();
            $data['foto']->move(public_path('images/testimonios'), $filename);
            $data['foto'] = "/images/testimonios/".$filename;
        }
       
        if(!$request->id){
            //Registra un nuevo testimonio
            Testimonios::create($data);
        }else{
            Testimonios::where('id', $request->id)->update($data);
        }

        return redirect()->back()->with('message', 'Datos actualizados correctamente!!');
    }

    public function delete($id)
    {
        if(Testimonios::where("id", $id)->delete()){
            return redirect()->route("dashboard.testimonios")->with('message', 'Testimonio eliminado correctamente!!');
        }
    }
}
