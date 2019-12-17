<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\CamionesMarca;
use App\Http\Controllers\Controller;

class CamionesMarcasController extends Controller
{
	public function index(){

		$marcas = CamionesMarca::all();

		return view('admin.marcas.index', compact('marcas'));
	}

	public function create()
	{

		return view('admin.marcas.create');
	}

	public function store(Request $request)
	{

		$marcas = CamionesMarca::create($request->all());

		return redirect()->route('admin.marcas.index');
	}

	public function edit(CamionesMarca $marca)
	{


		return view('admin.marcas.edit', compact('marca'));
	}

	public function update(Request $request, CamionesMarca $marca)
	{


		$marca->update($request->all());

		return redirect()->route('admin.marcas.index');
	}

	public function show(CamionesMarca $marca)
	{


		return view('admin.marcas.show', compact('marca'));
	}

	public function destroy(CamionesMarca $marca)
	{


		$marca->delete();

		return back();
	}}
