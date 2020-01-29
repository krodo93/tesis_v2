<?php

namespace App\Http\Controllers\Admin;
use App\Camiones;
use App\Conductor;
use App\Boletas;
use App\User;
class HomeController
{
    public function index()
    {
        $camiones = Camiones::count();
       	$conductores = Conductor::count();
       	$boletas = Boletas::count();
       	$usuarios = User::count();
        return view('home',compact('camiones','conductores','boletas','usuarios'));
    }
}
