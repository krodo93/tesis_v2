<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tarifa;
class TarifasController extends Controller
{
    public function index(){

		$tarifas = Tarifa::all();

		return view('admin.tarifas.index', compact('tarifas'));
	}

	public function create()
	{

		return view('admin.tarifas.create');
	}

	public function store(Request $request)
	{

		$tarifa = Tarifa::create($request->all());

		return redirect()->route('admin.tarifas.index');
	}

	public function edit(Tarifa $tarifa)
	{
		return view('admin.tarifas.edit', compact('tarifa'));
	}

	public function update(Request $request, Tarifa $tarifa)
	{


		$tarifa->update($request->all());

		return redirect()->route('admin.tarifas.index');
	}

	public function show(Tarifa $tarifa)
	{


		return view('admin.tarifas.show', compact('tarifa'));
	}

	public function destroy(Tarifa $tarifa)
	{


		$tarifa->delete();

		return back();
	}
}
