@extends('layouts.app')

@section('content')
    <div class="alert alert-primary d-flex justify-content-center" role="alert">
        <a href="{{route('interprete.index')}}" class="btn btn-primary">REGRESAR AL PRINCIPAL</a>
    </div>
    @include('interpretes.formulario')
@endsection