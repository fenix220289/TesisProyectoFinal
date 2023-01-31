<?php

namespace App\Http\Controllers;

use App\Models\Planes;
use App\Models\PlanesDetalles;
use App\Models\Servicios;
use App\Models\TipoPlanes;
use Illuminate\Http\Request;

class PlanesController extends Controller
{
    public function index()
    {
        $planes = Planes::paginate(100);
        return view("dashboard.planes.index", compact('planes'));
    }
    
    public function create()
    {
        $titulo = "Nuevo plan";
        $plan = null;
        $tipos = TipoPlanes::all();
        $servicios = Servicios::all();
        return view("dashboard.planes.form", compact("titulo","plan","tipos","servicios"));
    }

    public function update($id)
    {   
        $titulo = "Editar plan";
        $plan = Planes::find($id);
        $tipos = TipoPlanes::all();
        $servicios = Servicios::all();
        return view("dashboard.planes.form", compact("titulo","plan","tipos","servicios"));    }

    public function store(Request $request)
    {
        
        $data = $request->validate([
            'nombre' => 'required',
            'tipo_plan' => 'required',
            'precio' => 'required',
        ]);
       
        $data["state"] = ($request->state == "on")? "1" : "0";
        $data["especial"] = ($request->especial == "on")? "1" : "0";

       
        if(!$request->id){
            //Registra nuevo plan
            $plan = Planes::create($data);
        }else{
            //Actualza datos del platn
            $plan = Planes::where('id', $request->id)->update($data);
        }

        $plan_id = (!$request->id)? $plan->id : $request->id;

        if(isset($request->servicios)){
                
            $detalles = [];

            foreach ($request->servicios as $servicio) {
                array_push($detalles, [
                    "plan_id"=> $plan_id,
                    "servicio_beneficio_id"=>$servicio
                ]);
            }

            //Elimina los detalles anteriores
            PlanesDetalles::where("plan_id", $plan_id)->delete();

            //Inserta detalles del plan
            PlanesDetalles::upsert($detalles,['name', 'plan_id'], ['servicio_beneficio_id']);

        }

        return redirect()->back()->with('message', 'Datos guardados correctamente!!');
    }

    public function delete($id)
    {
        if(Planes::where("id", $id)->delete()){
            return redirect()->route("dashboard.planes")->with('message', 'Plan eliminado correctamente!!');
        }
    }
}
