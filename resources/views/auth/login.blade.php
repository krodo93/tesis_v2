@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card p-4">
                <div class="card-body">
                    @if(\Session::has('message'))
                        <p class="alert alert-info">
                            {{ \Session::get('message') }}
                        </p>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <h2 class="text-center">
                            ALCALDIA MUNICIPAL DE LA UNION
                        </h2>
                        <div class="login-logo text-center">
                                <img src="/logo.png" class="img-responsive">
                            </div>
                        <p class="text-muted">{{ trans('global.login') }}</p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input name="email" type="text" class="form-control" placeholder="Ingresa tu email">
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input name="password" type="password" class="form-control" placeholder="Ingresa tu clave">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <input type="submit" class="btn btn-primary px-4" value='LOGIN'>
                                <label class="ml-2">
                                    <input name="remember" type="checkbox" /> RECORDARME
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection