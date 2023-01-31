<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    public function index()
    {
        $menus = Menus::paginate(100);
        return view("dashboard.menus.index", compact('menus'));
    }
}
