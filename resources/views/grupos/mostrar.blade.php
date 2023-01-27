@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route("home") }}" type="button" class="btn btn-primary">Volver</a>

                </div>

                <div class="card-body">
                    @if (strlen (session('status')) > 0)
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            {{ session(['status' => '']) }}
                        </div>
                    @endif

                </div>

                <x-tarjetagrupo :grupo="$grupo" :botonver=false />


                <div class="card-body">
                        <div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Acción</th>
                                        <th scope="col">Amigo</th>
                                        <th scope="col">Regala a</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($grupo->participantes as $amigo)
                                        <tr>
                                            <td>
                                                @if ($grupo->estado == 0)
                                                    <!--- Si es él puede borrarse o si es el admin echar a cualquiera -->
                                                    @if (($amigo->id == auth()->user()->id) || ($grupo->propietario_id == auth()->user()->id))
                                                        <form action="{{ route('grupos.participantes.destroy', ["grupo" => $grupo->id, "participante" => $amigo->id]) }}" method="post">
                                                            @csrf
                                                            @method("delete")
                                                            <button type="submit" class="btn btn-outline-danger">
                                                                <i class="bi bi-trash3"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if ($amigo->id == $grupo->propietario_id)
                                                    <i class="bi bi-person-lock"></i>&nbsp;{{ $amigo->name }}
                                                @else
                                                    {{ $amigo->name }}
                                                @endif
                                            </td>

                                            <td>
                                                @if (($grupo->estado > 0) && (($amigo->id == auth()->user()->id) || ($grupo->propietario_id == auth()->user()->id)))
                                                {{ \App\Models\User::find($amigo->pivot->amigo_id)->name }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        @if(($grupo->estado == 0) && ($grupo->propietario_id == auth()->user()->id))
                            <a href="{{ route('grupos.sortear', ["grupoid" => $grupo->id]) }}">Sortear</a>
                        @endif
                        @if(($grupo->estado == 1) && ($grupo->propietario_id == auth()->user()->id))
                            <a href="{{ route('grupos.anularsorteo', ["grupoid" => $grupo->id]) }}">Anular Sorteo</a>
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
