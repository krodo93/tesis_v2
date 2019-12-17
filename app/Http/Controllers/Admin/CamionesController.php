<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Camiones;
use App\Camionescamion;
class CamionesController extends Controller
{
	public function index(){

		$camiones = Camiones::all();

		return view('admin.camiones.index', compact('camiones'));
	}

	public function create()
	{

		return view('admin.camiones.create');
	}

	public function store(Request $request)
	{

		$camiones = Camiones::create($request->all());

		return redirect()->route('admin.camiones.index');
	}

	public function edit(Camiones $camion)
	{


		return view('admin.camiones.edit', compact('camion'));
	}

	public function update(Request $request, Camiones $camion)
	{


		$camion->update($request->all());

		return redirect()->route('admin.camiones.index');
	}

	public function show(Camiones $camion)
	{


		return view('admin.camiones.show', compact('camion'));
	}

	public function destroy(Camiones $camion)
	{


		$camion->delete();

		return back();
	}
}
