<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Camiones;
use App\CamionesMarca;
class CamionesController extends Controller
{
	public function index(){

		$camiones = Camiones::join('camiones_marcas','camiones.marca_id','=','camiones_marcas.id')->select('camiones.*','camiones_marcas.nombre as marca')->get();

		return view('admin.camiones.index', compact('camiones'));
	}

	public function create()
	{
		$marcas = CamionesMarca::pluck('nombre','id');
		return view('admin.camiones.create',compact('marcas'));
	}

	public function store(Request $request)
	{

		$camiones = Camiones::create($request->all());

		return redirect()->route('admin.camiones.index');
	}

	public function edit(Camiones $camione)
	{
		$camion = $camione;
		$marcas = CamionesMarca::pluck('nombre','id');
		return view('admin.camiones.edit', compact('camion','marcas'));
	}

	public function update(Request $request, Camiones $camione)
	{


		$camione->update($request->all());

		return redirect()->route('admin.camiones.index');
	}

	public function show(Camiones $camione)
	{


		return view('admin.camiones.show', compact('camione'));
	}

	public function destroy(Camiones $camione)
	{


		$camione->delete();

		return back();
	}
}
