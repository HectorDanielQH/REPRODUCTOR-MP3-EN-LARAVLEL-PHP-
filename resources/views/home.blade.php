@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('imagenes/r1.jpg')}}" class="card-img-top" width="30" height="350">
                        <h5 class="card-title">Interpretes</h5>
                        <p class="card-text">Aqui puedes añadir,modificar,actualizar Interpretes.</p>
                        <a href="{{route('interprete.index')}}" class="btn btn-success"> INGRESAR </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('imagenes/Canciones-en-portugués.jpg')}}" class="card-img-top" width="30" height="350">
                        <h5 class="card-title">Canciones</h5>
                        <p class="card-text">Aqui puedes añadir,modificar,actualizar Canciones.</p>
                        <a href="{{route('track.index')}}" class="btn btn-success"> INGRESAR </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
