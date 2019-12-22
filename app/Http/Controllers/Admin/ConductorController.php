<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Conductor as Conductores;
class ConductorController extends Controller
{
	public function index(){

		$conductores = Conductores::all();

		return view('admin.conductores.index', compact('conductores'));
	}

	public function create()
	{

		return view('admin.conductores.create');
	}

	public function store(Request $request)
	{

		$conductores = Conductores::create($request->all());

		return redirect()->route('admin.conductores.index');
	}

	public function edit(Conductores $conductore)
	{	
		$conductor = $conductore;
		return view('admin.conductores.edit', compact('conductor'));
	}

	public function update(Request $request, Conductores $conductore)
	{


		$conductore->update($request->all());

		return redirect()->route('admin.conductores.index');
	}

	public function show(Conductores $conductore)
	{


		return view('admin.conductores.show', compact('conductore'));
	}

	public function destroy(Conductores $conductore)
	{


		$conductore->delete();

		return back();
	}
}
