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
                <th scope="col">INTERPRETE</th>
                <th scope="col">MODIFICAR</th>
                <th scope="col">ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                @forelse($interpretes as $inte)
                    <tr>
                        <th scope="row">{{ $inte->id }}</th>
                        <td>{{ $inte->nombre }}</td>
                        <td>
                            <a class="btn btn-outline-primary btn-lg" href="{{route('interprete.edit',['interprete'=>$inte])}}">
                                MODIFICAR
                            </a>
                        </td>
                        <td>
                            <a 
                                class="btn btn-outline-danger btn-lg"
                                href="#"
                                onclick="
                                    event.preventDefault();
                                    document.getElementById('delete-contact-{{$inte->id}}-form').submit();
                                "
                            >
                                ELIMINAR
                            </a>

                            <form 
                                id="delete-contact-{{$inte->id}}-form"
                                method="POST"
                                action="{{route('interprete.destroy',['interprete'=>$inte])}}"
                                class="hidden"
                            >
                                @method("DELETE")
                                @csrf
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