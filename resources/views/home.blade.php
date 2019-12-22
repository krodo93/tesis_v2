@extends('layouts.admin')
@section('content')
<style type="text/css">
	
	.icono{
		margin-bottom: 5%;
	}
</style>
<div class="content">
	<div class="row">
		<div class="col-sm-6 col-lg-3">
				<div class="card text-white bg-red">
					<div class="card-body pb-0">
						<div class="text-value">{{ $boletas }}</div>
						<div><h2>BOLETAS</h2></div>
						<div class="icono">
							<i class="fa fa-file-text fa-4x" aria-hidden="true"></i>
						</div>
					</div>
					
				</div>
			</div>
		<div class="col-sm-6 col-lg-3">
				<div class="card text-white bg-primary">
					<div class="card-body pb-0">
						<div class="text-value">{{ $camiones }}</div>
						<div><h2>CAMIONES</h2></div>
						<div class="icono">
							<i class="fa fa-truck fa-4x" aria-hidden="true"></i>
						</div>
					</div>
					
				</div>
			</div>

			<div class="col-sm-6 col-lg-3">
				<div class="card text-white bg-success">
					<div class="card-body pb-0">
						<div class="text-value">{{ $conductores }}</div>
						<div><h2>CONDUCTORES</h2></div>
						<div class="icono">
							<i class="fa fa-users fa-4x" aria-hidden="true"></i>
						</div>
					</div>
					
				</div>
			</div>
			<div class="col-sm-6 col-lg-3">
				<div class="card text-white bg-yellow">
					<div class="card-body pb-0">
						<div class="text-value">{{ $usuarios }}</div>
						<div><h2>USUARIOS</h2></div>
						<div class="icono">
							<i class="fa fa-users fa-4x" aria-hidden="true"></i>
						</div>
					</div>
					
				</div>
			</div>
	</div>
</div>
@endsection
@section('scripts')
@parent

@endsection