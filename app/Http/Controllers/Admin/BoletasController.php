<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tarifa;
use App\Boletas;
use App\BoletasDetalle;
use App\Camiones;
use App\Conductor;
use App\Empresa;
use Carbon\Carbon;
class BoletasController extends Controller
{
    public function index(){

        $boletas = Boletas::join('camiones','boletas.camion_id','=','camiones.id')
        ->join('conductors','boletas.conductor_id','=','conductors.id')
        ->join('users','boletas.usuario_id','=','users.id')
        ->select('boletas.*','camiones.descripcion as camion','conductors.nombre as conductor','users.name as usuario')->get();
        
		return view('admin.boletas.index', compact('boletas'));
	}

	public function create()
	{
        $camiones = Camiones::pluck('placa','id');
        $conductores = Conductor::pluck('nombre','id');
		return view('admin.boletas.create',compact('camiones','conductores'));
	}

	public function store(Request $request)
	{
        $request->request->add([
            'usuario_id' => auth()->user()->id,
            'fecha_hora' => Carbon::now(),
            'estado' => 'PENDIENTE'
        ]);
		$boleta = Boletas::create($request->all());

		return redirect('admin/boletas/' . $boleta->id . '/detalle');
	}
    public function detalle($id, Request $request){
        $camiones = Camiones::pluck('placa','id');
        $conductores = Conductor::pluck('nombre','id');

        $boleta = Boletas::join('camiones','boletas.camion_id','=','camiones.id')
        ->join('conductors','boletas.conductor_id','=','conductors.id')
        ->join('users','boletas.usuario_id','=','users.id')->select('boletas.*','camiones.placa as camion','conductors.nombre as conductor','users.name as usuario')->where('boletas.id',$id)->get()->first();
        if($request->imprimir == 1){
            $boleta_detalles = BoletasDetalle::where('boletas_id',$id)->get();
            return view('admin.boletas.imprimir', compact('id','boleta','boleta_detalles'));
        }
        if($request->completada == 1){
        	$boleta_detalles = BoletasDetalle::where('boletas_id',$id)->get();
        	return view('admin.boletas.completada', compact('id','camiones','conductores','boleta','boleta_detalles'));
        }else{
        	return view('admin.boletas.detalle', compact('id','camiones','conductores','boleta'));
        }
    }
    public function completar(Request $request){

    	$boleta = Boletas::find($request->id);
    	$fecha = Carbon::parse($boleta->fecha_hora)->format('Y-m-d');
    	
    	
    	$boleta->factura = $request->factura;
    	$boleta->turno = $request->turno;
    	$boleta->camion_id = $request->camion_id;
    	$boleta->conductor_id = $request->conductor_id;
    	$boleta->notas = $request->notas;
    	$boleta->estado = 'COMPLETADA';
    	$boleta->save();

    	//OBTENER TARIFA:

    	$tarifa = Tarifa::where('inicio','<=', $fecha)->where('fin','>=',$fecha)->get()->first();

    	// PRIMERA PESADA:

    	$primera_pesada = new BoletasDetalle();
    	$primera_pesada->tarifa_id = $tarifa->id;
    	$primera_pesada->boletas_id = $boleta->id;
    	$primera_pesada->peso = $request->pesada_1_peso;
    	$primera_pesada->pesada = Carbon::parse($request->pesada_1_fecha_hora);
    	$primera_pesada->precio = $tarifa->precio;
    	$primera_pesada->total = $primera_pesada->peso * $primera_pesada->precio;
    	$primera_pesada->save();

    	// SEGUNDA PESADA:

    	$segunda_pesada = new BoletasDetalle();
    	$segunda_pesada->tarifa_id = $tarifa->id;
    	$segunda_pesada->boletas_id = $boleta->id;
    	$segunda_pesada->peso = $request->pesada_2_peso;
    	$segunda_pesada->pesada = Carbon::parse($request->pesada_2_fecha_hora);
    	$segunda_pesada->precio = $tarifa->precio;
    	$segunda_pesada->total = $segunda_pesada->peso * $segunda_pesada->precio;
    	$segunda_pesada->save();

    	return redirect('admin/boletas/' . $boleta->id . '/detalle?completada=1');

    }
	public function edit(Boletas $boleta)
	{
		return view('admin.boletas.edit', compact('boleta'));
	}

	public function update(Request $request, Boletas $boleta)
	{


		$boleta->update($request->all());

		return redirect()->route('admin.boletas.index');
	}

	public function show(Boletas $boleta)
	{


		return view('admin.boletas.show', compact('boleta'));
	}

	public function destroy(Boletas $boleta)
	{


		$boleta->delete();

		return back();
	}
}
