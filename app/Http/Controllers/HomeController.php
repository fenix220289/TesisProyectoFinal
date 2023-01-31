<?php

namespace App\Http\Controllers;

use App\Models\Cabecera;
use App\Models\Empresa;
use App\Models\Planes;
use App\Models\Preguntas;
use App\Models\Secciones;
use App\Models\Testimonios;

class HomeController extends Controller
{
    public function home()
    {
        $menus = [
            ["url"=>"/","text"=>"Inicio"],
            ["url"=>"#price","text"=>"Planes"],
            ["url"=>"#contact","text"=>"Contacto"]
        ];

        $mensaje = "";
        $empresa = Empresa::find(1);
        $cabecera = Cabecera::find(1);
        $planes = Planes::where("state",1)->get();
        $testimonios = Testimonios::all();
        $preguntas = Preguntas::all();
        $secciones = Secciones::where('state',1)->get();

        return view('pages.home', 
            compact(
                'menus','empresa','cabecera',
                'planes','testimonios','preguntas',
                'secciones','mensaje')
        );
    }
}
