
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $titulo }}</div>
                @if(session("success"))
                    <div class="alert alert-success" role="alert">
                        {{session("success")}}
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ $ruta }}">
                        @csrf
                        @isset($update)
                            @method("PUT")
                        @endisset
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ $title }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="name" autofocus>

                                @error('nombre')
                                <div class="alert alert-danger" role="alert">
                                    {{__('ESE NOMBRE YA EXISTE')}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ $boton }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

