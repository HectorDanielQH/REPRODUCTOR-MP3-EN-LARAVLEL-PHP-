@extends('layouts.app')

@section('content')
    <div class="alert alert-primary d-flex justify-content-center" role="alert">
        <a href="{{route('track.index')}}" class="btn btn-primary">REGRESAR AL PRINCIPAL</a>
    </div>
    <form 
        class="d-flex flex-column bd-highlight mb-3 control container" 
        enctype="multipart/form-data"
        method='POST'
        action="{{$ruta}}"
    >
        @csrf
        <div class="input-group col-12 mb-4">
            <label class="input-group-text" for="inputGroupSelect01">INTERPRETES</label>
            <select name="interprete" class="form-select col-10" id="inputGroupSelect01">
                @foreach($interpretes as $interprete)
                    <option value="{{$interprete->id}}">{{$interprete->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 mb-4">
            <label for="validationServer01" class="form-label">NOMBRE DEL TRACK</label>
            <input name="titulo" type="text" class="form-control" id="validationServer01" placeholder="{{$title}}" required>
        </div>
        <div class="input-group col-12 mb-4">
            <label class="input-group-text" for="inputGroupFile01">{{__('SUBE LA MUSICA')}}</label>
            <input type="file" name="music" class="form-control" id="inputGroupFile01">
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">{{$boton}}</button>
        </div>
    </form>
    @error('titulo')
        <div class="alert alert-danger d-flex justify-content-center" role="alert">
            EL TITULO DEL TRACK NO ES VALIDO BRO!!!!
        </div>
    @enderror
    @error('music')
        <div class="alert alert-danger d-flex justify-content-center" role="alert">
            FALTA EL ARCHIVO BRO!!!!
        </div>
    @enderror
@endsection