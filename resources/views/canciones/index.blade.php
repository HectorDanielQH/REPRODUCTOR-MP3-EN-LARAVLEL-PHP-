@extends('layouts.app')

@section('content')
    @if(session("success"))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>PERFECTO!</strong> {{session("success")}}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">TITULO</th>
                <th scope="col">TRACK</th>
                <th scope="col">INTERPRETE</th>
                <th scope="col">MODIFICAR</th>
                <th scope="col">ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                @forelse($track as $tracks)
                    <tr>
                        <th scope="row">{{ $tracks->id }}</th>
                        <th>{{ $tracks->titulo }}</th>
                        <td><audio src="{{ $tracks->getUrlPath() }}" controls ></audio></td>
                        <td>{{ $tracks->interprete->nombre }}</td>
                        <td>
                            <a class="btn btn-outline-primary btn-lg" href="{{ route('track.edit',['track'=>$tracks]) }}">
                                MODIFICAR
                            </a>
                        </td>
                        <td>
                            <form 
                                action="{{ route('track.destroy',['track'=>$tracks]) }}" 
                                method="post"
                            >
                                @method("DELETE")
                                @csrf
                                <button
                                    class="btn btn-outline-danger btn-lg"
                                    type="submit"
                                >
                                    ELIMINAR
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="border-solid border-2 border-gray-500 px-4 py-2" colspan="5">
                            {{__("no hay nada que mostrar en la tabla")}}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection