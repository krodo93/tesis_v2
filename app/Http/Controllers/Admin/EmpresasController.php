<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Empresa;
class EmpresasController extends Controller
{
    public function index(){

		$empresas = Empresa::all();

		return view('admin.empresas.index', compact('empresas'));
	}

	public function create()
	{

		return view('admin.empresas.create');
	}

	public function store(Request $request)
	{

		$empresa = Empresa::create($request->all());

		return redirect()->route('admin.empresas.index');
	}

	public function edit(Empresa $empresa)
	{
		return view('admin.empresas.edit', compact('empresa'));
	}

	public function update(Request $request, Empresa $empresa)
	{


		$empresa->update($request->all());

		return redirect()->route('admin.empresas.index');
	}

	public function show(Empresa $empresa)
	{


		return view('admin.empresas.show', compact('empresa'));
	}

	public function destroy(Empresa $empresa)
	{


		$empresa->delete();

		return back();
	}
}
